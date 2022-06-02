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

        $configuration->fixed_fees = array_key_exists('fixed_fees', $data) ? $data['fixed_fees'] : null;
        $configuration->percentage_fees = array_key_exists('percentage_fees', $data) ? $data['percentage_fees'] : null;
        $configuration->judicial_amount = array_key_exists('judicial_amount', $data) ? $data['judicial_amount'] : null;
        $configuration->judicial_fees = array_key_exists('judicial_fees', $data) ? $data['judicial_fees'] : null;
        $configuration->verbal_amount = array_key_exists('verbal_amount', $data) ? $data['verbal_amount'] : null;
        $configuration->verbal_fees = array_key_exists('verbal_fees', $data) ? $data['verbal_fees'] : null;
        $configuration->ordinary_amount = array_key_exists('ordinary_amount', $data) ? $data['ordinary_amount'] : null;
        $configuration->ordinary_fees = array_key_exists('ordinary_fees', $data) ? $data['ordinary_fees'] : null;
        $configuration->execution = array_key_exists('execution', $data) ? $data['execution'] : null;
        $configuration->resource = array_key_exists('resource', $data) ? $data['resource'] : null;
        $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
        $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
        $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
        $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
        $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
        $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
        $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
        $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
        $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
        $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;

        $configuration->save();

        return redirect('configurations/fees')->with('msj' , 'Tasas guardadas correctamente');

    }

    public function feesUpdate(Request $request, Configuration $configuration){

        $this->authorize('see-fees');

        $data = $this->validateFees();

        $configuration->fixed_fees = array_key_exists('fixed_fees', $data) ? $data['fixed_fees'] : null;
        $configuration->percentage_fees = array_key_exists('percentage_fees', $data) ? $data['percentage_fees'] : null;
        $configuration->judicial_amount = array_key_exists('judicial_amount', $data) ? $data['judicial_amount'] : null;
        $configuration->judicial_fees = array_key_exists('judicial_fees', $data) ? $data['judicial_fees'] : null;
        $configuration->verbal_amount = array_key_exists('verbal_amount', $data) ? $data['verbal_amount'] : null;
        $configuration->verbal_fees = array_key_exists('verbal_fees', $data) ? $data['verbal_fees'] : null;
        $configuration->ordinary_amount = array_key_exists('ordinary_amount', $data) ? $data['ordinary_amount'] : null;
        $configuration->ordinary_fees = array_key_exists('ordinary_fees', $data) ? $data['ordinary_fees'] : null;
        $configuration->execution = array_key_exists('execution', $data) ? $data['execution'] : null;
        $configuration->resource = array_key_exists('resource', $data) ? $data['resource'] : null;
        $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
        $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
        $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
        $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
        $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
        $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
        $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
        $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
        $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
        $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;

        $configuration->update();

        return redirect('configurations/fees')->with('msj' , 'Tasas actualziadas correctamente');

    }

    public function validateFees(){

        $rules = [];

        if(request('fixed_fees')){$rules['fixed_fees'] = 'required';}
        if(request('percentage_fees')){$rules['percentage_fees'] = 'required';}
        if(request('judicial_amount')){$rules['judicial_amount'] = 'required';}
        if(request('judicial_fees')){$rules['judicial_fees'] = 'required';}
        if(request('verbal_amount')){$rules['verbal_amount'] = 'required';}
        if(request('verbal_fees')){$rules['verbal_fees'] = 'required';}
        if(request('ordinary_amount')){$rules['ordinary_amount'] = 'required';}
        if(request('ordinary_fees')){$rules['ordinary_fees'] = 'required';}
        if(request('execution')){$rules['execution'] = 'required';}
        if(request('resource')){$rules['resource'] = 'required';}
        if(request('tax')){$rules['tax'] = 'required';}
        if(request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(request('invoice_email')){$rules['invoice_email'] = 'required';}
        if(request('tax')){$rules['tax'] = 'required';}
        if(request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(request('invoice_email')){$rules['invoice_email'] = 'required';}

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
