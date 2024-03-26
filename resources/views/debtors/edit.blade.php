@extends('adminlte::page')

@php $decryptedName = isset($debtor->name) ? Crypt::decryptString($debtor->name) : NULL; @endphp

@section('title', 'Editar Deudor {{ $decryptedName }}')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Deudor {{ $decryptedName }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/panel/debtors">Deudores</a></li>
                    <li class="breadcrumb-item active">Editar Deudor {{ $decryptedName }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @if(session()->has('claim_client') || session()->has('claim_third_party'))
    @include('progressbar', ['step' => 2])
    @endif
    @include('debtors.partials._form')
@stop
