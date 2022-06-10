@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Nueva Reclamación</h1>
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
   {{-- @include('users.partials._form') --}}

   @include('progressbar', ['step' => 2])

   @if(session()->has('msj'))
    <x-adminlte-alert theme="success" dismissable>
        {{ session('msj') }}
    </x-adminlte-alert>
    @endif
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h1>¿El deudor ya está previamente registado?</h1></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <button class="btn btn-flat btn-success question-button" href="{{ url('/debtors') }}">SI</button></span>
            <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('/debtors/create') }}">NO</button></span>
            <span> <button class="btn btn-flat btn-default  question-button" href="{{ url('claims/check-debtor') }}">VOLVER</button></span>
        </div>
      </div>
   </x-adminlte-card>
@stop

@section('js')
<script>
    console.log('gola')
   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });
</script>
@stop
