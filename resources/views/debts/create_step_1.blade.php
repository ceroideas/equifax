@extends('adminlte::page')

@section('title', 'Registro Deuda')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Introduce los datos de la deuda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    {{-- <li class="breadcrumb-item"><a href="/panel/debtors"></a></li> --}}
                    <li class="breadcrumb-item active">Registro Deuda</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('progressbar', ['step' => 3])
   @include('debts.partials._form_step_one')
@stop
