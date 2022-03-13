@extends('adminlte::page')

@section('title', 'Editar Usuario' . $user->name)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Usuario {{ $user->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    @if(auth::user()->can('create', 'user'))
                        <li class="breadcrumb-item"><a href="/panel/usuarios">Usuarios</a></li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ route('user.edit', $user) }}">Usuarios</a></li>
                    @endcan
                   
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('users.partials._form')
@stop