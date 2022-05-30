@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar usuario {{ Auth::user()->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/panel/usuarios">Usuarios</a></li>
                    <li class="breadcrumb-item active">Cambiar contraseña</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('users.partials._change-password')
@stop