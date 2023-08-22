@extends('adminlte::page')

@section('title', 'Plantillas de email')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Plantillas Registradas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Plantillas Registradas</li>
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
    	'Id',
        'Titulo',
        'Contenido',
        'CTA',
        'Firma',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, null, ['orderable' => false]],
        'order'=>[[0,'desc']],
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/configurations/templates/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($templates as $tmp)
                <tr>
                    <td>{{ $tmp->id }}</td>
                    <td>{{ $tmp->title }}</td>
                    <td>{!! strip_tags($tmp->body_content) !!}</td>
                    <td>{{ strip_tags($tmp->cta_button) }}</td>
                    <td>{{ strip_tags($tmp->signature) }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/configurations/templates/' . $tmp->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <!-- Boton eliminar template -->
                        <!--
                        <form id="delete-form-{{ $tmp->id }}" action="{{ url('/templates/' . $tmp->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tmp->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        -->
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
