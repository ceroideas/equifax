<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Iban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;

class UsersController extends Controller
{

    public function __construct() {

        $this->authorizeResource(User::class, 'user');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        return view('users.pending',[
            'users' => User::where('status', 1)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        return view('users.create');
                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $model_user)
    {

        $validation = $this->validateRequest();
       
        $user = $model_user->create([

            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'phone' => $request->tlf,
            'address' => $request->address,
            'location' => $request->location,
            'cop' => $request->cop,
            'iban' => $request->iban,
            'role' => $request->role,
            'password' => bcrypt($request->password),

        ]);
        $path = $request->file('dni_img')->store('uploads/' . $user->id . '/dni', 'public');
        $user->update(['dni_img' => $path]);
        return redirect('/users')->with(['msj' => 'Usuario Creado Exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [

            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [

            'user' => $user

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validation = $this->validateRequest();

        if($request->password != Null){
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }

        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'phone' => $request->tlf,
            'address' => $request->address,
            'location' => $request->location,
            'cop' => $request->cop,
            'iban' => $request->iban,
            'password' => $password,

        ]);
        if($request->file('dni_img')){
            if($user->dni_img != NULL){
                
                Storage::disk('public')->delete($user->dni_img);
                $user->pending();
            }
            
            $path = $request->file('dni_img')->store('uploads/' . $user->id . '/dni', 'public');
            $user->update(['dni_img' => $path]);
            

        }

        if(Auth::user()->can('create', 'user')){
            return redirect('/users')->with(['msj' => 'Usuario Actualizado Exitosamente']);
        }

        return redirect()->back()->with(['msj' => 'Datos Actualizado Exitosamente, espere por la revisión']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with(['msj' => 'Usuario Eliminado Exitosamente']);
    }

    public function validateRequest(){

        $rules = [
            'name' => 'required|min:8|max:255',
            'email' => 'required|email',
            'dni' => 'required|min:8|max:10',
            'tlf' => 'required|min:10|max:14',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'cop' => 'required|numeric|integer',
            'iban' => [new Iban]
        ];

        if(Auth::user()->can('create', 'user')){
            $rules['role'] = 'required';
        }


        if(request()->method() == 'PUT'){
            // dd('hola');
            $rules['password'] = 'sometimes|confirmed';
            if(Auth::user()->dni_img != NUll){
                $rules['dni_img']  = 'image|mimes:jpg,png';
            }else{
                $rules['dni_img']  = 'required|image|mimes:jpg,png';
            }
            
        }else{
            $rules['password'] = 'required|confirmed|min:8|max:255';
            $rules['dni_img']  = 'required|image|mimes:jpg,png';
        }

        return request()->validate($rules);
    }

    public function approval(User $user){

        $user->approval();

        return redirect()->back()->with('msj', 'Usuario Aprobado Correctamente');

    }

    public function denial(User $user){

        $user->denial();

        return redirect()->back()->with('msj', 'Usuario Revocado Correctamente');

    }
}
