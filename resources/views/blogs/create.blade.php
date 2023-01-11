@extends('adminlte::page')

@section('title', 'Registro posts')

@section('plugins.Summernote', true)

@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/panel/blog')}}">Entradas</a></li>
                    <li class="breadcrumb-item active">Registro Post</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   @include('blogs.partials._form')
@stop

