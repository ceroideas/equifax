<?php

namespace App\Imports;

use App\Models\Invoice;
use App\Models\Collect;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class CollectsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $invoice = Invoice::where('claim_id',$row['loan_id'])
                                ->where('status','<>',1)
                                ->first();
        if($invoice){
            $collect = new Collect();
            $collect->invoice_id = $invoice->id;

            if (array_key_exists('fecha', $row)) {

                $row['fecha'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d');//format('d-m-Y');

                $collect->feccob = $row['fecha'];
            }

            $collect->feccob = $row['fecha'];
            $collect->impcob = $row['abono'];
            $collect->cptcob = 'COBRO FRA. '. now()->year .'/'. $invoice->id .' ' . $invoice->cnofac;
            $collect->obscob = $row['tipo_de_concepto'];
            $collect->user_id = 2;
            $collect->fpacob = 'Kmaleon';
            $collect->save();

            // comprobamos el importe de factura y actualizamos su estado de pago
            if($invoice->collects() >= $invoice->totfac){
                $invoice->status = 1;
                $invoice->payment_date = Carbon::parse($collect->feccob)->format('Y-m-d H:i:s');
                $invoice->save();
             }else{
                $invoice->status = 2;
                $invoice->save();
             }
        }

    }


}
