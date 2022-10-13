<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use App\Models\ThirdParty;
use App\Models\Debtor;
use App\Models\Debt;
use App\Models\SendEmail;
use App\Models\Template;
use App\Models\Hito;
use App\Models\DebtDocument;
use App\Models\Agreement;
use App\Models\Invoice;
use App\Models\Actuation;
use App\Models\Configuration;
use App\Models\ActuationDocument;
use App\Models\Discount;
use Illuminate\Http\Request;
use Auth;
use Storage;
use Carbon\Carbon;


use Excel;
use Mail;

use App\Exports\ClaimsExport;
use App\Exports\InvoiceExport;
use App\Exports\InvoicesExport;
use App\Exports\OrdersExport;


use App\Imports\HitosImport;
use App\Models\Linvoice;
use App\Models\Order;
use App\Models\Lorder;

use Illuminate\Support\Facades\DB;


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
            $claims = Auth::user()->claims()->whereNotIn('status',[-1,0,1])->get();
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $claims = Claim::all();
        }else{
            $claims = Claim::where('gestor_id',Auth::id())->get();
        }

        return view('claims.index', [

            'claims' => $claims
        ]);
    }

    public function pending()
    {
        if(Auth::user()->isClient()){
            $claims = Auth::user()->claims()->whereIn('status', [-1,0,1])->get();
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $claims = Claim::whereIn('status', [-1,0,1])->get();
        }else{
            $claims = Claim::whereIn('status', [-1,0,1])->where('gestor_id',Auth::id())->get();
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
        /*if (Auth::user()->isGestor() && !session('other_user')) {
            return view('claims.create_step_pre1');
        }*/

        if(Auth::user()->dni && Auth::user()->phone && Auth::user()->cop){

            /* Borrar archivos temporales del usuario */
            $rutatemp = 'public/temporal/debts/'.Auth::user()->id;
            $ficheros = Storage::AllFiles($rutatemp);

            if($ficheros){
                Storage::deleteDirectory($rutatemp);
            }

            // borrar datos session
            session()->forget('other_user');
            session()->forget('claim_client');
            session()->forget('claim_third_party');
            session()->forget('claim_debtor');
            session()->forget('claim_debt');
            session()->forget('debt_step_one');
            session()->forget('debt_step_two');
            session()->forget('debt_step_three');
            session()->forget('claim_agreement');
            session()->forget('type_other');
            session()->forget('documentos');


            return view('claims.create_step_1');
        }
        return redirect('users/'.Auth::id())->with('msj','¡Estás a un paso de decir adiós a las facturas impagadas! Antes de realizar una nueva reclamación, deberás completar tu perfil.');



        /*
        if (!isComplete()) {
            return redirect('users/'.Auth::id())->with('msj','Antes de realizar una nueva reclamación, deberá completar su perfil.');
        }
        return view('claims.create_step_1');
        */

    }

    public function stepTwo()
    {

        return redirect('debtors');

        if(session()->has('claim_client') || (session()->has('claim_third_party') && session()->get('claim_third_party') != 'waiting')){
            return view('claims.create_step_2');
        }

        return redirect('claims/select-client');
    }

    public function stepThree()
    {

        if(session()->has('claim_client') || (session()->has('claim_third_party') && session()->get('claim_third_party') != 'waiting')){
            return view('claims.create_step_3');
        }

        return redirect('claims/select-client');
    }

    public function stepFour()
    {

        if(session()->has('claim_client') || (session()->has('claim_third_party') && session()->get('claim_third_party') != 'waiting')){
            return view('claims.create_step_4');
        }

        return redirect('claims/select-client');
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

            $debt = session('claim_debt');

            if ($debt->fecha_reclamacion_previa) {
                $presc = Carbon::now()->diffInYears(Carbon::parse($debt->fecha_reclamacion_previa));
            }else{
                $presc = Carbon::now()->diffInYears(Carbon::parse($debt->debt_date));
            }

        /* TODO: Borrar debug */
        /*print_r("Claims Controller -> Step six ");echo "<br>";
        var_dump(config('app.deudas')[$debt->type]);echo "<br>";*/




            $deuda = config('app.deudas')[$debt->type];
            $prescribe = null;
            $message = "¡Gracias, ya hemos terminado!";

            /* TODO: Borrar debug */
            /*var_dump($deuda['prescripcion']);
            print_r($deuda['prescripcion']);*/

            if ($presc < $deuda['prescripcion']) {
                $prescribe = 1;
            }
            /* TODO: Borrar debug */
            /*print_r("Evalua prescripción ");echo "<br>";
            print_r($presc);echo " es menor que: "; print_r($deuda['prescripcion']);echo "<br>";
            print_r("Prescribe? ");echo "<br>";
            print_r($prescribe);*/
            //die();

            return view('claims.create_step_6', compact('prescribe','message'));
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
        // $debt = session('claim_debt');

        $claim = new Claim();

        if (Auth::user()->isGestor()) {
            $claim->gestor_id = Auth::id();
        }

        if(session('claim_client')){
            $client = User::find(session('claim_client'));
            $claim->user_id = $client->id;
        }elseif(session('claim_third_party')){

            // dd(session('claim_third_party'));
            $client = ThirdParty::find(session('claim_third_party'));
            $claim->third_parties_id = $client->id;
        }

        /*if (Auth::user()->isGestor()) {
            $claim->owner_id = session('other_user');
        }else{*/
            $claim->owner_id = Auth::user()->id;
        // }
        $debtor = Debtor::find(session('claim_debtor'));
        $claim->debtor_id = $debtor->id;

        $debt = session('claim_debt');
        $debt->debtor_id = $debtor->id;
        $debt->save();
        $claim->debt_id = $debt->id;
        $claim->save();
        $debt->claim_id = $claim->id;
        $debt->document_number = "DVD-".str_pad($claim->id, 4 ,"0", STR_PAD_LEFT);
        $debt->save();

        if(session('claim_agreement')  != 'false'){
            $agreement = session('claim_agreement');
            $agreement->debt_id = $debt->id;
            $agreement->claim_id = $claim->id;
            $agreement->save();
            $debt->agreement = true;
            $debt->agreement_id = $agreement->id;
            $claim->agreement_id = $agreement->id;
        }

        if (Carbon::parse($debt->debt_expiration_date)->diffInYears(Carbon::now()) >= 3) {
            $claim->status = 0;
        }else{

            if (session('type_other')) {
                $claim->status = 0;
            }else{

                $claim->status = 7;
                $claim->claim_type = 2;
/*
                $c = Configuration::first();

                $invoice = new Invoice;
                $invoice->claim_id = $claim->id;
                $invoice->user_id = $claim->user_id;
                $invoice->amount = $c ? $c->fixed_fees : '0';
                $invoice->type = 'fixed_fees';
                $invoice->description = "Pago de tarifa proceso Extrajudicial";
                $invoice->save();
                */
            }
        }


        if (Auth::user()->isGestor()) {
            $claim->status = 8;
        }


        /************* Inicio creacion de documento (Order / Invoice ) ***************/
        if(Auth::user()->isGestor()){
            addDocument('order', $claim->id);
        }else{
            addDocument('invoice',$claim->id);
        }
        /*********** Fin generacion de factura *****************/

        $debt->save();
        $claim->save();

        $path = '/uploads/claims/' . $claim->id . '/documents/';

        foreach (session('documentos') as $key => $d) {

            $bn = basename($d[key($d)]['file']);
            Storage::disk('public')->move($d[key($d)]['file'], $path . $bn);
            $d[key($d)]['file'] = $path . $bn;

            // return gettype(json_encode($d));

            $debtd = new DebtDocument;
            $debtd->debt_id = $debt->id;
            $debtd->document = $path . $bn;
            $debtd->type = key($d);
            $debtd->hitos = json_encode($d);
            $debtd->save();

        }

        $request->session()->forget('other_user');
        $request->session()->forget('claim_client');
        $request->session()->forget('claim_third_party');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('claim_debt');
        $request->session()->forget('debt_step_one');
        $request->session()->forget('debt_step_two');
        $request->session()->forget('debt_step_three');
        $request->session()->forget('claim_agreement');
        $request->session()->forget('type_other');
        $request->session()->forget('documentos');

        if (Auth::user()->isGestor()) {

            actuationActions("-1",$claim->id);

            return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente.');
        }


        //if ($claim->last_invoice){
            return redirect('/claims/payment/' . $claim->id)->with('msj', 'Tu reclamación ha sido creada exitosamente. Para que el equipo de letrados pueda comenzar a trabajar, deberás realizar el pago que encontrarás a continuación');
        //}else{
            // Redirigia al panel y quedaba pendiente viabilidad por parte de administracion
            // return redirect('/panel')->with('msj', 'Reclamación generada exitosamente, será revisado por nuestros Administradores y le llegará una notficación si el mismo procede o no luego de su revisión');
        //}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
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

    public function viable(Claim $claim,$id = null)
    {
        $this->authorize('viewAny', $claim);

        return view('claims.viable', ['claim' => $claim, 'id' => $id]);
    }

    public function nonViable(Claim $claim,$id = null)
    {
        $this->authorize('viewAny', $claim);

        return view('claims.non_viable', ['claim' => $claim, 'id' => $id]);
    }

    public function setViable(Request $request, Claim $claim)
    {
        $this->authorize('viewAny', $claim);

        $this->validateViable();

        $c = Configuration::first();

        if ($request['tipo_viabilidad'] == 1) {
            $amount = $c ? $c->judicial_amount : 0;
            $amounts = $c ? (string)$c->judicial_amount : '0';
            $type = 'judicial_amount';
        }else{
            $amount = $c ? $c->fixed_fees : 0;
            $amounts = $c ? (string)$c->fixed_fees : '0';
            $type = 'fixed_fees';
        }

        if ($request['tipo_viabilidad'] == 1) {
            if ($claim->third_parties_id) {
                if ($claim->representant->type == 1) {
                    if ($claim->debt->pending_amount > 2000) {
                        $amount += $c ? $c->judicial_fees : 0;
                        $type .= '|judicial_fees';
                        $amounts .= '|'.($c ? $c->judicial_fees : 0);
                    }
                }
            }else{
                if ($claim->client->type == 1) {
                    if ($claim->debt->pending_amount > 2000) {
                        $amount += $c ? $c->judicial_fees : 0;
                        $type .= '|judicial_fees';
                        $amounts .= '|'.($c ? $c->judicial_fees : 0);
                    }
                }
            }
        }

        if ($request['tipo_viabilidad'] == 1) {
            if ($claim->owner->apud_acta) {
                if (Auth::user()->isGestor()) {
                    $claim->status = 10;
                }else{
                    $claim->status = 7;
                }
            }else{
                $claim->status = 11;
            }
        }else{
            $claim->status = 7;

        }
        $claim->claim_type = $request['tipo_viabilidad'];
        if($request['observaciones']){
            $claim->viable_observation = $request['observaciones'];
        }
        $claim->save();

        if ($request['tipo_viabilidad'] == 1) {
            actuationActions("2",$claim->id);
        }

        /*$invoice = new Invoice;
        $invoice->claim_id = $claim->id;
        $invoice->user_id = $claim->user_id;
        $invoice->amounts = $amounts;
        $invoice->amount = $amount;
        if ($request['tipo_viabilidad'] == 1) {
            $invoice->description = "Pago de tarifa proceso Judicial";
        }else{
            $invoice->description = "Pago de tarifa proceso Extrajudicial";
        }
        $invoice->type = $type;
        $invoice->save();

        $a = new Actuation;
        $a->claim_id = $claim->id;
        $a->subject = "4";
        $a->amount = null;
        $a->description = null;
        $a->actuation_date = Carbon::now()->format('d-m-Y');
        $a->type = null;
        $a->mailable = null;
        $a->save();*/

        return redirect('claims')->with('msj', 'Reclamación actualizada exitosamente!');

    }


    public function setNonViable(Request $request, Claim $claim)
    {
        $this->authorize('viewAny', $claim);

        $this->validateNonViable();

        $claim->observation = $request['informe_inviabilidad'];
        if ($request->non_viable_judicial) {
            $claim->claim_type = 1;
        }
        $claim->status = 1;
        $claim->save();

        /*if($claim->debt->factura){
            Storage::disk('public')->delete($claim->debt->factura);
            $claim->debt->factura = NULL;
        }
        if($claim->debt->albaran){
            Storage::disk('public')->delete($claim->debt->albaran);
            $claim->debt->albaran = NULL;
        }
        if($claim->debt->contrato){
            Storage::disk('public')->delete($claim->debt->contrato);
            $claim->debt->contrato = NULL;
        }
        if($claim->debt->documentacion_pedido){
            Storage::disk('public')->delete($claim->debt->documentacion_pedido);
            $claim->debt->documentacion_pedido = NULL;
        }
        if($claim->debt->extracto){
            Storage::disk('public')->delete($claim->debt->extracto);
            $claim->debt->extracto = NULL;
        }
        if($claim->debt->reconocimiento_deuda){
            Storage::disk('public')->delete($claim->debt->reconocimiento_deuda);
            $claim->debt->reconocimiento_deuda = NULL;
        }
        if($claim->debt->escritura_notarial){
            Storage::disk('public')->delete($claim->debt->escritura_notarial);
            $claim->debt->escritura_notarial = NULL;
        }
        if($claim->debt->reclamacion_previa){
            Storage::disk('public')->delete($claim->debt->reclamacion_previa);
            $claim->debt->reclamacion_previa = NULL;
            $claim->debt->motivo_reclamacion_previa = NULL;
        }
        if($claim->debt->others){

            $session_docs = explode(',' , $claim->debt->others);


            foreach ($session_docs as $d) {

                Storage::disk('public')->delete($d);
            }

            $claim->debt->others = NULL;
        }

        $claim->debt->save();*/


        return redirect('claims')->with('msj', 'Informe de reclamación generado exitosamente');

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

        /*if (Auth::user()->isGestor()) {
            $request->session()->put('claim_client', session('other_user'));
        }else{*/
            $request->session()->put('claim_client', Auth::id());
        // }

        $this->flushOptionTwo();

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }

    /*public function saveClient(Request $request){

        $request->session()->put('other_user', $request->client_id);

        $this->flushOptionTwo();

        return redirect('/claims/select-client')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }*/

    public function saveOptionTwo(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->put('claim_third_party', $request->id);


        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }

    public function saveDebtor(Request $request){

        $request->session()->put('claim_debtor', $request->id);

        return redirect('debts/create/step-one');

        return redirect('/claims/create-debt')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }

    public function flushOptionOne(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->put('claim_third_party', 'waiting');

        return redirect('/third-parties')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }

    public function flushOptionTwo(){

        request()->session()->forget('claim_third_party');

        // return redirect('/third-parties')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }

    public function invalidDebtor(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->forget('claim_debtor');
        $request->session()->forget('claim_debt');
        $request->session()->forget('debt_step_one');
        $request->session()->forget('debt_step_two');

        return redirect('/panel')->with('alert', 'Lo sentimos este tipo de deudas no podemos reclamarlas a través de Dividae.');
    }

    public function refuseAgreement(){
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two') && session()->has('debt_step_three')){

            $debt = Session('claim_debt');
            $debt->agreement = false;
            Session()->put('claim_debt', $debt);
            Session()->put('claim_agreement', 'false');

            // return redirect('viability');

            return redirect('claims/accept-terms');
        }
    }

    public function viability()
    {
        return view('claims.create_step_5_1');
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
            if($debt->factura_recificativa){
                Storage::disk('public')->delete($debt->factura_rectificativa);
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

    public function validateNonViable(){
        $rules = ['informe_inviabilidad' => 'required'];

        return request()->validate($rules);

    }

    public function validateViable(){
        $rules = [

            'tipo_viabilidad' => 'required',
            // 'observaciones' => 'required',
        ];

        return request()->validate($rules);

    }

    public function payment($id)
    {
        $claim = Claim::find($id);

        /*$c = Configuration::first();
        $amount = 0;

        $amount += $c->fixed_fees;

        $amount += ($claim->debt->pending_amount*$c->percentage_fees)/100;*/

        // $i = Invoice::where(['claim_id'=>$id,'status'=>null])->first();

        if ($claim->last_invoice) {
            $amount = $claim->last_invoice->amount;
        }else{
            return back()->with('err', 'La reclamación no tiene una factura pendiente');
        }

        return view('claims.payment', compact('claim','amount'));
    }

    public function myInvoices()
    {
        if(Auth::user()->isClient()){
            $invoices = Auth::user()->invoices;
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $invoices = Invoice::all();
        }else{
            $invoices = Invoice::whereExists(function($q){
                $q->from('claims')
                  ->whereRaw('claims.id = invoices.claim_id')
                  ->whereRaw('claims.gestor_id = '.Auth::id());
            })->get();
        }

        return view('claims.invoices', compact('invoices'));
    }

    public function myInvoice($id)
    {

        $i = Invoice::find($id);
        $c = Configuration::first();
        $lines = Linvoice::where('invoice_id',$id)->get();
        return view('invoice', compact('c','i','lines'));
    }

    public function actuations($id)
    {
        $actuations = Actuation::where('claim_id',$id)->get();
        $claim = Claim::find($id);
        return view('claims.actuations', compact('actuations','claim'));
    }

    public function myOrders()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $orders = Order::all();
        }
        if(Auth::user()->isGestor()){
            $orders = Order::where('user_id',Auth::user()->id)->get();
        }

        return view('claims.orders', compact('orders'));
    }

    public function myOrder($id)
    {

        $i = Order::find($id);
        $c = Configuration::first();
        $lines = Lorder::where('order_id',$id)->get();
        return view('order', compact('c','i','lines'));
    }

    public function facturar()
    {
        /*$i = Order::find($id);
        $c = Configuration::first();
        $lines = Lorder::where('order_id',$id)->get();
        return view('order', compact('c','i','lines'));*/

        //  Seleccionamos las gestorias que tienen pedidos por facturar
        $gestorias = DB::table('orders')
            ->select(DB::raw('user_id, count(id) as pedidos'))
            ->where('facord',0)
            ->groupBy('user_id')
            ->get();

        if($gestorias->count()){

            foreach ($gestorias as $gestoria){
                print_r($gestoria->user_id);echo '<br>';
                print_r($gestoria);echo '<br>';

                // Buscamos los pedidos de la gestoria en especifico por lineas de detalle
                $orders = DB::table('orders')
                        ->join('lorders', 'orders.id','=','lorders.order_id')
                            ->where('orders.facord',0)
                            ->where('orders.user_id',$gestoria->user_id)
                            ->get();

                dump($orders);
                // Creamos la cabecera de la factura

                // Creamos lineas
                // recorremos las lineas y acumulamos el saldo
                foreach($orders as $lorders){


                }

                // totalizamos las lineas y facturamos

            }


        }else{
            print_r("No hay pedidos para facturar");
        }


        die();
        // Seleccionamos todos los pedidos pendiente de facturar agrupados por gestoria.
        $orders = DB::table('orders')
        ->join('users', 'orders.user_id','=','users.id')
        ->select('orders.user_id', 'users.name', 'users.email','users.phone','users.location',
                  DB::raw('count(orders.id) as pedidos, sum(orders.amount) as total') )
        ->where('orders.facord',0)
        ->groupBy('orders.user_id')
        ->get();


        // se hace la factura con los datos que tiene en el momento de hacerse
        //dcolfa es donde almacenamos el id order que creo la linea.


        // seleccionar lineas de detalle
        // Generar cabecera de factura
        // Generar lineas de detalle, almacenando el documento o la linea que las genero
        // Redirigir a saldo gestorias
    }

    public function byGestoria()
    {
        $orders = DB::table('orders')
                ->join('users', 'orders.user_id','=','users.id')
                ->select('orders.user_id', 'users.name', 'users.email','users.phone','users.location',
                          DB::raw('count(orders.id) as pedidos, sum(orders.amount) as total') )
                ->where('orders.facord',0)
                ->groupBy('orders.user_id')
                ->get();

        return view('claims.gestoria', compact('orders'));
    }


    public function byGestoriaDetail($id)
    {
        //Detalle de pedidos por gestoria
        // usamos la misma vista de orders de funcion myOrder()
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $orders = Order::where('user_id',$id)
                            ->where('facord',0)
                            ->get();
        }
        $usuario = DB::table('users')
                    ->select('users.name')
                    ->where('users.id', $id)
                    ->get();

        $gestoria = $usuario[0]->name;

        return view('claims.orders', compact('orders','gestoria'));
    }

    public function saveActuation(Request $r,$id)
    {
        // $h = getHito($r->subject)[0];
        // return response()->json([$f,$h],422);
        $a = new Actuation;
        $a->claim_id = $id;
        $a->subject = $r->subject;
        $a->amount = $r->amount;
        $a->description = $r->description;
        $a->actuation_date = $r->actuation_date;
        $a->type = null;
        $a->mailable = null;
        $a->save();

        $a->claim->phase = $r->phase;
        $a->claim->save();

        $h = getHito($r->subject)[0];

        if ($h && $h['template_id']) {
            $se = new SendEmail;
            $se->addresse = $a->claim ? $a->claim->owner->email : '';
            $se->template_id = $h['template_id'];
            $se->actuation_id = $a->id;
            $se->save();
        }

        $path = public_path().'/uploads/actuations/' . $a->id . '/documents/';

        if ($r->files) {
            foreach ($r->files as $key => $file) {
                $name = $file[0]->getClientOriginalName();
                $file[0]->move($path,$name);

                $d = new ActuationDocument;
                $d->actuation_id = $a->id;
                $d->document_name = $name;
                $d->save();
            }
        }

        actuationActions($r->subject,$id,$r->amount,$r->actuation_date,$r->description);

    }

    public function close($id)
    {
        $c = Claim::find($id);
        $c->status = -1;
        $c->save();

        return redirect('claims')->with('msj', 'La reclamación ha sido finalizada');
    }

    public function uploadApudActa(Request $r)
    {
        $c = Claim::find($r->id);

        $path = public_path().'/uploads/users/' . $c->owner->id . '/apud/';

        if ($r->file) {
            $name = $r->file->getClientOriginalName();
            $r->file->move($path,$name);
            $c->owner->apud_acta = $name;

            if ($c->last_invoice) {
                $c->status = 7;

                $a = Actuation::where('claim_id',$c->id)->where('subject',"302")->first();
                if ($a) {
                    $a->delete();
                }

                $a = new Actuation;
                $a->claim_id = $c->id;
                $a->subject = "302";
                $a->amount = null;
                $a->description = null;
                $a->actuation_date = Carbon::now()->format('d-m-Y');
                $a->type = null;
                $a->mailable = null;
                $a->save();

            }else{
                $c->status = 10;

                actuationActions("302",$c->id);
            }
            $c->save();
            $c->owner->save();
        }

        return back()->with('msj', 'Se ha subido el archivo!');
    }

    public function exportAll()
    {
        return Excel::download(new ClaimsExport(0), 'all_claims-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
    }

    public function exportFinished()
    {
        return Excel::download(new ClaimsExport(1), 'claims_finished-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
    }

    public function excelInvoice($id)
    {
        return Excel::download(new InvoiceExport($id), 'invoice-id_'.$id.'-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function invoicesExport()
    {
        return Excel::download(new InvoicesExport, 'invoices-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function ordersExport()
    {
        return Excel::download(new OrdersExport, 'orders-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function checkDebtor(Request $r)
    {
        /*
        print_r("checkDebtor ");
        var_dump($r->options); //Deuda no reclamable //null
        print_r("concurso ");
        var_dump($r->concurso); //Concurso de acreedores //string(1)
        print_r("Selector ");
        var_dump($r->tipo_deuda); //Selector  string(11)
        var_dump(session('tipo_deuda'));  //string(11)
        print_r("checkDebtor ");echo "<br>";
        dump($r->tipo_deuda);
        print_r("No viable ");echo "<br>";
        dump($r->no_viable);
        die();*/

        if ($r->concurso == 1 || $r->tipo_deuda >= 12) {

            $r->session()->forget('claim_client');
            $r->session()->forget('claim_debtor');
            $r->session()->forget('claim_debt');
            $r->session()->forget('debt_step_one');
            $r->session()->forget('debt_step_two');

            return redirect('claims/invalid-debtor');

        }

        if ($r->concurso == 0 && $r->tipo_deuda == 11 ) {

            return redirect('/panel')->with('alert', 'Lo sentimos, dadas las características de tu deuda no podemos tramitarla.
            Nos pondremos en contacto contigo para ampliarte información y poder ofrecerte alternativas');
        }

        // Almacenamos eleccion
        session()->put('tipo_deuda',$r->tipo_deuda);//, $request->tipo_deuda
        session()->put('deuda_extra',$r->deuda_extra);//, $request->tipo_deuda
        /*
        var_dump(session('tipo_deuda'));
        var_dump(session('deuda_extra'));
        */
        return redirect('claims/select-debtor');
    }

    public function loadActuations($phase)
    {
        $fase = config('app.phases')[$phase];

        return view('claims.hitos', compact('fase'));
    }

    public function importActuations(Request $r)
    {
        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','actuations.xlsx');
            Excel::import(new HitosImport, public_path().'/uploads/excel/actuations.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel!');
    }

    public function addCountEmail($id)
    {
        $se = SendEmail::find($id);

        $se->views += 1;
        $se->save();
    }

    public function sendEmailClient($se)
    {
        $o = User::where('email',$se->addresse)->first();

        if (($se->hito()->send_times > $se->send_count && $se->updated_at->diffInMinutes(Carbon::now()) >= ($se->hito()->send_interval ? $se->hito()->send_interval : 8)) ||
            ($se->hito()->send_times > $se->send_count && !$se->hito()->send_interval)) {

            $tmp = $se->template;
            Mail::send('email_base', ['se' => $se], function ($message) use($tmp, $o) {
                $message->to($o->email, $o->name);
                $message->subject($tmp->title);
            });

            $se->send_count += 1;
            $se->save();

        }else{
            if ($se->updated_at->diffInMinutes(Carbon::now()) >= ($se->hito()->send_interval ? $se->hito()->send_interval : 8) || !$se->hito()->send_interval) {
                $se->send_status = 1; // esto es para detener el envio
                $se->save();
            }else{
                echo 'aun no pasa el tiempo-'.$se->id;
            }
        }
    }

    public function sendEmailsCron()
    {
        $ses = SendEmail::whereNull('send_status')->whereNull('views')->get();

        foreach ($ses as $key => $se) {
            $this->sendEmailClient($se);
        }

        return "Ok";
    }


    public function saveDiscount(Request $r)
    {
        $d = new Discount;
        $d->amount = $r->amount;
        $d->claim_id = $r->claim_id;
        $d->gestor_id = Auth::id();
        $d->save();

        return back()->with('msj','Se ha guardado el descuento del importe pagado');
    }


    public function info($id)
    {



        //$infopago = config('app.infopago'); // Mensajes personalizados para mostrar al cliente
        list($infopago, $titulo, $hito, $msg, $concepto, $importe) = array(config('app.infopago'), "","","","","");

        /* Comprobar si existe la reclamacion */
        $claim = Claim::where('id',$id)
                                ->get();
        if($claim->isEmpty()){
            return redirect('/')->with('msg', 'La reclamacion '.$id.' no existe');
        }

        /* Comprobar si la factura existente esta pendiente de pago */
        /* Comprobar las actuaciones que generan la factura pendiente de pago */
        /* Recuperar si existe factura pendiente de pago, recuperaremos conceptos y enviamos enlace de pago */
        $invoice = Invoice::where('claim_id',$id)
                                    ->orderBy('id','desc')
                                    ->take(1)
                                    ->get();

        if($invoice->isNotEmpty()){
            /* $invoice[0]->status = 1 pagada, null pendiente de pago*/

            if($invoice[0]->status == null){
                /* Recuperar si el ultimo hito corresponde al 301 o 302 recuperar el que lo genero app.infopago */
                $actuaciones = Actuation::where('claim_id',$id)
                                     ->orderBy('id', 'desc')
                                     ->get();

                /* Tiene actuaciones la factura, sino tiene es extrajudicial */
                if($actuaciones->isEmpty()){

                    /* Deberiamos recuperar las lineas de detalle ? */
                    $linvoice = Linvoice::where('invoice_id',$invoice[0]->id)
                                        ->get();


                    /* Prevenimos error Linvoice */
                    if($linvoice->isEmpty()){
                        $titulo = 'Error al leer lineas de detalle';
                        return view('info-public', compact('hito', 'titulo','msg','concepto','importe', 'id'));
                    }else{
                        $titulo = 'Procedimiento extrajudicial';
                        $concepto = $linvoice[0]->deslin;
                        $importe = $linvoice[0]->prelin;

                    }

                    return view('info-public', compact('hito', 'titulo','msg','concepto','importe', 'id'));
                }


                /* El array viene en orden DESC */
                foreach($actuaciones as $key => $value ){

                    // Comparamos si esta en estado 302
                    if($value->getRawOriginal('subject')=='302' || $value->getRawOriginal('subject')=='301'){
                        continue;
                    }

                    /*dump($key);
                    dump($value->getRawOriginal('subject'));
                    dump($value->subject);
                    dump($infopago);*/
                    $hito = $value->getRawOriginal('subject');
                    $msg = "Concepto desde hito";

                    break;

                }  // Foreach

            }else{
                return redirect('/')->with('msg', 'La reclamación no tiene una factura pendiente de pago');
            }
        }else{
            return redirect('/')->with('msg', 'La reclamación no tiene actuaciones');
        }


            /*Testeado*/

        foreach($infopago as $key => $value){
            if($value["hito"]==$hito){
                $hito = $value["hito"];
                $titulo = $value["titulo"];
                $msg = $value["msg"];
                $concepto = $value["concepto"];
                $importe = $value["importe"];
            }
        }

        // Id de factura
        //$id = $invoice[0]->id;
        /*dump($id);
        dump($hito);
        dump($titulo); //
        dump($msg);
        dump($concepto);
        dump($importe);*/

        //die();
      /* Necesitamos enviar recuperar importes y conceptos desde BD*/
/*
        $c = Configuration::first();
        dump($c);
        dump($c->judicial_amount);*/

        /*dump($c->judicial_amount);
        $importe = ($c->judicial_amount / (($c->tax/100)+1));
        dump($importe);
        $importe=number_format($importe, 2,',','.');
        dump($importe);*/

        return view('info-public', compact('hito', 'titulo','msg','concepto','importe','id'));

    }

}
