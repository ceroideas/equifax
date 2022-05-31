<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Rules\Iban;
use Auth;

class AgreementsController extends Controller
{
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
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){

            session()->forget('claim_agreement');

            return view('agreements.create');

        }
    }

    public function saveAgreement(Request $request)
    {
        $this->validateRequest();

        $agreement = new Agreement();
        $agreement->take = $request['quitas'];
        $agreement->wait = $request['espera'];
        $agreement->observation = $request['observaciones'] ? $request['observaciones'] : '';

        Auth::user()->iban = $request['iban'];
        Auth::user()->save();


        session()->put('claim_agreement', $agreement);

        // return redirect('viability');
        return redirect('claims/accept-terms')->with('msj', 'Datos guardados temporalmente');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(Agreement $agreement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        //
    }

    public function validateRequest(){

        $rules = [
            
            'quitas' => 'required',
            'espera' => 'required',

        ];

        if(request('iban')){
            $rules['iban'] = [new Iban];
        }

        if (request('observaciones')) {
            $rules['observaciones'] = 'required';
        }

        return request()->validate($rules);
    }
}
