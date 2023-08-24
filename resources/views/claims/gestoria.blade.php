@extends('adminlte::page')

@section('title', 'Gestorías')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Saldo gestor&iacute;as</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Saldo gestor&iacute;as</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

    @php
        $heads = [
            'ID',
            'Gestoría',
            'Email',
            'Teléfono',
            'Población',
            'Pedidos pendientes',
            'Saldo',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
            'pageLength' => 25,
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];


    @endphp

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    @if(session()->has('err'))
        <x-adminlte-alert theme="warning" dismissable>
            {{ session('err') }}
        </x-adminlte-alert>
    @endif

    @if (!Auth::user()->isClient())
        <a href="{{url('/claims/facturar')}}" class="btn btn-sm btn-warning">Generar facturas pendientes</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->location }}</td>
                    <td>{{ $order->pedidos }}</td>
                    <td>{{ number_format($order->total,2,',','.') }}</td>
                    <td>
                     <nobr>
                        <a href="{{ url('/claims/gestoria/' . $order->user_id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                    </nobr>
                    </td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
