<?php

use App\Models\Actuation;
use App\Models\Claim;
use App\Models\Debt;
use App\Models\Hito;
use App\Models\SendEmail;
use App\Models\Template;
use App\Models\Invoice;
use App\Models\Configuration;
use App\Models\User;
use Carbon\Carbon;

function isComplete()
{
	return (Auth::user()->dni && Auth::user()->phone && Auth::user()->cop);
}
function getHito($id_hito)
{
	$h = null;
	$f = null;
	// foreach (config('app.actuations') as $key => $value) {
	foreach (Hito::whereNull('parent_id')->get() as $key => $value) {
        
        if (count($value->hitos)) {
            foreach ($value->hitos as $key1 => $value1) {
                // if ($value1['id'] === $id_hito) {
                if ($value1->ref_id === $id_hito) {
                    $h = $value1;
                    $f = $value;

                    return [$h,$f];
                }
            }
        }else{
            if ($value->ref_id === $id_hito) {
                $h = $value;
                $f = $value;

                return [$h,$f];
            }
        }
    }

    $ht = Hito::where('ref_id',$id_hito)->first();
    return [$ht,$ht];
}

function actuationActions($id_hito, $claim_id, $amount = null, $date = null, $observations = null)
{
	$h = getHito($id_hito)[0];
	$amount = null;
	$amounts = [];
	$type = [];
	$claim = Claim::find($claim_id);

	/*if ($claim->claim_type == 2) {

		if ($h) {
			if ($h['redirect_to'] != "20") {

				$a = new Actuation;
		        $a->claim_id = $claim_id;
		        $a->subject = "001";
		        $a->amount = null;
		        $a->description = null;
		        $a->actuation_date = Carbon::now()->format('d-m-Y');

		        $a->hito_padre = $h['id'];

		        $a->type = null;
		        $a->mailable = $h['email'] ? 1 : null;

		        $a->save();

			}else{

				$a = new Actuation;
		        $a->claim_id = $claim_id;
		        $a->subject = "20";
		        $a->amount = null;
		        $a->description = null;
		        $a->actuation_date = Carbon::now()->format('d-m-Y');

		        $a->hito_padre = $h['id'];

		        $a->type = null;
		        $a->mailable = $h['email'] ? 1 : null;

		        $a->save();
			}
		}


	}
	else */if ($h) {

		// comprobar si el hito es de la fase de cobro directamente

		/*if ($h['id'] == 301 || $h['id'] == 302) {
			// code...
			$a = new Actuation;
	        $a->claim_id = $claim_id;
	        $a->subject = $h['id'];
	        $a->amount = $amount;
	        $a->description = $observations;
	        $a->actuation_date = $date;
	        $a->type = null;
	        $a->mailable = $h['email'] ? 1 : null;

	        $a->save();

			return actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);
		}

		// comprobar si el hito redirecciona a otro hito

		else */
		if($h['redirect_to'])
		{

			if ($h['id'] != "-1") {
				$a = new Actuation;
		        $a->claim_id = $claim_id;
		        $a->subject = $h['redirect_to'];
		        $a->amount = $amount;
		        $a->description = $observations;
		        $a->actuation_date = $date ? $date : Carbon::now()->format('d-m-Y');

		        $a->hito_padre = $h['id'];

		        $a->type = null;
		        $a->mailable = $h['email'] ? 1 : null;

		        $a->save();

		        // comprobar si el hito debe enviar un email

				if ($h['template_id']) {
					// code...
					$se = new SendEmail;
					$se->addresse = $claim ? $claim->owner->email : '';
					$se->template_id = $h['template_id'];
					$se->actuation_id = $a->id;
					$se->save();

					$o = User::where('email',$se->addresse)->first();

					$tmp = $se->template;
		            Mail::send('email_base', ['se' => $se], function ($message) use($tmp, $o) {
		                $message->to($o->email, $o->name);
		                $message->subject($tmp->title);
		            });

		            $se->send_count += 1;
		            $se->save();
				}
			}

			// comprobar si la redirección es al inicio del proceso de cobros (carga apud acta)
            if ($h['redirect_to'] === "301") {

				$c = Configuration::first();

				if ($claim->owner->apud_acta) {
	                $claim->status = 7;
	            }else{
	                $claim->status = 11;
	            }

				$claim->claim_type = 1;
				$claim->save();

				if ($c) {
					foreach ($h['type'] as $key => $value) {
						if ($key == 1) {
							if ($claim->third_parties_id) {
				                if ($claim->representant->type == 1) {
				                    if ($claim->debt->pending_amount > 2000) {
				                        $amount += $c[$value];
				                        $amounts[] = $c[$value];
				                        $type[] = $value;
				                    }
				                }
				            }else{
				                if ($claim->client->type == 1) {    //client = user_id
				                    if ($claim->debt->pending_amount > 2000) {
				                        $amount += $c[$value];
				                        $amounts[] = $c[$value];
				                        $type[] = $value;
				                    }
				                }
				            }
						}else{
							$amount += $c[$value];
							$amounts[] = $c[$value];
							$type[] = $value;
						}
					}
				}

				$description = "Pago de la tarifa procedimiento ";

				switch ($h['type'][0]) {
                    case 'monitory':
						$description .= "Monitorio";
						break;
					case 'judicial_amount':
						$description .= "Judicial";
						break;
					case 'verbal_amount':
						$description .= "Verbal";
						break;
					case 'ordinary_amount':
						$description .= "Ordinario";
						break;
					case 'execution':
						$description .= "Ejecución";
						break;
					case 'resource':
						$description .= "Recurso";
						break;
				}

				$invoice = new Invoice;
		        $invoice->claim_id = $claim->id;
		        $invoice->user_id = $claim->user_id;
		        $invoice->amounts = implode('|',$amounts);
		        $invoice->amount = $amount;
		        $invoice->description = $description;
		        $invoice->type = implode('|',$type);
		        if (Auth::user()->isGestor()) {
		            $invoice->status = 1;
		        }
		        $invoice->save();

		        if (Auth::user()->isGestor()) {
		        	actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);

		        	return actuationActions("302",$claim_id);
		        }else{

					if ($claim->owner->apud_acta) {
						return actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);
			        }
				}

			}

			// comprobar si la redirección es al inicio del proceso de cobros (generacion de cobro)

			if ($h['redirect_to'] === "302") {
		        // al generar el cobro, se detiene el proceso hasta que el cliente realice el pago
		        // por lo que habria que comprobar las acciones del 302 cuando el cliente pague
			}

			// comprobar si la redirección es al inicio del proceso de cobros (generacion de cobro)

			if ($h['redirect_to'] === "303") {
				return actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);
			}

			// comprobar si el cliente acepta el acuerdo

			if ($h['redirect_to'] === "1703") {
				// se debe generar un boton de aceptación para que el cliente acepte el acuerdo alcanzado, acto seguido se pasa al siguiente paso
			}

			// comprobar si finaliza la reclamación

			if ($h['redirect_to'] === "20") {
				// la reclamación queda aqui y se considera finalizada
			}

			// comprobar si continua con la reclamación

			if ($h['redirect_to'] === "21") {
				// la reclamación queda aqui porque es el inicio del proceso e id del hito para exportar las reclamaciones
			}
		}

		/*echo 'Email: '.($h['email'] ? 'Si' : 'No');
		echo '<br>';
		echo 'Genera Cobro: '.(($h['redirect_to'] === "301" || ($h['id'] == 301 || $h['id'] == 302)) ? 'Si' : 'No');
		echo '<br>';
		echo ($h['redirect_to'] === "301" ? ('Tipo de Cobro: '.$h['type'].'<br>') : '');
		echo 'Finaliza: '.($h['redirect_to'] === "20" ? 'Si' : 'No');
		echo '<br>';*/

	}
}
