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
use Illuminate\Http\Request;
use Auth;
use Storage;
use Carbon\Carbon;

use Excel;
use Mail;

use App\Exports\ClaimsExport;
use App\Exports\InvoiceExport;
use App\Exports\InvoicesExport;

use App\Imports\HitosImport;

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

        if (!isComplete()) {
            return redirect('users/'.Auth::id())->with('msj','Antes de realizar una nueva reclamación, deberá completar su perfil.');
        }
        return view('claims.create_step_1');
        

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

            $deuda = config('app.deudas')[$debt->type];
            $prescribe = null;
            $message = "¡GRACIAS, YA CASI HEMOS TERMINADO!";

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
        // dd(session('claim_client'), session('claim_debtor'), session('claim_debt'), session('claim_agreement'));
        // $debt = session('claim_debt');

        $claim = new Claim();

        if(session('claim_client')){
            $client = User::find(session('claim_client'));
            $claim->user_id = $client->id;
        }elseif(session('claim_third_party')){

            // dd(session('claim_third_party'));
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
        $debt->document_number = "DIV-".str_pad($claim->id, 4 ,"0", STR_PAD_LEFT);
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

                $c = Configuration::first();

                $invoice = new Invoice;
                $invoice->claim_id = $claim->id;
                $invoice->user_id = $claim->user_id;
                $invoice->amount = $c ? $c->fixed_fees : '0';
                $invoice->type = 'fixed_fees';
                $invoice->description = "Pago de tarifa proceso Extrajudicial";
                $invoice->save();
            }
        }
        $debt->save();
        $claim->save();

        /*$a = new Actuation;
        $a->claim_id = $claim->id;
        $a->subject = "001";
        $a->amount = null;
        $a->description = "Inicio del proceso extrajudicial";
        $a->actuation_date = Carbon::now()->format('d-m-Y');
        $a->type = null;
        $a->mailable = null;
        $a->save();*/

        $path = '/uploads/claims/' . $claim->id . '/documents/';

        foreach (session('documentos') as $key => $d) {
            
            // $file = $request->file(key($d))->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            // $documentos[$key][key($d)]['file'] = $file;

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
        /*if($debt->factura){
            $factura = basename($debt->factura);
            Storage::disk('public')->move($debt->factura, $path . $factura);
            $debt->factura = $path . $factura;
        }
        if($debt->albaran){
            $albaran = basename($debt->albaran);
            Storage::disk('public')->move($debt->albaran, $path . $albaran);
            $debt->albaran = $path . $albaran;
        }
        if($debt->contrato){
            $contrato = basename($debt->contrato);
            Storage::disk('public')->move($debt->contrato, $path . $contrato);
            $debt->contrato = $path . $contrato;
        }
        if($debt->documentacion_pedido){
            $documentacion_pedido = basename($debt->documentacion_pedido);
            Storage::disk('public')->move($debt->documentacion_pedido, $path . $documentacion_pedido);
            $debt->documentacion_pedido = $path . $documentacion_pedido;
        }
        if($debt->extracto){
            $extracto = basename($debt->extracto);
            Storage::disk('public')->move($debt->extracto, $path . $extracto);
            $debt->extracto = $path . $extracto;
        }
        if($debt->reconocimiento_deuda){
            $reconocimiento_deuda = basename($debt->reconocimiento_deuda);
            Storage::disk('public')->move($debt->reconocimiento_deuda, $path . $reconocimiento_deuda);
            $debt->reconocimiento_deuda = $path . $reconocimiento_deuda;
        }
        if($debt->escritura_notarial){
            $escritura_notarial = basename($debt->escritura_notarial);
            Storage::disk('public')->move($debt->escritura_notarial, $path . $escritura_notarial);
            $debt->escritura_notarial = $path . $escritura_notarial;
        }

        if($debt->reclamacion_previa){

            $reclamacion_previa = basename($debt->reclamacion_previa);
            Storage::disk('public')->move($debt->reclamacion_previa, $path . $reclamacion_previa);
            $debt->reclamacion_previa = $path . $reclamacion_previa;

        }

        if($debt->others){

            $session_docs = explode(',' , $debt->others);

            $docs = [];

            foreach ($session_docs as $d) {

                $docs[] = $path . basename($d);
                Storage::disk('public')->move($d, $path . basename($d));

            }
            $debt->others = implode(',', $docs);
        }

        $debt->save();*/

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

        if ($claim->last_invoice){
            return redirect('/claims/payment/' . $claim->id)->with('msj', 'Reclamación creada exitosamente, se ha generado una factura por honorarios, deberá realizar el pago correspondiente para poder proceder con la reclamación');
        }else{
            return redirect('/panel')->with('msj', 'Reclamación generada exitosamente, será revisado por nuestros Administradores y le llegará una notficación si el mismo procede o no luego de su revisión');
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
        $this->authorize('view', $claim);


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
                $claim->status = 7;
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

        return redirect('claims')->with('msj', 'Reclamación actualziada exitosamente!');
      
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
        

        return redirect('claims')->with('msj', 'Informe de Reclamación generado exitosamente');
      
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

        $request->session()->put('claim_client', Auth()->user()->id);

        $this->flushOptionTwo();

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveOptionTwo(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->put('claim_third_party', $request->id);
        

        return redirect('/claims/check-debtor')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function saveDebtor(Request $request){

        $request->session()->put('claim_debtor', $request->id);

        return redirect('debts/create/step-one');

        return redirect('/claims/create-debt')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionOne(Request $request){

        $request->session()->forget('claim_client');
        $request->session()->put('claim_third_party', 'waiting');

        return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

    }

    public function flushOptionTwo(){

        request()->session()->forget('claim_third_party');

        // return redirect('/third-parties')->with('msj', 'Se ha guardado tu elección temporalmente');

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
        }

        return view('claims.invoices', compact('invoices'));
    }
    public function myInvoice($id)
    {
        $i = Invoice::find($id);
        $c = Configuration::first();

        return view('invoice', compact('c','i'));
    }

    public function actuations($id)
    {
        $actuations = Actuation::where('claim_id',$id)->get();
        $claim = Claim::find($id);
        return view('claims.actuations', compact('actuations','claim'));
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

        /*
        if ($a->mailable) {
            Mail::send('email_to_client', ['a' => $a], function ($message) {            
                $message->to($claim->owner->email, $claim->owner->name);
                $message->subject('Actualización de su reclamación #'.$a->id);
            });
        }

        if ($r->invoice && $r->amount && !$r->invoice_2) {
            $claim = Claim::find($id);
            $c = Configuration::first();

            $amount = ($r->amount*$c->percentage_fees)/100;

            $invoice = new Invoice;
            $invoice->claim_id = $id;
            $invoice->user_id = $claim->user_id;
            $invoice->amount = $amount;
            $invoice->type = 'percentage_fees';
            $invoice->description = "Pago de comisión por monto recuperado en reclamación extrajudicial";
            $invoice->save();

            $a->invoice_id = $invoice->id;
            $a->save();
        }else if ($r->invoice_2 && $r->honorarios) {
            $claim = Claim::find($id);
            $c = Configuration::first();

            $amount = $r->honorarios;

            $invoice = new Invoice;
            $invoice->claim_id = $id;
            $invoice->user_id = $claim->user_id;
            $invoice->amount = $amount;
            $invoice->type = 'fixed_fees';
            $invoice->description = $r->concepto ? $r->concepto : "Pago de honorarios en reclamación";
            $invoice->save();

            $a->invoice_id = $invoice->id;
            $a->save();
        }*/
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

    public function checkDebtor(Request $r)
    {
        if ($r->options == 1 || $r->concurso == 1) {
            return redirect('claims/invalid-debtor');
        }
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
            return $this->sendEmailClient($se);
        }
    }
}
