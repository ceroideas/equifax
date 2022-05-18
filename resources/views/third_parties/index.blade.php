@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Terceros Registrados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">Terceros Registrados</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
{{-- Configuración del componente para el datatable --}}
    
    @if(session()->has('claim_third_party') && session()->has('claim_third_party') == 'waiting')
    @include('progressbar', ['step' => 1])
    @endif

    @php
    $heads = [
        ['label' => 'DNI'],
        'Nombre Completo',
        'Representante Legal',
        'DNI Representante',
        
        // ['label' => 'Status'],
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [
       
        'columns' => [null, null, null, null, ['orderable' => false]],
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    @if(session()->has('claim_client'))
        <x-adminlte-alert theme="info" dismissable>
           <span>Para utilizar un Tercero, elija "NO" al iniciar el proceso de reclamación</span>
        </x-adminlte-alert>
    @endif

    @if(session()->has('claim_third_party') && session()->has('claim_third_party') == 'waiting')
        <a href="{{ url('/claims/select-client') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-white " style="color: black !important;" type="button" label="Volver" icon="fas fa-lg fa-pencil"/></a>
    @endif

    <a href="{{ url('/third-parties/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($third_parties as $third_party)
                <tr>
                    <td>{{ $third_party->dni }}</td>
                    <td>{{ $third_party->name }}</td>
                    <td>{{ $third_party->legal_representative }}</td>
                    <td>{{ $third_party->representative_dni }}</td>
                    
                    {{-- <td>{{ $third_party->getStatus() }}</td> --}}
                    <td>
                     <nobr>
                        @if(session()->has('claim_third_party') && session()->get('claim_third_party') == 'waiting')
                        <a href="{{ url('/claims/save-option-two/' . $third_party->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Elegir">
                                <i class="fa fa-lg fa-fw fa-check"></i>
                            </button>
                        </a>
                        @endif
                        <a href="{{ url('/third-parties/' . $third_party->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                        <a href="{{ url('/third-parties/' . $third_party->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form id="delete-form-{{ $third_party->id }}" action="{{ url('/third-parties/' . $third_party->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $third_party->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>

                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop