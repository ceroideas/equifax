<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtDocument;
use App\Models\User;
use App\Models\Debtor;
use App\Models\ThirdParty;
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

        if ($request->document) {
            foreach ($request->document as $key => $d) {
                switch ($d) {
                    case "factura":

                        $documentos[] = [ "factura" => [
                            // "factura" => $request->factura,
                            "ndoc_factura" => $request->ndoc_factura,
                            "fecha_factura" => $request->fecha_factura,
                            "vencimiento_factura" => $request->vencimiento_factura,
                            "importe_factura" => $request->importe_factura,
                            "iva_factura" => $request->iva_factura
                        ]];

                        break;
                    case "albaran":
                        $documentos[] = ["albaran" => [
                            // "albaran" => $request->albaran,
                            "ndoc_albaran" => $request->ndoc_albaran,
                            "fecha_albaran" => $request->fecha_albaran,
                        ]];
                        break;
                    case "recibo":
                        $documentos[] = ["recibo" => [
                            // "recibo" => $request->recibo,
                            "fecha_recibo" => $request->fecha_recibo,
                        ]];
                        break;
                    case "contrato":
                        $documentos[] = ["contrato" => [
                            // "contrato" => $request->contrato,
                            "fecha_contrato" => $request->fecha_contrato,
                        ]];
                        break;
                    case "hoja_encargo":
                        $documentos[] = ["hoja_encargo" => [
                            // "hoja_encargo" => $request->hoja_encargo,
                            "fecha_hoja_encargo" => $request->fecha_hoja_encargo,
                        ]];
                        break;
                    case "hoja_pedido":
                        $documentos[] = ["hoja_pedido" => [
                            // "hoja_pedido" => $request->hoja_pedido,
                            "fecha_hoja_pedido" => $request->fecha_hoja_pedido,
                        ]];
                        break;
                    case "reconocimiento":
                        $documentos[] = ["reconocimiento" => [
                            // "reconocimiento" => $request->reconocimiento,
                            "fecha_reconocimiento" => $request->fecha_reconocimiento,
                            "importe_reconocimiento" => $request->importe_reconocimiento,
                            "iva_reconocimiento" => $request->iva_reconocimiento,
                        ]];
                        break;
                    case "extracto":
                        $documentos[] = ["extracto" => [
                            // "extracto" => $request->extracto,
                            "fecha_extracto" => $request->fecha_extracto,
                        ]];
                        break;
                    case "escritura":
                        $documentos[] = ["escritura" => [
                            // "escritura" => $request->escritura,
                            "nprot_escritura" => $request->nprot_escritura,
                            "fecha_escritura" => $request->fecha_escritura,
                            "nombre_escritura" => $request->nombre_escritura,
                        ]];
                        break;
                    case "burofax":
                        $documentos[] = ["burofax" => [
                            // "burofax" => $request->burofax,
                            "fecha_burofax" => $request->fecha_burofax,
                        ]];
                        break;
                    case "carta_certificada":
                        $documentos[] = ["carta_certificada" => [
                            // "carta"=> $request->carta,
                            "fecha_carta"=> $request->fecha_carta,
                        ]];
                        break;
                    case "email":
                        $documentos[] = ["email" => [
                            // "email" => $request->email,
                            "fecha_email" => $request->fecha_email,
                        ]];
                        break;
                    case "otros":
                        $documentos[] = ["otros" => [
                            // "otros" => $request->otros,
                            "fecha_otros" => $request->fecha_otros,
                        ]];
                        break;
                }
            }
        }

        session()->put('documentos',$documentos);

        /*foreach ($documentos as $key => $d) {
            $file = $request->file(key($d))->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $documentos[$key][key($d)]['file'] = $file;
        }

        return "";

        return $documentos;*/


/* TODO: borrar debug
        print_r("Debts Controller -> Save step one ");echo "<br>";
        var_dump($request->tipo_deuda);echo "<br>";
        print_r("______________ Isset _____________");echo "<br>";
        if(isset($request->tipo_deuda)){
            print_r("Existe deuda");echo "<br>";
        }else{
            print_r("NO hay deuda");echo "<br>";
        }*/
        //print_r("______________ Request_____________");echo "<br>";
        //var_dump($request);echo "<br>";



        $data = $this->validateStepOne();

        $debt = new Debt();

        $debt->total_amount = $data['importe'];
        $debt->tax = $data['iva'];
        $debt->concept = $data['concepto'];
        $debt->document_number = "";
        $debt->debt_date = $data['fecha_deuda'];
        $debt->debt_expiration_date = $data['fecha_vencimiento_deuda'];
        $debt->pending_amount = $data['importe_pendiente'];
        $debt->partials_amount = $data['abonos'];
        $debt->additionals = $data['observaciones'];

        $debt->reclamacion_previa_indicar = array_key_exists('reclamacion_previa_indicar', $data) ? $data['reclamacion_previa_indicar'] : null;
        $debt->motivo_reclamacion_previa = array_key_exists('motivo_reclamacion_previa', $data) ? $data['motivo_reclamacion_previa'] : null;
        $debt->fecha_reclamacion_previa = array_key_exists('fecha_reclamacion_previa', $data) ? $data['fecha_reclamacion_previa'] : null;

        // $debt->reclamacion_previa = $data['reclamacion_previa'];

        if($debt->reclamacion_previa){
            Storage::disk('public')->delete($debt->reclamacion_previa);
        }
        if($request['reclamacion_previa']){

            $reclamacion_previa = $request->file('reclamacion_previa')->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $debt->reclamacion_previa = $reclamacion_previa;
        }

        $amounts = [];

        if ($request->amounts) {
            foreach ($request->amounts as $key => $value) {
                $amounts[] = ["amount" => $value, "date" => $request->dates[$key]];
            }
        }

        $debt->partials_amount_details = json_encode($amounts);

        if($data['tipo_deuda']==-1){
            $debt->type = 10;
        }else{
            $debt->type = $data['tipo_deuda'];
        }


        /* TODO: borrar debug */
        /*print_r("Debts type -> Save step one ");echo "<br>";
        print_r($data['tipo_deuda']);echo "<br>";
        print_r($debt->type);echo "<br>";*/
        //die();

        if($data['deuda_extra']){
            $debt->type_extra = $data['deuda_extra'];
            session()->put('type_other', true);
        }

        session()->put('claim_debt', $debt);
        session()->put('debt_step_one', 'completed');
        session()->put('debt_step_two', 'completed');
        session()->put('debt_step_three', 'completed');

        // documentacion

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
            // return "Hola";
            rrmdir(storage_path('app/public/temporal/debts/' . Auth::user()->id . '/documents'));
        }

        foreach ($documentos as $key => $d) {

            $file = $request->file(key($d))->store('temporal/debts/' . Auth::user()->id . '/documents', 'public');
            $documentos[$key][key($d)]['file'] = $file;

        }

        session()->put('documentos',$documentos);

        // return redirect('/debts/create/step-two')->with('msj', 'Datos guardados exitosamente');
        // return redirect('/debts/create/step-three')->with('msj', 'Datos guardados exitosamente');
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
            'fecha_vencimiento_deuda' =>  'date',
            'importe_pendiente' =>  'required|numeric',
            'abonos' =>  '',
            'observaciones' =>  '',
            'tipo_deuda' =>  'required',
            'deuda_extra' =>  'required_if:tipo_deuda,18|required_if:tipo_deuda,13',
            'document' =>  'required',


        ];

        if (request()->reclamacion_previa_indicar == 1) {
            //$rules['motivo_reclamacion_previa'] = 'required';
            $rules['reclamacion_previa'] = 'required';
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
