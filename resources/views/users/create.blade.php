@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Nuevo Usuario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/panel/usuarios">Usuarios</a></li>
                    <li class="breadcrumb-item active">Crear Nuevo Usuario</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('users.partials._form')
@stop
