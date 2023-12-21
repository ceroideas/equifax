<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaycometBankstore;
use App\Models\User;
use App\Models\Claim;
use App\Models\Invoice;
use App\Models\Collect;
use Auth;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function payToken(Request $r)
    {
        date_default_timezone_set("Europe/Madrid");

        $u = User::find($r->user_id);

        $token = $u->card_token;

        if ($token) {

            $paycomet = new PaycometBankstore(
                config('jet.arg1'),
                config('jet.arg2'),
                config('jet.arg3'),
                config('jet.arg4')
            );

            $signature      = sha1(config('jet.arg1').$token.config('jet.arg2').config('jet.arg3').config('jet.arg4'));
            $ip             = $_SERVER["REMOTE_ADDR"];
            $ref = "REF".uniqid();

            // $resp = $paycomet->AddUserToken($token);
            // $idUser = $resp->DS_IDUSER;
            // $tokenUser = $resp->DS_TOKEN_USER;
            $purchaseResult
                = $paycomet->ExecutePurchase(
                    $u->pc_id,
                    $u->card_token,
                    $r->amount,
                    $ref,
                    "EUR"
            );

            if ($purchaseResult->DS_RESPONSE == "1") {

                $c = Claim::find($r->claim_id);
                if ($c->status == 7) {
                    if ($c->claim_type == 1) {
                        //if (!$c->last_invoice) {
                        $c->status = 10;
                        //}
                    }else{
                        $c->status = 8;
                    }
                }

                $c->save();

                $c->last_invoice->payment_date = Carbon::now()->format('Y-m-d H:i:s');
                $c->last_invoice->status = 1;
                $c->last_invoice->save();

    			$collect = new Collect;
	            $collect->feccob = Carbon::now()->format('Y-m-d H:i:s');
	            $collect->impcob = number_format(($r->amount/100) ,2);
                $collect->cptcob = 'Cobro de factura '.Carbon::now()->format('y') .'/'.$c->last_invoice->id;
	            $collect->tipcob = Carbon::now()->format('y');
                $collect->invoice_id = $c->last_invoice->id;
                $collect->user_id = '6';
                $collect->fpacob = 'Tarjeta';
                $collect->save();
                /*Update claim */
                if ($c->claim_type == 1) {
                    if ($c->owner->apud_acta) {

                        actuationActions("30018",$c->id);
                    }else{
                        actuationActions("30017",$c->id);
                        return redirect('claims/'.$c->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta, para poder continuar');
                    }
                }else{
                    actuationActions("-1",$c->id);
                }

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');

            } else {  // error en pago

                /*
                $c = Claim::find($r->claim_id);

                if ($c->status == 7) {
                    if ($c->claim_type == 1) {
                        if (!$c->last_invoice) {
                            $c->status = 10;
                        }
                    }else{
                        $c->status = 8;
                    }
                }

                $c->save();

                $c->last_invoice->payment_date = Carbon::now()->format('Y-m-d H:i:s');
                $c->last_invoice->status = 1;
                $c->last_invoice->save();

                $collect = new Collect;
	            $collect->feccob = Carbon::now()->format('Y-m-d H:i:s');
	            $collect->impcob = number_format(($r->amount/100) ,2);
                $collect->cptcob = 'Cobro de factura '.$c->last_invoice->id;
	            $collect->invoice_id = $c->last_invoice->id;
                $collect->user_id = '1';
                $collect->fpacob = 'Tarjeta';
                $collect->save();

                if ($c->claim_type == 1) {
                    if ($c->owner->apud_acta) {
                        actuationActions("30017",$c->id);
                    }
                }else{
                    actuationActions("-1",$c->id);
                }

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');*/
                //var_dump($purchaseResult->DS_ERROR_ID);

                return response()->json('Error al procesar el pago Intente nuevamente',422);
            }
        } else {
            return response()->json('Error, no se ha obtenido token',422);
        }
        return false;
    }

    public function payment(Request $r)
    {
        date_default_timezone_set("Europe/Madrid");

        $token = $r->paytpvToken;

        if ($token && strlen($token) == 64) {

            $paycomet = new PaycometBankstore(
                config('jet.arg1'),
                config('jet.arg2'),
                config('jet.arg3'),
                config('jet.arg4')
            );

            $signature      = sha1(config('jet.arg1').$token.config('jet.arg2').config('jet.arg3').config('jet.arg4'));
            $ip             = $_SERVER["REMOTE_ADDR"];
            $ref = "REF".uniqid();

            $resp = $paycomet->AddUserToken($token);
            $idUser = $resp->DS_IDUSER;
            $tokenUser = $resp->DS_TOKEN_USER;
            $purchaseResult
                = $paycomet->ExecutePurchase(
                    $resp->DS_IDUSER,
                    $resp->DS_TOKEN_USER,
                    $r->amount,
                    $ref,
                    "EUR"
            );

            if ($purchaseResult->DS_RESPONSE == "1") {

                if ($r->card_alias) {
                	$u = User::find($r->user_id);
                    $u->pc_id = $idUser;
                    $u->card_token = $tokenUser;
                    $u->card_alias = $r->card_alias;
                    $u->save();
                }

                $c = Claim::find($r->claim_id);

                if ($c->status == 7) {
                    if ($c->claim_type == 1) {
                        $c->status = 10;
                    }else{
                        $c->status = 8;
                    }
                }

                $c->save();

                $c->last_invoice->payment_date = Carbon::now()->format('Y-m-d H:i:s');
                $c->last_invoice->status = 1;
                $c->last_invoice->save();

                $collect = new Collect;
	            $collect->feccob = Carbon::now()->format('Y-m-d H:i:s');
	            $collect->impcob = number_format(($r->amount/100) ,2);
                $collect->cptcob = 'Cobro de factura '.Carbon::now()->format('y') .'/'.$c->last_invoice->id;
                $collect->tipcob = Carbon::now()->format('y');
                $collect->invoice_id = $c->last_invoice->id;
                $collect->user_id = '6';
                $collect->fpacob = 'Tarjeta';
                $collect->save();
                /* Update claim v2*/
                if ($c->claim_type == 1) {
                    if ($c->owner->apud_acta) {

                        actuationActions("30018",$c->id);
                    }else{
                        actuationActions("30017",$c->id);
                        return redirect('claims/'.$c->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta, para poder continuar');
                    }
                }else{
                    actuationActions("-1",$c->id);
                }

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');


            } else {

                /*$c = Claim::find($r->claim_id);*/
                //dump("Payment Error: ");
                //dump($purchaseResult->DS_RESPONSE);

                //dump($purchaseResult->DS_ERROR_ID);  // Int(456)
                //dd();
                /*
                if ($c->status == 7) {
                    if ($c->claim_type == 1) {
                        $c->status = 10;
                    }else{
                        $c->status = 8;
                    }
                }

                $c->save();

                $c->last_invoice->payment_date = Carbon::now()->format('Y-m-d H:i:s');
                $c->last_invoice->status = 1;
                $c->last_invoice->save();

                $collect = new Collect;
	            $collect->feccob = Carbon::now()->format('Y-m-d H:i:s');
	            $collect->impcob = number_format(($r->amount/100) ,2);
                $collect->cptcob = 'Cobro de factura '.$c->last_invoice->id;
	            $collect->invoice_id = $c->last_invoice->id;
                $collect->user_id = '1';
                $collect->fpacob = 'Tarjeta';
                $collect->save();

                if ($c->claim_type == 1) {
                    if ($c->owner->apud_acta) {
                        actuationActions("30017",$c->id);
                    }
                }else{
                    actuationActions("-1",$c->id);
                }


                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');*/

                return back()->with('msj', 'Error al procesar el pago, Intente nuevamente');

            }
        } else {
            return response()->json('Error, no se ha obtenido token',422);
        }
        return false;
    }

    public function callback(Request $r)
    {
        if(file_exists('testing/wannme.txt')){
            $file = fopen('testing/wannme_callback.log', 'a');
            fwrite($file, date("d/m/Y H:i:s").'-'.'Callback wannme '.PHP_EOL);
            fwrite($file, date("d/m/Y H:i:s").'-'.'Status response '.$r->statusCode.PHP_EOL);
            fclose($file);
        }

        //OK response
        if($r->statusCode==1){

            $guion = strpos($r->partnerReference2,'-'); #"partnerReference2": "23/161mwHgKqoZDi",
            $barra = strpos($r->partnerReference2,'/');
            $tipfac = substr($r->partnerReference2,0,$barra);
            $idfac = substr($r->partnerReference2, $barra+1,$guion-($barra+1));
            $control = substr($r->partnerReference2, $guion+1);
            $claim = substr($r->partnerReference1, 4); #"partnerReference1": "DVD-0146",


            /* Add control factura */
            $i = Invoice::where('id', '=', $idfac)
                        ->where('tipfac','=',$tipfac)
                        ->first();

            if(file_exists('testing/wannme.txt')){
                $file = fopen('testing/wannme_callback.log', 'a');
                fwrite($file, date("d/m/Y H:i:s").'-'.'Partner reference1: '.$r->partnerReference1.PHP_EOL);  #DVD-0189
                fwrite($file, date("d/m/Y H:i:s").'-'.'Partner reference2: '.$r->partnerReference2.PHP_EOL);  #23/207ME5eYwJrQB
                fwrite($file, date("d/m/Y H:i:s").'-'.'Control '.$control.PHP_EOL);  #23/207ME5eYwJrQB
                fwrite($file, date("d/m/Y H:i:s").'-'.'Control factura: '.$i->ctrlfac.PHP_EOL);  #23/207ME5eYwJrQB
                fwrite($file, date("d/m/Y H:i:s").'-'.'Control factura limpio: '.substr($i->ctrlfac,1,10).PHP_EOL);  #23/207ME5eYwJrQB
                fclose($file);
            }


            if($i && substr($i->ctrlfac,1,10) == $control){

                if(file_exists('testing/wannme.txt')){
                    $file = fopen('testing/wannme_callback.log', 'a');
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Coincide control, todo ok '.PHP_EOL);
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Update claim: '.$claim.PHP_EOL);
                    fclose($file);
                }

                $collect = new Collect;
                $collect->feccob = Carbon::now()->format('Y-m-d H:i:s');
                $collect->impcob = $r->amount;
                $collect->cptcob = 'Cobro de factura '.$tipfac .'/'.$idfac;
                $collect->tipcob = $tipfac;
                $collect->invoice_id = $idfac;
                $collect->user_id = '6';
                $collect->fpacob = 'Tarjeta';
                $collect->save();

                // Update factura
                if($i->amount == $r->amount){
                    $i->status = 1;
                    $i->payment_date = Carbon::now()->format('Y-m-d H:i:s');
                    $i->update();
                }

                $c = Claim::find($claim);

                if(file_exists('testing/wannme.txt')){
                    $file = fopen('testing/wannme_callback.log', 'a');
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Claim status: '.$c->status.PHP_EOL);
                    fwrite($file, date("d/m/Y H:i:s").'-'.'Claim type: '.$c->claim_type.PHP_EOL);
                    fclose($file);
                }
                //Update claim
                if ($c->status == 7) {
                    if ($c->claim_type == 1) {
                        $c->status = 10;
                    }else{
                        $c->status = 8;
                    }

                    if(file_exists('testing/wannme.txt')){
                        $file = fopen('testing/wannme_callback.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Update claim status: '.$c->status.PHP_EOL);
                        fclose($file);
                    }

                    $c->save();

                    if(file_exists('testing/wannme.txt')){
                        $file = fopen('testing/wannme_callback.log', 'a');
                        fwrite($file, date("d/m/Y H:i:s").'-'.'Claim actualizado: '.$c->status.PHP_EOL);
                        fclose($file);
                    }
                }


                if ($c->claim_type == 1) {
                    if ($c->owner->apud_acta) {

                        actuationActions("30018",$c->id);
                    }else{
                        actuationActions("30017",$c->id);
                        return redirect('claims'.$c->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta, para poder continuar');
                    }
                }else{
                    actuationActions("-1",$c->id);
                }

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');

            }// else cobro correcto pero no coincide el importe de la factura o




        }// else cobro erroneo TODO: Procesar los estados de error

        return redirect('claims')->with('msj', 'Error en el pago código'.$r->statusCode);


    }

}
