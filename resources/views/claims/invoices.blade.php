@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Facturas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">Facturas</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
{{-- Configuración del componente para el datatable --}}
    @php
    if (Auth::user()->isClient()) {
        $heads = [
            'ID',
            'Reclamación',
            'Concepto',
            'Monto cancelado',
            'Fecha del pago',
            'Tipo de cobro',
            'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [
           
            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }else{
        $heads = [
            'ID',
            'Reclamación',
            'Cliente',
            'Concepto',
            'Monto cancelado',
            'Fecha del pago',
            'Tipo de cobro',
            'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [
           
            'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }

    @endphp

    {{-- Datatable para los usuarios --}}

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

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                        <td>{{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }}</td>
                    @endif
                    <td>#{{ $invoice->claim->id }}</td>
                    <td>{{ $invoice->description }}</td>
                    <td>{{ $invoice->amount }}€</td>
                    <td>{{ Carbon\Carbon::parse($invoice->payment_date)->format('d-m-Y H:i') }}</td>
                    <td>{{ $invoice->type }}</td>
                    <td>{{ $invoice->status == 1 ? 'Pagado' : 'Pendiente' }}</td>
                    <td>
                     <nobr>
                        <a target="_blank" href="{{ url('/claims/invoices/' . $invoice->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
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