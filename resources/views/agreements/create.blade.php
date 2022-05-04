@extends('adminlte::page')

@section('title', 'Registro de Acuerdo')

@section('plugins.BootstrapSlider', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro de Acuerdo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/panel/debtors"></a></li> --}}
                    <li class="breadcrumb-item active">Registro de Acuerdo</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('agreements.partials._form')
@stop