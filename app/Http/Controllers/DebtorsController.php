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

        $debtors = Auth::user()->debtors();

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


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function show(Debtor $debtor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Debtor $debtor)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debtor $debtor)
    {
        //
    }

    public function validateRequest(){

        $rules = [
            'type' => 'required',
            'name' => 'required|min:8|max:255',
            'email' => 'required|email',
            'dni' => 'required|min:8|max:10|unique:users',
            'tlf' => 'required|min:10|max:14',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'cop' => 'required',
        ];

        if(request()->method() == 'PUT'){
            $rules['email'] = 'required|email|unique:users,email,'.request()->user->id;
            $rules['dni'] = 'required|min:8|max:10|unique:users,dni,' . request()->user->id;
        }

        return request()->validate($rules);

    }
}
