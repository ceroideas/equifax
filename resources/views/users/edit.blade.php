@extends('adminlte::page')

@php $decryptedName = Crypt::decryptString($user->name); @endphp
@section('title', 'Editar Usuario' . $decryptedName)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Usuario {{ $decryptedName }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    @if(auth::user()->can('create', 'user'))
                        <li class="breadcrumb-item"><a href="{{url('/')}}/users">Usuarios</a></li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ route('user.edit', $user) }}">Usuarios</a></li>
                    @endif

                    <li class="breadcrumb-item active">{{ $decryptedName }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('users.partials._form')
@stop
