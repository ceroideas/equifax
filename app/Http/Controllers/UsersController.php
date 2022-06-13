<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostalCode;
use App\Rules\Iban;
use App\Rules\CifNie;
use App\Models\Claim;
use App\Models\Debt;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

use Auth;

use Excel;
use App\Exports\UsersExport;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');

    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport(), 'usuarios-generales-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->isAdmin()){
            $users = User::where('role', 2)->latest()->get();
        }elseif(Auth::user()->isSuperAdmin()){
            $users = User::all();
        }

        return view('users.index',[
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending(User $user)
    {

        $this->authorize('pending', $user);

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

    public function changePassword(Request $request)
    {
        $validation = $this->validatePassword();

        Auth::user()->password = bcrypt($request->password);
        Auth::user()->save();

        return redirect('panel')->with('msj','Tu contraseña se ha cambiado satisfactoriamente!');
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
            'legal_representative' => $request->type == 1 ? $request->legal_representative : null,
            'representative_dni' => $request->type == 1 ? $request->representative_dni : null,

        ]);

        $path = $request->file('dni_img')->store('uploads/users/' . $user->id . '/dni', 'public');
        $user->update(['dni_img' => $path]);

        if($request->file('representative_dni_img')){
            $path = $request->file('representative_dni_img')->store('uploads/users/' . $user->id . '/representative_dni_img', 'public');
            $user->update(['representative_dni_img' => $path]);
        }
        return redirect('/users')->with(['msj' => 'Usuario creado exitosamente']);
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

        if(Auth::user()->is($user) && Auth::user()->isClient()  && !Auth::user()->checkStatus()){
            session()->flash('alert', Auth::user()->getStatus());
        }

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

            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'phone' => $request->tlf,
            'address' => $request->address,
            'location' => $request->location,
            'cop' => $request->cop,
            'iban' => $request->iban,
            'password' => $password,
            'legal_representative' => $request->type == 1 ? $request->legal_representative : null,
            'representative_dni' => $request->type == 1 ? $request->representative_dni : null,

        ]);
        if($request->file('dni_img')){
            if($user->dni_img != NULL){

                Storage::disk('public')->delete($user->dni_img);

            }

            $path = $request->file('dni_img')->store('uploads/users/' . $user->id . '/dni', 'public');
            $user->update(['dni_img' => $path]);
            $user->pending();
        }

        if($request->file('representative_dni_img')){
            if($user->representative_dni_img != NULL){

                Storage::disk('public')->delete($user->representative_dni_img);

            }

            $path = $request->file('representative_dni_img')->store('uploads/users/' . $user->id . '/representative_dni_img', 'public');
            $user->update(['representative_dni_img' => $path]);
            $user->pending();
        }

        if(Auth::user()->can('create', 'user')){
            return redirect('/users')->with(['msj' => 'Usuario actualizado exitosamente']);
        }

        return redirect()->back()->with(['msj' => 'Datos actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)

    {
        if($user->dni_img != NULL){

            Storage::disk('public')->delete($user->dni_img);

        }

        $user->delete();

        return redirect('/users')->with(['msj' => 'Usuario eliminado exitosamente']);
    }

    public function validatePassword()
    {
        $rules = [
            'password' => 'required|confirmed'
        ];

        return request()->validate($rules);
    }

    public function validateRequest(){

        $rules = [
            'name' => 'required|min:8|max:255',
            'email' => 'required|email|unique:users',
            'dni' => 'required|min:8|max:10|unique:users',
            'tlf' => 'required|min:9|max:14',
            'address' => 'required|min:10|max:255',
            'location' => 'required',
            'cop' => 'required|numeric',

        ];


        if(Auth::user()->can('create', 'user')){
            $rules['role'] = 'required';
        }

        if(request('iban')){
            $rules['iban'] = [new Iban];
        }

        if(request('dni')){
            $rules['dni'] = [new CifNie];
        }

        if(request()->method() == 'PUT'){


            // dd('hola');
            $rules['password'] = 'sometimes|confirmed';
            $rules['email'] = 'required|email|unique:users,email,'.request()->user->id;
            // $rules['dni'] = 'required|min:8|max:10|unique:users,dni,' . request()->user->id;
            if(Auth::user()->dni_img != NUll){
                // $rules['dni_img']  = 'mimes:jpg,png,pdf';
            }else{
                // $rules['dni_img']  = 'required|mimes:jpg,png,pdf';
            }
            if (request()->type == 1) {
                $rules['representative_dni_img']  = 'required|mimes:jpg,png,pdf';
                $rules['legal_representative'] = 'required';
                $rules['representative_dni'] = 'required';
            }

        }else{
            $rules['password'] = 'required|confirmed|min:8|max:255';
            // $rules['dni_img']  = 'required|mimes:jpg,png,pdf';

            if (request()->type == 1) {
                // $rules['representative_dni_img']  = 'required|mimes:jpg,png,pdf';
                $rules['legal_representative'] = 'required';
                $rules['representative_dni'] = 'required';
            }
        }

        return request()->validate($rules);
    }

    public function approval(User $user){

        $user->approval();

        return redirect()->back()->with('msj', 'Usuario aprobado correctamente');

    }

    public function denial(User $user){

        $user->denial();

        return redirect()->back()->with('msj', 'Usuario revocado correctamente');

    }

    public function getPopulation($code)
    {
        return PostalCode::where('code',$code)->first();
    }

    public function migrar()
    {
        return \App\Models\Actuation::all();
        /*$u = Auth::user();
        $u->apud_acta = null;
        $u->save();

        return "";*/
        /*$c = Claim::find(1);
        $c->status = 11;
        $c->save();

        */
        // return Claim::all();
        // return \App\Models\Actuation::all();

        \App\Models\Actuation::truncate();
        \App\Models\ActuationDocument::truncate();
        Claim::truncate();
        Debt::truncate();
        Invoice::truncate();
        \App\Models\Agreement::truncate();
        \App\Models\DebtDocument::truncate();


        // return actuationActions(601,22);
        /*\App\Models\Actuation::truncate();
        \App\Models\ActuationDocument::truncate();
        return \App\Models\Actuation::all();*/
        /*Schema::table('claims', function(Blueprint $table) {
            //
            $table->string('phase')->nullable();
        });*/
        /*Schema::table('actuations', function(Blueprint $table) {
            //
            $table->integer('hito_padre')->nullable();
        });*/
        /*\App\Models\Actuation::truncate();
        \App\Models\ActuationDocument::truncate();

        return config('app.phases');*/
        /*Claim::truncate();
        Debt::truncate();
        Invoice::truncate();
        \App\Models\Agreement::truncate();
        \App\Models\Actuation::truncate();
        \App\Models\ActuationDocument::truncate();*/

        /*Schema::create('debt_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('debt_id')->nullable();
            $table->string('document')->nullable();
            $table->string('type')->nullable();
            $table->text('hitos')->nullable();
            $table->timestamps();
            //
        });*/
        /*Schema::table('debts', function(Blueprint $table) {
            //
            $table->integer('reclamacion_previa_indicar')->nullable();
            $table->string('fecha_reclamacion_previa')->nullable(); // documento que acredite dicha reclamacion

            $table->text('partials_amount_details')->nullable(); // detalle de pagos y fechas de los pagos
        });*/
        /*Schema::table('users', function(Blueprint $table) {
            //
            $table->string('representative_dni_img')->nullable();
        });

        Schema::table('third_parties', function(Blueprint $table) {
            //
            $table->string('representative_dni_img')->nullable();
        });*/

        /*Schema::table('users', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
        });*/
        /*return User::all();
        return User::whereIn('id',[29])->delete();
        Schema::table('users', function(Blueprint $table) {
            //
            $table->integer('newsletter')->nullable();
        });*/
        // return \App\Models\Claim::all();
        /*Schema::table('third_parties', function(Blueprint $table) {
            //
            $table->string('legal_representative')->nullable();
            $table->string('representative_dni')->nullable();
        });*/

        /*Schema::table('claims', function(Blueprint $table) {
            //
            $table->integer('postal_code_id')->nullable();
        });*/
        // return \App\Models\Party::all();
        // return \App\Models\Invoice::all();
        // return \App\Models\ActuationDocument::all();
        /*\App\Models\Agreement::truncate();
        \App\Models\Invoice::truncate();
        \App\Models\Claim::truncate();
        \App\Models\Debt::truncate();
        \App\Models\Actuation::truncate();
        \App\Models\ActuationDocument::truncate();*/
        /*$a = 1500;

        return $a.='|'.(0);*/
        /*Schema::table('users', function(Blueprint $table) {
            //
            $table->integer('type')->nullable();
        });*/

        /*Schema::table('users', function(Blueprint $table) {
            //
            $table->string('apud_acta')->nullable();
        });*/

        /*Schema::table('invoices', function(Blueprint $table) {
            //
            $table->string('amounts')->nullable();
        });*/

        /*Schema::table('invoices', function(Blueprint $table) {
            //
            $table->string('description')->nullable();
        });*/

        /*Schema::table('invoices', function(Blueprint $table) {
            //
            $table->integer('discount_id')->nullable(); // por si se hace una tabla de cupones
            $table->integer('discount_qty')->nullable(); // por si se hace fijo
            $table->string('discount_type')->nullable(); // por si se hace fijo
        });*/

        /*Schema::create('actuation_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('actuation_id')->nullable();
            $table->string('document_name')->nullable();
            $table->timestamps();
        });*/

        /*Schema::dropIfExists('configurations');
        Schema::create('configurations', function(Blueprint $table) {
            //
            $table->increments('id');
            $table->string('fixed_fees')->nullable();
            $table->string('percentage_fees')->nullable();
            $table->string('judicial_amount')->nullable();
            $table->string('judicial_fees')->nullable();
            $table->string('verbal_amount')->nullable();
            $table->string('verbal_fees')->nullable();
            $table->string('ordinary_amount')->nullable();
            $table->string('ordinary_fees')->nullable();
            $table->string('execution')->nullable();
            $table->string('resource')->nullable();
            $table->string('tax')->nullable();
            $table->string('invoice_name')->nullable();
            $table->string('invoice_address_line_1')->nullable();
            $table->string('invoice_address_line_2')->nullable();
            $table->string('invoice_email')->nullable();

            $table->timestamps();
        });*/

        /*Schema::create('postal_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('province')->nullable();
            $table->timestamps();
            //
        });

        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locality')->nullable();
            $table->string('comunity')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            //
        });

        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locality')->nullable();
            $table->string('province')->nullable();
            $table->string('procurator')->nullable();
            $table->timestamps();
            //
        });*/
    }
}
