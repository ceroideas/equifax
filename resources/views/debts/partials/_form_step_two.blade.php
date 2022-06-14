<x-adminlte-alert theme="primary">
    <span>¡Importante! Sólo se puede reclamar una (1) deuda por concepto al mismo deudor, en caso de poseer múltiples conceptos debe registrar una reclamación para cada concepto.</span>
    <br>
    <span>¡Importante! Recuerde que es responable de toda la información adjuntada en éste apartado así como la veracidad de la misma y entiende de las consecuencias en caso de no resolverse de forma positiva el litigio.</span>
    <br>
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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Deuda (Parte 2) - Tipo de Deuda">



    <form action="{{ url('/debts/step-two/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-select2 id="tipo_deuda" name="tipo_deuda" label="Selecciona el Tipo de Deuda *" placeholder="Selecciona el Tipo de Deuda" class="form-control-lg" enable-old-support="true">
                    <option {{ !isset($user) ? 'selected' : ''}} disabled>Selecciona el Tipo de Deuda</option>
                    <option value="1">Letras de cambio, cheques, talones o pagarés</option>
                    <option value="2">Abono por parte del deudor consumidor a los comerciantes el precio de los productos vendidos</option>
                    <option value="3">Honorarios, derechos, gastos y desembolsos por el desempeño de sus cargos a jueces, abogados, procuradores, registradores, notarios, peritos y otros profesionales del derecho</option>
                    <option value="4">Deudas que tengan los Farmacéuticos por las medicinas que suministraron y no le pagaron </option>
                    <option value="5">A los Profesores, Maestros y profesionales liberales en general (médicos, arquitectos y aparejadores) sus honorarios</option>
                    <option value="6">Abono de comida y habitación (hoteles)</option>
                    <option value="7">Deudas con empresas de suministros (luz, agua, gas, teléfono)</option>
                    <option value="8">Por prestación de servicios [una persona se obligar a realizar  un servicio a cambio de un precio]</option>
                    <option value="9">Abono por parte del deudor comerciante (si compra cosas muebles para revenderlas) a los comerciantes el precio de los productos vendidos</option>
                    <option value="10">Pagos que se hagan por años o plazos más breves</option>
                    <optgroup label="Por entrega de mercancías por carretera">
                        <option value="11">En General</option>
                        <option value="12">Actuación Dudosa o Consciente y Voluntaria</option>
                        <option value="13">Transportes Internacionales</option>
                    </optgroup>
                    <optgroup label="En Cataluña">
                        <option value="14">Deudas no contempladas especificadamente</option>
                        <option value="15">Reclamación de deudas derivadas de un contrato de ejecución de obras o prestación de servicios </option>
                        <option value="16">Pagos que se hagan por años o plazos más breves</option>
                        <option value="17">Reparación de daños por responsabilidad extracontractual por culpa o negligencia</option>
                    </optgroup>
                    <optgroup label="Otro **">
                        <option value="18">Especifique</option>
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
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-12 text-left">

                <span>(*) Los campos marcados son requeridos.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left">

                <span>(**) Para éste tipo de Deuda los administradores tendrán que evaluar y estudiarla para decidir si es tomada en cuenta o no, puede tomar más tiempo con respecto a las otras elecciones.</span>
                </div>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/debts/create/step-one') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>


@section('js')
    <script>
        $('#tipo_deuda').on('change', function(){

            if($(this).val() == 18){

                $('#deuda_otros').find('label').html('Otro **')
                $('#deudas_otros_input').attr('placeholder', 'Indique la deuda');
                $('#deuda_otros').removeClass('d-none');

            }else if($(this).val() == 13){
                // console.log($('#deudas_otros_input'));
                $('#deuda_otros').find('label').html('Indique el motivo de la deuda *')
                $('#deudas_otros_input').attr('placeholder', 'Ej: ¿Ha sido dudosa y voluntaria por parte del deudor?');
                $('#deuda_otros').removeClass('d-none');

            }
            else{

                $('#deuda_otros').addClass('d-none');

            }
        });


    </script>
    @error('deuda_extra')
        <script>
            $('#deuda_otros').removeClass('d-none');
        </script>
    @enderror
    @if(old('deuda_extra'))

    @endif
@stop
