@extends('adminlte::page')

@section('title', 'Campañas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Participantes de campañas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Panel</a></li>
                    <li class="breadcrumb-item active">Participantes</li>
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
        'Campaña id',
        'Email',
        'Nombre',
        'Participación habilitada',
        'Fecha alta',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, null, null, ['orderable' => false]],
        'order'=>[[0,'desc']],
        'pageLength' => 50,
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];

    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/configurations/participants/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($participants as $participant)
                @php
                    $decryptedEmail = Crypt::decryptString($participant->email);
                    $decryptedNombre = Crypt::decryptString($participant->nombre);
                @endphp
                <tr>
                    <td>{{ $participant->id }}</td>
                    <td>{{ $participant->campaign_id }} - {{$participant->getCampaign($participant->campaign_id) }}</td> {{-- <td>{{ $hito->getPhases() }}</td> --}}
                    <td>{{ $decryptedEmail }}{{--$participant->email--}}</td>
                    <td>{{ $decryptedNombre }}{{--$participant->nombre--}}</td>
                    <td>{{ $participant->available == 0 ? 'Si': 'No'}}</td>
                    <td>{{ Carbon\Carbon::parse($participant->created_at)->format('d/m/Y') }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/configurations/participants/' . $participant->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <!-- Boton eliminar hito -->
                        <!--
                        <form id="delete-form-{{ $participant->id }}" action="{{ url('/participants/' . $participant->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $participant->id }}').submit();">
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
