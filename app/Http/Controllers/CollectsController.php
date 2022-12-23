<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collect;
use App\Models\User;
use Auth;


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
    public function create()
    {
        return view('collects.create');
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
  //      dd($request->factura);
        //$data = $this->validateRequest();
//print_r("Data como llega");
        //dd($request);
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

        return redirect('/collects')->with('msj', 'Cobro añadido correctamente');

    }


    public function validateRequest($id = null){

        $rules = [
            //'impcob' => 'required'
        ];

        return request()->validate($rules);

    }


}
