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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="">



    <form action="{{ isset($configuration) ?  url('/configurations/'. $configuration->id . '/fees') :  url('/configurations/fees') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($configuration))

            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="fijo" label="Fijo *" placeholder="Fijo" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="porcentaje" label="Porcentaje de las Deudas *" placeholder="Porcentaje de las Deudas" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->percentage_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="judicial" label="Tasa Judicial " placeholder="Tasa Judicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>


        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los Campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/panel') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>
