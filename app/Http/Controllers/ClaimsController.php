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
use App\Exports\CollectsExport;

use App\Imports\ActuationsImport;
use App\Models\Linvoice;
use App\Models\Order;
use App\Models\Lorder;
use App\Models\Collect;

use App\Imports\CollectsKmaleonImport;
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
        if(Auth::user()->isClient() || Auth::user()->isAssociate()){
            $claims = Auth::user()->claims()->whereNotIn('status',[-1,0,1])->get();

        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance()){
            //$claims = Claim::all();
            $claims=Claim::whereNotIn('status',[-1,0,1])->get();
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
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance()){
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
    public function create(){
        return view('claims.create');
    }

    public function stepOne(){

        return view('claims.create_step_1');

    }

    public function selectType(){

        if(Auth::user()->dni && Auth::user()->phone && Auth::user()->cop){

            /* Borrar archivos temporales del usuario */
            $rutatemp = 'public/temporal/debts/'.Auth::user()->id;
            $ficheros = Storage::AllFiles($rutatemp);

            if($ficheros){
                Storage::deleteDirectory($rutatemp);
            }

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
            session()->forget('type_claim');


            //return view('claims.create_step_1');
            return view('claims.select_type');
        }
        return redirect('users/'.Auth::id())->with('msj','¡Estás a un paso de decir adiós a las facturas impagadas! Antes de realizar una nueva reclamación, deberás completar tu perfil.');


    }

    public function stepTwo(){

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

            $deuda = config('app.deudas')[$debt->type];
            $prescribe = null;
            $message = "¡Gracias, ya hemos terminado!";

            if ($presc < $deuda['prescripcion']) {
                $prescribe = 1;
            }

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
        $claim = new Claim();
        $tasa = 0;

        if (Auth::user()->isGestor()) {
            $claim->gestor_id = Auth::id();
        }

        if(session('claim_client')){
            $client = User::find(session('claim_client'));
            $claim->user_id = $client->id;
        }elseif(session('claim_third_party')){
            $client = ThirdParty::find(session('claim_third_party'));
            $claim->third_parties_id = $client->id;
        }

            $claim->owner_id = Auth::user()->id;

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
            }
        }

        /************* Inicio creacion de documento (Order / Invoice ) ***************/

            if(session('type_claim')==1){
                $claim->claim_type = 1;

                /* Gestion de tasas */
                if ($claim->third_parties_id) {
                    if ($claim->representant->type == 1) {
                        if ($claim->debt->pending_amount > 2000) {
                            $tasa = 1;
                        }
                    }
                }else{
                    if ($claim->client->type == 1) {
                        if ($claim->debt->pending_amount > 2000) {
                            $tasa = 1;
                        }
                    }
                }

                //addDocument('invoice',$claim->id, 'JUD-001',$tasa);
                // La actuacion añade la factura
                if(Auth::user()->isGestor()){

                    actuationActions("30018",$claim->id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Pedido completado con exito");
                }
                actuationActions("30038",$claim->id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Solicitud directa de reclamación Judicial");

            }else{

                $claim->claim_type = 2;
                // add order
                if(Auth::user()->isGestor()){
                    $claim->status = 8;
                    addDocument('order', $claim->id, 'EXT-001',$tasa);
                }else{
                    $claim->status = 7;
                    addDocument('invoice',$claim->id, 'EXT-001',$tasa);
                }


            }

        /*********** Fin generacion de factura *****************/

        $debt->save();
        $claim->save();

        $path = '/uploads/claims/' . $claim->id . '/documents/';
        $pathStorage = '/storage/uploads/claims/' . $claim->id . '/documents/';

        foreach (session('documentos') as $key => $d) {

            $bn = basename($d[key($d)]['file']);
            Storage::disk('public')->move($d[key($d)]['file'], $path . $bn);
            $d[key($d)]['file'] = $pathStorage . $bn;

            $debtd = new DebtDocument;
            $debtd->debt_id = $debt->id;
            $debtd->document = $pathStorage . $bn;
            $debtd->type = key($d);
            $debtd->hitos = json_encode($d);
            $debtd->save();
        }



        addNotification('Nueva reclamación', 'Nueva reclamación registrada en Dividae', $claim->id,0);

        if(isset(Auth::user()->referenced)&& Auth::user()->referenced=='FEDETO'){
            Auth::user()->campaign = '33' . rand(10000,99999);
            //Auth::user()->discount = 100;
            Auth::user()->save();

            addNotification('Nueva participación sorteo', 'Nueva participacion FEDETO asignada', $claim->id,Auth::user()->id);
        }


        if (Auth::user()->isGestor()) {

            if(session('type_claim')==2){

                actuationActions("-1",$claim->id);
                return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente.');
            }

            if($claim->user_id){
                if(!isset($claim->client->apud_acta)){
                    return redirect('claims/'.$claim->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta, para poder continuar');
                }else{
                    return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente.');
                }
            }else{
                if(!isset($claim->representant->apud_acta)){
                    return redirect('claims/'.$claim->id)->with('msj_apud', 'Hemos detectado que te falta el Apud Acta del representante, para poder continuar');
                }else{
                    return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente.');
                }
            }
        }


        /* Enviamos el cobro a Wannme*/
        $control = randomchar();
        $response = addPayment($claim, $debt, $control);


        if($response['statusCode']==1){

            $claim->last_invoice->payurlfac = $response['url'];
            $claim->last_invoice->ctrlfac = $control;
            $claim->last_invoice->save();

            if(file_exists('testing/wannme.txt')){
                $file = fopen('testing/wannme.log', 'a');
                fwrite($file, date("d/m/Y H:i:s").'-'.'Grabamos URL en factura: '.$claim->last_invoice->id.PHP_EOL);
                fwrite($file, date("d/m/Y H:i:s").'-'.'------------------------------------ '.PHP_EOL);
                fclose($file);
            }
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
        $request->session()->forget('type_claim');

        if(isset($response['statusCode'])){

            if($response['statusCode']==1){
                return redirect($response['url']);
            }else{

                return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente');
            }

        }else{
            return redirect('claims')->with('msj', 'Tu reclamación ha sido creada exitosamente.');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        if(Auth::user() <> null){
            if($claim->owner_id == Auth::user()->id || Auth::user()->isSuperAdmin() ||Auth::user()->isAdmin() ||Auth::user()->isFinance() ){
                $dias = Carbon::now()->diffInDays(Carbon::parse($claim->created_at));
                return view('claims.show', ['claim' => $claim, 'dias'=>$dias]);
            }else{
                return redirect('panel');
            }
        }else{
            return redirect('login');
        }
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {

    }


    public function saveTypeClaim(Request $request){
        $request->session()->put('type_claim', $request->id);

    return redirect('/claims/select-client')->with('msj', 'Se ha seleccionado el tipo de reclamación ');

    }

    public function saveOptionOne(Request $request){
            $request->session()->put('claim_client', Auth::id());


        $this->flushOptionTwo();

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu respuesta correctamente');

    }


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
        ];

        return request()->validate($rules);

    }

    public function payment($id)
    {
        $claim = Claim::find($id);

        if ($claim->last_invoice) {
            $amount = $claim->last_invoice->amount;
        }else{
            return back()->with('err', 'La reclamación no tiene una factura pendiente');
        }

        return view('claims.payment', compact('claim','amount'));
    }

    public function myInvoices()
    {

        if(Auth::user()->isClient() || Auth::user()->isAssociate() ||Auth::user()->isGestor()){
            $invoices = Auth::user()->invoices;
        }elseif(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance()){
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

    public function myInvoicesRectify()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance()){
            $invoices = Invoice::where('tipfac', 'LIKE','REC%')
                        ->get();
        }

        return view('claims.invoices_rectify', compact('invoices'));
    }

    public function myInvoice($tipfac, $id)
    {
        //$i = Invoice::find($id);
        $i = Invoice::where('id', '=', $id)
                    ->where('tipfac','=',$tipfac)
                    ->first();
        $c = Configuration::first();
        $lines = Linvoice::where('invoice_id','=',$id)
                            ->where('tiplin', '=',$tipfac)
                            ->get();
        if(Auth::user()->id == $i->user_id ||Auth::user()->isSuperAdmin()||Auth::user()->isAdmin()|| Auth::user()->isFinance()){
            return view('invoice', compact('c','i','lines'));
        }else{
            print_r("Acceso no permitido al documento solicitado");
        }

    }

    public function myInvoiceRectify($id)
    {
        $i = Invoice::where('id', '=', $id)
                    ->where('tipfac','LIKE','REC%')
                    ->first();
        $c = Configuration::first();

        $lines = Linvoice::where('invoice_id','=',$id)
                            ->where('tiplin', 'LIKE','REC%')
                            ->get();

        return view('invoice', compact('c','i','lines'));
    }

    public function actuations($id)
    {
        $actuations = Actuation::where('claim_id',$id)
            ->orderBy('id', 'desc')
            ->get();
        $claim = Claim::find($id);
        return view('claims.actuations', compact('actuations','claim'));
    }

    public function myOrders()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance()){
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
        $gestorias = DB::table('orders')
            ->select(DB::raw('user_id, count(id) as pedidos'))
            ->where('facord',0)
            ->groupBy('user_id')
            ->get();
        $pedidos = DB::table('orders')
                ->where('facord',0)
                ->get();

        if($gestorias->count()){

            foreach ($gestorias as $gestoria){

                addDocument('invoice',0, 'mensual',0, $gestoria->user_id);
            }
            foreach ($pedidos as $pedido){
                $order = Order::find($pedido->id);
                $order->facord = 1;
                $order->save();
            }

        }else{
            print_r("No hay pedidos para facturar");
        }

        return $this->myInvoices();
    }

    public function byGestoria()
    {
            $orders = DB::table('orders')
            ->join('users', 'orders.user_id','=','users.id')
            ->select('orders.user_id', 'users.name', 'users.email','users.phone','users.location',
                      DB::raw('count(orders.id) as pedidos, sum(orders.amount) as total') )
            ->where('orders.facord',0)
            ->groupBy('orders.user_id','users.name', 'users.email','users.phone','users.location')
            ->get();

        return view('claims.gestoria', compact('orders'));
    }


    public function byGestoriaDetail($id, $invoiceId = 0)
    {
        if($invoiceId==0){
            $orders = Order::where('user_id',$id)
                ->where('facord',0)
                ->get();
        }else{
            $orders = DB::table('orders')
                ->join('lorders', 'orders.id','=','lorders.order_id')
                ->where('lorders.dcolor',$invoiceId)
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

        $a = new Actuation;
        $a->claim_id = $id;
        $a->amount = $r->amount;
        $a->description = $r->description;


        if($r->subject == null){

            /* Buscamos el debt_id */
            $claim = Claim::find($id);
            $a->subject = 30049;
            $a->actuation_date = date('Y-m-d H:i:s');
            $a->type = null;
            $a->mailable = null;
            $a->save();
            $a->claim->save();

            $path = public_path().'/uploads/actuations/' . $a->id . '/documents/';
            $pathStorage = '/uploads/actuations/' . $a->id . '/documents/';

            /* V1 Si hay ficheros adjuntos se inserta url en debt_document y en actuation_document */
            if ($r->files) {
                foreach ($r->files as $key => $value) {
                    $name = $value[0]->getClientOriginalName();
                    $value[0]->move($path,$name);

                    $debtd = new DebtDocument;
                    $debtd->debt_id = $claim->debt_id;
                    $debtd->document = $pathStorage . $name;
                    $debtd->type = 'otros';
                    $debtd->hitos = json_encode(array("otros"=> array("file"=>$pathStorage.$name,"fecha_otros"=>date('Y-m-d'))));
                    $debtd->save();

                    $d = new ActuationDocument;
                    $d->actuation_id = $a->id;
                    $d->document_name = $name;
                    $d->save();
                }
            }

            addNotification('Mensaje recibido de cliente', $r->description, $id, 0);

            return redirect('claims/'.$id)->with('msj','Se ha añadido la actuación');

        }else{
            $a->subject = $r->subject;
            $a->actuation_date = date('Y-m-d H:i:s', strtotime($r->actuation_date));
            $a->type = null;
            $a->mailable = null;
            $a->save();
            $a->claim->phase = $r->phase;
            $a->claim->save();
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
        }

        actuationActions($r->subject,$id,$r->amount,$r->actuation_date,$r->description, $a->id);

    }

    public function close($id)
    {
        $c = Claim::find($id);
        $c->status = -1;
        $c->save();

        switch(Auth::user()->role){
            case 0:
            case 1:
                $usuario = "Equipo Dividae #".Auth::user()->id;
                break;
            case 2:
                $usuario = "Cliente #".Auth::user()->id;
                break;
            case 3:
                $usuario = "Gestoría #".Auth::user()->id;
                break;
            case 4:
                $usuario = "Asociado #".Auth::user()->id;
                break;
            case 5:
                $usuario = "Financiero #".Auth::user()->id;
                break;
        }

        actuationActions(30033,$id, 0, now(), "Finalizada por ".$usuario);

        return redirect('claims')->with('msj', 'La reclamación ha sido finalizada');
    }

    public function uploadApudActa(Request $request)
    {
        if ($request->file) {
            $claim = Claim::find($request->id);

            if($claim->user_id){
                $path = public_path().'/uploads/users/' . $claim->owner->id . '/apud_acta/';
                $path = $request->file->store('uploads/users/' . $claim->owner->id . '/apud_acta', 'public');
                $claim->owner->update(['apud_acta' => $path]);
                $claim->owner->pending();
            }else{
                $path = public_path().'/uploads/third-parties/' . $claim->representant->id . '/apud_acta/';
                $path = $request->file->store('uploads/third-parties/' . $claim->representant->id . '/apud_acta', 'public');
                $claim->representant->apud_acta = $path;
                $claim->representant->pending();
            }

            if ($claim->last_invoice && !$claim->gestor_id) {  // last_invoice = factura pendiente de pago
                $claim->status = 7;

                $actuation = Actuation::where('claim_id',$claim->id)->where('subject',"30017")->first();
                if ($actuation) {
                    $actuation->delete();
                }

                $actuation = new Actuation;
                $actuation->claim_id = $claim->id;
                $actuation->subject = "30017";
                $actuation->amount = null;
                $actuation->description = "Apud acta subido, factura pendiente de pago";
                $actuation->actuation_date = Carbon::now()->format('Y-m-d H:i:s');
                $actuation->type = null;
                $actuation->mailable = null;
                $actuation->save();

            }else{
                $claim->status = 10;
                $actuation = new Actuation;
                $actuation->claim_id = $claim->id;
                $actuation->subject = "30035";
                $actuation->amount = null;
                $actuation->description = "Continua con reclamación judicial";
                $actuation->actuation_date = Carbon::now()->format('Y-m-d H:i:s');
                $actuation->type = null;
                $actuation->mailable = null;
                $actuation->save();
                //actuationActions("30035",$claim->id);
            }
            $claim->save();
            $claim->owner->save();

            addNotification('Apud acta subido','Se ha subido el Apud Acta correctamente',$claim->id,0 );

            return back()->with('msj', 'Se ha subido el archivo!');
        }else{
            return back()->with('msj', 'No se ha podido subir el archivo!');
        }


    }

    public function exportAll()
    {
        return Excel::download(new ClaimsExport(0), 'all_claims-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
    }

    public function exportNewClaims()
    {
        return Excel::download(new ClaimsExport(2), 'new_claims-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
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
        return Excel::download(new InvoicesExport(0), 'invoices-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function invoicesExportAll()
    {
        return Excel::download(new InvoicesExport(1), 'all-invoices-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function invoicesRectifyExportAll()
    {
        return Excel::download(new InvoicesExport(5), 'all-invoices-rectify'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }


    public function invoicesExportConta()
    {
        return Excel::download(new InvoicesExport(3), 'invoices-conta-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function invoicesExportAllConta()
    {
        return Excel::download(new InvoicesExport(4), 'all-invoices-conta-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function ordersExport()
    {
        return Excel::download(new OrdersExport, 'orders-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function collectsExport()
    {
        return Excel::download(new CollectsExport(0), 'collects-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function collectsExportAll()
    {
        return Excel::download(new CollectsExport(1), 'collects-all-'.Carbon::now()->format('d-m-Y_h_i').'.xlsx');
    }

    public function checkDebtor(Request $r)
    {
        if ($r->concurso == 1 || $r->tipo_deuda >= 12) {

            $r->session()->forget('claim_client');
            $r->session()->forget('claim_debtor');
            $r->session()->forget('claim_debt');
            $r->session()->forget('debt_step_one');
            $r->session()->forget('debt_step_two');

            return redirect('claims/invalid-debtor');

        }

        if ($r->concurso == 0 && $r->tipo_deuda == 12 ) {

            return redirect('/panel')->with('alert', 'Lo sentimos, dadas las características de tu deuda no podemos tramitarla.
            Nos pondremos en contacto contigo para ampliarte información y poder ofrecerte alternativas');
        }

        // Almacenamos eleccion
        session()->put('tipo_deuda',$r->tipo_deuda);
        session()->put('deuda_extra',$r->deuda_extra);

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
            if(file_exists(public_path().'/logImportHitosXls.log')){
                unlink(public_path().'/logImportHitosXls.log');
            }

            Excel::import(new ActuationsImport, public_path().'/uploads/excel/actuations.xlsx');
        }

        if(file_exists(public_path().'/logImportHitosXls.log')){
            list($i, $claimsTxt) = array(0,'');
            $logFile = fopen(public_path().'/logImportHitosXls.log','r');
            while(!feof($logFile)){

                        $i = $i+1;
                        $claimsTxt = $claimsTxt.fgets($logFile).'   ';
                }
                fclose($logFile);
        }

        return back()->with(['msj'=>'Se ha cargado correctamente el archivo excel!',
                            'total_actuaciones'=>$i-1,
                            'id_claims'=>$claimsTxt]);
    }

    public function importCollectsKmaleon(Request $r)
    {
        if ($r->hasFile('file')) {
            $r->file->move(public_path().'/uploads/excel','collectskmaleon.xlsx');
            Excel::import(new CollectsKmaleonImport, public_path().'/uploads/excel/collectskmaleon.xlsx');
        }

        return back()->with('msj','Se ha cargado correctamente el archivo excel de cobros de Kmaleon!');
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
        list($infopago, $titulo, $msg, $conceptos, $importes) = array(config('app.infopago'), "","",array(),array());

        $claim = Claim::find($id);

        if(isset($claim)){
            if($claim->status==12){
                foreach($infopago as $key => $value){
                    if($value['hito']==$claim->getIdHito()){
                        $titulo = $value['titulo'];
                        $msg = $value['msg'];
                    }
                }

                return view('info-public', compact('titulo','msg', 'id', 'claim'));
            }

            if($claim->gestor_id){

                if($claim->status == 10){
                    $titulo=$claim->getStatus();
                    $msg="La reclamación esta en fase judicial.";
                }
                return view('info-public', compact('titulo','msg', 'id', 'claim'));
            }else{

                $invoice = Invoice::where('claim_id',$id)
                            ->where('status','=',NULL)
                            ->orderBy('id','desc')
                            ->get();

                if(count($invoice)){

                    $Linvoices = Linvoice::where('invoice_id',$invoice[0]->id)
                                    ->get();

                    if(count($Linvoices)){
                        $extrajudicial = false;
                        foreach($Linvoices as $key => $LInvoice){
                            if($LInvoice->artlin=='EXT-001'){
                                $extrajudicial = true;
                                $titulo = 'Procedimiento extrajudicial';
                            }
                            $conceptos[$key] = $Linvoices[$key]->deslin;
                            $importes[$key] = $Linvoices[$key]->prelin;
                            $descuentos[$key] = $Linvoices[$key]->dtolin;
                            $ivas[$key] = $Linvoices[$key]->ivalin;
                            $totales[$key] = $Linvoices[$key]->totlin;
                        }

                        if($extrajudicial==true){
                            return view('info-public', compact('titulo','msg','conceptos','importes', 'descuentos','ivas','totales', 'id', 'invoice','claim'));
                        }else{

                            foreach($infopago as $key => $value){
                                if($value['hito']==$LInvoice->hitlin && $value['articulo']==$LInvoice->artlin){
                                    $titulo = $value['titulo'];
                                    $msg = $value['msg'];
                                }
                            }
                            return view('info-public', compact('titulo','msg','conceptos','importes', 'descuentos','ivas','totales', 'id', 'invoice','claim'));
                        }
                    }else{
                        $titulo = 'Error al leer lineas de detalle';
                        return view('info-public', compact('titulo','msg','conceptos','importes', 'id','claim'));
                    }
                }else{
                    return redirect('/')->with('msg', 'La reclamación no tiene una factura pendiente de pago');
                }
            }
        }else{
            return redirect('/')->with('msg', 'No existe la reclamación');
        }
    }

    public function continue($claim_id)
    {
        $claim = Claim::find($claim_id);

        switch($claim->getHitoSell()){
            case "30015":
                actuationActions("30038",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30019":
                actuationActions("30039",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30020":
                actuationActions("30040",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30021":
                actuationActions("30041",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "20015":
                actuationActions("30042",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "20016":
                actuationActions("30043",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30025":
                actuationActions("30044",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30026":
                actuationActions("30045",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30030":
                actuationActions("30046",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            case "30023":
                actuationActions("30047",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;

            default:
                    actuationActions("30038",$claim_id, 0, Carbon::now()->format('Y-m-d H:i:s'), "Aceptación por parte del usuario");
                break;
        }

        addNotification('Continuar con la reclamación', 'Cliente acepta continuar con la reclamación', $claim_id,0);

        return redirect('info/'.$claim_id)->with('msj', 'Continuamos con la reclamación');
    }

}
