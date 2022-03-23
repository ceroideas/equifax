@extends('adminlte::page')

@section('title', 'Acreditación de Tercero')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro Deudor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/panel/debtors">Dedudores</a></li>
                    <li class="breadcrumb-item active">Registro Deudor</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('debtors.partials._form')
@stop