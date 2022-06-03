@extends('adminlte::page')

@section('title', 'Configuración de Tasas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Configuración de Tasas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Configuración de Tasas</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('configurations.partials._fees_form')
@stop
