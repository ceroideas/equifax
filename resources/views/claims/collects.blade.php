@extends('adminlte::page')

@section('title', 'Cobros')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cobros</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Facturas</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
{{-- Configuración del componente para el datatable --}}
    @php

        $heads = [
            'ID',
            'Fecha cobro',
            'Importe',
            'Concepto',
            'Factura',
            'Forma de pago',
            'Observaciones',
            'Traspasada',
            'Usuario'
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];


    @endphp






    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    @if(session()->has('err'))
        <x-adminlte-alert theme="warning" dismissable>
            {{ session('err') }}
        </x-adminlte-alert>
    @endif

    @if (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
        <a href="{{url('collects-export')}}" class="btn btn-sm btn-info">Exportar cobros (Formato contable)</a>
        <a href="{{ url('/collects/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important; font-size: 16px;" type="button" label="Registrar un cobro" icon="fas fa-lg fa-pencil"/></a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">

            @foreach($collects as $collect)
                <tr>
                    <td>{{ $collect->id }}</td>
                    <td>{{ Carbon\Carbon::parse($collect->feccob)->format('d-m-Y H:i') }}</td>
                    <td>{{number_format($collect->impcob,2,',','.')}} €</td>
                    <td>{{ $collect->cptcob }}</td>
                    <td>{{ $collect->invoice_id }}</td>
                    <td>{{ $collect->fpacob }}</td>
                    <td>{{ $collect->obscob }}</td>
                    <td>{{ $collect->tracob }}</td>
                    <td>{{ $collect->usuario->name }}</td>
                </tr>
            @endforeach

        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
