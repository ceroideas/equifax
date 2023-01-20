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

	@if ($dc)
    <form action="{{ url('/configurations/discount-codes/' . $dc->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
    <form action="{{ url('/configurations/discount-codes/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="id" label="Id" placeholder="Automático" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? $dc->id : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="status" label="Estado" placeholder="Status" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? ($dc->status==1 ? 'Activo': 'Inactivo') : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="date_from" label="Fecha de inicio *" placeholder="Fecha de inicio" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? Carbon\Carbon::parse($dc->date_from)->format('Y-m-d') : ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <x-adminlte-input name="date_end" label="Fecha de fin *" placeholder="Fecha de fin" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? Carbon\Carbon::parse($dc->date_end)->format('Y-m-d') : ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <x-adminlte-input name="code" label="Código *" placeholder="Código" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? $dc->code : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <x-adminlte-input name="description" label="Descripción *" placeholder="Descripción" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($dc) ? $dc->description : ''}}">
                    </x-adminlte-input>
                </div>
            </div>
        </div>

        <div class="card-footer">
             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
             </div>
            <div class="row">
                <span class="float-left">(*) El estado cambia automáticamente con la fecha de validez.</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/configurations/discount-codes') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>
