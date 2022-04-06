<x-adminlte-alert theme="info">
  
</x-adminlte-alert>

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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Acuerdo">

    <form action="{{ url('/agreements/save-agreement') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-input id="deudas_otros_input" name="quitas" label="Quitas *" placeholder="Quitas" type="text" class=""
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_agreement') ? session('claim_agreement')->take : ''}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-address-"></i>
                    </div>
                </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-input name="espera" label="Espera *" placeholder="Esperas" type="text" class=""
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_agreement') ? session('claim_agreement')->wait : ''}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-address-"></i>
                    </div>
                </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-textarea name="observaciones" label="Observaciones / Explicaciones *" rows=4 enable-old-support="true" placeholder="Indica alguna pecularidad o condición sobre éste acuerdo">
                    {{ session('claim_agreement') ? session('claim_agreement')->observation : ''}}
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los Campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/check-agreement') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>