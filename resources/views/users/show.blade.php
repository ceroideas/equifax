@extends('adminlte::page')

@section('title', 'Usuarios')
@php
    $decryptedName = isset($user->name) ? Crypt::decryptString($user->name) : NULL;
    $decryptedDni = isset($user->dni) ? Crypt::decryptString($user->dni) : NULL;
	$decryptedPhone = isset($user->phone) ? Crypt::decryptString($user->phone) : NULL;
	$decryptedAddress = isset($user->address) ? Crypt::decryptString($user->address) : NULL;
	$decryptedIban = isset($user->iban) ? Crypt::decryptString($user->iban) : NULL;
@endphp

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@if(Auth::user()->is($user)) <h1>Tus Datos</h1>  @else Revisión de Datos Para {{$decryptedName}} @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">{{$decryptedName}}</li>
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


<x-adminlte-profile-widget name="{{$decryptedName}}" desc="{{ $user->getRole() }}" theme="orange" header-class="text-white">
{{--  DNI
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-orange">
            <div class="card-header text-white">
                <h3 class="card-title">DNI</h3>
            </div>

            <div class="card-body text-center">
                @if($user->dni_img)
                    @php
                        $ext = array_reverse(explode('.', $user->dni_img))[0];
                    @endphp
                    @if (strtolower($ext) == 'pdf')
                        <iframe src="{{asset( $user->dni_img)}}" frameborder="0" style="width: 100%; height:400px "></iframe>
                    @else
                        <img src="{{  asset( $user->dni_img)  }}" alt="{{ $user->name . ' dni'}}" class="img-fluid"/>
                    @endif
                @else
                    <img src="{{  asset( 'img/placeholders/dniplaceholder.jpg' )  }}" alt="{{ $user->name . ' dni'}}" class="img-fluid"/>

                @endif
            </div>
        </div>
    </div>
--}}
    <div class="col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-orange">
                    <div class="card-header text-white" style="background-color:#9E1B42">
                        <h3 class="card-title">Detalles</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fas fa-book mr-1"></i>Nombre Completo / Razón Social:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $decryptedName }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-id-card mr-1"></i>DNI / CIF:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $decryptedDni }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-phone mr-1"></i>N° Tlf:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $decryptedPhone }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección: </strong>
                                <p class="text-muted text-uppercase">{{ $decryptedAddress }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Población: </strong>
                                <p class="text-muted text-uppercase">{{ $user->location }}</p>
                            </div>

                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Provincia: </strong>
                                <p class="text-muted text-uppercase">{{ $user->province }}</p>
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
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Código Postal: </strong>
                                <p class="text-muted text-uppercase">{{ $user->cop }}</p>
                            </div>
                            @if($user->iban)
                            <div class="col-sm-3">
                                <strong><i class="fas fa-university mr-1"></i>Nro de Cuenta</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $decryptedIban }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (((Auth()->user()->isAdmin() || Auth()->user()->isSuperAdmin()) && !Auth()->user()->is($user)) )
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
                @elseif($user->isPending())
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
                @else
                    <x-adminlte-alert theme="primary" dismissable>
                        <span>El Cliente aún no ha completado sus datos.</span>
                    </x-adminlte-alert>
                @endif
            </div>
         </div>
        @else
        <div class="row">
            <div class="col-sm-12">
                <nobr>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-default btn-block my-4">
                        @if($user->dni && $user->phone && $user->cop && $user->address && $user->location)
                            <b>Modificar perfil</b>
                        @else
                            <b>Completar perfil</b>
                        @endif
                    </a>

                </nobr>
            </div>
         </div>
        @endif
    </div>
</x-adminlte-profile-widget>
@stop
