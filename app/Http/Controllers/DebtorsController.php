<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use Illuminate\Http\Request;
use Auth;

class DebtorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->isClient() || Auth::user()->isGestor() || Auth::user()->isAssociate()){
            $debtors = Auth::user()->debtors;
        }elseif(Auth::user()->isSuperAdmin() ){
            $debtors = Debtor::all();
        }else{
            $debtors = Debtor::where('user_id',session('other_user'))->get();
        }

        return view('debtors.index', [

            'debtors' => $debtors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debtors.create');
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

        $debtor = new Debtor();

        $debtor->name = $data['name'];
        $debtor->email = $data['email'] ? $data['email'] : '';
        $debtor->dni = $data['dni'];
        $debtor->phone = $data['tlf'];
        $debtor->address = $data['address'];
        $debtor->location = $data['location'];
        $debtor->province = $data['province'];
        $debtor->cop = $data['cop'];
        $debtor->additional = $data['additional'];
        $debtor->type = $data['type'];
        /*if (session('other_user')) {
            $debtor->user_id = session('other_user');
        }else{*/
            $debtor->user_id = Auth::user()->id;
        // }

        $debtor->save();

        if (session()->has('claim_client') || session()->has('claim_third_party')) {
            return redirect('claims/save-debtor/'.$debtor->id);
        }

        return redirect('/debtors')->with('msj', 'Deudor añadido correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function show(Debtor $debtor)
    {
        return view('debtors.show', [

            'debtor' => $debtor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Debtor $debtor)
    {
        return view('debtors.edit', [

            'debtor' => $debtor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debtor $debtor)
    {
        $data = $this->validateRequest($debtor->id);

        $debtor->name = $data['name'];
        $debtor->email = $data['email'] ? $data['email'] : '';
        $debtor->dni = $data['dni'];
        $debtor->phone = $data['tlf'];
        $debtor->address = $data['address'];
        $debtor->location = $data['location'];
        $debtor->province = $data['province'];
        $debtor->cop = $data['cop'];
        $debtor->additional = $data['additional'];
        $debtor->type = $data['type'];
        $debtor->save();

        if (session()->has('claim_client') || session()->has('claim_third_party')) {
            return redirect('claims/save-debtor/'.$debtor->id);
        }

        return redirect('/debtors')->with('msj', 'Deudor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debtor $debtor)
    {
        $debtor->delete();

        return redirect('/debtors')->with('msj', 'Deudor eliminado correctamente');
    }

    public function validateRequest($id = null){

        $rules = [
            'type' => 'required',
            'name' => 'required|min:8|max:255',
            'email' => '',
            'dni' => 'required|min:8|max:10',
            'tlf' => 'required|min:9|max:14',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'province' => 'required',
            'cop' => 'required',
            'additional' => '',
        ];

        // if(request()->method() == 'PUT'){
            //$rules['email'] = 'unique:debtors,email,'.request()->debtor->id;
            //$rules['dni'] = 'required|min:8|max:10|unique:debtors,dni,' . request()->debtor->id;
        // }

        return request()->validate($rules);

    }
}
