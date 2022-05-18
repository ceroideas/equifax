@extends('adminlte::page')

@section('title', 'Acreditación de Tercero')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Acreditación de Tercero</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/panel/claims">Reclamos</a></li>
                    <li class="breadcrumb-item active">Acreditación de Tercero</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

@if(session()->has('claim_third_party') && session()->has('claim_third_party') == 'waiting')
@include('progressbar', ['step' => 1])
@endif
   @include('third_parties.partials._form')
@stop