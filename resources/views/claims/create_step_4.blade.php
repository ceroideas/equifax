@extends('adminlte::page')

@section('title', 'Nueva Reclamación')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nueva Reclamación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamación</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')


    @include('progressbar', ['step' => 2])

    @if(session()->has('msj'))
    <x-adminlte-alert theme="success" dismissable>
        <span> {{ session('msj') }}</span>
    </x-adminlte-alert>
    @endif
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
    <form action="{{url('claims/check_debtor')}}" method="POST">
        {{csrf_field()}}

        <span> <h1>Selecciona el tipo de deuda</h1></span>
      {{-- Select --}}

      <div class="row">
        <div class="col-sm-12">
            <x-adminlte-select2 id="tipo_deuda" name="tipo_deuda" placeholder="Selecciona el Tipo de Deuda" class="form-control-sm" enable-old-support="true">

                @foreach (config('app.deudas') as $key => $deuda)
                    <option {{session('claim_debt') ? (session('claim_debt')->type == $key ? 'selected' : '') : '' }} value="{{$key}}">{{$deuda['deuda']}}</option>
                @endforeach
                <optgroup label=""></optgroup>
                @foreach (config('app.no_viables') as $clave => $no_viable)
                    <option {{session('claim_debt') ? (session('claim_debt')->type == $clave ? 'selected' : '') : '' }} value="{{$clave+12}}">{{$no_viable['deuda']}}</option>
                @endforeach
                <optgroup label="Otro **">
                    <option value="-1">Especifique</option>
                </optgroup>
            </x-adminlte-select2>
        </div>
      </div>

        {{-- Select Fin --}}

        <div id="deuda_otros" class="row d-none">
            <div class="col-sm-12">
                <x-adminlte-input id="deudas_otros_input" name="deuda_extra" label="Otro **" placeholder="Otro" type="text" class=""
                igroup-size="sm" enable-old-support="true">
                </x-adminlte-input>
            </div>
        </div>

        {{-- Texto otros --}}

      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h1>¿El deudor está en concurso de acreedores?</h1></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-info">
                <input type="radio" name="concurso" value="1"> Si
              </label>
              <label class="btn btn-outline-info">
                <input type="radio" name="concurso" value="0"> No
              </label>
            </div>

            <br>
            <br>

            {{-- <span> <button class="btn btn-flat btn-success question-button" href="{{ url('claims/invalid-debtor') }}">SI</button></span>     --}}
            {{-- <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('claims/select-debtor') }}">NO</button></span>  --}}
            <span> <button class="btn btn-flat btn-success  question-button" type="submit" disabled {{-- href="{{ url('claims/check_debtor') }}" --}}>CONTINUAR</button></span>
            <span> <button class="btn btn-flat btn-default  question-button" type="button" href="{{ url('claims/select-client') }}">VOLVER</button></span>
        </div>
      </div>
     </form>
   </x-adminlte-card>
@stop

@section('js')
<script>

   $('.question-button').on('click', function(){
        //console.log("Evalua");
        //console.log($(this).attr('href'));
        location.href = $(this).attr('href');

   });

   $('[name="options"],[name="concurso"]').on('change',function(){

        //if ($('[name="options"]:checked').length && $('[name="concurso"]:checked').length) {
        if ($('[name="concurso"]:checked').length) {
            $('.question-button').removeAttr('disabled');
        }
        //console.log("Preguntas");
   });



   $('#tipo_deuda').on('change', function(){
        //console.log('Valor seleccionado: '+$(this).val());
    if($(this).val() == -1){

        $('#deuda_otros').find('label').html('Otro **')
        $('#deudas_otros_input').attr('placeholder', 'Indique el tipo de deuda');
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

</script>
@stop
