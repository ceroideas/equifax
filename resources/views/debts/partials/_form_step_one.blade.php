<x-adminlte-alert theme="primary">
    <span>¡Importante! Solo se puede reclamar una (1) deuda por concepto al mismo deudor, en caso de poseer múltiples conceptos debe registrar una reclamación para cada concepto.</span>
    <br>
    {{-- <span>¡Importante! Recuerde que es responable de toda la información adjuntada en éste apartado así como la veracidad de la misma y entiende de las consecuencias en caso de no resolverse de forma positiva el litigio.</span>
    <br> --}}
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

{{-- {{print_r(session('documentos'))}} --}}


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Deuda - Datos de la Deuda">

    <form action="{{ url('/debts/step-one/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="importe" label="Importe Principal *" placeholder="Importe Principal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->total_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="iva" label="Porcentaje de IVA *" placeholder="Porcentaje de IVA" type="number" step="0.01" min="0"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->tax : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="concepto" label="Concepto o Justificación *" placeholder="Concepto o Justificación" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            {{-- <div class="col-sm-6">
                <x-adminlte-input name="numero_documento" label="N° De Documento *" placeholder="N° De Documento" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->document_number : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div> --}}
        {{-- </div>
        <div class="row mt-2"> --}}
            <div class="col-sm-3">
                <x-adminlte-input name="fecha_deuda" label="Fecha de la Deuda *" placeholder="Fecha de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->debt_date : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-input name="fecha_vencimiento_deuda" label="Fecha de Venc. de la Deuda *" placeholder="Fecha de Vencimiento de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->debt_expiration_date : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-select2 id="tipo_deuda" name="tipo_deuda" label="Selecciona el Tipo de Deuda *" placeholder="Selecciona el Tipo de Deuda" class="form-control-sm" enable-old-support="true">

                    @foreach (config('app.deudas') as $key => $deuda)
                        <option {{session('claim_debt') ? (session('claim_debt')->type == $key ? 'selected' : '') : '' }} value="{{$key}}">{{$deuda['deuda']}}</option>
                    @endforeach

                    <optgroup label="Otro **">
                        <option value="-1">Especifique</option>
                    </optgroup>
                </x-adminlte-select2>
            </div>
        </div>
        <div id="deuda_otros" class="row d-none">
            <div class="col-sm-12">
                <x-adminlte-input id="deudas_otros_input" name="deuda_extra" label="Otro **" placeholder="Otro" type="text" class=""
                igroup-size="sm" enable-old-support="true">
                </x-adminlte-input>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="abonos" label="Abonos Realizados por el Deudor" placeholder="Abonos Realizados por el Deudor (La suma de lo abonado)" type="number" min="0"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->partials_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6 total">

                @if (old('amounts'))
                    <label>Pagos Parciales (en €) y Fecha en que se realizar&oacute;n</label>
                    @foreach (old('amounts') as $key => $am)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="number" min="0" value="{{old('amounts')[$key]}}" required class="form-control form-control-sm" onchange="makeCalculation()" step="0.01" min="0" name="amounts[]">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" value="{{old('dates')[$key]}}" required class="form-control form-control-sm" name="dates[]">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif (session('claim_debt') && session('claim_debt')->partials_amount_details)
                    <label>Pagos Parciales (en €) y Fecha en que se realizaron</label>
                    @foreach (json_decode(session('claim_debt')->partials_amount_details,true) as $key => $am)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="number" value="{{$am['amount']}}" required class="form-control form-control-sm" onchange="makeCalculation()" step="0.01" min="0" name="amounts[]">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" value="{{$am['date']}}" required class="form-control form-control-sm" name="dates[]">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="col-sm-6">
                <x-adminlte-input readonly name="importe_pendiente" label="Importe Pendientes de Pago *" placeholder="Importe Pendientes de Pago" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->pending_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <x-adminlte-textarea name="observaciones" label="Observaciones / Explicaciones **" rows=4 enable-old-support="true" placeholder="Observaciones / Explicaciones">
                    {{ session('claim_debt') ? session('claim_debt')->additionals : ''}}
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-select name="reclamacion_previa_indicar" label="¿Ha reclamado usted esta deuda anteriormente? " enable-old-support="true">
                    <option
                    {{session('claim_debt') ? (session('claim_debt')->reclamacion_previa_indicar == 0 ? 'selected' : '') : '' }} value="0">NO</option>
                    <option
                    {{session('claim_debt') ? (session('claim_debt')->reclamacion_previa_indicar == 1 ? 'selected' : '') : '' }} value="1">SI</option>
                </x-adminlte-select>
            </div>
        </div>

        <div id="reclamacion_previa_indicar_box"

        class="{{ ((old() && old('reclamacion_previa_indicar') == 1) || (session('claim_debt') && session('claim_debt')->reclamacion_previa_indicar == 1)) ? '' : 'd-none' }}">

            <div class="row">
                <div class="col-sm-6">
                    <x-adminlte-input name="fecha_reclamacion_previa" label="Fecha de la reclamación anterior *" type="date"
                    igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->fecha_reclamacion_previa : ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

                <div class="col-sm-6">
                    <x-adminlte-input name="reclamacion_previa" label="Documentación de la reclamación anterior *" type="file"
                    igroup-size="sm" enable-old-support="true">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-eur"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

                <div class="col-sm-12">
                    <x-adminlte-textarea name="motivo_reclamacion_previa" label="Motivo de oposición alegada por el deudor **" rows=4 enable-old-support="true">
                        {{ session('claim_debt') ? session('claim_debt')->motivo_reclamacion_previa : ''}}
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                </div>
            </div>

        </div>

        <hr>

        <label>Documentación de la Deuda *</label>

        <div class="text-left">

            @if (session()->has('errors') && $errors->has('document'))
                <span class="invalid-feedback d-block text-center mb-3" role="alert">
                    <strong>El campo documentos es obligatorio.</strong>
                </span>
            @endif


            <div id="all-documents">

                @if (session('documentos'))

                    @foreach (session('documentos') as $d)
                        <div class="form-group">

                            <div class="form-group">
                                <select name="document[]" required class="form-control form-control-sm" onchange="placeHito(this)">
                                    <option value=""></option>
                                    <option {{key($d) == "factura" ? "selected" : ""}} value="factura">FACTURA</option>
                                    <option {{key($d) == "albaran" ? "selected" : ""}} value="albaran">ALBARÁN</option>
                                    <option {{key($d) == "recibo" ? "selected" : ""}} value="recibo">RECIBO DE ENTREGA</option>
                                    <option {{key($d) == "contrato" ? "selected" : ""}} value="contrato">CONTRATO</option>
                                    <option {{key($d) == "hoja_encargo" ? "selected" : ""}} value="hoja_encargo">HOJA DE ENCARGO</option>
                                    <option {{key($d) == "hoja_pedido" ? "selected" : ""}} value="hoja_pedido">HOJA DE PEDIDO</option>
                                    <option {{key($d) == "reconocimiento" ? "selected" : ""}} value="reconocimiento">RECONOCIMIENTO DE DEUDA</option>
                                    <option {{key($d) == "extracto" ? "selected" : ""}} value="extracto">EXTRACTO BANCARIO</option>
                                    <option {{key($d) == "escritura" ? "selected" : ""}} value="escritura">ESCRITURA NOTARIAL</option>
                                    <option {{key($d) == "burofax" ? "selected" : ""}} value="burofax">BUROFAX</option>
                                    <option {{key($d) == "carta_certificada" ? "selected" : ""}} value="carta_certificada">CARTA CERTIFICADA</option>
                                    <option {{key($d) == "email" ? "selected" : ""}} value="email">E-MAILS</option>
                                    <option {{key($d) == "otros" ? "selected" : ""}} value="otros">OTROS.</option>

                                </select>
                            </div>

                            <div class="hitos">

                                @include('debts.documents.'.key($d), ["_i" => $d[key($d)]])

                            </div>

                            <button class="btn btn-sm btn-danger" type="button" onclick="$(this).parent().remove()">
                            <i class="fas fa-times"></i>
                            </button>

                            <hr>
                        </div>
                    @endforeach

                @endif

            </div>

            <button id="add-document" type="button" class="btn btn-success btn-lg"> <i class="fas fa-plus"></i> Añadir nuevo documento</button>

        </div>


        <hr>

        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <div class="row">
                <span class="float-left">(**) Por favor ingresa toda la información importante posible para la reclamación, esto nos ayudará a acelerar el proceso.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/create-debt/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>

@section('js')

<script>

    function makeCalculation(event) {
        /* Act on the event */
        let importe = parseFloat($('[name="importe"]').val());
        let iva = parseFloat($('[name="iva"]').val());

        let abonos = parseFloat(0);

        $.each($('[name="amounts[]"]'), function(index, val) {
            if ($(this).val() != "") {
                abonos = parseFloat(abonos) + parseFloat($(this).val());
            }
        });

        console.log(importe,iva,abonos);

        let pendiente = parseFloat(importe);

        if (importe != null && iva != null && abonos != null) {
            pendiente += parseFloat(((importe * iva)/100));

            pendiente -= parseFloat(abonos);
        }

        if (pendiente > 0) {
            $('[name="importe_pendiente"]').val(pendiente);
        }
    }

    $('[name="importe"],[name="iva"],.amounts').change(makeCalculation);

    $('[name="abonos"]').on('change',function(){

        let element = `
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <input type="number" required class="form-control form-control-sm" onchange="makeCalculation()" step="0.01" min="0" name="amounts[]">
                </div>
                <div class="col-sm-4">
                    <input type="date" required class="form-control form-control-sm" name="dates[]">
                </div>
            </div>
        </div>
        `;

        if ($(this).val() == 0) {
            $('.total').html("");
        }else{
            $('.total').html('<label>Pagos Parciales (en €) y Fecha en que se realizaron</label>');
            for (var i = 0; i < $(this).val(); i++) {
                $('.total').append(element);
            }
        }

    })

</script>

<script>
    $(document).ready(function(){
        $("#add-document").click();
    });

    $('#tipo_deuda').on('change', function(){
        console.log($(this).val());
        if($(this).val() == -1){

            $('#deuda_otros').find('label').html('Otro **')
            $('#deudas_otros_input').attr('placeholder', 'Indique la deuda');
            $('#deuda_otros').removeClass('d-none');

        }/*else if($(this).val() == 13){
            // console.log($('#deudas_otros_input'));
            $('#deuda_otros').find('label').html('Indique el motivo de la deuda *')
            $('#deudas_otros_input').attr('placeholder', 'Ej: ¿Ha sido dudosa y voluntaria por parte del deudor?');
            $('#deuda_otros').removeClass('d-none');

        }*/
        else{

            $('#deuda_otros').addClass('d-none');

        }
    });

    $('[name="reclamacion_previa_indicar"]').change(function(event) {

        if ($(this).val() == 1) {
            $('#reclamacion_previa_indicar_box').removeClass('d-none');
        }else{
            $('#reclamacion_previa_indicar_box').addClass('d-none');
        }
    });

    $('#add-document').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */

        $('#all-documents').append(`

            <div class="form-group">

                <div class="form-group">
                    <select name="document[]" required class="form-control form-control-sm" onchange="placeHito(this)">
                        <option value="">TIPO DE DOCUMENTO * </option>
                        <option value="factura">FACTURA</option>
                        <option value="albaran">ALBARÁN</option>
                        <option value="recibo">RECIBO DE ENTREGA</option>
                        <option value="contrato">CONTRATO</option>
                        <option value="hoja_encargo">HOJA DE ENCARGO</option>
                        <option value="hoja_pedido">HOJA DE PEDIDO</option>
                        <option value="reconocimiento">RECONOCIMIENTO DE DEUDA</option>
                        <option value="extracto">EXTRACTO BANCARIO</option>
                        <option value="escritura">ESCRITURA NOTARIAL</option>
                        <option value="burofax">BUROFAX</option>
                        <option value="carta_certificada">CARTA CERTIFICADA</option>
                        <option value="email">E-MAILS</option>
                        <option value="otros">OTROS</option>

                    </select>
                </div>

                <div class="hitos">

                </div>

                <button class="btn btn-sm btn-danger" type="button" onclick="$(this).parent().remove()">
                <i class="fas fa-times"></i>
                </button>

                <hr>
            </div>
        `)
    });

    function placeHito(e)
    {
        $.get('{{url('getHito')}}/'+($(e).val()), function(data, textStatus) {
            /*optional stuff to do after getScript */
            $(e).parent().parent().find('.hitos').html(data);
        });
    }


</script>
@error('deuda_extra')
    <script>
        $('#deuda_otros').removeClass('d-none');
    </script>
@enderror

@stop
