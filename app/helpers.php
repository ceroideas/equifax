<?php

use App\Models\Actuation;
use App\Models\Claim;
use App\Models\Debt;
use App\Models\Hito;
use App\Models\SendEmail;
use App\Models\Template;
use App\Models\Invoice;
use App\Models\Linvoice;
use App\Models\Order;
use App\Models\Lorder;
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

function addDocument($typeDocument, $claim_id){
    // Necesitamos el tipo de documento
    if($typeDocument == 'order'){
        $idDocument = Order::all()->max('id');
        $idDocument = $idDocument + 1;
    }else{
        $idDocument = Invoice::all()->max('id');
        $idDocument = $idDocument + 1;
    }

    $c = Configuration::first();

    if(isset($c)){
        $typeDocument == 'order' ? $document = new Order : $document = new Invoice;
        $document->id = $idDocument;
        $document->claim_id =  $claim_id;
        $document->user_id = Auth::user()->id;
        $document->type = 'fixed_fees';
        $document->description = $c->extra_concept;

        /* Solo en invoice almacenamos los datos del cliente en el momento de su creación */
        if($typeDocument == 'invoice'){
            $document->cnofac = Auth::user()->name;
            $document->cdofac = Auth::user()->address;
            $document->cpofac = Auth::user()->location;
            $document->ccpfac = Auth::user()->cop;
            $document->cprfac = Auth::user()->province;
            $document->cnifac = Auth::user()->dni;
        }

        if($typeDocument == 'order'){
            $ldocument = new Lorder;
            $ldocument->order_id = $idDocument;
            $ldocument->poslor = 1;
            $ldocument->artlor = $c->extra_code;
            $ldocument->deslor = $c->extra_concept;
            $ldocument->canlor = 1;
            $ldocument->prelor = $c->fixed_fees;
            $ldocument->totlor =  $ldocument->canlor * $ldocument->prelor;
            $ldocument->ivalor = Auth::user()->taxcode =='IVA0'?'IVA0':($c->fixed_fees_tax =='IVA0'?'IVA0':'IVA21'); // Comprobamos el iva del cliente
        }else{
            $ldocument = new Linvoice;
            $ldocument->invoice_id = $idDocument;
            $ldocument->poslin = 1;
            $ldocument->artlin = $c->extra_code;
            $ldocument->deslin = $c->extra_concept;
            $ldocument->canlin = 1;
            $ldocument->prelin = $c->fixed_fees;
            $ldocument->totlin =  $ldocument->canlin * $ldocument->prelin;
            $ldocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0':($c->fixed_fees_tax =='IVA0'?'IVA0':'IVA21'); // Comprobamos el iva del cliente
        }

        $ldocument->save();

                /* Acumulamos en cabeceras */
                /* todos los importes van en neto4 al ser cliente sin IVA */

        if(Auth::user()->taxcode =='IVA0'){

            if($typeDocument=='order'){
                $document->net4ord = $ldocument->totlor;
                $document->pdto4ord = Auth::user()->discount;
                $document->idto4ord = round(($document->pdto4ord*100),2);// Calcular descuento
                $document->bas4ord = round(($document->net4ord - $document->idto4ord),2);
                /* Totalizamos*/
                $document->totord = $document->bas4ord; // no lleva impuestos por lo que es igual que la base
                $document->amount=$document->bas4ord;
            }else{
                $document->net4fac = $ldocument->totlin;
                $document->pdto4fac = Auth::user()->discount;
                $document->idto4fac = round(($document->pdto4fac*100),2);// Calcular descuento
                $document->bas4fac = round(($document->net4fac - $document->idto4fac),2);
                /* Totalizamos*/
                $document->totfac = $document->bas4fac; // no lleva impuestos por lo que es igual que la base
                $document->amount=$document->bas4fac;
            }

            $document->save();

        }else{
            /* Cliente al 21*/
            /*Comprobamos iva del concepto*/
            if($c->fixed_fees_tax =='IVA0'){
                if($typeDocument=='order'){
                    $document->net4ord = $ldocument->totlor;
                    $document->pdto4ord = Auth::user()->discount;
                    $document->idto4ord = round(($document->pdto4ord*100),2);// Calcular descuento
                    $document->bas4ord = round(($document->net4ord - $document->idto4ord),2);
                    /* porcentajes de iva  Cliente iva*/
                    $document->piva1ord = '21';
                    $document->piva2ord = '10';
                    $document->piva3ord = '4';
                    /* Totalizamos*/
                    $document->totord = $document->bas4ord; // no lleva impuestos por lo que es igual que la base
                    $document->amount=$document->bas4ord;

                }else{
                    $document->net4fac = $ldocument->totlin;
                    $document->pdto4fac = Auth::user()->discount;
                    $document->idto4fac = round(($document->pdto4fac*100),2);// Calcular descuento
                    $document->bas4fac = round(($document->net4fac - $document->idto4fac),2);
                    /* porcentajes de iva  Cliente iva*/
                    $document->piva1fac = '21';
                    $document->piva2fac = '10';
                    $document->piva3fac = '4';
                    /* Totalizamos*/
                    $document->totfac = $document->bas4fac; // no lleva impuestos por lo que es igual que la base
                    $document->amount=$document->bas4fac;
                }

                $document->save();

            }else{

                if($typeDocument=='order'){
                    $document->net1ord = $ldocument->totlor;
                    $document->pdto1ord = Auth::user()->discount;
                    $document->idto1ord = round(($document->pdto1ord*100),2);// Calcular descuento
                    $document->bas1ord = round(($document->net1ord - $document->idto1ord),2);
                    /* Porcentajes de iva  Cliente iva*/
                    $document->piva1ord = '21';
                    $document->piva2ord = '10';
                    $document->piva3ord = '4';
                    /* Calcular importe iva*/
                    $document->iiva1ord = round($document->bas1ord*($document->piva1ord / 100 ),2);
                    /* Totalizamos*/
                    $document->totord = round($document->bas1ord + $document->iiva1ord,2);
                    $document->amount = $document->totord;

                }else{
                    $document->net1fac = $ldocument->totlin;
                    $document->pdto1fac = Auth::user()->discount;
                    $document->idto1fac = round(($document->pdto1fac*100),2);// Calcular descuento
                    $document->bas1fac = round(($document->net1fac - $document->idto1fac),2);
                    /* Porcentajes de iva  Cliente iva*/
                    $document->piva1fac = '21';
                    $document->piva2fac = '10';
                    $document->piva3fac = '4';
                    /* Calcular importe iva*/
                    $document->iiva1fac = round($document->bas1fac*($document->piva1fac / 100 ),2);
                    /* Totalizamos*/
                    $document->totfac = round($document->bas1fac + $document->iiva1fac,2);
                    $document->amount = $document->totfac;
                }

                $document->save();
            } // fin iva excento

        } // fin iva excento
        /*Fin generacion de factura */

    }else{
        /* Mostrar mensaje de error falta configuracion id=1*/
    } // fin comprobacion de configuracion
    /*********** Fin generacion de factura *****************/
    return '200';
}

function addLineDocument(){
    //
}

/* Esta funcion totaliza los documentos, resultado de la suma de las lineas de detalle */
function totalDocument($idDocument){
    // Buscamos lineas de detalle
    // Totalizamos parcialmente
    // update en documento
}
