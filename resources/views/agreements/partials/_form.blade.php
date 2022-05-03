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

<style>
    #deudas_otros_input-slider {
        margin-right: 10px !important;
        margin-left: 10px !important;
    }
</style>


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Acuerdo">

    <form action="{{ url('/agreements/save-agreement') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <div class="row">
            <div class="col-sm-12">
                {{-- {{ json_encode(session()->all()) }}
                {{session('claim_debt.pending_amount')}} --}}
                @php
                @endphp
                <label for="deudas_otros_input">Quitas * {{ old() ? '('.old('quitas').'€)' : '' }}</label>
                <x-adminlte-input-slider min="0" max="{{session('claim_debt.pending_amount')}}" id="deudas_otros_input" name="quitas" placeholder="Quitas" type="text" class=""
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_agreement') ? session('claim_agreement')->take : ''}}" >
                    <x-slot name="prependSlot">
                        <x-adminlte-button theme="warning" label="0€"/>
                    </x-slot>
                    <x-slot name="appendSlot">
                        <x-adminlte-button theme="warning" label="{{session('claim_debt.pending_amount')}}€"/>
                    </x-slot>
                </x-adminlte-input-slider>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-select name="espera" label="Espera *" class=""
                igroup-size="sm" enable-old-support="true">
                    <option selected disabled></option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '1 Mes' ? 'selected' : '') : ''}}>1 Mes</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '2 Meses' ? 'selected' : '') : ''}}>2 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '3 Meses' ? 'selected' : '') : ''}}>3 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '4 Meses' ? 'selected' : '') : ''}}>4 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '5 Meses' ? 'selected' : '') : ''}}>5 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '6 Meses' ? 'selected' : '') : ''}}>6 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '7 Meses' ? 'selected' : '') : ''}}>7 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '8 Meses' ? 'selected' : '') : ''}}>8 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '9 Meses' ? 'selected' : '') : ''}}>9 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '10 Meses' ? 'selected' : '') : ''}}>10 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '11 Meses' ? 'selected' : '') : ''}}>11 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '12 Meses' ? 'selected' : '') : ''}}>12 Meses</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == 'Más 12 Meses' ? 'selected' : '') : ''}}>Más 12 Meses</option>
                </x-adminlte-select>
                {{-- <x-adminlte-input name="espera" label="Espera *" placeholder="Esperas" type="text" class=""
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_agreement') ? session('claim_agreement')->wait : ''}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-address-"></i>
                    </div>
                </x-slot>
                </x-adminlte-input> --}}
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

@section('js')

    <script>
        $('#deudas_otros_input').on('slide', function () {
            $('[for="deudas_otros_input"]').text("Quitas * ("+$(this).val()+"€)");
        });
    </script>
@stop