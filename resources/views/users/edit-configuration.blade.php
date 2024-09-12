@extends('adminlte::page')

@php $decryptedName = Crypt::decryptString($user->name); @endphp
@section('title', 'Editar Usuario' )

@section('content_header')
    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configuración del usuario {{ $decryptedName }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/configurations/users')}}">Configuración de usuarios</a></li>

                        <li class="breadcrumb-item active">{{ $decryptedName }}</li>
                    </ol>
                </div>
            </div>
        </div>
    @else
        <h1>Acceso no autorizado</h1>
    @endif
@stop

@section('content')
   @include('users.partials._configuration')
@stop
