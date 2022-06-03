@extends('adminlte::page')

@section('title', $debtor->name )

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $debtor->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">{{ $debtor->name }}</li>
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


<x-adminlte-profile-widget name="{{ $debtor->name }}" desc="Deudor" theme="orange" header-class="text-white">
    {{-- <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-orange">
            <div class="card-header text-white">
                <h3 class="card-title">DNI</h3>
            </div>

            <div class="card-body text-center">
                @if($debtor->dni_img)
                    <img src="{{  asset( $debtor->dni_img)  }}" alt="{{ $debtor->name . ' dni'}}" class="img-fluid"/>
                @else
                    <img src="{{  asset( 'img/placeholders/dniplaceholder.jpg' )  }}" alt="{{ $debtor->name . ' dni'}}" class="img-fluid"/>

                @endif
            </div>
        </div>
    </div> --}}
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-orange">
                    <div class="card-header text-white">
                        <h3 class="card-title">Detalles</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <strong><i class="fas fa-id-card mr-1"></i>DNI / CIF:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $debtor->dni }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-book mr-1"></i>Nombre Completo / Razón Social:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $debtor->name }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-envelope mr-1"></i>Email:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $debtor->email }}
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-phone mr-1"></i>N° Tlf:</strong>
                                <p class="text-muted text-uppercase">
                                   {{ $debtor->phone }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección: </strong>
                                <p class="text-muted text-uppercase">{{ $debtor->address }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Población: </strong>
                                <p class="text-muted text-uppercase">{{ $debtor->location }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Código Postal: </strong>
                                <p class="text-muted text-uppercase">{{ $debtor->cop }}</p>
                            </div>
                            <div class="col-sm-3">
                                <strong><i class="fas fa-id-card mr-1"></i> Tipo </strong>
                                <p class="text-muted text-uppercase">{{ $debtor->getType() }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            {{-- <div class="col-sm-6">

                                <strong><i class="fas fa-email mr-1"></i>Email:</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $debtor->email }}
                                </p>
                            </div> --}}
                            @if($debtor->iban)
                            <div class="col-sm-6">

                                <strong><i class="fas fa-university mr-1"></i>Nro de Cuenta</strong>
                                <p class="text-muted text-uppercase">
                                    {{ $debtor->iban }}
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
                    <a href="{{ url('/debtors') }}" class="btn btn-default btn-block my-4"><b>Regresar al Listado</b></a>
                </nobr>
            </div>
         </div>
        {{-- @if (((Auth()->user()->isAdmin() || Auth()->user()->isSuperAdmin()) && !Auth()->user()->is($debtor)) )
        <div class="row">
            <div class="col-sm-12">
                @if($debtor->status())
                    <form id="user-denial" action="{{ url('users/denial/' . $debtor->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <nobr>
                        <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('user-denial').submit();"><b>Revocar</b></a>
                    </nobr>
                @elseif($debtor->isPending())
                    <form id="user-approval" action="{{ url('users/approval/' . $debtor->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <form id="user-denial" action="{{ url('users/denial/' . $debtor->id) }}" method="POST" style="display: none;">
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
                    <a href="{{ route('user.edit', $debtor) }}" class="btn btn-default btn-block my-4"><b>Editar Perfil</b></a>
                </nobr>
            </div>
         </div>
        @endif --}}
    </div>
</x-adminlte-profile-widget>
@stop
