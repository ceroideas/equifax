<?php

namespace App\Imports;

use App\Models\Actuation;
use App\Models\ActuationDocument;
use App\Models\Debt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ActuationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

    	// \Log::info($row);
        //dump($row);
    	$debt = Debt::where('claim_id',$row['referencia'])->first();
        //dd($debt);
        if ($debt) {
    		$hito = getHito( (string) $row['codigo_macro_generadora'])[0];
	        // \Log::info([$row['id_hito'],gettype( (string) $row['id_hito'])]);
	        //\Log::info($row);
            //dump("Macro generadora");
            //dump($hito);
	        if ($hito) {
                //dump("Graba hito");
	            $actuation = new Actuation;
		        $actuation->claim_id = $debt->claim_id;
		        $actuation->subject = $hito['ref_id'];
		        $actuation->amount = array_key_exists('cuantia_reducida', $row) &&  $row['cuantia_reducida'] != '' ? $row['cuantia_reducida'] : null;
		        $actuation->description = array_key_exists('texto_macro_generadora', $row) ? $row['texto_macro_generadora']:null;
                //dump($actuation);
                //dump(array_key_exists('fecha', $row));
		        if (array_key_exists('fecha', $row)) {
		        	$row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d H:i:s');
		        	$actuation->actuation_date = $row['fecha'];
		        }
                //dump("Asigno fecha");
                //dump( $row['fecha']);
                //dump($actuation);
		        //$actuation->type = null;
		        //$actuation->mailable = null;
                //dump($actuation->actuation_date);
                //dump("Salva actuacion");
		        $actuation->save();
                $logFile = fopen(public_path().'/logImportHitosXls.log','a');
                fwrite($logFile, $actuation->claim_id .PHP_EOL);
                fclose($logFile);
                //dump($actuation);
                /*$actuation2 = new Actuation;
                $actuation2->claim_id = 230;
                $actuation2->subject = '30004';
                $actuation2->description = 'Test actuation';
                $actuation2->actuation_date = '2023-12-12 12:12:12';
                $actuation2->save();*/

                //dump($actuation2);
                //dd($row['archivo']);

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
                /* dump("Va a actuacion");
                dump($hito['ref_id']);
                dump($actuation->claim_id);
                dump($actuation->amount);
                dump($actuation->actuation_date);
                dump($actuation->description); */


		        actuationActions($hito['ref_id'],$actuation->claim_id,$actuation->amount, $actuation->actuation_date, $actuation->description);
	        }
        }

    }
}
