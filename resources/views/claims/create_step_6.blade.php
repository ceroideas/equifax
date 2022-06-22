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


   @include('progressbar', ['step' => 5])

    {{-- <x-adminlte-alert theme="info">
        <span>¡Importante Si elige NO se eliminará toda la información recopilada hasta ahora del proceso y deberá empezar uno nuevo!</span>
    </x-adminlte-alert> --}}

   {{-- @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif --}}
    @if ($prescribe)
    <x-adminlte-alert theme="success" dismissable>
       <span> {{ $message }}</span> <br>

            Estás a un paso de decir adiós a tus facturas impagadas.
    </x-adminlte-alert>
    @else
    <x-adminlte-alert theme="warning" dismissable>
       <span> {{ $message }}</span> <br>

            Esta deuda solo es reclamable extrajudicialmente. Si deseas iniciar con la reclamación proceda al pago.
    </x-adminlte-alert>
    @endif

   {{-- @dd(session('claim_debt')) --}}

   <x-adminlte-card header-class="d-none text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h3>
            {{-- A partir de este momento, Ya ha introducido todos los datos requeridos por el sistema. --}}
            Confirmo que todos los datos e información aportada es veraz. * <br>

            <small>
                <i>La información que aporte el/la Cliente se dará por buena, siendo responsabilidad única y exclusiva de quien introduce esta información en el sistema. * </i>
            </small>
        </h3></span>

        <br>
            <span><h3>
                ¿Acepta los Términos y Condiciones de uso Generales y Protección de Datos?
            {{-- ¿Acepta tanto las Políticas de Uso como las Condiciones de Contratación? --}}
        </h3></span>
        </div>
      </div>

<div class="custom-control custom-checkbox mb-3">
    <a data-toggle="modal" href="#terminos" style="color: #666">
    <input onclick="return false" class="custom-control-input @error('tos') is-invalid @enderror" type="checkbox" id="customCheckbox1" value="1" name="tos">
    <label for="customCheckbox1" class="custom-control-label">* Aceptar los Términos y Condiciones de uso General</label></a>
    @error('tos')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="card-footer">
    <div class="row">
        <span class="float-left">(*) Los campos marcados son requeridos.</span>
    </div>
    <!--<x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save" id="btnsiguiente"/>-->
    <a href="{{ url('claims/check-agreement') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
</div>

    <div class="row">
        <div class="col-sm-12 text-center">
            {{--<div style="overflow: auto; height: 600px;">--}}
            <div>
                <p>
                {{-- <p>
                    @include('terminos-condiciones')
                    --}}
                </p>

                {{-- <p>
                    @include('terminos-contratacion')
                </p> --}}

                <form id="create-claim-form" action="{{ url('/claims') }}"method="POST" >
                    @csrf
                    @method('POST')
                </form>

                <div class="modal fade" id="terminos" style="max-width: 100%;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header" style="color: #111"></div>
                            <div class="modal-body">

                                <div style="height: 600px; overflow: auto;">
                                    @include('terminos-condiciones')

                                    {{-- <br>

                                    @include('terminos-contratacion') --}}

                                    {{-- <button data-dismiss="modal" id="accept-terms" class="btn btn-sm btn-success">Aceptar los términos</button> --}}
                                    <button data-dismiss="modal" id="accept-terms" class="btn btn-flat btn-success create-claim">Aceptar los términos</button>
                                    <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
                                </div>
                            </div>
                            {{-- <div class="modal-footer"></div> --}}
                        </div>
                    </div>
                </div>

{{--
                <span> <button class="btn btn-flat btn-success create-claim">SI</button></span>
                <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('claims/flush-options') }}">NO</button></span>
                <span> <button class="btn btn-flat btn-default  question-button" href="{{ url('claims/check-agreement') }}">Volver</button></span>
--}}
            </div>
        </div>
      </div>
   </x-adminlte-card>
@stop

@section('js')
<script>

    $('.create-claim').on('click', function(){
       $('#create-claim-form').submit();
   });

   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });

   $('#accept-terms').click(function(event) {
            /* Act on the event */
            $('#customCheckbox1').prop('checked', true)
        });

/*        $('#btnsiguiente').click(function(event) {
            console.log("Boton aceptar");
            /* Act on the event */
  /*          $('#customCheckbox1').prop('checked', true)
        });*/
</script>
@stop
