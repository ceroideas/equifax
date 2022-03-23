@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Deudores Registrados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">Deudores Registrados</li>
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
        'Nombre Completo',
        ['label' => 'DNI'],
        // ['label' => 'Status'],
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [
       
        'columns' => [null, null, null, ['orderable' => false]],
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/third-parties/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($debtors as $debtor)
                <tr>
                    <td>{{ $debtor->id }}</td>
                    <td>{{ $debtor->name }}</td>
                    <td>{{ $debtor->dni }}</td>
                    {{-- <td>{{ $debtor->getStatus() }}</td> --}}
                    <td>
                     <nobr>
                        <a href="{{ url('/claims/save-option-two/' . $debtor->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Elegir">
                                <i class="fa fa-lg fa-fw fa-check"></i>
                            </button>
                        </a>
                        <a href="{{ url('/third-parties/' . $debtor->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                        <a href="{{ url('/third-parties/' . $debtor->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form id="delete-form-{{ $debtor->id }}" action="{{ url('/third-parties/' . $debtor->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $debtor->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>

                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop