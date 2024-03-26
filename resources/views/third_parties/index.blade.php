@extends('adminlte::page')

@section('title', 'Terceros')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Terceros Registrados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Terceros Registrados</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

    @if(session()->has('claim_third_party') && session()->has('claim_third_party') == 'waiting')
        @include('progressbar', ['step' => 1])
    @endif

    @php
    $heads = [
        ['label' => 'DNI'],
        'Nombre Completo',
        'Representante Legal',
        'DNI Representante',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, ['orderable' => false]],
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

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

    @if(session()->has('claim_client'))
        <x-adminlte-alert theme="primary" dismissable>
           <span>Para utilizar un Tercero, elija "NO" al iniciar el proceso de reclamación</span>
        </x-adminlte-alert>
    @endif

    @if(session()->has('claim_third_party') && session()->has('claim_third_party') == 'waiting')
        <a href="{{ url('/claims/select-client') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-white " style="color: black !important;" type="button" label="Volver" icon="fas fa-lg fa-pencil"/></a>
    @endif

    @if(Auth::user()->isSuperadmin()||Auth::user()->isClient()||Auth::user()->isGestor()||Auth::user()->isAssociate())
        <a href="{{ url('/third-parties/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($third_parties as $third_party)
                <tr>

                    @php
                        $decryptedName = isset($third_party->name) ? Crypt::decryptString($third_party->name) : NULL;
                        $decryptedDni = isset($third_party->dni) ? Crypt::decryptString($third_party->dni) : NULL;
                        $decryptedLegalRepresentative = isset($third_party->legal_representative) ? Crypt::decryptString($third_party->legal_representative) : NULL;
                        $decryptedRepresentativeDni = isset($third_party->representative_dni) ? Crypt::decryptString($third_party->representative_dni) : NULL;
                    @endphp

                    <td>{{ $decryptedDni }}</td>
                    <td>{{ $decryptedName }}</td>
                    <td>{{ $decryptedLegalRepresentative }}</td>
                    <td>{{ $decryptedRepresentativeDni }}</td>

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
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" @if($third_party->issetClaim()!=Null) disabled @endif>
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>

                        @if(Auth::user()->isSuperadmin())
                            <form id="delete-form-{{ $third_party->id }}" action="{{ url('/third-parties/' . $third_party->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $third_party->id }}').submit();">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                       @endif


                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
    <div class="card-footer">
        <div class="row">
            <span class="float-left">(*) Selecciona o añade un tercero</span>
        </div>
        <div class="row">
            <span class="float-left">** Los datos del representado, no se podrán editar una vez iniciada la reclamación</span>
        </div>
        <a href="{{ url('claims/select-client') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
    </div>

@stop
