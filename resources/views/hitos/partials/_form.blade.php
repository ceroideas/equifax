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

	@if ($ht)
    <form action="{{ url('/configurations/hitos/' . $ht->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
    <form action="{{ url('/configurations/hitos/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="ref_id" label="Id de referencia *" placeholder="Título" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($ht) ? $ht->ref_id : ''}}">
                        {{-- <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot> --}}
                    </x-adminlte-input>
                </div>
            </div>


            <div class="col-sm-4">
                
                <x-adminlte-select2 id="phase" name="phase[]" igroup-size="sm" enable-old-support="true" label="Fase en que se muestra (hito padre)" multiple="multiple">
                    <option {{isset($ht) && $ht->phase ? (in_array(1, $ht->phase) ? 'selected' : '') : ''}} value=1>Judicial</option>
                    <option {{isset($ht) && $ht->phase ? (in_array(2, $ht->phase) ? 'selected' : '') : ''}} value=2>Extrajudicial</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="redirect_to" label="Crear actuación" placeholder="Colocar el Id de referencia de otro hito" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($ht) ? $ht->redirect_to : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-6">

                <x-adminlte-select2 name="parent_id" igroup-size="sm" enable-old-support="true" label="Hito padre">
                    <option selected></option>
                    @foreach (App\Models\Hito::whereNull('parent_id')->get() as $h)
                        <option {{isset($ht) ? ($ht->parent_id == $h->ref_id ? 'selected' : '') : ''}} value="{{$h->ref_id}}">{{$h->ref_id}} - {{$h->name}}</option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <x-adminlte-input name="name" label="Título *" placeholder="Título" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($ht) ? $ht->name : ''}}">
                        {{-- <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot> --}}
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-12">
                <hr>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <x-adminlte-select2 name="template_id" igroup-size="sm" enable-old-support="true" label="Enviar email">
                        <option>Plantilla email</option>
                        @foreach (App\Models\Template::all() as $t)
                            <option {{$ht ? ($ht->template_id == $t->id ? 'selected' : '') : ''}} value="{{$t->id}}">{{ $t->id }} - {{$t->title}}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="send_interval" label="Intervalo de envío" placeholder="Intervalo en horas" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($ht) ? $ht->send_interval : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="send_times" label="Veces que se envía" placeholder="Veces totales que se enviará el email" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($ht) ? $ht->send_times : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

        </div>

        <div class="card-footer">

             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/configurations/hitos') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

        </div>
    </form>
</x-adminlte-card>
