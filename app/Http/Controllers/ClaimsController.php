<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('claims.index', [

            'claims' => Claim::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('claims.create');
    }

    public function stepOne()
    {
        return view('claims.create_step_1');
    }

    public function stepTwo()
    {
        return view('claims.create_step_2');
    }

    public function stepThree()
    {
        return view('claims.create_step_3');
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
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        //
    }

    public function saveOptionOne(Request $request){

        $request->session()->put('claim_client', Auth()->user()->id);

        return redirect('/claims/select-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveOptionTwo(Request $request){

        $request->session()->put('claim_client', $request->id);

        return redirect('/claims/select-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveDebtor(Request $request){

        $request->session()->put('claim_debtor', $request->id);

        return redirect('/claims/create-debt')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionOne(Request $request){

        $request->session()->put('claim_client', '');

        return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushAll(Request $request)
    {
        $request->session()->forget('claim_client');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('claim_debt');
        return redirect('claims/select-client')->with('msj', 'Se han eliminado las opciones correctamente');
    }
}
