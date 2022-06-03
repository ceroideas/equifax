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
        <span>¡Importante Si elige NO se eliminará toda la data recopilada hasta ahora del proceso y deberá empezar uno nuevo!</span>
    </x-adminlte-alert>

   @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif --}}

   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span><h3>
                Confirmo que todos los datos e información aportados es verás

        </h3></span>
        </div>
      </div>
   </x-adminlte-card>
@stop

@section('js')
<script>

    /*$('.create-claim').on('click', function(){
       $('#create-claim-form').submit();
   });

   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });*/
</script>
@stop
