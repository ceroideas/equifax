@extends('adminlte::page')

@section('title', 'Códigos descuento')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Códigos de descuento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Panel</a></li>
                    <li class="breadcrumb-item active">Códigos de descuento</li>
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
    	'Id',
        'Código',
        'Descripción',
        'Fecha inicio',
        'Fecha fin',
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

    <a href="{{ url('/configurations/discount-codes/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">

            @foreach($discountCodes as $discountCode)
                <tr>
                    <td>{{ $discountCode->id }}</td>
                    <td>{{ $discountCode->code }}</td>
                    <td>{{ $discountCode->description }}</td>
                    <td>{{ Carbon\Carbon::parse($discountCode->date_from)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($discountCode->date_end)->format('d/m/Y') }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/configurations/discount-codes/' . $discountCode->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <!-- Boton eliminar discountCode -->
                        {{--<form id="delete-form-{{ $discountCode->id }}" action="{{ url('/discount-codes/' . $discountCode->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $discountCode->id }}').submit();">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>--}}

                    </nobr>
                    </td>
                </tr>
            @endforeach


        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
