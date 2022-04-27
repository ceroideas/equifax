@extends('adminlte::page')

@section('title', 'Reclamaciones')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reclamaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reclamaciones</li>
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
        'Cliente',
        'Deudor',
        ['label' => 'Importe Pendiente'],
        ['label' => 'Status'],
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [
       
        'columns' => [null, null, null, null, null, ['orderable' => false]],
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

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($claims as $claim)
                <tr>
                    <td>{{ $claim->id }}</td>
                    <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
                    <td>{{ $claim->debtor->name }}</td>
                    <td>{{ $claim->debt->pending_amount }}</td>
                    <td>{{ $claim->getStatus() }}</td>
                    <td>
                     <nobr>
                        @can('create', $claim)
                            <a href="{{ url('/claims/' . $claim->id . '/edit/') }}">
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </a>
                            <form id="delete-form-{{ $claim->id }}" action="{{ url('/claims/' . $claim->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $claim->id }}').submit();">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        @endcan
                        <a href="{{ url('/claims/' . $claim->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>

                        @if ($claim->invoices)
                            <a href="{{ url('/claims/actuations/' . $claim->id ) }}">
                                <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Actuaciónes">
                                    <i class="fa fa-lg fa-fw fa-list"></i>
                                </button>
                            </a>
                        @endif

                        @if (Auth::user()->id == $claim->user_id && $claim->last_invoice)
                        {{-- @if ($claim->status == 7) --}}
                            <a href="{{ url('/claims/payment/' . $claim->id ) }}">
                                <button class="btn btn-xs btn-default text-info mx-1 shadow" title="Pagar">
                                    <i class="fa fa-lg fa-fw fa-credit-card"></i>
                                </button>
                            </a>
                        @endif
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop