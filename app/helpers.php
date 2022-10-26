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
use Illuminate\Support\Facades\DB;

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

function actuationActions($id_hito, $claim_id, $amount = null, $date = null, $observations = null, $actuation_id = null)
{
	$h = getHito($id_hito)[0];
	$amount = null;
	$amounts = [];
	$type = [];
	$claim = Claim::find($claim_id);

    if(file_exists('testing/testing_claims_actuations.txt')){
        $file = fopen('testing/testing_claims_actuations.log', 'a');
        fwrite($file, date("d/m/Y H:i:s").'-'.'ActuationActions en Helper inicia con: ' . PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'$id_hito: ' . $id_hito . ' $claim_id: '. $claim_id. ' $observations: '. $observations .' id_actuation: '. $actuation_id.PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'Busca hito: ' . $h . PHP_EOL);
        fclose($file);
    }


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
	else */
    if ($h) {

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
            if(file_exists('testing/testing_claims_actuations.txt')){
                $file = fopen('testing/testing_claims_actuations.log', 'a');
                fwrite($file, date("d/m/Y H:i:s").'-'.'Actuacion '. $actuation_id .' redirecciona a: ' . $h['redirect_to'].PHP_EOL);
                fwrite($file, date("d/m/Y H:i:s").'-'.'Graba nueva Actuacion: '.PHP_EOL);
                fclose($file);
            }

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

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'SendEmail grabado  ' . PHP_EOL);
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Enviando email a: ' .$o->email .' '. $o->name . PHP_EOL);
                        fclose($file);
                    }
				}
			}

			// comprobar si la redirección es al inicio del proceso de cobros (carga apud acta)
            if ($h['redirect_to'] === "301") {

				$c = Configuration::first();

                if(file_exists('testing/testing_claims_actuations.txt')){
                    $file = fopen('testing/testing_claims_actuations.log', 'a');
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Hito redirecciona 301'.PHP_EOL);
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Usuario tiene apud acta? : '. $claim->owner->apud_acta . PHP_EOL);
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Cambia la reclamacion a Judicial type y actualiza : ' . PHP_EOL);
                    fclose($file);
                }

				if ($claim->owner->apud_acta) {
	                $claim->status = 7;
	            }else{
	                $claim->status = 11;
	            }

				$claim->claim_type = 1;
				$claim->save();

                // Escribe descripcion invoice


                /************* Inicio creacion de documento (Order / Invoice ) ***************/

                // Determinamos si hay tasa
				if ($c) {
                    $tasa = 0;
                    foreach ($h['type'] as $key => $value) {
						if ($key == 1) {
							if ($claim->third_parties_id) {
				                if ($claim->representant->type == 1) {
				                    if ($claim->debt->pending_amount > 2000) {
                                        // TODO: Escribir linea de detalle de tasa
				                        /*$amount += $c[$value];
				                        $amounts[] = $c[$value];
				                        $type[] = $value;*/
                                        $tasa = 1;
				                    }
				                }
				            }else{
				                if ($claim->client->type == 1) {    //client = user_id
				                    if ($claim->debt->pending_amount > 2000) {
                                        // TODO: Escribir linea de detalle de tasa
				                        /*$amount += $c[$value];
				                        $amounts[] = $c[$value];
				                        $type[] = $value;*/
                                        $tasa = 1;
				                    }
				                }
				            }
						}/*else{
                            // TODO: Escribir linea de detalle del hito correspondiente.
							/*
                            $amount += $c[$value];
							$amounts[] = $c[$value];
							$type[] = $value;
						}*/
					}
				}

                if($h['type'][0]){
                    switch ($h['type'][0]) {
                        case 'judicial_amount':
                            $articulo= "JUD-001";
                            break;
                        case 'verbal_amount':
                            $articulo= "VER-001";
                            break;
                        case 'ordinary_amount':
                            $articulo = "ORD-001";
                            break;
                        case 'execution':
                            $articulo = "EJE-001";
                            break;
                        case 'resource':
                            $articulo = "RES-001";
                            break;
                    }
                }


                // Verificamos si la reclamacion tiene un gestor para saber si generamos pedido o factura directamente
                if(file_exists('testing/testing_claims_actuations.txt')){
                    $file = fopen('testing/testing_claims_actuations.log', 'a');
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Iniciamos generacion de documento: ' . PHP_EOL);

                }
                if($claim->gestor_id <> null){
                    addDocument('order', $claim->id, $articulo,$tasa);

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Iniciamos generacion de documento Pedido: ' . PHP_EOL);
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Genera pedido: claim_id/articulo/tasa: ' . $claim->id .'/'. $articulo .'/'. $tasa . PHP_EOL);
                        fclose($file);
                    }

                }else{
                    addDocument('invoice',$claim->id, $articulo,$tasa);

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Iniciamos generacion de documento Factura: ' . PHP_EOL);
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Genera factura: claim_id/articulo/tasa: ' . $claim->id .'/'. $articulo .'/'. $tasa . PHP_EOL);
                        fclose($file);
                    }

                }

                /*********** Fin generacion de documento *****************/

                // Si el hito tiene una redireccion 301, debe tener en type los elementos con los que puede generar tanto la factura como la tasa.
				// Esto se realiza en el la creacion del documento

                /*$description = "Pago de la tarifa procedimiento ";
                if($h['type'][0]){
                    switch ($h['type'][0]) {
                        case 'judicial_amount':
                            $description .= "Monitorio";
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
                }*/

                // TODO: Generar nuevo documento nuevo formato
                /*
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
		        $invoice->save();*/






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
		}else{

                // comprobar si el hito debe enviar un email
                if(file_exists('testing/testing_claims_actuations.txt')){
                    $file = fopen('testing/testing_claims_actuations.log', 'a');
                    fwrite($file, date("d/m/Y H:i:s").'-'.'No hay redireccion en el hito: ' . PHP_EOL);
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Comprobamos si envia email si existe template: ' . $h['template_id']. PHP_EOL);
                    fclose($file);
                }
                if ($h['template_id']) {

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Preparando email  ' . PHP_EOL);
                        fclose($file);
                    }

                    // code...
                    $se = new SendEmail;
                    $se->addresse = $claim ? $claim->owner->email : '';
                    $se->template_id = $h['template_id'];
                    $se->actuation_id = $actuation_id;// viene desde claimsController
                    $se->save();

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'SendEmail grabado  ' . PHP_EOL);
                        fclose($file);
                    }

                    $o = User::where('email',$se->addresse)->first();

                    $tmp = $se->template;
                    Mail::send('email_base', ['se' => $se], function ($message) use($tmp, $o) {
                        $message->to($o->email, $o->name);
                        $message->subject($tmp->title);
                    });

                    $se->send_count += 1;
                    $se->save();

                    if(file_exists('testing/testing_claims_actuations.txt')){
                        $file = fopen('testing/testing_claims_actuations.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Enviando email a: ' .$o->email .' '. $o->name . PHP_EOL);
                        fclose($file);
                    }
                } // Fin envio email

            } // fin actuacion simple no redirecciona

		/*echo 'Email: '.($h['email'] ? 'Si' : 'No');
		echo '<br>';
		echo 'Genera Cobro: '.(($h['redirect_to'] === "301" || ($h['id'] == 301 || $h['id'] == 302)) ? 'Si' : 'No');
		echo '<br>';
		echo ($h['redirect_to'] === "301" ? ('Tipo de Cobro: '.$h['type'].'<br>') : '');
		echo 'Finaliza: '.($h['redirect_to'] === "20" ? 'Si' : 'No');
		echo '<br>';*/

	}
}

function addDocument($typeDocument, $claim_id, $articulo, $tasa, $gestoria_id=0){
    // Necesitamos el tipo de documento
    if($typeDocument == 'order'){
        $idDocument = maxId('Orders','id');
    }else{
        $idDocument = maxId('Invoices','id');
    }

    $c = Configuration::first();

    if(isset($c)){
        $typeDocument == 'order' ? $document = new Order : $document = new Invoice;
        $document->id = $idDocument;
        $document->claim_id =  $claim_id;


        /////////////////////////////// Siempre se factura en nombre del owner
        $claim = Claim::find($claim_id);

        /*
        if(!$gestoria_id == 0){
            $user = User::find($gestoria_id);
            $document->user_id = $user->id;
        }else{
            $user = User::find($claim->owner_id);
            $document->user_id =  $user->id;
        }*/

        // Asignamos el documento siempre a nombre del
        $user = User::find($claim->owner_id);
        $document->user_id =  $user->id;
        // Solo en invoice almacenamos los datos del cliente en el momento de su creación
        if($typeDocument == 'invoice'){
           // if(!$gestoria_id == 0){
                $document->cnofac = $user->name;
                $document->cdofac = $user->address;
                $document->cpofac = $user->location;
                $document->ccpfac = $user->cop;
                $document->cprfac = $user->province;
                $document->cnifac = $user->dni;
            //}else{
                // Es mejor facturar en nombre el owner del claim ? Si

                /*$document->cnofac = Auth::user()->name;
                $document->cdofac = Auth::user()->address;
                $document->cpofac = Auth::user()->location;
                $document->ccpfac = Auth::user()->cop;
                $document->cprfac = Auth::user()->province;
                $document->cnifac = Auth::user()->dni;*/
            //}
        }

        // Lineas de detalle, probamos enviar mas de una
        switch($articulo){
            case 'EXT-001':
                $document->type = 'fixed_fees';
                $document->description = $c->extra_concept;
                addLineDocument($typeDocument, $idDocument, $articulo,0,1,$user->taxcode, $user->discount);
                break;

            case 'JUD-001':
                $document->type = 'judicial_fees';
                $document->description = $c->judicial_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo,1,1, $user->taxcode, $user->discount);}
                break;

            case 'VER-001':
                $document->type = 'verbal_fees';
                $document->description = $c->verbal_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount);}
                break;

            case 'ORD-001':
                $document->type = 'ordinary_fees';
                $document->description = $c->ordinary_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount);}
                break;

            case 'EJE-001':
                $document->type = 'execution';
                $document->description = $c->execution_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount);
                // Ejecucion no lleva tasa
                break;

            case 'RES-001':
                $document->type = 'resource';
                $document->description = $c->resource_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount);
                // Recurso no lleva tasa pero si deposito usamos variable tasa
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount);}
                break;

            case 'mensual':
                $document->type = 'automatic';
                $document->description = 'Factura periodica de gestoría';
                // TODO: Se podria optimizar que coja el importe e iva del momento de creacion del pedido.
                //tambien coger los importes de las lineas de detalle con descuento
                    $orders = DB::table('orders')
                    ->join('lorders', 'orders.id','=','lorders.order_id')
                        ->where('orders.facord',0)
                        ->where('orders.user_id',$gestoria_id)
                        ->orderBy('lorders.artlor','asc')
                        ->get();

                    if($orders->count()){
                        $cantidad = 0;
                        $buscado = '';

                        foreach($orders as $key => $linea){
                            // si articulo es igual acumula, sino crea linea
                            if($cantidad == 0){
                                $buscado = $linea->artlor;
                            }

                            if($buscado == $linea->artlor){
                                $cantidad = $cantidad + 1;
                            }else{
                                addLineDocument('Invoice',$idDocument,$buscado,0,$cantidad,$user->taxcode);

                                $cantidad = 1;
                                $buscado = $linea->artlor;
                            }
                            if($orders->count()-1 == $key){
                                addLineDocument('Invoice',$idDocument,$buscado,0,$cantidad,$user->taxcode);
                            }

                        //update de lineas procesadas
                        $facturadas = DB::table('orders')
                                ->join('lorders', 'orders.id','=','lorders.order_id')
                                ->where('orders.facord',0)
                                ->where('orders.user_id',$gestoria_id)
                                ->update(['lorders.dcolor' => $idDocument]);
                        }


                    }else{
                        print_r("No hay lineas de detalle en pedidos");
                    }

                break;
            }

        $document->save();
        // totalizamos documento
        totalDocument($typeDocument, $idDocument);
        // Fin generacion de documento

    }else{
        // Mostrar mensaje de error falta configuracion id=1
    } // fin comprobacion de configuracion
    /*********** Fin generacion de factura *****************/
    return '200';
}

function addLineDocument($typeDocument, $idDocument, $articulo, $tasa=0, $cantidad = 1, $taxcode = 'IVA21', $discount = 0){

    // Cogemos los datos del momento de creacion de la linea
    $c = Configuration::first();

    if($typeDocument == 'order'){
        $lDocument = new Lorder;
        $lDocument->order_id = $idDocument;
        $lDocument->poslor = maxId('Lorders', 'poslor',$idDocument);
        $lDocument->canlor = $cantidad;
        $lDocument->dtolor = $discount;
        switch($articulo){ // Comprobamos siempre si hay tasa
            case 'EXT-001':
                $lDocument->artlor = $c->extra_code;
                $lDocument->deslor = $c->extra_concept;
                $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->fixed_fees_tax;
                $lDocument->prelor = floatval($c->fixed_fees);
                break;

            case 'JUD-001':
                if($tasa == 1){
                    $lDocument->artlor = $c->judicial_fees_code;
                    $lDocument->deslor = $c->judicial_fees_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->judicial_fees_tax;
                    $lDocument->prelor = floatval($c->judicial_fees);

                }else{
                    $lDocument->artlor = $c->judicial_amount_code;
                    $lDocument->deslor = $c->judicial_amount_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->judicial_amount_tax;
                    $lDocument->prelor = floatval($c->judicial_amount);
                }
                break;

            case 'VER-001':
                if($tasa == 1){
                    $lDocument->artlor = $c->verbal_fees_code;
                    $lDocument->deslor = $c->verbal_fees_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->verbal_fees_tax;
                    $lDocument->prelor = floatval($c->verbal_fees);

                }else{
                    $lDocument->artlor = $c->verbal_amount_code;
                    $lDocument->deslor = $c->verbal_amount_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->verbal_amount_tax;
                    $lDocument->prelor = floatval($c->verbal_amount);
                }
                break;

            case 'ORD-001':
                if($tasa == 1){
                    $lDocument->artlor = $c->ordinary_fees_code;
                    $lDocument->deslor = $c->ordinary_fees_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->ordinary_fees_tax;
                    $lDocument->prelor = floatval($c->ordinary_fees);

                }else{
                    $lDocument->artlor = $c->ordinary_amount_code;
                    $lDocument->deslor = $c->ordinary_amount_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->ordinary_amount_tax;
                    $lDocument->prelor = floatval($c->ordinary_amount);
                }
                break;

            case 'EJE-001':
                $lDocument->artlor = $c->execution_code;
                $lDocument->deslor = $c->execution_concept;
                $lDocument->ivalor = $taxcode =='IVA0'?'IVA0':$c->execution_tax;
                $lDocument->prelor = floatval($c->execution);
                break;

            case 'RES-001':
                if($tasa == 1){
                    $lDocument->artlor = $c->deposit_code;
                    $lDocument->deslor = $c->deposit_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->deposit_tax;
                    $lDocument->prelor = floatval($c->deposit_amount);

                }else{
                    $lDocument->artlor = $c->resource_code;
                    $lDocument->deslor = $c->resource_concept;
                    $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->resource_tax;
                    $lDocument->prelor = floatval($c->resource);
                }
                break;
        }
        // total linea
        $idto = round(($lDocument->prelor*($lDocument->dtolor/100)),2);
        $lDocument->totlor =  round(($lDocument->canlor * ($lDocument->prelor-$idto)),2);
        //$lDocument->totlor =  round(($lDocument->canlor * $lDocument->prelor),2);

    }else{
        $lDocument = new Linvoice;
        $lDocument->invoice_id = $idDocument;
        $lDocument->poslin = maxId('Linvoices','poslin',$idDocument);
        $lDocument->canlin = $cantidad;
        $lDocument->dtolin = $discount;

        //buscar articulo esto es de extrajudicial switch case
        switch($articulo){ // Comprobamos siempre si hay tasa
            case 'EXT-001':
                $lDocument->artlin = $c->extra_code;
                $lDocument->deslin = $c->extra_concept;
                //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->fixed_fees_tax;
                //$lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': (Auth::user()->taxcode =='IVA0'?'IVA0': $c->fixed_fees_tax);
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0':$c->fixed_fees_tax;
                $lDocument->prelin = floatval($c->fixed_fees);
                break;

            case 'JUD-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->judicial_fees_code;
                    $lDocument->deslin = $c->judicial_fees_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->judicial_fees_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->judicial_fees_tax;
                    $lDocument->prelin = floatval($c->judicial_fees);

                }else{
                    $lDocument->artlin = $c->judicial_amount_code;
                    $lDocument->deslin = $c->judicial_amount_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->judicial_amount_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0' : $c->judicial_amount_tax;
                    $lDocument->prelin = floatval($c->judicial_amount);
                }
                break;

            case 'VER-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->verbal_fees_code;
                    $lDocument->deslin = $c->verbal_fees_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->verbal_fees_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->verbal_fees_tax;
                    $lDocument->prelin = floatval($c->verbal_fees);

                }else{
                    $lDocument->artlin = $c->verbal_amount_code;
                    $lDocument->deslin = $c->verbal_amount_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->verbal_amount_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0':  $c->verbal_amount_tax;
                    $lDocument->prelin = floatval($c->verbal_amount);
                }
                break;

            case 'ORD-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->ordinary_fees_code;
                    $lDocument->deslin = $c->ordinary_fees_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->ordinary_fees_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->ordinary_fees_tax;
                    $lDocument->prelin = floatval($c->ordinary_fees);

                }else{
                    $lDocument->artlin = $c->ordinary_amount_code;
                    $lDocument->deslin = $c->ordinary_amount_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->ordinary_amount_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->ordinary_amount_tax;
                    $lDocument->prelin = floatval($c->ordinary_amount);
                }
                break;

            case 'EJE-001':
                $lDocument->artlin = $c->execution_code;
                $lDocument->deslin = $c->execution_concept;
                //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->execution_tax;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->execution_tax;
                $lDocument->prelin = floatval($c->execution);
                break;

            case 'RES-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->deposit_code;
                    $lDocument->deslin = $c->deposit_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->deposit_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->deposit_tax;
                    $lDocument->prelin = floatval($c->deposit_amount);

                }else{
                    $lDocument->artlin = $c->resource_code;
                    $lDocument->deslin = $c->resource_concept;
                    //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0': $c->resource_tax;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->resource_tax;
                    $lDocument->prelin = floatval($c->resource);
                }
                break;
        }

        // total linea
        $idto = round(($lDocument->prelin*($lDocument->dtolin/100)),2);
        $lDocument->totlin =  round(($lDocument->canlin * ($lDocument->prelin-$idto)),2);

        //$lDocument->totlin =  round(($lDocument->canlin * $lDocument->prelin),2);
        //$lDocument->ivalin = Auth::user()->taxcode =='IVA0'?'IVA0':($c->fixed_fees_tax =='IVA0'?'IVA0':'IVA21'); // Comprobamos el iva del cliente
    }
    $lDocument->save();
}

/* Esta funcion totaliza los documentos, resultado de la suma de las lineas de detalle */
function totalDocument($typeDocument, $idDocument){
    // Buscamos lineas de detalle
    if($typeDocument == 'order'){

        $lDocuments = Lorder::where('order_id', $idDocument)->get();

        list($total21, $total10, $total4, $total0) = array(0,0,0,0);
        foreach($lDocuments as $lDocument){

            switch($lDocument->ivalor) {
                case 'IVA21':
                    $total21 += $lDocument->totlor;
                    break;
                case 'IVA10':
                    $total10 += $lDocument->totlor;
                    break;
                case 'IVA4':
                    $total4 += $lDocument->totlor;
                    break;
                default:
                    $total0 += $lDocument->totlor;
                    break;
            }
        }

        $document = Order::find($idDocument);
        // Obtenemos el descuento del usuario asociado a documento
        $user = User::find($document->user_id);

    }else{

        $lDocuments = Linvoice::where('invoice_id', $idDocument)->get();

        list($total21, $total10, $total4, $total0) = array(0,0,0,0);
        foreach($lDocuments as $lDocument){

            switch($lDocument->ivalin) {
                case 'IVA21':
                    $total21 += $lDocument->totlin;
                    break;
                case 'IVA10':
                    $total10 += $lDocument->totlin;
                    break;
                case 'IVA4':
                    $total4 += $lDocument->totlin;
                    break;
                default:
                    $total0 += $lDocument->totlin;
                    break;
            }
        }
        $document = Invoice::find($idDocument);
        // Obtenemos el descuento del usuario asociado a documento
        $user = User::find($document->user_id);
    }

    // Totalizamos
    if($typeDocument=='order'){
        // Neto
        $document->net1ord = $total21;
        $document->net2ord = $total10;
        $document->net3ord = $total4;
        $document->net4ord = $total0;
        // Descuento porcentaje e importe
        // Se obtiene de
        $document->pdto1ord = $user->discount; //Auth::user()->discount;
        $document->pdto2ord = $user->discount; //Auth::user()->discount;
        $document->pdto3ord = $user->discount; //Auth::user()->discount;
        $document->pdto4ord = $user->discount; //Auth::user()->discount;
        // el descuento se aplica directo a linea de detalle
        //$document->idto1ord = round(($document->net1ord * ($document->pdto1ord / 100)),2);
        //$document->idto2ord = round(($document->net2ord * ($document->pdto2ord / 100)),2);
        //$document->idto3ord = round(($document->net3ord * ($document->pdto3ord / 100)),2);
        //$document->idto4ord = round(($document->net4ord * ($document->pdto4ord / 100)),2);
        // Bases
        $document->bas1ord = $total21; //round(($document->net1ord-$document->idto1ord),2);
        $document->bas2ord = $total10; //round(($document->net2ord-$document->idto2ord),2);
        $document->bas3ord = $total4;  //round(($document->net3ord-$document->idto3ord),2);
        $document->bas4ord = $total0;  //round(($document->net4ord-$document->idto4ord),2);
        //%iva  TODO: optimizar, para traerlo de tabla de configuracion, unificando cfgs y configurations
        $document->piva1ord = 21;
        $document->piva2ord = 10;
        $document->piva3ord = 4;
        $document->iiva1ord = round(($document->bas1ord*($document->piva1ord/100)),2);
        $document->iiva2ord = round(($document->bas2ord*($document->piva2ord/100)),2);
        $document->iiva3ord = round(($document->bas3ord*($document->piva3ord/100)),2);
        // Totalizamos
        $document->totord = ($document->bas1ord+$document->bas2ord+$document->bas3ord+$document->bas4ord+$document->iiva1ord+$document->iiva2ord+$document->iiva3ord);
        $document->amount=$document->totord;

    }else{
        // Neto
        $document->net1fac = $total21;
        $document->net2fac = $total10;
        $document->net3fac = $total4;
        $document->net4fac = $total0;
        // Descuento porcentaje e importe
        $document->pdto1fac = $user->discount; //Auth::user()->discount;
        $document->pdto2fac = $user->discount; //Auth::user()->discount;
        $document->pdto3fac = $user->discount; //Auth::user()->discount;
        $document->pdto4fac = $user->discount; //Auth::user()->discount;
        // el descuento se aplica directo a linea de detalle
        // $document->idto1fac = round(($document->net1fac * ($document->pdto1fac / 100)),2);
        // $document->idto2fac = round(($document->net2fac * ($document->pdto2fac / 100)),2);
        // $document->idto3fac = round(($document->net3fac * ($document->pdto3fac / 100)),2);
        // $document->idto4fac = round(($document->net4fac * ($document->pdto4fac / 100)),2);
        // Bases
        $document->bas1fac = $total21;//round(($document->net1fac-$document->idto1fac),2);
        $document->bas2fac = $total10;//round(($document->net2fac-$document->idto2fac),2);
        $document->bas3fac = $total4;//round(($document->net3fac-$document->idto3fac),2);
        $document->bas4fac = $total0;//round(($document->net4fac-$document->idto4fac),2);
        //%iva  TODO: optimizar, para traerlo de tabla de configuracion, unificando cfgs y configurations
        $document->piva1fac = 21;
        $document->piva2fac = 10;
        $document->piva3fac = 4;
        $document->iiva1fac = round(($document->bas1fac*($document->piva1fac/100)),2);
        $document->iiva2fac = round(($document->bas2fac*($document->piva2fac/100)),2);
        $document->iiva3fac = round(($document->bas3fac*($document->piva3fac/100)),2);
        // Totalizamos
        $document->totfac = ($document->bas1fac+$document->bas2fac+$document->bas3fac+$document->bas4fac+$document->iiva1fac+$document->iiva2fac+$document->iiva3fac);
        $document->amount=$document->totfac;
    }
    $document->save();

}

function maxId($table, $field, $idDocument=0){
    if($table == 'Linvoices'){
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->where('invoice_id',$idDocument)
        ->get();
    }elseif($table == 'Lorders'){
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->where('order_id',$idDocument)
        ->get();
    }else{
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->get();
        }
    $idMax = intval($idMax[0]->last + 1);
    return $idMax;
}
