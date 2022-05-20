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

        if(Auth::user()->isClient()){
            $debtors = Auth::user()->debtors;
        }elseif(Auth::user()->isSuperAdmin() ){
            $debtors = Debtor::all();
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

        // dd($data);

        $debtor = new Debtor();

        $debtor->name = $data['name'];
        $debtor->email = $data['email'];
        $debtor->dni = $data['dni'];
        $debtor->phone = $data['tlf'];
        $debtor->address = $data['address'];
        $debtor->location = $data['location'];
        $debtor->cop = $data['cop'];
        $debtor->additional = $data['additional'];
        $debtor->type = $data['type'];
        $debtor->user_id = Auth::user()->id;

        $debtor->save();

        return redirect('/debtors')->with('msj', 'Deudor Añadido Correctamente');

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
        $debtor->email = $data['email'];
        $debtor->dni = $data['dni'];
        $debtor->phone = $data['tlf'];
        $debtor->address = $data['address'];
        $debtor->location = $data['location'];
        $debtor->cop = $data['cop'];
        $debtor->additional = $data['additional'];
        $debtor->type = $data['type'];
        $debtor->save();

        return redirect('/debtors')->with('msj', 'Deudor Actualizado Correctamente');
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

        return redirect('/debtors')->with('msj', 'Deudor Eliminado Correctamente');
    }

    public function validateRequest($id = null){

        $rules = [
            'type' => 'required',
            'name' => 'required|min:8|max:255',
            'email' => 'required|email|unique:debtors,email,'.$id,
            'dni' => 'required|min:8|max:10|unique:debtors',
            'tlf' => 'required|min:9|max:14',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'cop' => 'required',
            'additional' => 'required',
        ];

        if(request()->method() == 'PUT'){
            $rules['email'] = 'required|email|unique:debtors,email,'.request()->debtor->id;
            $rules['dni'] = 'required|min:8|max:10|unique:debtors,dni,' . request()->debtor->id;
        }

        return request()->validate($rules);

    }
}
