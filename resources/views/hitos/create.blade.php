@extends('adminlte::page')

@section('title', 'Plantillas de emails')

@section('plugins.Summernote', true)

@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro Hitos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/panel/claims')}}">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Registro Hitos</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('hitos.partials._form')
@stop
