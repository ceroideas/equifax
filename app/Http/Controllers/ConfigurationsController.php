<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
/*use App\Models\Debt;
use Carbon\Carbon;*/
use App\Models\Hito;
use App\Models\Template;

class ConfigurationsController extends Controller
{

    public function fees(){

        $this->authorize('see-fees');

        return view('configurations.fees', ['configuration' => Configuration::first()]);

    }

    public function feesStore(Request $request){

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

        $configuration->save();

        return redirect('configurations/fees')->with('msj' , 'Tasas guardadas correctamente');

    }

    public function feesUpdate(Request $request, Configuration $configuration){

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

        $configuration->update();

        return redirect('configurations/fees')->with('msj' , 'Tasas actualziadas correctamente');

    }

    public function validateFees(){

        $rules = [];

        if(request('fixed_fees')){$rules['fixed_fees'] = 'required';}
        if(request('percentage_fees')){$rules['percentage_fees'] = 'required';}
        if(request('judicial_amount')){$rules['judicial_amount'] = 'required';}
        if(request('judicial_fees')){$rules['judicial_fees'] = 'required';}
        if(request('verbal_amount')){$rules['verbal_amount'] = 'required';}
        if(request('verbal_fees')){$rules['verbal_fees'] = 'required';}
        if(request('ordinary_amount')){$rules['ordinary_amount'] = 'required';}
        if(request('ordinary_fees')){$rules['ordinary_fees'] = 'required';}
        if(request('execution')){$rules['execution'] = 'required';}
        if(request('resource')){$rules['resource'] = 'required';}
        if(request('tax')){$rules['tax'] = 'required';}
        if(request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(request('invoice_email')){$rules['invoice_email'] = 'required';}
        if(request('tax')){$rules['tax'] = 'required';}
        if(request('invoice_name')){$rules['invoice_name'] = 'required';}
        if(request('invoice_address_line_1')){$rules['invoice_address_line_1'] = 'required';}
        if(request('invoice_address_line_2')){$rules['invoice_address_line_2'] = 'required';}
        if(request('invoice_email')){$rules['invoice_email'] = 'required';}

        return request()->validate($rules);


    }

    public function hitos()
    {
        // Hito::truncate();
        // foreach (config('app.actuations') as $key => $value) {

        //     $h = new Hito;
        //     $h->ref_id = $value['id'];
        //     $h->parent_id = null;
        //     $h->phase = $value['phase'];
        //     $h->name = $value['name'];
        //     $h->redirect_to = $value['redirect_to'];
        //     $h->save();

        //     if ($value['hitos']){
        //         foreach ($value['hitos'] as $ht){
        //             $h = new Hito;
        //             $h->ref_id = $ht['id'];
        //             $h->parent_id = $value['id'];
        //             $h->phase = null;
        //             $h->name = $ht['name'];
        //             $h->redirect_to = $ht['redirect_to'];
        //             $h->save();
        //         }
        //     }
        // }

        $hitos = Hito::all();

        return view('hitos.index',compact('hitos'));
    }

    public function templates()
    {
        $templates = Template::all();

        return view('templates.index', compact('templates'));
    }

    public function createTemplate($id = null){

        $tmp = Template::find($id);

        return view('templates.create', compact('tmp'));
    }

    public function saveTemplate(Request $r)
    {
        $t = new Template;
        $t->title = $r->title;

        if ($r->top_logo) {
            $top_logo = $r->file('top_logo')->store('uploads/templates', 'public');
            $t->top_logo = $top_logo;
        }

        if ($r->header_image) {
            $header_image = $r->file('header_image')->store('uploads/templates', 'public');
            $t->header_image = $header_image;
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
    }

    public function updateTemplate(Request $r, $id)
    {
        $t = Template::find($id);
        $t->title = $r->title;
        
        if ($r->top_logo) {
            $top_logo = $r->file('top_logo')->store('uploads/templates', 'public');
            $t->top_logo = $top_logo;
        }

        if ($r->header_image) {
            $header_image = $r->file('header_image')->store('uploads/templates', 'public');
            $t->header_image = $header_image;
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
    }

    public function createHitos($id = null){

        $ht = Hito::find($id);

        return view('hitos.create', compact('ht'));
    }

    public function saveHitos(Request $r)
    {
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
    }

    public function updateHitos(Request $r, $id)
    {
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
    }

    /**/

    public function deleteTemplates($id)
    {
        return $id;
    }
    public function deleteHitos($id)
    {
        return $id;
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
}
