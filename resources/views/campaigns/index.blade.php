@extends('adminlte::page')

@section('title', 'Campañas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Campañas Registradas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Panel</a></li>
                    <li class="breadcrumb-item active">Campañas</li>
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
        'Tipo',
        'Referencia',
        'Nombre',
        'Tipo de descuento',
        'Descuento',
        'Tipo de reclamación',
        'Prefijo sorteo',
        'Fecha inicio',
        'Fecha fin',
        'Todos los usuarios',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, null, null, null,null, null, null, null, ['orderable' => false]],
        'order'=>[[0,'asc']],
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

    <a href="{{ url('/configurations/campaigns/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->type==0?'Sorteo':'Descuento' }}</td>
                    <td>{{ $campaign->referenced }}</td>
                    <td>{{ $campaign->name }}</td>
                    <td>{{ isset($campaign->discount_type)?($campaign->discount_type==1?'Porcentaje':'Importe'):'' }}</td>
                    <td>{{ $campaign->discount }} {{ isset($campaign->discount_type)?($campaign->discount_type==1?'%':'€'):''  }}</td>
                    <td>{{ $campaign->claim_code }}</td>
                    <td>{{ $campaign->prefix }}</td>
                    <td>{{ Carbon\Carbon::parse($campaign->init_date)->format('d/m/Y') }} </td>
                    <td>{{ Carbon\Carbon::parse($campaign->end_date)->format('d/m/Y') }}</td>
                    <td>{{ $campaign->all_users==0?'No':'Si' }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/configurations/campaigns/' . $campaign->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
