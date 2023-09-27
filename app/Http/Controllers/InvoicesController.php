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


        $invoice_id = maxId('REC','id');
        $rectify->tipfac = 'REC'.Carbon::now()->format('y');
        $rectify->id = $invoice_id;
        $rectify->created_at = Carbon::now();
        $rectify->updated_at = Carbon::now();
        $rectify->trafac= 0;
        $rectify->status= null;


        // Comprobamos si el estado es pago parcial para totalizar de nuevo
        if($invoice->status==2){
            // Ponemos los importes recalculando lo pendiente con iva, sin iva, etc, dependo de administración

        }else{
            $rectify->amount = $rectify->amount * -1;
            $rectify->net1fac = $rectify->net1fac *-1;
            $rectify->net2fac = $rectify->net2fac *-1;
            $rectify->net3fac = $rectify->net3fac *-1;
            $rectify->net4fac = $rectify->net4fac *-1;
            $rectify->idto1fac = $rectify->idto1fac *-1;
            $rectify->idto2fac = $rectify->idto2fac *-1;
            $rectify->idto3fac = $rectify->idto3fac *-1;
            $rectify->idto4fac = $rectify->idto4fac *-1;
            $rectify->bas1fac = $rectify->bas1fac * -1;
            $rectify->bas2fac = $rectify->bas2fac * -1;
            $rectify->bas3fac = $rectify->bas3fac * -1;
            $rectify->bas4fac = $rectify->bas4fac * -1;
            $rectify->iiva1fac = $rectify->iiva1fac * -1;
            $rectify->iiva2fac = $rectify->iiva2fac * -1;
            $rectify->iiva3fac = $rectify->iiva3fac * -1;
            $rectify->totfac = $rectify->totfac * -1;
            $rectify->save();

            // Duplicar lineas con nueva serie
            $linvoices = Linvoice::where('tiplin', $serie)
                ->where('invoice_id', $id)
                ->get();

            // Recorrer la coleccion y vamos duplicando y guardando
            foreach($linvoices as $key => $linvoice){
                $linea = $linvoice->replicate();
                $linea->tiplin = 'REC'.Carbon::now()->format('y');
                $linea->invoice_id = $invoice_id;
                $linea->poslin = $key + 1;
                $linea->created_at = Carbon::now();
                $linea->updated_at = Carbon::now();
                $linea->prelin = $linea->prelin * -1;
                $linea->totlin = $linea->totlin * -1;
                $linea->save();
            }

        }
        // Añade nueva linea con factura rectificativa
        $ldocument = new Linvoice;
        $ldocument->tiplin = 'REC'.Carbon::now()->format('y');
        $ldocument->invoice_id = $invoice_id;
        $ldocument->poslin = $linvoices->count()+1;
        $ldocument->artlin = 'REC-001';
        $ldocument->deslin = 'ABONO F '.$serie.' '.$id.' DEL '.Carbon::now()->format('d/m/Y');
        $ldocument->canlin=0;

        $ldocument->save();

        // Cancelamos la factura Original
        // TODO: Añadir un if que compruebe si no es status 2 (cobro parcial) para ver si cancelamos o no (Pendiente respuesta de administración)
        $invoice->status = 4;
        $invoice->save();

        return redirect('/claims/invoices-rectify')->with('msj', 'Factura rectificativa creada correctamente');
    }

}
