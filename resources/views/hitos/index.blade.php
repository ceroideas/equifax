@extends('adminlte::page')

@section('title', 'Hitos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hitos Registrados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Hitos Registrados</li>
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
    	'Ref Id',
        'Fase',
        'Nombre',
        'Hito Padre',
        'Enviar Email',
        'Genera actuación / Redirecciona',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, null, null, ['orderable' => false]],
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/configurations/hitos/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($hitos as $hito)
                <tr>
                    <td>{{ $hito->ref_id }}</td>
                    <td>{{ $hito->getPhases() }}</td>
                    <td>{{ $hito->name }}</td>
                    <td>{{ $hito->parent_id }}</td>
                    <td>{{ $hito->template ? $hito->template->title : '' }}</td>
                    <td>{{ $hito->redirect_to }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/configurations/hitos/' . $hito->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form id="delete-form-{{ $hito->id }}" action="{{ url('/hitos/' . $hito->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $hito->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>

                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
