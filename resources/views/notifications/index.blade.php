@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Notificaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Notificaciones</li>
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
        'Id',
        'Notificación',
        'Reclamación',
        'Usuario',
        'Lectura',
        // ['label' => 'Status'],
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null,null, null,['orderable' => false]],
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


    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @if(isset($userNotification))
                @foreach($userNotification->notifications as $notification)
                    <tr>
                        <td>{{$notification->id}}</td>
                        <td>{{$notification->data['titulo']}}: {{$notification->data['contenido']}}</td>
                        <td>{{$notification->data['reclamacion']}}</td>
                        <td>{{$notification->data['usuario']}}</td>
                        <td>
                            @if($notification->read_at)
                                {{$notification->read_at->format('d/m/Y h:i')}}
                            @else
                                No leido
                            @endif

                        </td>

                        <td>
                            <nobr>
                            <a href="{{ url('/notifications/' . $notification->id ) }}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>
                            </a>

                            </nobr>
                        </td>

                    </tr>
                @endforeach

            @else
            <tr>
                <td>No existen notificaciones</td>
            </tr>
            @endif

            {{--
            @foreach($third_parties as $third_party)
                <tr>
                    <td>{{ $third_party->dni }}</td>
                    <td>{{ $third_party->name }}</td>
                    <td>{{ $third_party->legal_representative }}</td>
                    <td>{{ $third_party->representative_dni }}</td>

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
            --}}

        </x-adminlte-datatable>
    </x-adminlte-card>
    <div class="card-footer">
        <div class="row">
            <span class="float-left">(*) Selecciona la notificacion que quieras abrir</span>
        </div>
        <!--<x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save" id="btnsiguiente"/>-->
        <a href="{{ url('claims/select-client') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
    </div>

@stop
