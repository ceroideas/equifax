@extends('adminlte::page')

@section('title', 'Crear cobro ')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro de cobro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/collects">Cobros</a></li>
                    <li class="breadcrumb-item active">Registro de cobro</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    {{--@if(session()->has('claim_client') || session()->has('claim_third_party'))
    @include('progressbar', ['step' => 2])
    @endif--}}
   @include('collects.partials._form')
@stop
