<?php

namespace App\Imports;

use App\Models\Actuation;
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

    		$h = null; // hito
	        $f = null; // fase
	        foreach (config('app.actuations') as $key => $value) {
	            
	            if ($value['hitos']) {
	                foreach ($value['hitos'] as $key1 => $value1) {
	                    if ($value1['id'] == $row['id_hito']) {
	                        $h = $value1;
	                        $f = $value;
	                    }
	                }
	            }else{
	                if ($value['id'] == $row['id_hito']) {
	                    $h = $value;
	                    $f = $value;
	                }
	            }

	        }

	        // \Log::info([$h,$f]);

	        if ($h && $f) {
	            $a = new Actuation;
		        $a->claim_id = $d->claim_id;
		        $a->subject = $h['id'];
		        $a->amount = array_key_exists('monto_recuperado', $row) ? $row['monto_recuperado'] : null;
		        $a->description = array_key_exists('observaciones', $row) ? $row['observaciones'] : null;
		        if (array_key_exists('fecha_actuacion', $row)) {

		        	$row['fecha_actuacion'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_actuacion'])->format('d-m-Y');

		        	$a->actuation_date = $row['fecha_actuacion'];
		        }
		        $a->type = null;
		        $a->mailable = null;
		        $a->save();

		        $a->claim->phase = $f['phase'];
		        $a->claim->save();
	        }
        }
    }
}