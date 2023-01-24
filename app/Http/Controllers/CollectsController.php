<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collect;
use App\Models\User;
use App\Models\Invoice;
use Auth;
use Carbon\Carbon;



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
    public function create($invoice = null)
    {

        $invoice = Invoice::where('id',$invoice)->first();

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

        $collect->invoice_id = $request->factura;
        $collect->impcob = $request->importe;
        $collect->feccob = $request->fecha;
        $collect->cptcob = $request->concepto;
        $collect->obscob = $request->observaciones;
        $collect->fpacob = "manual";
        $collect->tracob = 0;
        $collect->user_id = Auth::user()->id;

        $collect->save();

        $invoice = Invoice::where('id',$request->factura)->first();
        if($invoice && $request->importe == $invoice->totfac){
            $invoice->status = 1;
            $invoice->payment_date = Carbon::now()->format('Y-m-d H:i:s');
            $invoice->save();

            return redirect('/collects')->with('msj', 'Cobro añadido correctamente y actualizado el estado de la factura');
        }

        return redirect('/collects')->with('msj', 'Cobro añadido correctamente.');

    }


    public function validateRequest($id = null){

        $rules = [
            //'impcob' => 'required'
        ];

        return request()->validate($rules);

    }


}
