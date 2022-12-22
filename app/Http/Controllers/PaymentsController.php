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

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');

                // return response()->json('El pago ha sido efectuado',200);

            } else {
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

                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');
                var_dump($purchaseResult->DS_ERROR_ID);

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


                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');

                // return response()->json('El pago ha sido efectuado',200);

            } else {

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


                return redirect('claims')->with('msj', '¡ENHORABUENA, YA HEMOS TERMINADO! el equipo de letrados de Dividae ya está trabajando en tu reclamación. Recuerda que podrás comprobar el estado de tu reclamación en tiempo real en tu área personal.');

                var_dump($purchaseResult->DS_ERROR_ID);

                return response()->json('Error al procesar el pago Intente nuevamente',422);
            }
        } else {
            return response()->json('Error, no se ha obtenido token',422);
        }
        return false;
    }
}
