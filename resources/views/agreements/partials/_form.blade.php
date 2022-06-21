{{-- <x-adminlte-alert theme="info">

</x-adminlte-alert> --}}

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
        margin-right: 16px !important;
        margin-left: 16px !important;
    }
    .input-group-prepend, .input-group-append {
        width: 8%;
    }

    .input-group-prepend button, .input-group-append button {
        width: 100%;
    }

    .slider {
        width: calc(88% - 80px) !important;
        top: 5px;
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
                <label for="deudas_otros_input">¿Qué importe sería satisfactorio para dar la deuda por saldada? *{{ old() ? '('.old('quitas').' €)' : '' }}</label>

                <x-adminlte-input-slider min="{{ session('claim_debt.pending_amount')/2 }}" max="{{ session('claim_debt.pending_amount') }}" id="deudas_otros_input" name="quitas" placeholder="Quitas" type="text" class=""
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_agreement') ? session('claim_agreement')->take : ''}}" >
                    <x-slot name="prependSlot">
                        <x-adminlte-button theme="Primary" label="{{ number_format(session('claim_debt.pending_amount')/2, 2,',','.') }} €"/>
                    </x-slot>
                    <x-slot name="appendSlot">
                        <x-adminlte-button theme="Primary" label="{{ number_format(session('claim_debt.pending_amount'), 2,',','.') }} €"/>
                    </x-slot>
                </x-adminlte-input-slider>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-select name="espera" label="¿Qué plazo máximo concederías al deudor para saldar la deuda? *" id="espera_input" class=""
                igroup-size="sm" enable-old-support="true">
                    <option selected disabled>Selecciona una opción</option>
                    <option {{ session('claim_agreement') ? (session('claim_agreement')->wait == '1 Mes' ? 'selected' : '') : ''}}>Pago único</option>
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
                <x-adminlte-textarea name="observaciones" label="Observaciones / Explicaciones" rows=4 enable-old-support="true" placeholder="Indica alguna pecularidad o condición sobre éste acuerdo">
                    {{ session('claim_agreement') ? session('claim_agreement')->observation : ''}}
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>

            <div class="col-sm-12">
                <x-adminlte-input name="iban" label="Identifique nº de cuenta donde ingresaremos las cantidades recuperadas" placeholder="Número de cuenta corriente" type="text"
                igroup-size="sm" value="{{ Auth::user()->iban }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">

                <div class="col-sm-12 text-left">
                    <span>(*) Los campos marcados son requeridos.</span>
                </div>

                <div class="col-sm-12 text-left">
                    <span class="d-none" id="quitas">
                        “<i>Usted esta dispuesto a que la deuda sea saldada si se recupera al menos la cantidad de... <b><span></span></b></i>”.
                    </span>
                </div>

                <div class="col-sm-12 text-left">
                    <span class="d-none" id="espera">
                        “<i>La cuota mensual durante <b><span></span></b> meses es de: <b><label></label></b></i>”.
                    </span>
                </div>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/check-agreement') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>

@section('js')

    <script>

        $( document ).ready(function() {
            console.log('Documento cargado');

        });

        function calcularCuotas()
        {
            let meses = parseInt($('#espera_input').val());
            if ($('#deudas_otros_input').val() > 0 && (meses && meses != 1)) {
                //console.log(meses);
                $('#espera').removeClass('d-none').find('span').text(meses)
                $('#espera').find('label').text( ($('#deudas_otros_input').val()/meses).toFixed(2).toString().replace(".", ",") +' €')  /*Aqui se parsea a 2 decimales con coma*/

                //console.log($('#espera').find('label').text( ($('#deudas_otros_input').val()/meses) +' €'));

            }else{
                $('#espera').addClass('d-none');

            }
        }

        $('#deudas_otros_input').on('slide change', function () {
            $('[for="deudas_otros_input"]').text("¿Qué importe sería satisfactorio para dar la deuda por saldada? * ("+$(this).val()+",00 €)");
            /*console.log('formatear importe: '+ $(this).val() + typeof($(this).val()));*/

            if ($(this).val() > 0) {
                $('#quitas').removeClass('d-none').find('span').text($(this).val()+',00 €');
            }else{
                $('#quitas').addClass('d-none');
            }

            calcularCuotas();
        });

        $('#espera_input').on('change',function(){
            calcularCuotas();
        })
    </script>
@stop
