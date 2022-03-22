<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Rules\Iban;
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
        // if() 

        $thirdParties = Auth::user()->thirdParties;

        return view('claims.third_parties.index', [

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
        return view('claims.third_parties.create');
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
        $thirdParty->name = $data['name'];
        $thirdParty->dni = $data['dni'];
        $thirdParty->address = $data['address'];
        $thirdParty->location = $data['location'];
        $thirdParty->cop = $data['cop'];
        $thirdParty->user_id = Auth::user()->id;
        $thirdParty->save();

        $path = $request->file('dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/dni', 'public');
        $thirdParty->dni_img = $path;
        $thirdParty->save();
        return redirect()->back()->with(['msj' => 'Acreditación de Tercero creada exitosamente!']);

        



        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdParty $thirdParty)
    {
        return view('claims.third_parties.show', [
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
        return view('claims.third_parties.edit', [
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

        $thirdParty->name = $data['name'];
        $thirdParty->dni = $data['dni'];
        $thirdParty->address = $data['address'];
        $thirdParty->location = $data['location'];
        $thirdParty->cop = $data['cop'];
        $thirdParty->save();

        if($request->file('dni_img')){

            if($thirdParty->dni_img != NULL){
                
                Storage::disk('public')->delete($thirdParty->dni_img);
                
            }
            
            $path = $request->file('dni_img')->store('uploads/third-parties/' . $thirdParty->id . '/dni', 'public');
            $thirdParty->dni_img = $path;
            $thirdParty->save();
     
        }

        return redirect()->back()->with(['msj' => 'Acreditación de Tercero actualizada exitosamente!']);
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
        
        $thirdParty->delete();

        return redirect('/claims/third-parties')->with(['msj' => 'Tercero Eliminado Exitosamente']);
    }

    public function validateRequest(){

        // dd(request()->all());

        $rules = [
            'name' => 'required|min:8|max:255',
            'dni' => 'required|min:8|max:10',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'cop' => 'required',
            
        ];

        if(request('iban')){
            $rules['iban'] = [new Iban];
        }

        if(request()->method() == 'PUT'){

            $rules['dni_img']  = 'image|mimes:jpg,png';
            
        }else{
           
            $rules['dni_img']  = 'required|image|mimes:jpg,png';
        }


        return request()->validate($rules);
    }
}
