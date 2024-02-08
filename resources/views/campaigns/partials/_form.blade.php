@if(session()->has('msj'))
<x-adminlte-alert theme="success" dismissable>
    {{ session('msj') }}
</x-adminlte-alert>
@endif
@if(session()->has('alert'))
<x-adminlte-alert theme="warning" dismissable>
{{ session('alert') }}
</x-adminlte-alert>
@endif

<style>
	.hide {
		display: none;
	}
</style>

<x-adminlte-card header-class="hide" theme="orange" theme-mode="outline">

	@if ($campaign)
        <form action="{{ url('/configurations/campaigns/' . $campaign->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
        <form action="{{ url('/configurations/campaigns/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="id" label="Id de Campaña" placeholder="Id Campaña" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->id : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">

                <x-adminlte-select2 id="type" name="type" igroup-size="sm" enable-old-support="true" label="Tipo campaña">
                    <option {{isset($campaign->type) ? ($campaign->type==0?'selected':''): ''}} value=1>Sorteo</option>
                    <option {{isset($campaign->type) ? ($campaign->type==1?'selected':''): ''}} value=2>Descuento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="name" label="Nombre" placeholder="Nombre" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->name : ''}}">
                    </x-adminlte-input>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-sm-4">
                <x-adminlte-select2 id="discount_type" name="discount_type" igroup-size="sm" enable-old-support="true" label="Tipo de descuento">
                    <option {{isset($campaign->discount_type) ? ($campaign->discount_type==NULL?'selected':''): ''}} value=NULL></option>
                    <option {{isset($campaign->discount_type) ? ($campaign->discount_type==1?'selected':''): ''}} value=1>Porcentaje</option>
                    <option {{isset($campaign->discount_type) ? ($campaign->discount_type==2?'selected':''): ''}} value=2>Importe</option>
                </x-adminlte-select2>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="discount" label="Descuento" placeholder="Descuento" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->discount : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <x-adminlte-select2 id="claim_code" name="claim_code" igroup-size="sm" enable-old-support="true" label="Tipo de reclamación">
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code==NULL?'selected':''): ''}} value=NULL></option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='EXT-001'?'selected':''): ''}} value='EXT-001'>Extrajudicial</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='JUD-001'?'selected':''): ''}} value='JUD-001'>Judicial</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='VER-001'?'selected':''): ''}} value='VER-001'>Verbal</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='ORD-001'?'selected':''): ''}} value='ORD-001'>Ordinario</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='EJE-001'?'selected':''): ''}} value='EJE-001'>Ejecución</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='RES-001'?'selected':''): ''}} value='RES-001'>Recurso</option>
                    <option {{isset($campaign->claim_code) ? ($campaign->claim_code=='DEP-001'?'selected':''): ''}} value='DEP-001'>Déposito</option>
                </x-adminlte-select2>
            </div>

                {{--@foreach (App\Models\Template::all() as $t)
                            <option {{$ht ? ($ht->template_id == $t->id ? 'selected' : '') : ''}} value="{{$t->id}}">{{ $t->id }} - {{$t->title}}</option>
                    @endforeach --}}



        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    @if(isset($campaign->type))
                        @if($campaign->type==0)
                            <x-adminlte-input name="prefix" label="Prefijo" placeholder="Prefijo" type="text"
                            igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->prefix : ''}}">
                            </x-adminlte-input>
                        @else
                            <x-adminlte-input name="prefix" label="Prefijo" placeholder="" type="text"
                            igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->prefix : ''}}" disabled>
                            </x-adminlte-input>
                        @endif

                    @else
                        <x-adminlte-input name="prefix" label="Prefijo" placeholder="" type="text"
                        igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->prefix : ''}}">
                        </x-adminlte-input>
                    @endif

                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    {{-- <x-adminlte-input name="init_date" label="Fecha inicio" placeholder="Fecha inicio" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->init_date : ''}}">
                    </x-adminlte-input> --}}

                    <x-adminlte-input name="init_date" label="Fecha de inicio *" placeholder="Fecha de inicio" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? Carbon\Carbon::parse($campaign->init_date)->format('Y-m-d') : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
{{--                     <x-adminlte-input name="end_date" label="Fecha fin" placeholder="Fecha fin" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? $campaign->end_date : ''}}">
                    </x-adminlte-input> --}}

                    <x-adminlte-input name="end_date" label="Fecha de fin *" placeholder="Fecha de fin" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($campaign) ? Carbon\Carbon::parse($campaign->end_date)->format('Y-m-d') : ''}}">
                    </x-adminlte-input>

                </div>
            </div>


            <div class="col-sm-3">
                <x-adminlte-select2 id="all_users" name="all_users" igroup-size="sm" enable-old-support="true" label="Todos los usuarios">
                    <option {{isset($campaign->all_users) ? ($campaign->all_users==0?'selected':''): ''}} value=0>No</option>
                    <option {{isset($campaign->all_users) ? ($campaign->all_users==1?'selected':''): ''}} value=1>Si</option>
                </x-adminlte-select2>
            </div>


        </div>

        <div class="card-footer">

             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/configurations/campaigns') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

        </div>
    </form>
</x-adminlte-card>
