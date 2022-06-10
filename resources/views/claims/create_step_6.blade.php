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
            Confirmo que todos los datos e información aportada es veráz. * <br>

            <small>
                <i>* La información que aporte el/la Cliente/a se dará por buena, siendo responsabilidad única y exclusiva de quien introduce esa información en el sistema lo que en ella se vierta, afirme o manifieste. </i>
            </small>
        </h3></span>

        <br>
            <span><h3>
                ¿Acepta los Términos y Condiciones de uso Generales y Protección de Datos?
            {{-- ¿Acepta tanto las Políticas de Uso como las Condiciones de Contratación? --}}
        </h3></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">

            <div style="overflow: auto; height: 600px;">

                <p>
                    @include('terminos-condiciones')
                </p>

                {{-- <p>
                    @include('terminos-contratacion')
                </p> --}}

                <form id="create-claim-form" action="{{ url('/claims') }}"method="POST" >
                    @csrf
                    @method('POST')
                </form>
                <span> <button class="btn btn-flat btn-success create-claim">SI</button></span>
                <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('claims/flush-options') }}">NO</button></span>
                <span> <button class="btn btn-flat btn-default  question-button" href="{{ url('claims/check-agreement') }}">Volver</button></span>
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
</script>
@stop
