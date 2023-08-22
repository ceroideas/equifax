@extends('adminlte::page')

@section('title', 'Hitos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Área personal</a></li>
                    <li class="breadcrumb-item active">Entradas al blog</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

{{-- Configuración del componente para el datatable --}}
    @php
        $heads = [
            'id',
            'Titulo',
            'Slug',
            'Resumen',
            'Post',
            'Estado',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
            'order'=>[[0,'desc']],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <a href="{{ url('/blogs/create') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important;" type="button" label="Añadir Nuevo" icon="fas fa-lg fa-pencil"/></a>

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{!! $blog->extract !!}</td>
                    <td>{!! $blog->body !!}</td>
                    <td>{{ $blog->status == 0 ? 'Borrador': 'Publicado' }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/blogs/'. $blog->id . '/edit/') }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
