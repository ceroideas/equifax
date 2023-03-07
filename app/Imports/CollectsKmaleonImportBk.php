<?php

namespace App\Imports;

use App\Models\Actuation;
use App\Models\ActuationDocument;
use App\Models\Debt;
use App\Models\Claim;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CollectsKmaleonImportBk implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    	// \Log::info($row);
    	$debt = Debt::where('claim_id',$row['loan_id'])->first();

        if ($debt) {
            $claim = Claim::where('id', $row['loan_id'])->first();
	        // \Log::info([$row['id_hito'],gettype( (string) $row['id_hito'])]);
	        //\Log::info($row);

            // Hay abono
            if ($row['abono'] != '') {
                // Registramos el hito la reclamacion no esta finalizada y tiene un saldo pendiente
                dump("Importe pendiente de pago");
                $deudaPendiente = floatval(number_format($claim->debt->pending_amount - ($claim->amountClaimed()), 2));
                var_dump($deudaPendiente);
                dump("Abono");
                var_dump($row['abono']);

                if($claim->status <> -1 && $deudaPendiente > 0){


                    dump("Deuda mayor de cero comprobamos si es el cobro recibido salda la cuenta");
                    if($row['abono'] >= $deudaPendiente){
                        dump("Deuda mayor que deuda, saldamos cuenta  30027");
                        //$actuation->subject = 30027;
                        //$hito = $actuation->subject;

                        $actuation = new Actuation;
                        $actuation->claim_id = $debt->claim_id;
                        $actuation->subject = 30027;//$hito['ref_id'];
                        $hito = $actuation->subject;
                        $actuation->amount = $row['abono'];
                        $actuation->description = array_key_exists('tipo_de_concepto', $row) ? $row['tipo_de_concepto'] : null;
                        if (array_key_exists('fecha', $row)) {
                            $row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d H:i:s');
                            $actuation->actuation_date = $row['fecha'];
                        }
                        $actuation->type = null;
                        $actuation->mailable = null;
                        $actuation->save();
                    }else{
                        dump("Deuda no salda cuenta, creamos abono 20233 por ");
                        var_dump($row['abono']);
                        $actuation = new Actuation;
                        $actuation->claim_id = $debt->claim_id;
                        $actuation->subject = 20233;//$hito['ref_id'];
                       // $hito = $actuation->subject;
                        $actuation->amount = $row['abono'];
                        $actuation->description = array_key_exists('tipo_de_concepto', $row) ? $row['tipo_de_concepto'] : null;
                        if (array_key_exists('fecha', $row)) {
                            $row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d H:i:s');
                            $actuation->actuation_date = $row['fecha'];
                        }
                        $actuation->type = null;
                        $actuation->mailable = null;
                        $actuation->save();
                        dump("Salvo actuacion");
                    }


                }

                die();
                dump($actuation);die();
                var_dump($hito);die();
                dump($actuation->claim_id);die();
                dump($actuation->amount);
                dump($actuation->actuation_date);
                dump($actuation->description);
die();

                actuationActions($actuation->subject,$actuation->claim_id,$actuation->amount, $actuation->actuation_date, $actuation->description);
            }
        }
    }
}
