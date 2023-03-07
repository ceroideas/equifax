<?php

namespace App\Imports;

use App\Models\Actuation;
use App\Models\ActuationDocument;
use App\Models\Debt;
use App\Models\Claim;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CollectsKmaleonImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    	// \Log::info($row);
    	$debt = Debt::where('claim_id',$row['loan_id'])->first();

        if ($debt) {
            $claim = Claim::where('id', $row['loan_id'])->first();
	        // \Log::info([$row['id_hito'],gettype( (string) $row['id_hito'])]);
	        //\Log::info($row);
            if($claim->status <> -1){
                if ($row['abono'] != '') {

                    $deudaPendiente = floatval(number_format($claim->debt->pending_amount - ($claim->amountClaimed()), 2));
                    if($row['abono'] >= $deudaPendiente && $deudaPendiente > 0){
                        $hito = 30027;
                    }else{
                        $hito = 20233;
                    }

                    $actuation = new Actuation;
                    $actuation->claim_id = $debt->claim_id;
                    $actuation->subject = $hito;
                    $actuation->amount = $row['abono'];
                    $actuation->description = array_key_exists('tipo_de_concepto', $row) ? $row['tipo_de_concepto'] : null;
                    if (array_key_exists('fecha', $row)) {
                        $row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d H:i:s');
                        $actuation->actuation_date = $row['fecha'];
                    }
                    $actuation->type = null;
                    $actuation->mailable = null;
                    $actuation->save();

                    actuationActions($hito,$actuation->claim_id,$actuation->amount, $actuation->actuation_date, $actuation->description);
                }
            }
        }
    }
}
