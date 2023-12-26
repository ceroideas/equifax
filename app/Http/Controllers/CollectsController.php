<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collect;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Claim;

use Auth;
use Excel;

use Carbon\Carbon;

use App\Imports\CollectsImport;


class CollectsController extends Controller
{
    public function index()
    {
        $collects = Collect::all();

        return view('claims.collects', compact('collects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($serie = null, $invoice = null)
    {

        $invoice = Invoice::where('id',$invoice)
                            ->where('tipfac',$serie)
                            ->first();


        return view('collects.create',compact('invoice'));
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $collect = new Collect();

        $collect->tipcob = $request->serie;
        $collect->invoice_id = $request->factura;
        $collect->impcob = $request->importe;
        $collect->feccob = $request->fecha;
        $collect->cptcob = $request->concepto;
        $collect->obscob = $request->observaciones;
        $collect->fpacob = "manual";
        $collect->tracob = 0;
        $collect->user_id = Auth::user()->id;

        $collect->save();


        /* Comprobacion de saldo para determinar si se da por pagada la factura */

        $invoice = Invoice::where('id',$request->factura)
                            ->where('tipfac',$request->serie)
                            ->first();

        if($invoice){

            if($invoice->collects() >= $invoice->totfac){
                $invoice->status = 1;
                $invoice->payment_date = Carbon::parse($request->fecha)->format('Y-m-d H:i:s');
                $invoice->save();

                // Cambiamos el estado de la reclamacion
                $claim = Claim::find($invoice->claim_id);

                //Update claim
                if ($claim->status == 7) {
                    if ($claim->claim_type == 1) {
                        $claim->status = 10;
                    }else{
                        $claim->status = 8;
                    }

                    $claim->save();
                }

                if ($claim->claim_type == 1) {
                    if ($claim->owner->apud_acta) {

                        actuationActions("30018",$claim->id);
                    }else{
                        actuationActions("30017",$claim->id);
                        return redirect('claims'.$claim->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta, para poder continuar');
                    }
                }else{
                    actuationActions("-1",$claim->id);
                }

                return redirect('/collects')->with('msj', 'Cobro añadido correctamente y actualizado el estado de la factura');
             }else{
                $invoice->status = 2;
                $invoice->save();
                return redirect('/collects')->with('msj', 'Cobro añadido correctamente.');
             }

        }

        return redirect('/collects')->with('msj', 'Cobro añadido correctamente.');

    }


    public function validateRequest($id = null){

        $rules = [
            //'impcob' => 'required'
        ];

        return request()->validate($rules);

    }

    public function importCollects(Request $r)
    {

        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','collects.xlsx');
            Excel::import(new CollectsImport, public_path().'/uploads/excel/collects.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel de cobros!');
    }


}
