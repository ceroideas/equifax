@extends('adminlte::page')

@section('title', $third_party->name )

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $third_party->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $third_party->name }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif


<x-adminlte-profile-widget name="{{ $third_party->name }}" desc="Representado" theme="orange" header-class="text-white">
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-orange">
            <div class="card-header text-white">
                <h3 class="card-title">DNI</h3>
            </div>
            
            <div class="card-body text-center">
                @if($third_party->dni_img)
                    <img src="{{  asset( $third_party->dni_img)  }}" alt="{{ $third_party->name . ' dni'}}" class="img-fluid"/>
                @else
                    <img src="{{  asset( 'img/placeholders/dniplaceholder.jpg' )  }}" alt="{{ $third_party->name . ' dni'}}" class="img-fluid"/>
                
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-orange">
                    <div class="card-header text-white">
                        <h3 class="card-title">Detalles</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fas fa-book mr-1"></i>Nombre Completo / Razón Social:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $third_party->name }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-id-card mr-1"></i>DNI / CIF:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $third_party->dni }}
                                </p>
                            </div>
                            {{-- <div class="col-sm-3">
                                <strong><i class="fas fa-phone mr-1"></i>N° Tlf:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $third_party->phone }}
                                </p>
                            </div> --}}
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección: </strong>
                                <p class="text-muted text-uppercase">{{ $third_party->address }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Población: </strong>
                                <p class="text-muted text-uppercase">{{ $third_party->location }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Código Postal: </strong>
                                <p class="text-muted text-uppercase">{{ $third_party->cop }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            {{-- <div class="col-sm-6">
                            
                                <strong><i class="fas fa-email mr-1"></i>Email:</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $third_party->email }}
                                </p>
                            </div> --}}
                            @if($third_party->iban)
                            <div class="col-sm-6">
                            
                                <strong><i class="fas fa-university mr-1"></i>Nro de Cuenta</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $third_party->iban }}
                                </p>
                            </div>
                            @endif

                            @if($third_party->poa)
                            <div class="col-sm-6">
                            
                                <strong><i class="fas fa-university mr-1"></i>Poder de Representación / Título de Acreditación</strong>
                                <p class="text-muted text-uppercase">
                                   <a href="{{ asset(  $third_party->poa ) }}" download="Acreditación {{ $third_party->name  . ' ' . $third_party->dni}}">Descargar Documento</a>
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nobr>
                    @if($third_party->user->is(Auth::user()))
                    <a href="{{ url('/third-parties/' . $third_party->id . '/edit') }}" class="btn btn-warning btn-block my-4"><b>Editar Datos</b></a>
                    @endif
                    <a href="{{ url('/third-parties') }}" class="btn btn-default btn-block my-4"><b>Regresar al Listado</b></a>
                </nobr>
            </div>
         </div>
        {{-- @if (((Auth()->user()->isAdmin() || Auth()->user()->isSuperAdmin()) && !Auth()->user()->is($third_party)) )
        <div class="row">
            <div class="col-sm-12">
                @if($third_party->status())
                    <form id="user-denial" action="{{ url('users/denial/' . $third_party->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <nobr>
                        <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('user-denial').submit();"><b>Revocar</b></a>
                    </nobr>
                @elseif($third_party->isPending())
                    <form id="user-approval" action="{{ url('users/approval/' . $third_party->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <form id="user-denial" action="{{ url('users/denial/' . $third_party->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                     <nobr>
                         <a href="#" class="btn btn-success btn-block" onclick="event.preventDefault(); document.getElementById('user-approval').submit();"><b>Aprobar</b></a>

                         <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('user-denial').submit();"><b>Revocar</b></a>
                     </nobr>
                @else
                    <x-adminlte-alert theme="info" dismissable>
                        <span>El Cliente aún no ha completado sus datos.</span>
                    </x-adminlte-alert>
                @endif
            </div>
         </div>
        @else
        <div class="row">
            <div class="col-sm-12">
                <nobr>
                    <a href="{{ route('user.edit', $third_party) }}" class="btn btn-default btn-block my-4"><b>Editar Perfil</b></a>
                </nobr>
            </div>
         </div>
        @endif --}}
    </div>
</x-adminlte-profile-widget>
@stop
