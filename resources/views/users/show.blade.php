@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Revisión de Datos Para {{ $user->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
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

    {{-- Themes --}}
<x-adminlte-profile-widget name="{{ $user->name }}" desc="{{ $user->getRole() }}" theme="orange" header-class="text-white">
    {{-- <x-adminlte-profile-col-item class="border-right text-dark" icon="fas fa-lg fa-tasks"
    title="Projects Done" text="25" size=6 badge="lime">
    hola
    
    </x-adminlte-profile-col-item>
    --}}

    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-orange">
            <div class="card-header text-white">
                <h3 class="card-title">DNI</h3>
            </div>
            
            <div class="card-body text-center">
                <img src="{{  asset( $user->dni_img)  }}" alt="{{ $user->name . ' dni'}}" class="img-fluid"/>
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
                                   {{ $user->name }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-id-card mr-1"></i>DNI / CIF:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $user->dni }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-phone mr-1"></i>N° Tlf:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $user->phone }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección: </strong>
                                <p class="text-muted text-uppercase">{{ $user->address }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Población: </strong>
                                <p class="text-muted text-uppercase">{{ $user->location }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Código Postal: </strong>
                                <p class="text-muted text-uppercase">{{ $user->cop }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                            
                                <strong><i class="fas fa-email mr-1"></i>Email:</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $user->email }}
                                </p>
                            </div>
                            @if($user->iban)
                            <div class="col-sm-6">
                            
                                <strong><i class="fas fa-university mr-1"></i>Nro de Cuenta</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $user->iban }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth()->user()->isAdmin() || Auth()->user()->isSuperAdmin())
        <div class="row">
            <div class="col-sm-12">
                @if($user->status())
                    <form id="user-denial" action="{{ url('users/denial/' . $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <nobr>
                        <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('user-denial').submit();"><b>Revocar</b></a>
                    </nobr>
                 @else
                    <form id="user-approval" action="{{ url('users/approval/' . $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <form id="user-denial" action="{{ url('users/denial/' . $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                     <nobr>
                         <a href="#" class="btn btn-success btn-block" onclick="event.preventDefault(); document.getElementById('user-approval').submit();"><b>Aprobar</b></a>

                         <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('user-denial').submit();"><b>Revocar</b></a>
                     </nobr>
                @endif
            </div>
         </div>
        @else
        <div class="row">
            <div class="col-sm-12">
                <nobr>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-default btn-block my-4"><b>Editar Perfil</b></a>
                </nobr>
            </div>
         </div>
        @endif
    </div>
</x-adminlte-profile-widget>

@stop
