@extends('adminlte::page')

@section('title', 'Facturas')

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
{{-- Configuración del componente para el datatable --}}
    @php
        $heads = [
            'Gestoría',
            'ID',
            'Reclamación',
            'Concepto',
            'Importe',
            'Fecha',
            'Facturada',
            'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];


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

    @if (!Auth::user()->isClient())
        <a href="{{url('invoices-export')}}" class="btn btn-sm btn-warning">Generar facturas pendientes</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin() || Auth::user()->isGestor())
                        <td>{{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }}</td>
                    @endif
                    <td>#{{ $invoice->claim->id }}</td>
                    <td>{{ $invoice->description }}</td>
                    <td>{{ number_format(($invoice->amount) ,2,',','.')}} €</td>
                    <td>{{ Carbon\Carbon::parse($invoice->payment_date)->format('d/m/Y') }}</td>
                    @if (Auth::user()->isSuperAdmin())
                        <td>{{ $invoice->trafac }}</td>
                    @else
                        <td>{{ $invoice->type }}</td>
                    @endif
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
