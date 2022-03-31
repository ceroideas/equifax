<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use App\Models\ThirdParty;
use App\Models\Debtor;
use App\Models\Debt;
use App\Models\Agreement;
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

        if(Auth::user()->isClient()){
            $claims = Auth::user()->claims;
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $claims = Claim::all();
        }

        return view('claims.index', [

            'claims' => $claims
        ]);
    }

    public function pending()
    {
        if(Auth::user()->isClient()){
            $claims = Auth::user()->claims()->where('status', 0)->get();
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $claims = Claim::where('status', 0)->get();
        }

        return view('claims.pending', [

            'claims' => $claims
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
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){
            return view('claims.create_step_5');
        }
    }

    public function stepSix()
    {
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three') && session()->has('claim_agreement')){
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
        // dd(session('claim_client'), session('claim_debtor'), session('claim_debt'), session('claim_agreement'));
        $claim = new Claim();

        if(session('claim_client')){
            $client = User::find(session('claim_client'));
            $claim->user_id = $client->id;
        }else{
            $client = ThirdParty::find(session('claim_third_party'));
            $claim->third_parties_id = $client->id;
        }

        $debtor = Debtor::find(session('claim_debtor'));
        $claim->debtor_id = $debtor->id;

        $debt = session('claim_debt');
        $debt->debtor_id = $debtor->id;
        $debt->save();
        $claim->debt_id = $debt->id;
        $claim->save();
        $debt->claim_id = $claim->id;
        $debt->save();

        if(session('claim_agreement')  != 'false'){
            $agreement = session('claim_agreement');
            $agreement->debt_id = $debt->id;
            $agreement->claim_id = $claim->id;
            $agreement->save();
            $debt->agreement = true;
            $debt->agreement_id = $agreement->id;
            $claim->agreement_id = $agreement->id;
            $claim->status = 0;
            $debt->save();
            $claim->save();
        }

        $path = '/uploads/claims/' . $claim->id . '/documents/';

        if($debt->factura){
            $factura = basename($debt->factura);
            Storage::disk('public')->move($debt->factura, $path . $factura);
            $debt->factura = $path . $factura;
        }
        if($debt->albaran){
            $albaran = basename($debt->albaran);
            Storage::disk('public')->move($debt->albaran, $path . $albaran);
            $debt->albaran = $path . $albaran;
        }
        if($debt->contrato){
            $contrato = basename($debt->contrato);
            Storage::disk('public')->move($debt->contrato, $path . $contrato);
            $debt->contrato = $path . $contrato;
        }
        if($debt->documentacion_pedido){
            $documentacion_pedido = basename($debt->documentacion_pedido);
            Storage::disk('public')->move($debt->documentacion_pedido, $path . $documentacion_pedido);
            $debt->documentacion_pedido = $path . $documentacion_pedido;
        }
        if($debt->extracto){
            $extracto = basename($debt->extracto);
            Storage::disk('public')->move($debt->extracto, $path . $extracto);
            $debt->extracto = $path . $extracto;
        }
        if($debt->reconocimiento_deuda){
            $reconocimiento_deuda = basename($debt->reconocimiento_deuda);
            Storage::disk('public')->move($debt->reconocimiento_deuda, $path . $reconocimiento_deuda);
            $debt->reconocimiento_deuda = $path . $reconocimiento_deuda;
        }
        if($debt->escritura_notarial){
            $escritura_notarial = basename($debt->escritura_notarial);
            Storage::disk('public')->move($debt->escritura_notarial, $path . $escritura_notarial);
            $debt->escritura_notarial = $path . $escritura_notarial;
        }

        if($debt->reclamacion_previa){

            $reclamacion_previa = basename($debt->reclamacion_previa);
            Storage::disk('public')->move($debt->reclamacion_previa, $path . $reclamacion_previa);
            $debt->reclamacion_previa = $path . $reclamacion_previa;

        }

        if($debt->others){

            $session_docs = explode(',' , $debt->others);

            $docs = [];

            foreach ($session_docs as $d) {

                $docs[] = $path . basename($d);
                Storage::disk('public')->move($d, $path . basename($d));

            }
            $debt->others = implode(',', $docs);
        }

        $debt->save();

        $request->session()->forget('claim_client');
        $request->session()->forget('claim_third_party');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('claim_debt');
        $request->session()->forget('debt_step_one');
        $request->session()->forget('debt_step_two');
        $request->session()->forget('debt_step_three');
        $request->session()->forget('claim_agreement');

        return redirect('/panel')->with('msj', 'Reclamación generada exitosamente, será revisado por nuestros Administradores y le llegará una notficación si el mismo procede o no luego de su revisión');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        $this->authorize('view', $claim);


        return view('claims.show', ['claim' => $claim]);
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

        $this->flushOptionTwo();

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveOptionTwo(Request $request){

        $request->session()->put('claim_third_party', $request->id);

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveDebtor(Request $request){

        $request->session()->put('claim_debtor', $request->id);

        return redirect('/claims/create-debt')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionOne(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->put('claim_third_party', 'waiting');

        return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionTwo(){

        request()->session()->forget('claim_third_party');

        // return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

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
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){

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

        if($debt){
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
    
        }


        $request->session()->forget('claim_debt');

        return redirect('/panel')->with('msj', 'Se han eliminado las opciones correctamente');
    }
}
