@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
        ['label' => 'Email'],
        'Newsletter',
        ['label' => 'Status'],
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

    @if (!Auth::user()->isClient())
        <a href="{{url('export-users')}}" class="btn btn-sm btn-warning">Exportar Usuarios</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->newsletter ? 'Si' : 'No' }}</td>
                    <td>{{ $user->getStatus() }}</td>
                    <td>
                     <nobr>
                        @can('create', $user)
                            <a href="{{ url('/users/' . $user->id . '/edit/') }}">
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </a>
                            <form id="delete-form-{{ $user->id }}" action="{{ url('/users/' . $user->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        @endcan
                        <a href="{{ url('/users/' . $user->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
