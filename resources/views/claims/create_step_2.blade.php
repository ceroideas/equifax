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
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamación</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   {{-- @include('users.partials._form') --}}
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h1>¿El deudor ya está previamente registado?</h1></span>    
        </div>          
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <button class="btn btn-flat btn-success question-button" href="{{ url('claims/create/step-two') }}">SI</button></span>    
            <span> <button class="btn btn-flat btn-danger  question-button" >NO</button></span> 
        </div>          
      </div>
   </x-adminlte-card>
@stop

@section('js')
console.log('gola')
   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });
@stop