<?php

namespace App\Imports;

use App\Models\Actuation;
use App\Models\ActuationDocument;
use App\Models\Claim;
use App\Models\Debt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class HitosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    	// \Log::info($row);
    	$d = Debt::where('document_number',$row['numero_de_documento'])->first();
    	if ($d) {

    		$h = getHito( (string) $row['id_hito'])[0];

	        // \Log::info([$row['id_hito'],gettype( (string) $row['id_hito'])]);
	        \Log::info($row);

	        if ($h) {
	            $a = new Actuation;
		        $a->claim_id = $d->claim_id;
		        $a->subject = $h['id'];
		        $a->amount = array_key_exists('monto_recuperado', $row) &&  $row['monto_recuperado'] != '' ? $row['monto_recuperado'] : null;
		        $a->description = array_key_exists('observaciones', $row) ? $row['observaciones'] : null;
		        if (array_key_exists('fecha_actuacion', $row)) {

		        	$row['fecha_actuacion'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_actuacion'])->format('d-m-Y');

		        	$a->actuation_date = $row['fecha_actuacion'];
		        }
		        $a->type = null;
		        $a->mailable = null;
		        $a->save();

		        if (array_key_exists('archivo', $row) && $row['archivo'] != "") {
		        	if ($row['archivo']) {
			        	$path = public_path().'/uploads/actuations/' . $a->id . '/documents/';
			        	mkdir(public_path().'/uploads/actuations/' . $a->id,0777);
			        	mkdir($path,0777);
			        	copy($row['archivo'], $path.basename($row['archivo']));
		                $d = new ActuationDocument;
		                $d->actuation_id = $a->id;
		                $d->document_name = basename($row['archivo']);
		                $d->save();
		        	}
		        }

		        actuationActions($h['id'],$a->claim_id,$a->amount, $a->actuation_date, $a->description);
	        }
        }
    }
}
