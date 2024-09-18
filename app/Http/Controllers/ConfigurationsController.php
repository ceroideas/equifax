<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
/*use App\Models\Debt;
use Carbon\Carbon;*/
use App\Models\Hito;
use App\Models\Template;
use App\Models\DiscountCode;
use App\Models\Campaign;
use App\Models\Participant;
use App\Models\User;
use App\Models\Debtor;
use App\Models\ThirdParty;
use App\Models\Invoice;
use App\Models\SendEmail;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;

class ConfigurationsController extends Controller
{

    public function fees()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $this->authorize('see-fees');

            return view('configurations.fees', ['configuration' => Configuration::first()]);

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function feesStore(Request $request)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $this->authorize('see-fees');
            $data = $this->validateFees();

            $configuration = new Configuration();
            $configuration->fixed_fees = array_key_exists('fixed_fees', $data) ? $data['fixed_fees'] : null;
            $configuration->percentage_fees = array_key_exists('percentage_fees', $data) ? $data['percentage_fees'] : null;
            $configuration->judicial_amount = array_key_exists('judicial_amount', $data) ? $data['judicial_amount'] : null;
            $configuration->judicial_fees = array_key_exists('judicial_fees', $data) ? $data['judicial_fees'] : null;
            $configuration->verbal_amount = array_key_exists('verbal_amount', $data) ? $data['verbal_amount'] : null;
            $configuration->verbal_fees = array_key_exists('verbal_fees', $data) ? $data['verbal_fees'] : null;
            $configuration->ordinary_amount = array_key_exists('ordinary_amount', $data) ? $data['ordinary_amount'] : null;
            $configuration->ordinary_fees = array_key_exists('ordinary_fees', $data) ? $data['ordinary_fees'] : null;
            $configuration->execution = array_key_exists('execution', $data) ? $data['execution'] : null;
            $configuration->resource = array_key_exists('resource', $data) ? $data['resource'] : null;
            $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
            $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
            $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
            $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
            $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
            $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
            $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
            $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
            $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
            $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
            $configuration->fixed_fees_tax = array_key_exists('fixed_fees_tax', $data) ? $data['fixed_fees_tax'] : null;
            $configuration->judicial_amount_tax = array_key_exists('judicial_amount_tax', $data) ? $data['judicial_amount_tax'] : null;
            $configuration->judicial_fees_tax = array_key_exists('judicial_fees_tax', $data) ? $data['judicial_fees_tax'] : null;
            $configuration->verbal_amount_tax = array_key_exists('verbal_amount_tax', $data) ? $data['verbal_amount_tax'] : null;
            $configuration->verbal_fees_tax = array_key_exists('verbal_fees_tax', $data) ? $data['verbal_fees_tax'] : null;
            $configuration->ordinary_amount_tax = array_key_exists('ordinary_amount_tax', $data) ? $data['ordinary_amount_tax'] : null;
            $configuration->ordinary_fees_tax = array_key_exists('ordinary_fees_tax', $data) ? $data['ordinary_fees_tax'] : null;
            $configuration->execution_tax = array_key_exists('execution_tax', $data) ? $data['execution_tax'] : null;
            $configuration->resource_tax = array_key_exists('resource_tax', $data) ? $data['resource_tax'] : null;
            /* Campos conceptos y code */
            $configuration->extra_concept = array_key_exists('extra_concept', $data) ? $data['extra_concept'] : null;
            $configuration->judicial_amount_concept = array_key_exists('judicial_amount_concept', $data) ? $data['judicial_amount_concept'] : null;
            $configuration->judicial_fees_concept = array_key_exists('judicial_fees_concept', $data) ? $data['judicial_fees_concept'] : null;
            $configuration->verbal_amount_concept = array_key_exists('verbal_amount_concept', $data) ? $data['verbal_amount_concept'] : null;
            $configuration->verbal_fees_concept = array_key_exists('verbal_fees_concept', $data) ? $data['verbal_fees_concept'] : null;
            $configuration->ordinary_amount_concept = array_key_exists('ordinary_amount_concept', $data) ? $data['ordinary_amount_concept'] : null;
            $configuration->ordinary_fees_concept = array_key_exists('ordinary_fees_concept', $data) ? $data['ordinary_fees_concept'] : null;
            $configuration->execution_concept = array_key_exists('execution_concept', $data) ? $data['execution_concept'] : null;
            $configuration->resource_concept = array_key_exists('resource_concept', $data) ? $data['resource_concept'] : null;
            $configuration->deposit_concept= array_key_exists('deposit_concept', $data) ? $data['deposit_concept'] : null;
            $configuration->deposit_amount = array_key_exists('deposit_amount', $data) ? $data['deposit_amount'] : null;
            $configuration->deposit_tax = array_key_exists('deposit_tax', $data) ? $data['deposit_tax'] : null;

            $configuration->fixed_fees_dto = array_key_exists('fixed_fees_dto', $data) ? $data['fixed_fees_dto'] : null;
            $configuration->judicial_amount_dto = array_key_exists('judicial_amount_dto', $data) ? $data['judicial_amount_dto'] : null;
            $configuration->verbal_amount_dto = array_key_exists('verbal_amount_dto', $data) ? $data['verbal_amount_dto'] : null;
            $configuration->ordinary_amount_dto = array_key_exists('ordinary_amount_dto', $data) ? $data['ordinary_amount_dto'] : null;
            $configuration->execution_dto = array_key_exists('execution_dto', $data) ? $data['execution_dto'] : null;
            $configuration->resource_dto = array_key_exists('resource_dto', $data) ? $data['resource_dto'] : null;

            $configuration->invoice_cif = array_key_exists('invoice_cif', $data) ? $data['invoice_cif'] : null;
            $configuration->invoice_account = array_key_exists('invoice_account', $data) ? $data['invoice_account'] : null;

            $configuration->save();

            return redirect('configurations/fees')->with('msj' , 'Tasas guardadas correctamente');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }


    public function feesUpdate(Request $request, Configuration $configuration)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $this->authorize('see-fees');

            $data = $this->validateFees();

            $configuration->fixed_fees = array_key_exists('fixed_fees', $data) ? $data['fixed_fees'] : null;
            $configuration->percentage_fees = array_key_exists('percentage_fees', $data) ? $data['percentage_fees'] : null;
            $configuration->judicial_amount = array_key_exists('judicial_amount', $data) ? $data['judicial_amount'] : null;
            $configuration->judicial_fees = array_key_exists('judicial_fees', $data) ? $data['judicial_fees'] : null;
            $configuration->verbal_amount = array_key_exists('verbal_amount', $data) ? $data['verbal_amount'] : null;
            $configuration->verbal_fees = array_key_exists('verbal_fees', $data) ? $data['verbal_fees'] : null;
            $configuration->ordinary_amount = array_key_exists('ordinary_amount', $data) ? $data['ordinary_amount'] : null;
            $configuration->ordinary_fees = array_key_exists('ordinary_fees', $data) ? $data['ordinary_fees'] : null;
            $configuration->execution = array_key_exists('execution', $data) ? $data['execution'] : null;
            $configuration->resource = array_key_exists('resource', $data) ? $data['resource'] : null;
            $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
            $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
            $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
            $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
            $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
            $configuration->tax = array_key_exists('tax', $data) ? $data['tax'] : null;
            $configuration->invoice_name = array_key_exists('invoice_name', $data) ? $data['invoice_name'] : null;
            $configuration->invoice_address_line_1 = array_key_exists('invoice_address_line_1', $data) ? $data['invoice_address_line_1'] : null;
            $configuration->invoice_address_line_2 = array_key_exists('invoice_address_line_2', $data) ? $data['invoice_address_line_2'] : null;
            $configuration->invoice_email = array_key_exists('invoice_email', $data) ? $data['invoice_email'] : null;
            /*nuevos campos impuestos*/
            $configuration->fixed_fees_tax = array_key_exists('fixed_fees_tax', $data) ? $data['fixed_fees_tax'] : null;
            $configuration->judicial_amount_tax = array_key_exists('judicial_amount_tax', $data) ? $data['judicial_amount_tax'] : null;
            $configuration->judicial_fees_tax = array_key_exists('judicial_fees_tax', $data) ? $data['judicial_fees_tax'] : null;
            $configuration->verbal_amount_tax = array_key_exists('verbal_amount_tax', $data) ? $data['verbal_amount_tax'] : null;
            $configuration->verbal_fees_tax = array_key_exists('verbal_fees_tax', $data) ? $data['verbal_fees_tax'] : null;
            $configuration->ordinary_amount_tax = array_key_exists('ordinary_amount_tax', $data) ? $data['ordinary_amount_tax'] : null;
            $configuration->ordinary_fees_tax = array_key_exists('ordinary_fees_tax', $data) ? $data['ordinary_fees_tax'] : null;
            $configuration->execution_tax = array_key_exists('execution_tax', $data) ? $data['execution_tax'] : null;
            $configuration->resource_tax = array_key_exists('resource_tax', $data) ? $data['resource_tax'] : null;
            /* Campos conceptos y code*/
            $configuration->extra_concept = array_key_exists('extra_concept', $data) ? $data['extra_concept'] : null;
            $configuration->judicial_amount_concept = array_key_exists('judicial_amount_concept', $data) ? $data['judicial_amount_concept'] : null;
            $configuration->judicial_fees_concept = array_key_exists('judicial_fees_concept', $data) ? $data['judicial_fees_concept'] : null;
            $configuration->verbal_amount_concept = array_key_exists('verbal_amount_concept', $data) ? $data['verbal_amount_concept'] : null;
            $configuration->verbal_fees_concept = array_key_exists('verbal_fees_concept', $data) ? $data['verbal_fees_concept'] : null;
            $configuration->ordinary_amount_concept = array_key_exists('ordinary_amount_concept', $data) ? $data['ordinary_amount_concept'] : null;
            $configuration->ordinary_fees_concept = array_key_exists('ordinary_fees_concept', $data) ? $data['ordinary_fees_concept'] : null;
            $configuration->execution_concept = array_key_exists('execution_concept', $data) ? $data['execution_concept'] : null;
            $configuration->resource_concept = array_key_exists('resource_concept', $data) ? $data['resource_concept'] : null;
            $configuration->deposit_concept= array_key_exists('deposit_concept', $data) ? $data['deposit_concept'] : null;
            $configuration->deposit_amount = array_key_exists('deposit_amount', $data) ? $data['deposit_amount'] : null;
            $configuration->deposit_tax = array_key_exists('deposit_tax', $data) ? $data['deposit_tax'] : null;

            $configuration->fixed_fees_dto = array_key_exists('fixed_fees_dto', $data) ? $data['fixed_fees_dto'] : null;
            $configuration->judicial_amount_dto = array_key_exists('judicial_amount_dto', $data) ? $data['judicial_amount_dto'] : null;
            $configuration->verbal_amount_dto = array_key_exists('verbal_amount_dto', $data) ? $data['verbal_amount_dto'] : null;
            $configuration->ordinary_amount_dto = array_key_exists('ordinary_amount_dto', $data) ? $data['ordinary_amount_dto'] : null;
            $configuration->execution_dto = array_key_exists('execution_dto', $data) ? $data['execution_dto'] : null;
            $configuration->resource_dto = array_key_exists('resource_dto', $data) ? $data['resource_dto'] : null;

            $configuration->invoice_cif = array_key_exists('invoice_cif', $data) ? $data['invoice_cif'] : null;
            $configuration->invoice_account = array_key_exists('invoice_account', $data) ? $data['invoice_account'] : null;

            $configuration->update();

            return redirect('configurations/fees')->with('msj' , 'Tasas actualizadas correctamente');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function validateFees()
    {

        $rules = [];

        if(!request('fixed_fees')){$rules['fixed_fees'] = 'required';}
        if(!request('percentage_fees')){$rules['percentage_fees'] = 'required';}
        if(!request('judicial_amount')){$rules['judicial_amount'] = 'required';}
        if(!request('judicial_fees')){$rules['judicial_fees'] = 'required';}
        if(!request('verbal_amount')){$rules['verbal_amount'] = 'required';}
        if(!request('verbal_fees')){$rules['verbal_fees'] = 'required';}
        if(!request('ordinary_amount')){$rules['ordinary_amount'] = 'required';}
        if(!request('ordinary_fees')){$rules['ordinary_fees'] = 'required';}
        if(!request('execution')){$rules['execution'] = 'required';}
        if(!request('resource')){$rules['resource'] = 'required';}
        if(!request('tax')){$rules['tax'] = 'required';}
        if(!request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(!request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(!request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(!request('invoice_email')){$rules['invoice_email'] = 'required';}
        if(!request('tax')){$rules['tax'] = 'required';}
        if(!request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(!request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(!request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(!request('invoice_email')){$rules['invoice_email'] = 'required';}
        if(!request('fixed_fees_tax')){$rules['fixed_fees_tax'] = 'required';}
        if(!request('judicial_amount_tax')){$rules['judicial_amount_tax'] = 'required';}
        if(!request('judicial_fees_tax')){$rules['judicial_fees_tax'] = 'required';}
        if(!request('verbal_amount_tax')){$rules['verbal_amount_tax'] = 'required';}
        if(!request('verbal_fees_tax')){$rules['verbal_fees_tax'] = 'required';}
        if(!request('ordinary_amount_tax')){$rules['ordinary_amount_tax'] = 'required';}
        if(!request('ordinary_fees_tax')){$rules['ordinary_fees_tax'] = 'required';}
        if(!request('execution_tax')){$rules['execution_tax'] = 'required';}
        if(!request('resource_tax')){$rules['resource_tax'] = 'required';}
        /* Campos conceptos y code */
        if(!request('extra_concept')){$rules['extra_concept'] = 'required';}
        if(!request('judicial_amount_concept')){$rules['judicial_amount_concept'] = 'required';}
        if(!request('judicial_fees_concept')){$rules['judicial_fees_concept'] = 'required';}
        if(!request('verbal_amount_concept')){$rules['verbal_amount_concept'] = 'required';}
        if(!request('verbal_fees_concept')){$rules['verbal_fees_concept'] = 'required';}
        if(!request('ordinary_amount_concept')){$rules['ordinary_amount_concept'] = 'required';}
        if(!request('ordinary_fees_concept')){$rules['ordinary_fees_concept'] = 'required';}
        if(!request('execution_concept')){$rules['execution_concept'] = 'required';}
        if(!request('resource_concept')){$rules['resource_concept'] = 'required';}
        if(!request('deposit_concept')){$rules['deposit_concept'] = 'required';}
        if(!request('deposit_tax')){$rules['deposit_tax'] = 'required';}
        if(!request('deposit_amount')){$rules['deposit_amount'] = 'required';}

        if(!request('fixed_fees_dto')){$rules['fixed_fees_dto'] = 'required';}
        if(!request('judicial_amount_dto')){$rules['judicial_amount_dto'] = 'required';}
        if(!request('verbal_amount_dto')){$rules['verbal_amount_dto'] = 'required';}
        if(!request('ordinary_amount_dto')){$rules['ordinary_amount_dto'] = 'required';}
        if(!request('execution_dto')){$rules['execution_dto'] = 'required';}
        if(!request('resource_dto')){$rules['resource_dto'] = 'required';}

        if(!request('invoice_cif')){$rules['invoice_cif'] = 'required';}
        if(!request('invoice_account')){$rules['invoice_account'] = 'required';}

        return request()->validate($rules);


    }

    public function hitos()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $hitos = Hito::all();

            return view('hitos.index',compact('hitos'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function templates()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $templates = Template::all();

            return view('templates.index', compact('templates'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function createTemplate($id = null)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $tmp = Template::find($id);

            return view('templates.create', compact('tmp'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function saveTemplate(Request $r)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $t = new Template;
            $t->title = $r->title;

            if ($r->top_logo) {
                $extension = $r->top_logo->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpeg')
                {
                    $top_logo = $r->file('top_logo')->store('uploads/templates', 'public');
                    $t->top_logo = $top_logo;
                }

            }

            if ($r->header_image) {
                $extension = $r->header_image->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpeg')
                {
                    $header_image = $r->file('header_image')->store('uploads/templates', 'public');
                    $t->header_image = $header_image;
                }
            }

            $t->top_content = $r->top_content;
            $t->header_content = $r->header_content;
            $t->body_content = $r->body_content;
            $t->footer_content = $r->footer_content;
            $t->cta_button = $r->cta_button;
            $t->cta_button_link = $r->cta_button_link;
            $t->signature = $r->signature;
            $t->save();

            return redirect('configurations/templates')->with('msj','Se ha guardado la información de la plantilla');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function updateTemplate(Request $r, $id)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $t = Template::find($id);
            $t->title = $r->title;

            if ($r->top_logo) {
                $extension = $r->top_logo->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'pdf' || $extension == 'jpeg'){
                    $top_logo = $r->file('top_logo')->store('uploads/templates', 'public');
                    $t->top_logo = $top_logo;
                }
            }

            if ($r->header_image) {
                $extension = $r->header_image->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'pdf' || $extension == 'jpeg'){
                    $header_image = $r->file('header_image')->store('uploads/templates', 'public');
                    $t->header_image = $header_image;

                }
            }

            $t->top_content = $r->top_content;
            $t->header_content = $r->header_content;
            $t->body_content = $r->body_content;
            $t->footer_content = $r->footer_content;
            $t->cta_button = $r->cta_button;
            $t->cta_button_link = $r->cta_button_link;
            $t->signature = $r->signature;
            $t->save();

            return redirect('configurations/templates')->with('msj','Se ha guardado la información de la plantilla');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function createHitos($id = null)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $ht = Hito::find($id);

            return view('hitos.create', compact('ht'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function saveHitos(Request $r)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $h = new Hito;
            $h->ref_id = $r->ref_id;
            $h->parent_id = $r->parent_id;
            $h->phase = $r->phase;
            $h->name = $r->name;
            $h->redirect_to = $r->redirect_to;
            $h->template_id = $r->template_id;
            $h->send_interval = $r->send_interval;
            $h->send_times = $r->send_times;
            $h->save();

            return redirect('configurations/hitos')->with('msj','Se ha guardado la información del hito');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function updateHitos(Request $r, $id)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $h = Hito::find($id);
            $h->ref_id = $r->ref_id;
            $h->parent_id = $r->parent_id;
            $h->phase = $r->phase;
            $h->name = $r->name;
            $h->redirect_to = $r->redirect_to;
            $h->template_id = $r->template_id;
            $h->send_interval = $r->send_interval;
            $h->send_times = $r->send_times;
            $h->save();

            return redirect('configurations/hitos')->with('msj','Se ha guardado la información del hito');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    /**/

    public function deleteTemplates($id)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            return $id;
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function deleteHitos($id)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            return $id;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuration $configuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration)
    {
        //
    }

    public function discountCodes()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $discountCodes = DiscountCode::all();

        return view('discount_codes.index',compact('discountCodes'));

        }else{
            return redirect('/');
        }


    }

    public function createDiscountCodes($id = null)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $dc = DiscountCode::find($id);

            return view('discount_codes.create', compact('dc'));
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function saveDiscountCodes(Request $r)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $dc = new DiscountCode;
            $dc->code = $r->code;
            $dc->description = $r->description;
            $dc->date_from = $r->date_from;
            $dc->date_end = $r->date_end;

            if($r->date_from <= now() && now() <= $r->date_end ){
                $dc->status = 1;
            }else{
                $dc->status = 0;
            }

            $dc->save();

            return redirect('configurations/discount-codes')->with('msj','Se ha guardado el código de descuento');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function updateDiscountCodes(Request $r, $id)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $dc = DiscountCode::find($id);
            $dc->code = $r->code;
            $dc->description = $r->description;
            $dc->date_from = $r->date_from;
            $dc->date_end = $r->date_end;
            if($r->date_from <= now() && now() <= $r->date_end ){
                $dc->status = 1;
            }else{
                $dc->status = 0;
            }

            $dc->save();

            return redirect('configurations/discount-codes')->with('msj','Se ha guardado el código de descuento');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }


    public function deleteDiscountCodes($id)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            return $id;
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function participants()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $participants = Participant::all();

            return view('participants.index',compact('participants'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function createParticipants($id = null)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $participant = Participant::find($id);

            return view('participants.create', compact('participant'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function updateParticipants(Request $r, $id)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $p = Participant::find($id);
            $p->campaign_id = $r->campaign_id;
            $p->email = Crypt::encryptString($r->email);
            $p->nombre = Crypt::encryptString($r->nombre);
            $p->updated_at = now();
            $p->save();

            return redirect('configurations/participants')->with('msj','Se ha guardado la información del participante');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function saveParticipants(Request $r)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $p = new Participant;
            $p->created_at = now();
            $p->available = 1;
            $p->campaign_id = $r->campaign_id;
            $p->email = Crypt::encryptString($r->email);
            $p->nombre = Crypt::encryptString($r->nombre);
            $p->updated_at = now();
            $p->save();

            return redirect('configurations/participants')->with('msj','Se ha guardado la información del participante');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function campaigns()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $campaigns = Campaign::all();

            return view('campaigns.index',compact('campaigns'));
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }
    }

    public function createCampaigns($id = null)
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            $campaign = Campaign::find($id);

            return view('campaigns.create', compact('campaign'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function updateCampaigns(Request $r, $id)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $c = Campaign::find($id);
            $c->type = $r->type;
            $c->referenced = $r->referenced;
            $c->name = $r->name;
            $c->discount_type = $r->discount_type;
            $c->discount = $r->discount;
            $c->claim_code = $r->claim_code;
            $c->prefix = $r->prefix;
            $c->init_date = $r->init_date;
            $c->end_date = $r->end_date;
            $c->all_users = $r->all_users;
            $c->save();

            return redirect('configurations/campaigns')->with('msj','Se ha guardado la información de la campaña');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }
    }

    public function saveCampaigns(Request $r)
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $c = new Campaign;
            $c->type = $r->type;
            $c->referenced = $r->referenced;
            $c->name = $r->name;
            $c->discount_type = $r->discount_type;
            $c->discount = $r->discount;
            $c->claim_code = $r->claim_code;
            $c->prefix = $r->prefix;
            $c->init_date = $r->init_date;
            $c->end_date = $r->end_date;
            $c->all_users = $r->all_users;
            $c->save();

            return redirect('configurations/campaigns')->with('msj','Se ha guardado la información de la campaña');
        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

    public function testingTable()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){


            if(file_exists('testing/testingLCG.txt')){

                /* $file = fopen('testing/testingLCG.txt', 'r');
                    while(! feof($file)) {
                        $line = fgets($file);
                        echo $line. "<br>";
                        }
                    fclose($file); */

                    $model = trim(file_get_contents('testing/testingLCG.txt'));

                    switch ($model) {
                        case 'eusers':
                                $users = User::all();
                                foreach($users as $user){
                                    $user->name = isset($user->name)?Crypt::encryptString($user->name):Null;
                                    //$user->email = isset($user->email)?Crypt::encryptString($user->email):Null;
                                    $user->dni = isset($user->dni)?Crypt::encryptString($user->dni):Null;
                                    $user->phone = isset($user->phone)?Crypt::encryptString($user->phone):Null;
                                    $user->address = isset($user->address)?Crypt::encryptString($user->address):Null;
                                    $user->iban = isset($user->iban)?Crypt::encryptString($user->iban):Null;
                                    $user->legal_representative = isset($user->legal_representative)?Crypt::encryptString($user->legal_representative):Null;
                                    $user->representative_dni = isset($user->representative_dni)?Crypt::encryptString($user->representative_dni):Null;
                                    $user->save();
                                }
                            break;

                        case 'dusers':
                                $users = User::all();
                                foreach($users as $user){
                                    try {
                                        $user->name = $user->name != Null ? Crypt::decryptString($user->name) : Null;
                                        $user->dni = $user->dni != Null ? Crypt::decryptString($user->dni) : Null;
                                        $user->phone = $user->phone != Null ? Crypt::decryptString($user->phone) : Null;
                                        $user->address = $user->address != Null ? Crypt::decryptString($user->address) : Null;
                                        $user->iban = $user->iban != Null ? Crypt::decryptString($user->iban) : Null;
                                        $user->legal_representative = $user->legal_representative != Null ? Crypt::decryptString($user->legal_representative) : Null;
                                        $user->representative_dni = $user->representative_dni != Null ? Crypt::decryptString($user->representative_dni) : Null;

                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $user->save();
                                }
                            break;
                        case 'eparticipants':
                                $participants = Participant::all();
                                foreach($participants as $participant){
                                    $participant->email = isset($participant->email) ? Crypt::encryptString($participant->email) : Null;
                                    $participant->nombre = isset($participant->nombre) ? Crypt::encryptString($participant->nombre) : Null;
                                    $participant->save();
                                }
                            break;

                        case 'dparticipants':
                                $participants = Participant::all();
                                foreach($participants as $participant){
                                    try {
                                        $participant->email = $participant->email != Null ? Crypt::decryptString($participant->email) : Null;
                                        $participant->nombre = $participant->nombre != Null ? Crypt::decryptString($participant->nombre) : Null;
                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $participant->save();
                                }
                            break;

                        case 'edebtors':
                                $debtors = Debtor::all();
                                foreach($debtors as $debtor){
                                    $debtor->name = isset($debtor->name) ? Crypt::encryptString($debtor->name) : Null;
                                    $debtor->dni = isset($debtor->dni) ? Crypt::encryptString($debtor->dni) : Null;
                                    $debtor->phone = isset($debtor->phone) ? Crypt::encryptString($debtor->phone) : Null;
                                    $debtor->email = isset($debtor->email) ? Crypt::encryptString($debtor->email) : Null;
                                    $debtor->address = isset($debtor->address) ? Crypt::encryptString($debtor->address) : Null;
                                    $debtor->save();
                                }
                            break;

                        case 'ddebtors':
                                $debtors = Debtor::all();
                                foreach($debtors as $debtor){
                                    try {
                                        $debtor->name = $debtor->name != Null ? Crypt::decryptString($debtor->name) : Null;
                                        $debtor->dni = $debtor->dni != Null ? Crypt::decryptString($debtor->dni) : Null;
                                        $debtor->phone = $debtor->phone != Null ? Crypt::decryptString($debtor->phone) : Null;
                                        $debtor->email = $debtor->email != Null ? Crypt::decryptString($debtor->email) : Null;
                                        $debtor->address = $debtor->address != Null ? Crypt::decryptString($debtor->address) : Null;

                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $debtor->save();
                                }
                            break;


                        case 'ethirdparties':
                                $thirdParties = ThirdParty::all();
                                foreach($thirdParties as $thirdParty){
                                    $thirdParty->name = isset($thirdParty->name) ? Crypt::encryptString($thirdParty->name) : Null;
                                    $thirdParty->dni = isset($thirdParty->dni) ? Crypt::encryptString($thirdParty->dni) : Null;
                                    $thirdParty->address = isset($thirdParty->address) ? Crypt::encryptString($thirdParty->address) : Null;
                                    $thirdParty->iban = isset($thirdParty->iban) ? Crypt::encryptString($thirdParty->iban) : Null;
                                    $thirdParty->legal_representative = isset($thirdParty->legal_representative) ? Crypt::encryptString($thirdParty->legal_representative) : Null;
                                    $thirdParty->representative_dni = isset($thirdParty->representative_dni) ? Crypt::encryptString($thirdParty->representative_dni) : Null;
                                    $thirdParty->save();
                                }
                            break;

                        case 'dthirdparties':
                                $thirdParties = ThirdParty::all();
                                foreach($thirdParties as $thirdParty){
                                    try {
                                        $thirdParty->name = $thirdParty->name != Null ? Crypt::decryptString($thirdParty->name) : Null;
                                        $thirdParty->dni = $thirdParty->dni != Null ? Crypt::decryptString($thirdParty->dni) : Null;
                                        $thirdParty->address = $thirdParty->address != Null ? Crypt::decryptString($thirdParty->address) : Null;
                                        $thirdParty->legal_representative = $thirdParty->legal_representative != Null ? Crypt::decryptString($thirdParty->legal_representative) : Null;
                                        $thirdParty->representative_dni = $thirdParty->representative_dni != Null ? Crypt::decryptString($thirdParty->representative_dni) : Null;

                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $thirdParty->save();
                                }
                            break;

                        case 'einvoices':
                                $invoices = Invoice::all();
                                foreach($invoices as $invoice){
                                    $invoice->cnofac = isset($invoice->cnofac) ? Crypt::encryptString($invoice->cnofac) : Null;
                                    $invoice->cdofac = isset($invoice->cdofac) ? Crypt::encryptString($invoice->cdofac) : Null;
                                    $invoice->cnifac = isset($invoice->cnifac) ? Crypt::encryptString($invoice->cnifac) : Null;
                                    $invoice->save();
                                }
                            break;

                        case 'dinvoices':
                                $invoices = Invoice::all();
                                foreach($invoices as $invoice){
                                    try {
                                        $invoice->cnofac = $invoice->cnofac != Null ? Crypt::decryptString($invoice->cnofac) : Null;
                                        $invoice->cdofac = $invoice->cdofac != Null ? Crypt::decryptString($invoice->dcdofacni) : Null;
                                        $invoice->cnifac = $invoice->cnifac != Null ? Crypt::decryptString($invoice->cnifac) : Null;
                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $invoice->save();
                                }
                            break;

                        case 'esendemails':
                                $sendemails = SendEmail::all();
                                foreach($sendemails as $sendemail){
                                    $sendemail->addresse = isset($sendemail->addresse) ? Crypt::encryptString($sendemail->addresse) : Null;
                                    $sendemail->save();
                                }
                            break;

                        case 'dsendemails':
                                $sendemails = SendEmail::all();
                                foreach($sendemails as $sendemail){
                                    try {
                                        $sendemail->addresse = $sendemail->addresse != Null ? Crypt::decryptString($sendemail->addresse) : Null;
                                    } catch (DecryptException $e) {
                                        dump($e->getMessage());
                                    }
                                    $sendemail->save();
                                }
                            break;



                        default:
                                dump("No hay modelo");
                            break;



                    }


                }else{
                    dump("Test Erroneo erroneo");
                }


            }else{
                return redirect('/')->with('msj', 'Acceso restringido');
            }

    }

    public function users()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){

            $users = User::all();

            return view('users.configurations',compact('users'));

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }

}
