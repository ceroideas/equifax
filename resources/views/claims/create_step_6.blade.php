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
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamación</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')


   @include('progressbar', ['step' => 6])
    
    <x-adminlte-alert theme="info">
        <span>¡Importante Si elige NO se eliminará toda la data recopilada hasta ahora del proceso y deberá empezar uno nuevo!</span>
    </x-adminlte-alert>

   @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif

   {{-- @dd(session('claim_debt')) --}}

   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h3>A partir de este momento, Ya ha introducido todos los datos requeridos por el sistema.</h3></span>
            <span><h3>¿Acepta tanto las Políticas de Uso como las Condiciones de Contratación?</h3></span>    
        </div>          
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">

            <div style="overflow: auto; height: 600px;">
                
                <p>
                    @include('terminos-condiciones')
                </p>

                <p>
                    @include('terminos-contratacion')
                </p>

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