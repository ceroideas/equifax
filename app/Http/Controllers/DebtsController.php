<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtDocument;
use App\Models\User;
use App\Models\Debtor;
use App\Models\ThirdParty;
use App\Models\Claim_tmp;
use App\Models\Debt_tmp;


use Illuminate\Http\Request;
use Auth;
use Storage;

class DebtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stepOne()
    {
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor')){

            return view('debts.create_step_1', [

                'client' => $client = (session('claim_client') ? Auth::user()  : Auth::user()->thirdParties->find(session('claim_third_party')) ),
                'debtor' => $debtor = Auth::user()->debtors->find(session('claim_debtor'))

            ]);
        }
    }

    public function stepTwo()
    {
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one')){

            return view('debts.create_step_2', [

                'client' => $client = (session('claim_client') ? Auth::user()  : Auth::user()->thirdParties->find(session('claim_third_party')) ),
                'debtor' => $debtor = Auth::user()->debtors->find(session('claim_debtor')),
                'debt' => $debt = session('claim_debt')

            ]);
        }
    }

    public function stepThree()
    {
        if((session()->has('claim_client') || session()->has('claim_third_party')) && session()->has('claim_debtor') && session()->has('claim_debt') && session()->has('debt_step_one') && session()->has('debt_step_two')){

            return view('debts.create_step_3', [

                'client' => $client = (session('claim_client') ? Auth::user()  : Auth::user()->thirdParties->find(session('claim_third_party')) ),
                'debtor' => $debtor = Auth::user()->debtors->find(session('claim_debtor')),
                'debt' => $debt = session('claim_debt')

            ]);
        }
    }

    public function saveStepOne(Request $request)
    {
        $documentos = [];


        function rrmdir($dir) {
           if (is_dir($dir)) {
             $objects = scandir($dir);
             foreach ($objects as $object) {
               if ($object != "." && $object != "..") {
                 if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                   rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                 else
                   unlink($dir. DIRECTORY_SEPARATOR .$object);
               }
             }
             rmdir($dir);
           }
        }

        if (is_dir(storage_path('app/public/temporal/debts/' . Auth::user()->id . '/documents'))) {
            rrmdir(storage_path('app/public/temporal/debts/' . Auth::user()->id . '/documents'));
        }

        if ($request->factura) {
            foreach ($request->factura['file'] as $key => $value) {

                $file = $request->file('factura')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = [ "factura" => [
                    "file" => $file,
                    "ndoc_factura" => $request->factura['ndoc_factura'][$key],
                    "fecha_factura" => $request->factura['fecha_factura'][$key],
                    "vencimiento_factura" => $request->factura['vencimiento_factura'][$key],
                    "importe_factura" => $request->factura['importe_factura'][$key],
                    "iva_factura" => $request->factura['iva_factura'][$key]
                ]];
            }
        }

        if ($request->factura_rectificativa) {
            foreach ($request->factura_rectificativa['file'] as $key => $value) {

                $file = $request->file('factura_rectificativa')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = [ "factura_rectificativa" => [
                    "file" => $file,
                    "ndoc_factura" => $request->factura_rectificativa['ndoc_factura'][$key],
                    "fecha_factura" => $request->factura_rectificativa['fecha_factura'][$key],
                    "vencimiento_factura" => $request->factura_rectificativa['vencimiento_factura'][$key],
                    "importe_factura" => $request->factura_rectificativa['importe_factura'][$key],
                    "iva_factura" => $request->factura_rectificativa['iva_factura'][$key]
                ]];
            }
        }

        if ($request->albaran) {
            foreach ($request->albaran['file'] as $key => $value) {

                $file = $request->file('albaran')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["albaran" => [
                    "file" => $file,
                    "ndoc_albaran" => $request->albaran['ndoc_albaran'][$key],
                    "fecha_albaran" => $request->albaran['fecha_albaran'][$key],
                ]];
            }
        }

        if ($request->recibo) {
            foreach ($request->recibo['file'] as $key => $value) {

                $file = $request->file('recibo')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["recibo" => [
                    "file" => $file,
                    "fecha_recibo" => $request->recibo['fecha_recibo'][$key],
                ]];
            }
        }

        if ($request->contrato) {
            foreach ($request->contrato['file'] as $key => $value) {

                $file = $request->file('contrato')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["contrato" => [
                    "file" => $file,
                    "fecha_contrato" => $request->contrato['fecha_contrato'][$key],
                ]];
            }
        }

        if ($request->hoja_encargo) {
            foreach ($request->hoja_encargo['file'] as $key => $value) {

                $file = $request->file('hoja_encargo')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["hoja_encargo" => [
                    "file" => $file,
                    "fecha_hoja_encargo" => $request->hoja_encargo['fecha_hoja_encargo'][$key],
                ]];
            }
        }

        if ($request->hoja_pedido) {
            foreach ($request->hoja_pedido['file'] as $key => $value) {

                $file = $request->file('hoja_pedido')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["hoja_pedido" => [
                    "file" => $file,
                    "fecha_hoja_pedido" => $request->hoja_pedido['fecha_hoja_pedido'][$key],
                ]];
            }
        }

        if ($request->reconocimiento) {
            foreach ($request->reconocimiento['file'] as $key => $value) {

                $file = $request->file('reconocimiento')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["reconocimiento" => [
                    "file" => $file,
                    "fecha_reconocimiento" => $request->reconocimiento['fecha_reconocimiento'][$key],
                    "importe_reconocimiento" => $request->reconocimiento['importe_reconocimiento'][$key],
                    "iva_reconocimiento" => $request->reconocimiento['iva_reconocimiento'][$key],
                ]];
            }
        }

        if ($request->extracto) {
            foreach ($request->extracto['file'] as $key => $value) {

                $file = $request->file('extracto')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["extracto" => [
                    "file" => $file,
                    "fecha_extracto" => $request->extracto['fecha_extracto'][$key],
                ]];
            }
        }

        if ($request->escritura) {
            foreach ($request->escritura['file'] as $key => $value) {

                $file = $request->file('escritura')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["escritura" => [
                    "file" => $file,
                    "nprot_escritura" => $request->escritura['nprot_escritura'][$key],
                    "fecha_escritura" => $request->escritura['fecha_escritura'][$key],
                    "nombre_escritura" => $request->escritura['nombre_escritura'][$key],
                ]];
            }
        }

        if ($request->burofax) {
            foreach ($request->burofax['file'] as $key => $value) {

                $file = $request->file('burofax')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["burofax" => [
                    "file" => $file,
                    "fecha_burofax" => $request->burofax['fecha_burofax'][$key],
                ]];
            }
        }

        if ($request->carta_certificada) {
            foreach ($request->carta_certificada['file'] as $key => $value) {

                $file = $request->file('carta_certificada')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["carta_certificada" => [
                    "file" => $file,
                    "fecha_carta"=> $request->carta_certificada['fecha_carta'][$key],
                ]];
            }
        }

        if ($request->email) {
            foreach ($request->email['file'] as $key => $value) {

                $file = $request->file('email')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["email" => [
                    "file" => $file,
                    "fecha_email" => $request->email['fecha_email'][$key],
                ]];
            }
        }

        if ($request->otros) {
            foreach ($request->otros['file'] as $key => $value) {

                $file = $request->file('otros')['file'][$key]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');

                $documentos[] = ["otros" => [
                    "file" => $file,
                    "fecha_otros" => $request->otros['fecha_otros'][$key],
                ]];
            }
        }

        session()->put('documentos',$documentos);


        $data = $this->validateStepOne();

        $debt = new Debt();
        $debtTmp = new Debt_tmp();
        $debtTmp->total_amount = $debt->total_amount = $data['importe'];
        $debtTmp->tax = $debt->tax = $data['iva'];
        $debtTmp->concept = $debt->concept = $data['concepto'];
        $debtTmp->document_number = $debt->document_number = "";
        $debtTmp->debt_date = $debt->debt_date = $data['fecha_deuda'];
        // Sino hay fecha de vencimiento usamos la fecha de la deuda
        $data['fecha_vencimiento_deuda'] == NULL ? $debtTmp->debt_expiration_date = $debt->debt_expiration_date = $data['fecha_deuda'] : $debtTmp->debt_expiration_date = $debt->debt_expiration_date = $data['fecha_vencimiento_deuda'];
        $debtTmp->pending_amount = $debt->pending_amount = $data['importe_pendiente'];
        $debtTmp->partials_amount = $debt->partials_amount = $data['abonos'];
        $debtTmp->additionals = $debt->additionals = $data['observaciones'];

        $debtTmp->reclamacion_previa_indicar = $debt->reclamacion_previa_indicar = array_key_exists('reclamacion_previa_indicar', $data) ? $data['reclamacion_previa_indicar'] : null;
        $debtTmp->motivo_reclamacion_previa = $debt->motivo_reclamacion_previa = array_key_exists('motivo_reclamacion_previa', $data) ? $data['motivo_reclamacion_previa'] : null;
        $debtTmp->fecha_reclamacion_previa = $debt->fecha_reclamacion_previa = array_key_exists('fecha_reclamacion_previa', $data) ? $data['fecha_reclamacion_previa'] : null;


        if($debt->reclamacion_previa){
            Storage::disk('public')->delete($debt->reclamacion_previa);
        }
        if($request['reclamacion_previa']){

            $reclamacion_previa = $request->file('reclamacion_previa')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debtTmp->reclamacion_previa = $debt->reclamacion_previa = $reclamacion_previa;
        }

        $amounts = [];

        if ($request->amounts) {
            foreach ($request->amounts as $key => $value) {
                $amounts[] = ["amount" => $value, "date" => $request->dates[$key]];
            }
        }

        $debtTmp->partials_amount_details = $debt->partials_amount_details = json_encode($amounts);

        if($data['tipo_deuda']==-1){
            $debtTmp->type = $debt->type = 10;
        }else{
            $debtTmp->type = $debt->type = $data['tipo_deuda'];
        }

        if($data['deuda_extra']){
            $debtTmp->type_extra = $debt->type_extra = $data['deuda_extra'];
            session()->put('type_other', true);
        }

        session()->put('claim_debt', $debt);
        session()->put('debt_step_one', 'completed');
        session()->put('debt_step_two', 'completed');
        session()->put('debt_step_three', 'completed');

        $debtTmp->save();

        $claimTmp = Claim_tmp::where('id',session('claim_tmp_id'))
                            ->first();

        $claimTmp->observation = $documentos;
        $claimTmp->status = 5;
        $claimTmp->debt_tmp_id = $debtTmp->id;

        $claimTmp->save();


        return redirect('/claims/check-agreement')->with('msj', 'Datos guardados exitosamente');
    }

    public function saveStepTwo(Request $request)
    {

        // $data = $this->validateStepTwo();

        // $debt = session('claim_debt');

        // $debt->type = $data['tipo_deuda'];

        // if($data['deuda_extra']){
        //     $debt->type_extra = $data['deuda_extra'];
        //     session()->put('type_other', true);
        // }

        // session()->put('claim_debt', $debt);
        // session()->put('debt_step_two', 'completed');

        // return redirect('/debts/create/step-three')->with('msj', 'Datos guardados exitosamente');

    }

    /*public function saveStepThree(Request $request)
    {

        $this->validateStepThree();


        // dd($request->file('documentos_extras'));


        $debt = Session('claim_debt');

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
        if($debt->reclamacion_previa && $request['reclamacion_previa']){
            Storage::disk('public')->delete($debt->reclamacion_previa);
        }
        if($debt->others && $request['documentos_extras']){

            $session_docs = explode(',' , $debt->others);

            foreach ($session_docs as $d) {

                Storage::disk('public')->delete($d);
            }
        }

        if($request['factura']){

            $factura = $request->file('factura')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->factura = $factura;
        }

        if($request['albaran']){
            $albaran = $request->file('albaran')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->albaran = $albaran;
        }

        if($request['contrato']){
            $contrato = $request->file('contrato')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->contrato = $contrato;
        }

        if($request['documentacion_pedido']){
            $documentacion_pedido = $request->file('documentacion_pedido')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->documentacion_pedido = $documentacion_pedido;
        }

        if($request['extracto']){
            $extracto = $request->file('extracto')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->extracto = $extracto;
        }

        if($request['reconocimiento_deuda']){
            $reconocimiento_deuda = $request->file('reconocimiento_deuda')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->reconocimiento_deuda = $reconocimiento_deuda;
        }

        if($request['escritura_notarial']){
            $escritura_notarial = $request->file('escritura_notarial')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->escritura_notarial = $escritura_notarial;
        }

        if($request['reclamacion_previa']){
            $reclamacion_previa = $request->file('reclamacion_previa')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $motivo_reclamacion_previa = $request['motivo_reclamacion_previa'];
            $debt->reclamacion_previa = $reclamacion_previa;
            $debt->motivo_reclamacion_previa = $motivo_reclamacion_previa;
        }

        if($request['documentos_extras']){
            $docs = [];
            for ($i=0; $i < count($request['documentos_extras']); $i++) {
                $docs[] = $request->file('documentos_extras')[$i]->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            }

            $debt->others = implode(',', $docs);
        }

        session()->put('claim_debt', $debt);
        session()->put('debt_step_three', 'completed');

        // dd($debt);

        return redirect('/claims/check-agreement')->with('msj', 'Datos guardados exitosamente');

    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(Debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debt $debt)
    {
        //
    }

    public function validateStepOne(){

        $rules = [
            'importe' =>  'required|numeric',
            'iva' =>  'required|numeric',
            'concepto' =>  'required',
            // 'numero_documento' =>  'required',
            'fecha_deuda' =>  'required|date',
            'fecha_vencimiento_deuda' =>  '',
            'importe_pendiente' =>  'required|numeric',
            'abonos' =>  '',
            'observaciones' =>  '',
            'tipo_deuda' =>  'required',
            'deuda_extra' =>  'required_if:tipo_deuda,18|required_if:tipo_deuda,13',
            'document' =>  'required',


        ];

        if (request()->reclamacion_previa_indicar == 1) {
            $rules['motivo_reclamacion_previa'] = '';
            $rules['reclamacion_previa'] = '';
            $rules['fecha_reclamacion_previa'] = 'required';
            $rules['reclamacion_previa_indicar'] = 'required';
        }

        $messages = [

            'deuda_extra.required_if' => 'El campo :attribute es obligatorio cuando el campo :other es otros.'
        ];

        return request()->validate($rules, $messages);


    }

    public function validateStepTwo(){


    }

    public function validateStepThree(){

        $rules = [
            'factura' =>  'required|file|mimes:pdf,jpg,png',
            'factura_rectificativa' =>  'required|file|mimes:pdf,jpg,png',
            'albaran' =>  'file|mimes:pdf,jpg,png',
            'contrato' =>  'file|mimes:pdf,jpg,png',
            'documentacion_pedido' =>  'file|mimes:pdf,jpg,png',
            'extracto' =>  'file|mimes:pdf,jpg,png',
            'reconocimiento_deuda' =>  'file|mimes:pdf,jpg,png',
            'escritura_notarial' =>  'file|mimes:pdf,jpg,png',
            'reclamacion_previa' =>  'file|mimes:pdf,jpg,png',
            //'motivo_reclamacion_previa' =>  'required_with:reclamacion_previa',
            'documentos_extras.*' =>  'mimes:pdf,jpg,png',
        ];

        // $messages = [

        //     // 'motivo_reclamacion_previa.required_if' => 'El campo :attribute es obligatorio cuando el campo :other es otros.'
        // ];

        return request()->validate($rules);


    }

    public function getHito($blade)
    {
        return view('debts.documents.'.$blade)->render();
    }


}
