<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Storage;

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

    public function stepFour()
    {
        return view('claims.create_step_4');
    }

    public function stepFive()
    {
        if(session()->has('claim_client') && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){
            return view('claims.create_step_5');
        }
    }

    public function stepSix()
    {
        if(session()->has('claim_client') && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three') && session()->has('claim_agreement')){
            return view('claims.create_step_6');
        }
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

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveOptionTwo(Request $request){

        $request->session()->put('claim_client', $request->id);

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveDebtor(Request $request){

        $request->session()->put('claim_debtor', $request->id);

        return redirect('/claims/create-debt')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionOne(Request $request){

        $request->session()->put('claim_client', '');

        return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function invalidDebtor(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('claim_debt');
        $request->session()->forget('debt_step_one');
        $request->session()->forget('debt_step_two');

        return redirect('/panel')->with('alert', 'Lo sentimos pero su deuda es inviable');
    }

    public function refuseAgreement(){
        if(session()->has('claim_client') && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){

            $debt = Session('claim_debt');
            $debt->agreement = false;
            Session()->put('claim_debt', $debt);
            Session()->put('claim_agreement', 'false');
            return redirect('claims/accept-terms')->with('msj', 'Se ha guardado tu elección temporalmente');
        }
    }

    public function flushAll(Request $request)
    {
        $request->session()->forget('claim_client');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('debt_step_one');
        $request->session()->forget('debt_step_two');
        $request->session()->forget('debt_step_three');
        $request->session()->forget('claim_agreement');

        $debt = session('claim_debt');

        if($debt->factura){
            Storage::disk('public')->delete($debt->factura);
        }
        if($debt->albaran){
            Storage::disk('public')->delete($debt->albaran);
        }
        if($debt->contrato){
            Storage::disk('public')->delete($debt->contrato);
        }
        if($debt->documentacion_pedido){
            Storage::disk('public')->delete($debt->documentacion_pedido);
        }
        if($debt->extracto){
            Storage::disk('public')->delete($debt->extracto);
        }
        if($debt->reconocimiento_deuda){
            Storage::disk('public')->delete($debt->reconocimiento_deuda);
        }
        if($debt->escritura_notarial){
            Storage::disk('public')->delete($debt->escritura_notarial);
        }
        if($debt->reclamacion_previa){
            Storage::disk('public')->delete($debt->reclamacion_previa);
        }
        if($debt->others){

            $session_docs = explode(',' , $debt->others);

            foreach ($session_docs as $d) {

                Storage::disk('public')->delete($d);
            }
        }

        $request->session()->forget('claim_debt');

        return redirect('claims/select-client')->with('msj', 'Se han eliminado las opciones correctamente');
    }
}
