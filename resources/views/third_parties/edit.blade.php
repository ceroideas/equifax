@extends('adminlte::page')

@section('title', 'Acreditación de Tercero')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Acreditación de Tercero</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/third-parties">Terceros</a></li>
                    <li class="breadcrumb-item active">Editar Acreditación de Tercero</li>
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
