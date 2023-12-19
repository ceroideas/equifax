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

use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyUpdate;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;



function isComplete(){
	return (Auth::user()->dni && Auth::user()->phone && Auth::user()->cop);
}
function getHito($id_hito){
	$h = null;
	$f = null;

	foreach (Hito::whereNull('parent_id')->get() as $key => $value) {
        if (count($value->hitos)) {
            foreach ($value->hitos as $key1 => $value1) {
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

function actuationActions($id_hito, $claim_id, $amount = null, $date = null, $observations = null, $actuation_id = null){
	$h = getHito($id_hito)[0];
	$amount = null;
	$amounts = [];
	$type = [];
    $sorteo = '';
	$claim = Claim::find($claim_id);

    if ($h) {

		// comprobar si el hito es de la fase de cobro directamente
		if($h['redirect_to'])
		{
			if ($h['id'] != "-1") {
                /* Si hay redireccion, debemos grabar la propia actuacion si es 30038 */
                if($h['ref_id']=="30018" || $h['ref_id']=="30033" || $h['ref_id']=="30038" ||
                   $h['ref_id']=="30039" || $h['ref_id']=="30040" || $h['ref_id']=="30041" ||
                   $h['ref_id']=="30042" || $h['ref_id']=="30043" || $h['ref_id']=="30044" ||
                   $h['ref_id']=="30045" || $h['ref_id']=="30046" || $h['ref_id']=="30047"){
                    $act = new Actuation;
                    $act->claim_id = $claim_id;
                    $act->subject = $h['ref_id'];
                    $act->description=$observations;
                    $act->actuation_date = $date ? $date : Carbon::now()->format('Y-m-d H:i:s');
                    $act->hito_padre = $h['parent_id'];
                    $act->save();
                }

				$a = new Actuation;
		        $a->claim_id = $claim_id;
		        $a->subject = $h['redirect_to'];
		        $a->amount = $amount;
		        $a->description = $observations;
		        $a->actuation_date = $date ? $date : Carbon::now()->format('Y-m-d H:i:s');

		        $a->hito_padre = $h['parent_id'];

		        $a->type = null;
		        $a->mailable = $h['email'] ? 1 : null;

		        $a->save();

                // comprobar si el hito debe enviar un email  Envio email por hito
				if ($h['template_id'] && $claim->owner->msgusr == 1) {
					// code...
					$se = new SendEmail;
					$se->addresse = $claim ? $claim->owner->email : '';
					$se->template_id = $h['template_id'];
					$se->actuation_id = $a->id;
                    $se->send_count = 10;
					$se->save();

					$o = User::where('email',$se->addresse)->first();

                    if($h['template_id']==4){
                        $hitoDescription = $h['name'];
                    }else{
                        $hitoDescription = '';
                    }

					$tmp = $se->template;
                    switch($tmp->id){
                        case 3:
                        case 7:
                        case 9:
                            $target = url('/info'.$tmp->id);
                            break;
                        case 2:
                            if($o->referenced =='FEDETO'){
                                $sorteo = "Estas participando en el sorteo FEDETO, tu número de participación es: ".$o->campaign;
                            }
                        case 6:
                        case 11:
                            $target = url('/panel');
                            break;
                        default:
                            $target = url('/claims'.$tmp->id);
                            break;
                    }


                    Mail::send('email_base', ['tmp' => $tmp,'target'=>$target,
                    'hitoDescription'=>$hitoDescription, 'sorteo'=>$sorteo], function ($message) use($tmp, $o) {
                        $message->to($o->email, $o->name);
                        $message->subject($tmp->title);
                    });

		            //$se->send_count += 1;
                    $se->send_count = 11;
		            $se->save();

				}
			}

			// comprobar si la redirección es al inicio del proceso de cobros (carga apud acta)
            if ($h['redirect_to'] === "30016" || $h['redirect_to'] === "30017") {

				$c = Configuration::first();

				/* Comprobar si la reclamacion es de terceros */
                if($claim->user_id){
                    if($claim->client->apud_acta){
                        //$claim->status = 7;
                        $claim->status = $claim->gestor_id ? 10 : 7;
                    }else{
                        $claim->status = 11;
                    }
                }else{
                    if($claim->representant->apud_acta){
                        //$claim->status = 7;
                        $claim->status = $claim->gestor_id ? 10 : 7;
                    }else{
                        $claim->status = 11;
                    }
                }

                $claim->claim_type = 1;
				$claim->save();

                /************* Inicio creacion de documento (Order / Invoice ) ***************/

                // Determinamos si hay tasa
				if ($c) {
                    $tasa = 0;
                    $articulo = "";
                    //dump($h);

                    if($h['type']){
                        foreach ($h['type'] as $key => $value) {
                            if ($key == 1) {
                                if ($claim->third_parties_id) {
                                    if ($claim->representant->type == 1) {
                                        if ($claim->debt->pending_amount > 2000) {
                                            $tasa = 1;
                                        }
                                    }
                                }else{
                                    if ($claim->client->type == 1) {    //client = user_id
                                        if ($claim->debt->pending_amount > 2000) {
                                            $tasa = 1;
                                        }
                                    }
                                }
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

                        if($claim->gestor_id <> null){
                            addDocument('order', $claim->id, $articulo,$tasa);

                        }else{
                            $idFactura = addDocument('invoice',$claim->id, $articulo,$tasa,0,$h['ref_id']);
                            $a->invoice_id = $idFactura;
                            $a->save();

                            //Enviamos factura a cobro
                            $control = randomchar();
                            $response = addPayment($claim, $claim->debt, $control);


                            if($response['statusCode']==1){

                                $claim->last_invoice->payurlfac = $response['url'];
                                $claim->last_invoice->ctrlfac = $control;
                                $claim->last_invoice->save();

                                if(file_exists('testing/wannme.txt')){
                                    $file = fopen('testing/wannme.log', 'a');
                                    fwrite($file, date("d/m/Y H:i:s").'-'.'Grabamos URL en factura en helper: '.$claim->last_invoice->id.PHP_EOL);
                                    fwrite($file, date("d/m/Y H:i:s").'-'.'------------------------------------ '.PHP_EOL);
                                    fclose($file);
                                }
                            }

                        }
                    }
				}

                /*********** Fin generacion de documento *****************/

		        if (Auth::user()->isGestor()) {

                    /*
                    Quitamos la actuacion y la dejamos en claimsController
                    */

		        	//return actuationActions("30018",$claim_id);
		        }else{

					if ($claim->owner->apud_acta) {
						return actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);
			        }
				}
			}

			// comprobar si la redirección es al inicio del proceso de cobros (generacion de cobro)

			if ($h['redirect_to'] === "30017") {
		        // al generar el cobro, se detiene el proceso hasta que el cliente realice el pago
		        // por lo que habria que comprobar las acciones del 302 cuando el cliente pague
			}

			// comprobar si la redirección es al inicio del proceso de cobros (generacion de cobro)

			if ($h['redirect_to'] === "30018") {
				// Comprobar si en gestorias lo hace bien  en clientes no hace falta
                //return actuationActions($h['redirect_to'],$claim_id,$amount,$date,$observations);
			}

			// comprobar si el cliente acepta el acuerdo

			if ($h['redirect_to'] === "30030") {
				// se debe generar un boton de aceptación para que el cliente acepte el acuerdo alcanzado, acto seguido se pasa al siguiente paso
			}

			// comprobar si finaliza la reclamación

			if ($h['redirect_to'] === "30034") {
				// la reclamación queda aqui y se considera finalizada
                $claim->status = -1;
                $claim->save();
			}

			// comprobar si continua con la reclamación

			if ($h['redirect_to'] === "30035") {
				// la reclamación queda aqui porque es el inicio del proceso e id del hito para exportar las reclamaciones
			}

            // Cambiamos reclamacion a pendiente aceptacion cliente.
            if($h['redirect_to']=="30037") {
                $claim->status = 12;
                $claim->save();
            }


		}else{

                // comprobar si el hito debe enviar un email
                /* Envio email*/
                if ($h['template_id'] && $claim->owner->msgusr == 1) {

                    // code...
                    $se = new SendEmail;
                    $se->addresse = $claim ? $claim->owner->email : '';
                    $se->template_id = $h['template_id'];
                    $se->actuation_id = $actuation_id;// viene desde claimsController
                    $se->send_count = 20;
                    $se->save();

                    if($h['template_id']==4){
                        $hitoDescription = $h['name'];
                    }else{
                        $hitoDescription = '';
                    }

                    $o = User::where('email',$se->addresse)->first();

                    $tmp = $se->template;
                    switch($tmp->id){
                        case 3:
                        case 7:
                        case 9:
                            $target = url('/info'.$tmp->id);
                            break;
                        case 2:
                        case 6:
                        case 11:
                            $target = url('/panel');
                            break;
                        default:
                            $target = url('/claims'.$tmp->id);
                            break;
                    }

                        Mail::send('email_base', ['tmp' => $tmp,'target'=>$target, 'hitoDescription'=>$hitoDescription], function ($message) use($tmp, $o) {
                                $message->to($o->email, $o->name);
                                $message->subject($tmp->title);
                            });


                    //$se->send_count += 1;
                    $se->send_count = 22;
                    $se->save();

                } // Fin envio email


            } // fin actuacion simple sin redireccion
	}
}

function addDocument($typeDocument, $claim_id, $articulo, $tasa, $gestoria_id=0, $id_hito=NULL){
    // Necesitamos el tipo de documento
    if($typeDocument == 'order'){
        $idDocument = maxId('orders','id');
    }elseif($typeDocument == 'REC'){
        $idDocument = maxId('REC','id');
    }else{
        $idDocument = maxId('invoices','id');
    }

    $c = Configuration::first();

    if(isset($c)){

        if($typeDocument == 'order'){
            $document = new Order;
        }elseif($typeDocument == 'REC'){
            $document = new Invoice;
            $document->tipfac = 'REC'.Carbon::now()->format('y');
        }else{
            $document = new Invoice;
            $document->tipfac = Carbon::now()->format('y');
        }

        $document->id = $idDocument;
        $document->claim_id = $claim_id;

        // Siempre se factura en nombre del owner
        $claim = Claim::find($claim_id);

        // Asignamos el documento siempre a nombre del
        if($articulo == 'mensual'){
            $user = User::find($gestoria_id);
        }else{
            $user = User::find($claim->owner_id);
        }

        $document->user_id =  $user->id;
        // Solo en invoice almacenamos los datos del cliente en el momento de su creación
        if($typeDocument == 'invoice'){
                $document->cnofac = $user->name;
                $document->cdofac = $user->address;
                $document->cpofac = $user->location;
                $document->ccpfac = $user->cop;
                $document->cprfac = $user->province;
                $document->cnifac = $user->dni;
        }

        // Lineas de detalle, probamos enviar mas de una

        switch($articulo){
            case 'EXT-001':
                $document->type = 'fixed_fees';
                $document->description = $c->extra_concept;
                addLineDocument($typeDocument, $idDocument, $articulo,0,1,$user->taxcode, $user->discount,$id_hito);
                break;

            case 'JUD-001':
                $document->type = 'judicial_fees';
                $document->description = $c->judicial_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount,$id_hito);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo,1,1, $user->taxcode, $user->discount,$id_hito);}
                break;

            case 'VER-001':
                $document->type = 'verbal_fees';
                $document->description = $c->verbal_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount,$id_hito);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount,$id_hito);}
                break;

            case 'ORD-001':
                $document->type = 'ordinary_fees';
                $document->description = $c->ordinary_amount_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount,$id_hito);
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount,$id_hito);}
                break;

            case 'EJE-001':
                $document->type = 'execution';
                $document->description = $c->execution_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount,$id_hito);
                break;

            case 'RES-001':
                $document->type = 'resource';
                $document->description = $c->resource_concept;
                addLineDocument($typeDocument, $idDocument, $articulo, 0,1,$user->taxcode, $user->discount,$id_hito);
                // Recurso no lleva tasa pero si deposito usamos variable tasa
                if($tasa==1){ addLineDocument($typeDocument, $idDocument, $articulo, 1,1,$user->taxcode, $user->discount,$id_hito);}
                break;

            case 'mensual':
                $document->type = 'automatic';
                $document->description = 'Factura periodica de gestoría';
                    $orders = DB::table('orders')
                    ->join('lorders', 'orders.id','=','lorders.order_id')
                        ->where('orders.facord',0)
                        ->where('orders.user_id',$gestoria_id)
                        ->orderBy('lorders.artlor','asc')
                        ->get();

                    if($orders->count()){
                        $cantidad = 0;
                        $articulo = '';

                        foreach($orders as $key => $linea){

                            if($cantidad == 0){
                                $articulo = $linea->artlor;
                            }

                            if($articulo == $linea->artlor){
                                $cantidad = $cantidad + 1;

                            }else{

                                copyLineDocument($idDocument, $orders[$key-1], $cantidad);

                                $cantidad = 1;
                                $buscado = $linea->artlor;

                            }

                            if($orders->count()-1 == $key){
                                copyLineDocument($idDocument, $orders[$key], $cantidad);

                            }

                            //update de linea procesadas
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
    return $idDocument;
}

function addLineDocument($typeDocument, $idDocument, $articulo, $tasa=0, $cantidad = 1, $taxcode = 'IVA21', $discount = 0, $hito=NULL){


    $c = Configuration::first();

    if($typeDocument == 'order'){
        $lDocument = new Lorder;
        $lDocument->order_id = $idDocument;
        $lDocument->poslor = maxId('lorders', 'poslor',$idDocument);
        $lDocument->canlor = $cantidad;
        switch($articulo){ // Comprobamos siempre si hay tasa
            case 'EXT-001':
                $lDocument->artlor = $c->extra_code;
                $lDocument->deslor = $c->extra_concept;
                $lDocument->ivalor = $taxcode =='IVA0'?'IVA0': $c->fixed_fees_tax;
                if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                    $lDocument->prelor = floatval($c->fixed_fees_dto);
                }else{
                    $lDocument->prelor = floatval($c->fixed_fees);
                }

                $lDocument->dtolor = $discount;
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
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelor = floatval($c->judicial_amount_dto);
                    }else{
                        $lDocument->prelor = floatval($c->judicial_amount);
                    }

                    $lDocument->dtolor = $discount;
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
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelor = floatval($c->verbal_amount_dto);
                    }else{
                        $lDocument->prelor = floatval($c->verbal_amount);
                    }

                    $lDocument->dtolor = $discount;
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
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelor = floatval($c->ordinary_amount_dto);
                    }else{
                        $lDocument->prelor = floatval($c->ordinary_amount);
                    }

                    $lDocument->dtolor = $discount;
                }
                break;

            case 'EJE-001':
                $lDocument->artlor = $c->execution_code;
                $lDocument->deslor = $c->execution_concept;
                $lDocument->ivalor = $taxcode =='IVA0'?'IVA0':$c->execution_tax;
                if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                    $lDocument->prelor = floatval($c->execution_dto);
                }else{
                    $lDocument->prelor = floatval($c->execution);
                }

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
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelor = floatval($c->resource_dto);
                    }else{
                        $lDocument->prelor = floatval($c->resource);
                    }
                    $lDocument->dtolor = $discount;
                }
                break;
        }
        // total linea
        $idto = round(($lDocument->prelor*($lDocument->dtolor/100)),2);
        $lDocument->totlor =  round(($lDocument->canlor * ($lDocument->prelor-$idto)),2);

    }else{
        $lDocument = new Linvoice;
        $lDocument->invoice_id = $idDocument;
        $lDocument->tiplin = Carbon::now()->format('y');
        $lDocument->poslin = maxId('linvoices','poslin',$idDocument);
        $lDocument->canlin = $cantidad;

        switch($articulo){ // Comprobamos siempre si hay tasa
            case 'EXT-001':
                $lDocument->artlin = $c->extra_code;
                $lDocument->deslin = $c->extra_concept;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0':$c->fixed_fees_tax;
                if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                    $lDocument->prelin = floatval($c->fixed_fees_dto);
                }else{
                    $lDocument->prelin = floatval($c->fixed_fees);
                }
                $lDocument->dtolin = $discount;
                $lDocument->hitlin = $hito;
                break;

            case 'JUD-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->judicial_fees_code;
                    $lDocument->deslin = $c->judicial_fees_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->judicial_fees_tax;
                    $lDocument->prelin = floatval($c->judicial_fees);
                    $lDocument->hitlin = $hito;
                }else{
                    $lDocument->artlin = $c->judicial_amount_code;
                    $lDocument->deslin = $c->judicial_amount_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0' : $c->judicial_amount_tax;
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelin = floatval($c->judicial_amount_dto);
                    }else{
                        $lDocument->prelin = floatval($c->judicial_amount);
                    }
                    $lDocument->dtolin = $discount;
                    $lDocument->hitlin = $hito;
                }
                break;

            case 'VER-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->verbal_fees_code;
                    $lDocument->deslin = $c->verbal_fees_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->verbal_fees_tax;
                    $lDocument->prelin = floatval($c->verbal_fees);
                    $lDocument->hitlin = $hito;
                }else{
                    $lDocument->artlin = $c->verbal_amount_code;
                    $lDocument->deslin = $c->verbal_amount_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0':  $c->verbal_amount_tax;
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelin = floatval($c->verbal_amount_dto);
                    }else{
                        $lDocument->prelin = floatval($c->verbal_amount);
                    }
                    $lDocument->dtolin = $discount;
                    $lDocument->hitlin = $hito;
                }
                break;

            case 'ORD-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->ordinary_fees_code;
                    $lDocument->deslin = $c->ordinary_fees_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->ordinary_fees_tax;
                    $lDocument->prelin = floatval($c->ordinary_fees);
                    $lDocument->hitlin = $hito;
                }else{
                    $lDocument->artlin = $c->ordinary_amount_code;
                    $lDocument->deslin = $c->ordinary_amount_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->ordinary_amount_tax;
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelin = floatval($c->ordinary_amount_dto);
                    }else{
                        $lDocument->prelin = floatval($c->ordinary_amount);
                    }
                    $lDocument->dtolin = $discount;
                    $lDocument->hitlin = $hito;
                }
                break;

            case 'EJE-001':
                $lDocument->artlin = $c->execution_code;
                $lDocument->deslin = $c->execution_concept;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->execution_tax;
                if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                    $lDocument->prelin = floatval($c->execution_dto);
                }else{
                    $lDocument->prelin = floatval($c->execution);
                }
                $lDocument->hitlin = $hito;
                break;

            case 'RES-001':
                if($tasa == 1){
                    $lDocument->artlin = $c->deposit_code;
                    $lDocument->deslin = $c->deposit_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->deposit_tax;
                    $lDocument->prelin = floatval($c->deposit_amount);
                    $lDocument->hitlin = $hito;
                }else{
                    $lDocument->artlin = $c->resource_code;
                    $lDocument->deslin = $c->resource_concept;
                    $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->resource_tax;
                    if(Auth::user()->isGestor()||Auth::user()->isAssociate()){
                        $lDocument->prelin = floatval($c->resource_dto);
                    }else{
                        $lDocument->prelin = floatval($c->resource);
                    }
                    $lDocument->dtolin = $discount;
                    $lDocument->hitlin = $hito;
                }
                break;

            case 'JUD-101':
                $lDocument->artlin = $c->judicial_fees_code;
                $lDocument->deslin = $c->judicial_fees_concept;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->judicial_fees_tax;
                $lDocument->prelin = floatval($c->judicial_fees);
                $lDocument->hitlin = $hito;
                break;

            case 'ORD-101':
                $lDocument->artlin = $c->ordinary_fees_code;
                $lDocument->deslin = $c->ordinary_fees_concept;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->ordinary_fees_tax;
                $lDocument->prelin = floatval($c->ordinary_fees);
                $lDocument->hitlin = $hito;
                break;

            case 'VER-101':
                $lDocument->artlin = $c->verbal_fees_code;
                $lDocument->deslin = $c->verbal_fees_concept;
                $lDocument->ivalin = $taxcode == 'IVA0'?'IVA0': $c->verbal_fees_tax;
                $lDocument->prelin = floatval($c->verbal_fees);
                $lDocument->hitlin = $hito;
                break;
        }
        // total linea
        $idto = round(($lDocument->prelin*($lDocument->dtolin/100)),2);
        $lDocument->totlin =  round(($lDocument->canlin * ($lDocument->prelin-$idto)),2);

    }
    $lDocument->save();
}

/* Esta funcion totaliza los documentos, resultado de la suma de las lineas de detalle */
function totalDocument($typeDocument, $idDocument){

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
        $document->pdto1ord = $user->discount;
        $document->pdto2ord = $user->discount;
        $document->pdto3ord = $user->discount;
        $document->pdto4ord = $user->discount;
        // el descuento se aplica directo a linea de detalle
        //$document->idto1ord = round(($document->net1ord * ($document->pdto1ord / 100)),2);
        // Bases
        $document->bas1ord = $total21;
        $document->bas2ord = $total10;
        $document->bas3ord = $total4;
        $document->bas4ord = $total0;
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
        $document->pdto1fac = $user->discount;
        $document->pdto2fac = $user->discount;
        $document->pdto3fac = $user->discount;
        $document->pdto4fac = $user->discount;
        // el descuento se aplica directo a linea de detalle
        // $document->idto1fac = round(($document->net1fac * ($document->pdto1fac / 100)),2);
        // Bases
        $document->bas1fac = $total21;
        $document->bas2fac = $total10;
        $document->bas3fac = $total4;
        $document->bas4fac = $total0;
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
    $rectificativa=0;
    if($table=="REC"){
        $table="invoices";
        $rectificativa=1;
    }
    if($table == 'linvoices'){
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->where('invoice_id',$idDocument)
        ->where('tiplin',Carbon::now()->format('y'))
        ->get();
    }elseif($table == 'lorders'){
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->where('order_id',$idDocument)
        ->get();
    }elseif($table == 'invoices'){
        if($rectificativa==1){
            $idMax = DB::table($table)
            ->select(DB::raw('max('.$field.') as last'))
            ->where('tipfac','REC'.Carbon::now()->format('y'))
            ->get();
        }else{
            $idMax = DB::table($table)
            ->select(DB::raw('max('.$field.') as last'))
            ->where('tipfac',Carbon::now()->format('y'))
            ->get();
        }

    }else{
        $idMax = DB::table($table)
        ->select(DB::raw('max('.$field.') as last'))
        ->get();
    }


    $idMax = intval($idMax[0]->last + 1);
    return $idMax;
}


function addNotification($title, $content, $claim_id=0, $user_id=0){


    $user = User::find(3);
    $notificacion = [
        'titulo' => $title,
        'contenido' => $content,
        'reclamacion'=>$claim_id,
        'usuario'=>$user_id,
    ];
    Notification::send($user, new NotifyUpdate($notificacion));

}

function copyLineDocument($idDocument, $linea, $cantidad){

    $lDocument = new Linvoice;
    $lDocument->invoice_id = $idDocument;
    $lDocument->tiplin = Carbon::now()->format('y');
    $lDocument->poslin = maxId('linvoices','poslin',$idDocument);
    $lDocument->artlin = $linea->artlor;
    $lDocument->deslin = $linea->deslor;
    $lDocument->canlin = $cantidad;
    $lDocument->dtolin = $linea->dtolor;

    $lDocument->ivalin = $linea->ivalor;
    $lDocument->prelin = $linea->prelor;

    $idto = round(($lDocument->prelin*($lDocument->dtolin/100)),2);
    $lDocument->totlin =  round(($lDocument->canlin * ($lDocument->prelin-$idto)),2);

    $lDocument->save();
}

function randomchar(){

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $control = substr(str_shuffle($permitted_chars), 0, 10);

    return $control;
}

function addPayment($claim, $debt, $control){

    if(file_exists('testing/wannme.txt')){
        $file = fopen('testing/wannme.log', 'a');
        fwrite($file, date("d/m/Y H:i:s").'-'.'Testing wannme '.PHP_EOL);
    }
    $amount = $claim->last_invoice->amount;
    $dateNow = (new \DateTime())->modify('+1 month');
    $cadena = config('wannme.arg3').config('wannme.arg4').$amount.$debt->document_number;


    $checksum = hash('sha512', $cadena);
    //$checksum = sha1($cadena);  // deprecated

    if(file_exists('testing/wannme.txt')){
        fwrite($file, date("d/m/Y H:i:s").'-'.'Cadena: '.$cadena.PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'Checksum: '.$checksum.PHP_EOL);
        fclose($file);
    }

    $client = new Client();

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Wannme-Is-Debug' => 'false',
        'Wannme-Integration-Version' => 'Demo V2',
        'Authorization' => config('wannme.arg1')
    ])->post(config('wannme.arg2'), [
        "partnerId"=> config('wannme.arg3'),
        "checksum"=> $checksum,
        "amount"=> $amount,
        "description"=> $debt->document_number. " Pago de factura ".Carbon::now()->format('y') .'/'.$claim->last_invoice->id,
        "mobilePhone"=> "",//$claim->owner->phone,
        "mobilePhone2"=> "",
        "mobilePhone3"=> "",
        "email"=> "",//$claim->owner->email,
        "email2"=> "",
        "email3"=> "",
        "expirationDate"=>$dateNow->format('c'), //"2024-06-26T19:19:00.000+02:00",
        "partnerReference1"=> $debt->document_number,
        "partnerReference2"=> Carbon::now()->format('y') .'/'.$claim->last_invoice->id.$control,
        "customField1"=> "",
        "customField2"=> "",
        "customField3"=> "",
        "customField4"=> "",
        "customField5"=> "",
        "customField6"=> "",
        "notificationURL"=> "https://dividae.com/callback",
        "returnOKURL"=> "https://dividae.com/claims",
        "returnKOURL"=> "https://dividae.com/claims",
        "usersGroup"=> "DIVIDAE",
        "paymentMethods"=> [],
        "customer"=> [
            "address"=> "",
            "bankAccountIban"=> "",
            "document"=> "",
            "documentType"=> "",
            "firstName"=> "",//$claim->owner->name,
            "floorStairsDoor"=> "",
            "lastName1"=> "",
            "lastName2"=> "",
            "location"=> "",//$claim->owner->location,
            "postalCode"=> "",//$claim->owner->cop,
            "provinceType"=> "",
            "viaType"=> ""
        ]
    ])->throw()->json();


    // Respuestas recibidas
    if(file_exists('testing/wannme.txt')){
        $file = fopen('testing/wannme.log', 'a');
        fwrite($file, date("d/m/Y H:i:s").'-'.'Respuestas recibidas '.PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'Status code: '.$response['statusCode']. " - " .$response['statusDescription'].PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'Error code: '.$response['errorCode'].PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'URL wannme: '.$response['url'].PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'Forma de pago: '.$response['directLinks'][0]['paymentMethod'].PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'URL de pago: '.$response['directLinks'][0]['url'].PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'URL a factura: '.$claim->last_invoice->id.PHP_EOL);
        fwrite($file, date("d/m/Y H:i:s").'-'.'------------------------------------ '.PHP_EOL);
        fclose($file);
    }

    /* fin cobro wannme */
    return $response;

}
