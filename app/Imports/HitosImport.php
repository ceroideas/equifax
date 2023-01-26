<?php

namespace App\Imports;

use App\Models\Actuation;
use App\Models\ActuationDocument;
use App\Models\Debt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HitosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    	// \Log::info($row);
    	$debt = Debt::where('claim_id',$row['referencia'])->first();
        if ($debt) {
    		$hito = getHito( (string) $row['codigo_macro_generadora'])[0];
	        // \Log::info([$row['id_hito'],gettype( (string) $row['id_hito'])]);
	        \Log::info($row);

	        if ($hito) {
	            $actuation = new Actuation;
		        $actuation->claim_id = $debt->claim_id;
		        $actuation->subject = $hito['ref_id'];
		        $actuation->amount = array_key_exists('cuantia_reducida', $row) &&  $row['cuantia_reducida'] != '' ? $row['cuantia_reducida'] : null;
		        $actuation->description = array_key_exists('texto_macro_generadora', $row) ? $row['texto_macro_generadora'] : null;
		        if (array_key_exists('fecha', $row)) {
		        	$row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('d-m-Y');
		        	$actuation->actuation_date = $row['fecha'];
		        }
		        $actuation->type = null;
		        $actuation->mailable = null;
		        $actuation->save();

		        if (array_key_exists('archivo', $row) && $row['archivo'] != "") {
		        	if ($row['archivo']) {
			        	$path = public_path().'/uploads/actuations/' . $actuation->id . '/documents/';
			        	mkdir(public_path().'/uploads/actuations/' . $actuation->id,0777);
			        	mkdir($path,0777);
			        	copy($row['archivo'], $path.basename($row['archivo']));
		                $ad = new ActuationDocument;
		                $ad->actuation_id = $actuation->id;
		                $ad->document_name = basename($row['archivo']);
		                $ad->save();
		        	}
		        }

		        actuationActions($hito['ref_id'],$actuation->claim_id,$actuation->amount, $actuation->actuation_date, $actuation->description);
	        }
        }

    }
}
