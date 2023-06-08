<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Models\Claim;
use App\Rules\Iban;
use App\Rules\CifNie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class ThirdPartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isClient() || Auth::user()->isGestor() || Auth::user()->isAssociate()){
            $thirdParties = Auth::user()->thirdParties;
        }elseif(Auth::user()->isSuperAdmin() ){
            $thirdParties = thirdParty::all();
        }/*else{
            $thirdParties = thirdParty::where('user_id',session('other_user'))->get();
        }*/

        return view('third_parties.index', [

            'third_parties'=>  $thirdParties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('third_parties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest();

        // dd($data);

        $thirdParty = new ThirdParty;
        $thirdParty->type = $data['tipo'];
        $thirdParty->name = $data['name'];
        $thirdParty->dni = $data['dni'];
        $thirdParty->address = $data['address'];
        $thirdParty->location = $data['location'];
        $thirdParty->province = $data['province'];
        $thirdParty->cop = $data['cop'];
        $thirdParty->iban = array_key_exists('iban', $data) ? $data['iban'] : null;
        if (session('other_user')) {
            $thirdParty->user_id = session('other_user');
        }else{
            $thirdParty->user_id = Auth::user()->id;
        }
        $thirdParty->legal_representative = $data['tipo'] == 1 ? $data['legal_representative']: null;
        $thirdParty->representative_dni = $data['tipo'] == 1 ? $data['representative_dni']: null;
        $thirdParty->save();

        // $path = $request->file('dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/dni', 'public');
        $poa_path = "";
        // if($request->file('poder_legal')){
        $poa_path = $request->file('poder_legal')->store('uploads/third-parties/' . $thirdParty->id . '/poa', 'public');
        $thirdParty->poa = $poa_path;
        // }
        if($request->file('apud_acta')){
            $apud_path = "";
            $apud_path = $request->file('apud_acta')->store('uploads/third-parties/' . $thirdParty->id . '/apud_acta', 'public');
            $thirdParty->apud_acta = $apud_path;
        }

        /*$rep_dni = "";
        if($request->file('representative_dni')){
            $rep_dni = $request->file('representative_dni')->store('uploads/third-parties/' . $thirdParty->id . '/rep', 'public');
        }*/
        // $thirdParty->dni_img = $path;
        /*$thirdParty->representative_dni = $rep_dni;*/

        if ($data['tipo'] == 1) {
            $rep_path = $request->file('representative_dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/rep', 'public');
            $thirdParty->representative_dni_img = $rep_path;
        }

        $thirdParty->save();
        return redirect('third-parties')->with(['msj' => 'Acreditación de tercero creada exitosamente!']);





        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdParty $thirdParty)
    {
        return view('third_parties.show', [
            'third_party' => $thirdParty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdParty $thirdParty)
    {
        return view('third_parties.edit', [
            'third_party' => $thirdParty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdParty $thirdParty)
    {
        $data = $this->validateRequest();

        $thirdParty->type = $data['tipo'];
        $thirdParty->name = $data['name'];
        $thirdParty->dni = $data['dni'];
        $thirdParty->address = $data['address'];
        $thirdParty->location = $data['location'];
        $thirdParty->province = $data['province'];
        $thirdParty->cop = $data['cop'];
        $thirdParty->iban = array_key_exists('iban', $data) ? $data['iban'] : null;
        $thirdParty->legal_representative = $data['tipo'] == 1 ? $data['legal_representative']: null;
        $thirdParty->representative_dni = $data['tipo'] == 1 ? $data['representative_dni']: null;
        $thirdParty->save();

        /*if($request->file('dni_img')){

            if($thirdParty->dni_img != NULL){

                Storage::disk('public')->delete($thirdParty->dni_img);

            }

            $path = $request->file('dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/dni', 'public');
            $thirdParty->dni_img = $path;
            $thirdParty->save();

        }*/

        if($request->file('poder_legal')){
            if($thirdParty->poa != NULL){
                Storage::disk('public')->delete($thirdParty->poa);
            }
            $poa_path = $request->file('poder_legal')->store('uploads/third-parties/' . $thirdParty->id . '/poa', 'public');
            $thirdParty->poa = $poa_path;
            $thirdParty->save();
        }

        if($request->file('apud_acta')){
            if($thirdParty->apud_acta != NULL){
                Storage::disk('public')->delete($thirdParty->apud_acta);
            }
            $apud_path = $request->file('apud_acta')->store('uploads/third-parties/' . $thirdParty->id . '/apud_acta', 'public');
            $thirdParty->apud_acta = $apud_path;
            $thirdParty->save();
        }

        if($request->file('representative_dni_img')){
            if ($thirdParty->representative_dni_img != NULL) {
                Storage::disk('public')->delete($thirdParty->representative_dni_img);
            }
            $rep_dni = $request->file('representative_dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/rep', 'public');
            $thirdParty->representative_dni_img = $rep_dni;
            $thirdParty->save();
        }

        return redirect()->back()->with(['msj' => 'Acreditación de tercero actualizada exitosamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdParty $thirdParty)
    {
        if($thirdParty->dni_img != NULL){
            Storage::disk('public')->delete($thirdParty->dni_img);
        }

        $claim= Claim::where('third_parties_id', $thirdParty->id)
                        ->first();

        if($claim){
            return redirect('/third-parties')->with(['error' => 'El tercero no se puede eliminar, tiene asociada una reclamación']);
        }

        $thirdParty->delete();

        return redirect('/third-parties')->with(['msj' => 'Tercero eliminado exitosamente']);
    }

    public function validateRequest(){

        // dd(request()->all());

        $rules = [
            'tipo' => 'required',
            'name' => 'required|min:8|max:255',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'province' => 'required',
            'cop' => 'required',
            'dni' => 'required',

        ];

        if(request('iban')){
            $rules['iban'] = [new Iban];
        }

        if(request('dni')){
            $rules['dni'] = [new CifNie];
        }

        /*if(request('legal_representative')){$rules['legal_representative'] = 'required';}
        if(request('representative_dni')){$rules['representative_dni'] = 'required';}*/

        if(request()->method() == 'PUT'){

            // $rules['dni'] = 'required|min:8|max:10|unique:third_parties,dni, ' . request()->thirdParty->id;
            // $rules['dni_img']  = 'mimes:jpg,png,pdf';

            if (request()->tipo == 1) {
                if (!request()->thirdParty->representative_dni_img) {
                    $rules['representative_dni_img']  = 'required|mimes:jpg,png,pdf';
                }
                $rules['legal_representative'] = 'required';
                $rules['representative_dni'] = 'required';
            }

            if(!request()->thirdParty->poa){
                $rules['poder_legal'] = 'required|file|mimes:pdf,jpg,png';
            }

        }else{
            // $rules['dni'] = 'required|min:8|max:10|unique:third_parties';
            // $rules['dni_img']  = 'required|mimes:jpg,png,pdf';

            $rules['poder_legal'] = 'required|file|mimes:pdf,jpg,png';

            if (request()->tipo == 1) {
                // if (!request()->thirdParty->representative_dni_img) {
                $rules['representative_dni_img']  = 'required|mimes:jpg,png,pdf';
                // }
                $rules['legal_representative'] = 'required';
                $rules['representative_dni'] = 'required';
            }

        }

        $messages = [

            // 'poder_legal.required_if' => 'El campo :attribute es obligatorio cuando el campo :other es Jurídico.'
            'poder_legal.required_if' => 'El campo :attribute es obligatorio'
        ];


        return request()->validate($rules, $messages);
    }
}
