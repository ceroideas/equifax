<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostalCode;
use App\Rules\Iban;
use App\Rules\CifNie;
//use App\Models\Claim;
//use App\Models\Debt;
use App\Models\Template;
//use App\Models\Hito;
//use App\Models\SendEmail;
//use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;

use Auth;

use Mail;

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
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            return Excel::download(new UsersExport(), 'usuarios-generales-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*if(Auth::user()->isAdmin()){
            $users = User::where('role', 2)->latest()->get();
        }elseif(Auth::user()->isSuperAdmin()|| Auth::user()->isFinance()){*/
            $users = User::all();
        //}

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
        Auth::user()->pw_updated_at = carbon::now();
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
        if(isset($request->role)){
            $role = $request->role;

        }else{
            $role = 2;
        }

        $user = $model_user->create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'dni' => Crypt::encryptString($request->dni),
            'phone' => Crypt::encryptString($request->tlf),
            'address' => Crypt::encryptString($request->address),
            'location' => $request->location,
            'province' => $request->province,
            'cop' => $request->cop,
            'iban' => Crypt::encryptString($request->iban),
            'role' => $role,
            'password' => bcrypt($request->password),
            'legal_representative' => $request->type == 1 ? Crypt::encryptString($request->legal_representative) : null,
            'representative_dni' => $request->type == 1 ? Crypt::encryptString($request->representative_dni) : null,
            'taxcode'=> substr($request->cop, 0, 2)  == 35 ? 'IVA0' : 'IVA21',
            'discount'=> $request->discount,
            'referenced'=>$request->referenced,
            'status'=>3,
            'type'=>$request->type,
            'msgusr'=>1,
            'pw_updated_at'=>Carbon::now(),
        ]);

        addNotification('Nuevo usuario', 'Nuevo usuario registrado', 0,$user->id);

        if ($request->file('dni_img')) {
            $path = $request->file('dni_img')->store('uploads/users/' . $user->id . '/dni', 'public');
            $user->update(['dni_img' => $path]);
        }

        if($request->file('representative_dni_img')){
            $path = $request->file('representative_dni_img')->store('uploads/users/' . $user->id . '/representative_dni_img', 'public');
            $user->update(['representative_dni_img' => $path]);
        }

        if($request->file('apud_acta')){
            $path = $request->file('apud_acta')->store('uploads/users/' . $user->id . '/apud_acta', 'public');
            $user->update(['apud_acta' => $path]);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editConfiguration(User $user)
    {

        if(Auth::user()->is($user) && Auth::user()->isClient()  && !Auth::user()->checkStatus()){
            session()->flash('alert', Auth::user()->getStatus());
        }

        return view('users.edit-configuration', [
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

        /* if(isset($request->role)){
            $role = $request->role;

        }else{
            $role = Auth::user()->role;
        } */

        /* if(isset($request->referenced)){
            $user->update(['referenced'=>$request->referenced]);
        } */
        $user->update([
            'type' => $request->type,
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'dni' => Crypt::encryptString($request->dni),
            'status'=>3,
            'phone' => Crypt::encryptString($request->tlf),
            'address' => Crypt::encryptString($request->address),
            'location' => $request->location,
            'province' => $request->province,
            'cop' => $request->cop,
            'iban' => Crypt::encryptString($request->iban),
            //'role' => $role,
            'password' => $password,
            'legal_representative' => $request->type == 1 ? Crypt::encryptString($request->legal_representative) : null,
            'representative_dni' => $request->type == 1 ? Crypt::encryptString($request->representative_dni) : null,
            'taxcode'=> substr($request->cop, 0, 2)  == 35 ? 'IVA0' : 'IVA21',
            //'discount'=> $request->discount,
            'msgusr'=> isset($request->msgusr)?1:0,
        ]);

        if($request->file('dni_img')){
            if($user->dni_img != NULL){
                Storage::disk('public')->delete($user->dni_img);
            }
            $path = $request->file('dni_img')->store('uploads/users/' . $user->id . '/dni', 'public');
            $user->update(['dni_img' => $path]);
            $user->approval();
        }

        if($request->file('representative_dni_img')){
            if($user->representative_dni_img != NULL){
                Storage::disk('public')->delete($user->representative_dni_img);
            }
            $path = $request->file('representative_dni_img')->store('uploads/users/' . $user->id . '/representative_dni_img', 'public');
            $user->update(['representative_dni_img' => $path]);
            $user->approval();
        }

        if($request->file('apud_acta')){
            if($user->apud_acta != NULL){
                Storage::disk('public')->delete($user->apud_acta);
            }
            $path = $request->file('apud_acta')->store('uploads/users/' . $user->id . '/apud_acta', 'public');
            $user->update(['apud_acta' => $path]);
            $user->approval();
        }

        if(Auth::user()->can('create', 'user')){
            return redirect('/users')->with(['msj' => 'Usuario actualizado exitosamente']);
        }

        if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance()){
            return redirect('panel')->with(['msj' => '¡Tus datos han sido actualizamos exitosamente!, inicia la reclamación']);
        }else{
            return redirect('claims/select-type')->with(['msj' => '¡Tus datos han sido actualizamos exitosamente!, inicia la reclamación']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateConfig(Request $request, User $user)
    {

        //$validation = $this->validateRequest();


        if(isset($request->role)){
            $role = $request->role;

        }else{
            $role = Auth::user()->role;
        }

         if(isset($request->referenced)){
            $user->update(['referenced'=>$request->referenced]);
        }

        $user->update([
            //'type' => $request->type,
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            //'dni' => Crypt::encryptString($request->dni),
            //'status'=>3,
            //'phone' => Crypt::encryptString($request->tlf),
            //'address' => Crypt::encryptString($request->address),
            //'location' => $request->location,
            //'province' => $request->province,
            //'cop' => $request->cop,
            //'iban' => Crypt::encryptString($request->iban),
            'role' => $role,
            //'password' => $password,
            //'legal_representative' => $request->type == 1 ? Crypt::encryptString($request->legal_representative) : null,
            //'representative_dni' => $request->type == 1 ? Crypt::encryptString($request->representative_dni) : null,
            //'taxcode'=> substr($request->cop, 0, 2)  == 35 ? 'IVA0' : 'IVA21',
            'discount'=> $request->discount,
            'referenced'=> $request->referenced,
            //'msgusr'=> isset($request->msgusr)?1:0,
        ]);



        if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance()){
            return redirect('/configurations/users')->with(['msj' => '¡Usuario actualizado correctamente!']);
        }
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
            'province' => 'required',
            'cop' => 'required|numeric',
            'type'=>'required'
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
            $rules['password'] = 'sometimes|confirmed';
            $rules['email'] = 'required|email|unique:users,email,'.request()->user->id;

            if (request()->type == 1) {
                $rules['legal_representative'] = 'required';
                $rules['representative_dni'] = 'required';
            }

        }else{
            $rules['password'] = 'required|confirmed|min:8|max:255';

            if (request()->type == 1) {
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

    public function testEmail($email = 'luiscampos@asemargc.com', $template_id = 1)
    {
        $email_base = $template_id == 1 ? 'email_base_2':'email_base';

        $tmp = Template::find($template_id);
        Mail::send($email_base, ['tmp' => $tmp, 'test'=> 1], function ($message) use($tmp,$email) {
            $message->to($email, 'PRUEBA CLIENTE');
            $message->subject($tmp->title);
        });
        print_r("Enviado template: "); print_r($tmp->id); print_r(" - ");print_r($tmp->title);

    }

    public function migrar()
    {

        /*$c = Claim::find(4);
        $u = User::find(3);
        $u->apud_acta = null;
        $u->save();

        return $u;*/

        // Schema::create('discounts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('amount')->nullable();
        //     $table->integer('claim_id')->nullable();
        //     $table->integer('gestor_id')->nullable();
        //     $table->timestamps();
        //     //
        // });
        /*Invoice::where('claim_id',9)->delete();
        Debt::where('claim_id',9)->delete();
        Claim::find(9)->delete();

        return 1;*/
        /*Schema::table('claims', function(Blueprint $table) {
            //
            $table->integer('gestor_id')->nullable();
        });

        return "";*/
        // return Hito::all();
        // Auth::loginUsingId(39);
        // return Claim::all();

       /* $temp = [
            ['001', 2, 1, 0],
            ['1', 6, 1, 0],
            ['101', 6, 1, 0],
            ['102', 6, 1, 0],
            ['103', 6, 1, 0],
            ['104', 6, 1, 0],
            ['105', 6, 1, 0],
            ['106', 6, 1, 0],

            ['2', 7, 1, 0],
            ['3', 9, 1, 0],
            ['301', 9, 1, 0],
            ['302', 9, 1, 0],
            ['303', 10, 1, 0],
            ['4', 4, 1, 0],
            ['5', 4, 1, 0],
            ['6', 9, 1, 0],
            ['601', 9, 1, 0],
            ['602', 9, 1, 0],
            ['603', 9, 1, 0],
            ['604', 8, 1, 0],
            ['701', 9, 2, 72],
            ['702', 9, 2, 72],
            ['9', 9, 1, 0],
            ['1005', 4, 1, 0],
            ['1006', 4, 1, 0],
            ['1101', 9, 2, 72],
            ['1102', 9, 2, 72],
            ['12', 9, 1, 0],
            ['1304', 9, 1, 0],
            ['15', 4, 1, 0],
            ['16', 5, 1, 0],
            ['17', 4, 1, 0],
            ['1701', 4, 1, 0],
            ['1702', 4, 1, 0],
            ['1703', 9, 1, 0],
            ['19', 11, 1, 0],
            ['20', 6, 1, 0],
            ['21', 10, 1, 0]
        ];

        foreach ($temp as $key => $value) {
            $h = Hito::where('ref_id',$value[0])->first();
            $h->template_id = $value[1];
            $h->send_times = $value[2];
            $h->send_interval = $value[3];
            $h->save();
        }*/
        // $tmp = Template::find(1);
        // Mail::send('email_base', ['tmp' => $tmp], function ($message) use($tmp) {
        //     $message->to('jorgesolano92@gmail.com', 'Jorge Solano');
        //     $message->subject($tmp->title);
        // });
        /*Schema::create('hitos', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('phase')->nullable();
            $table->string('name')->nullable();
            $table->string('redirect_to')->nullable();

            $table->integer('template_id')->nullable(); // email
            $table->integer('send_interval')->nullable();
            $table->integer('send_times')->nullable();

            $table->timestamps();
        });

        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('top_logo')->nullable();
            $table->text('top_content')->nullable();
            $table->text('header_content')->nullable();
            $table->string('header_image')->nullable();
            $table->text('body_content')->nullable();
            $table->text('footer_content')->nullable();
            $table->string('cta_button')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });

        Schema::create('send_emails', function (Blueprint $table) {
            $table->id();
            $table->integer('template_id')->nullable();
            $table->integer('actuation_id')->nullable();
            $table->integer('send_status')->nullable();
            $table->integer('send_count')->nullable();
            $table->integer('views')->nullable();
            $table->timestamps();
        });*/

        // return \App\Models\Actuation::all();
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

        // \App\Models\Actuation::truncate();
        // \App\Models\ActuationDocument::truncate();
        // Claim::truncate();
        // Debt::truncate();
        // Invoice::truncate();
        // \App\Models\Agreement::truncate();
        // \App\Models\DebtDocument::truncate();


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
