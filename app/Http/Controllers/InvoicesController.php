<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Linvoice;
use Carbon\Carbon;

class InvoicesController extends Controller
{
    public function create($serie, $id){

        $invoice = Invoice::where('tipfac',$serie )
                ->where('id',$id)
                ->first();

        $rectify = $invoice->replicate();

        // TODO:Comprobamos si el estado es pago parcial para totalizar de nuevo
        $invoice_id = maxId('REC','id');
        $rectify->tipfac = 'REC'.Carbon::now()->format('y');
        $rectify->id = $invoice_id;
        $rectify->created_at = Carbon::now();
        $rectify->updated_at = Carbon::now();
        $rectify->trafac= 0;
        $rectify->status= null;
        $rectify->amount = $rectify->amount*-1;

        $rectify->save();

        // TODO:duplicar lineas con nueva serie
        $linvoices = Linvoice::where('tiplin', $serie)
            ->where('invoice_id', $id)
            ->get();

        // recorrer la coleccion y vamos duplicando y guardando
        foreach($linvoices as $key => $linvoice){
            $linea = $linvoice->replicate();
            $linea->tiplin = 'REC'.Carbon::now()->format('y');
            $linea->invoice_id = $invoice_id;
            $linea->poslin = $key + 1;
            $linea->created_at = Carbon::now();
            $linea->updated_at = Carbon::now();
            $linea->save();
        }


        // TODO:Añade nueva linea con factura rectificativa
        $ldocument = new Linvoice;
        $ldocument->tiplin = 'REC'.Carbon::now()->format('y');
        $ldocument->invoice_id = $invoice_id;
        $ldocument->poslin = $linvoices->count()+1;
        $ldocument->artlin = 'REC-001';
        $ldocument->deslin = 'ABONO F '.$serie.' '.$id.' DEL '.Carbon::now()->format('d/m/Y');
        $ldocument->canlin=0;

        $ldocument->save();
        // Cancelamos la factura Original
        $invoice->status = 4;
        $invoice->save();





        return redirect('/claims/invoices-rectify')->with('msj', 'Factura rectificativa creada correctamente');
    }

}
