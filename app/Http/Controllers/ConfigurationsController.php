<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
/*use App\Models\Debt;
use Carbon\Carbon;*/

class ConfigurationsController extends Controller
{

    public function fees(){

        $this->authorize('see-fees');

        return view('configurations.fees', ['configuration' => Configuration::first()]);

    }

    public function feesStore(Request $request){

        $this->authorize('see-fees');

        $data = $this->validateFees();


        $configuration = new Configuration();

        $configuration->fixed_fees = $data['fijo'];
        $configuration->percentage_fees = $data['porcentaje'];
        if($request['judicial']){
            $configuration->judicial_fees = $data['judicial'];
        }
        $configuration->tax = $data['tax'];
        $configuration->invoice_name = $data['invoice_name'];
        $configuration->invoice_address_line_1 = $data['invoice_address_line_1'];
        $configuration->invoice_address_line_2 = $data['invoice_address_line_2'];
        $configuration->invoice_email = $data['invoice_email'];
        $configuration->save();

        return redirect('configurations/fees')->with('msj' , 'Tasas guardadas correctamente');

    }

    public function feesUpdate(Request $request, Configuration $configuration){

        $this->authorize('see-fees');

        $data = $this->validateFees();

        $configuration->fixed_fees = $data['fijo'];
        $configuration->percentage_fees = $data['porcentaje'];
        if($request['judicial']){
            $configuration->judicial_fees = $data['judicial'];
        }
        $configuration->tax = isset($data['tax']) ? $data['tax'] : null;
        $configuration->invoice_name = isset($data['invoice_name']) ? $data['invoice_name'] : null;
        $configuration->invoice_address_line_1 = isset($data['invoice_address_line_1']) ? $data['invoice_address_line_1'] : null;
        $configuration->invoice_address_line_2 = isset($data['invoice_address_line_2']) ? $data['invoice_address_line_2'] : null;
        $configuration->invoice_email = isset($data['invoice_email']) ? $data['invoice_email'] : null;
        $configuration->update();

        return redirect('configurations/fees')->with('msj' , 'Tasas actualziadas correctamente');

    }

    public function validateFees(){

        $rules = [ 
            'fijo' => 'required|numeric',
            'porcentaje' => 'required|numeric',
        ];

        if(request('judicial')){
            $rules['judicial'] = 'numeric';
        }
        if(request('tax')){
            $rules['tax'] = 'required';
        }
        if(request('invoice_name')){
            $rules['invoice_name'] = 'required';
        }
        if(request('invoice_address_line_1')){
            $rules['invoice_address_line_1'] = 'required';
        }
        if(request('invoice_address_line_2')){
            $rules['invoice_address_line_2'] = 'required';
        }
        if(request('invoice_email')){
            $rules['invoice_email'] = 'required';
        }

        return request()->validate($rules);


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuration $configuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration)
    {
        //
    }
}
