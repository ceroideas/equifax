@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Introduce los datos del deudor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Deudores Registrados</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

    @if(session()->has('claim_client') || session()->has('claim_third_party'))
    @include('progressbar', ['step' => 2])
    @endif
{{-- Configuración del componente para el datatable --}}
    @php
    $heads = [
        ['label' => 'DNI'],
        'Nombre Completo',
        ['label' => 'Email'],
        ['label' => 'Tipo'],
        // ['label' => 'Status'],
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, ['orderable' => false]],
        'pageLength' => 25,
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif
    @if(session()->has('error'))
        <x-adminlte-alert theme="danger" dismissable>
            {{ session('error') }}
        </x-adminlte-alert>
    @endif
    @if(!session()->has('claim_client') && !session()->has('claim_third_party'))
        <x-adminlte-alert theme="primary" dismissable>
        <span>Para utilizar un deudor, inicia un proceso de reclamación</span>
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/debtors/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important; font-size: 16px;" type="button" label="Añadir los datos del deudor" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($debtors as $debtor)
                <tr>
                    <td>{{ $debtor->dni }}</td>
                    <td>{{ $debtor->name }}</td>
                    <td>{{ $debtor->email }}</td>
                    <td>{{ $debtor->getType() }}</td>
                    <td>
                     <nobr>
                        @if(session()->has('claim_client') || session()->has('claim_third_party'))
                        <a href="{{ url('/claims/save-debtor/' . $debtor->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Elegir">
                                <i class="fa fa-lg fa-fw fa-check"></i>
                            </button>
                        </a>
                        @endif
                        <a href="{{ url('/debtors/' . $debtor->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                        <a href="{{ url('/debtors/' . $debtor->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form id="delete-form-{{ $debtor->id }}" action="{{ url('/debtors/' . $debtor->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $debtor->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>

                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
    <div class="card-footer">
        <div class="row">
            <span class="float-left">(*) Selecciona o añade un deudor</span>
        </div>
        <!--<x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save" id="btnsiguiente"/>-->
        <a href="{{ url('claims/check-debtor') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
    </div>

@stop
