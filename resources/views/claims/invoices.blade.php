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
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
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
    if (Auth::user()->isClient() || Auth::user()->isAssociate()) {
        $heads = [
            'ID',
            'Reclamación',
            'Concepto',
            'Importe',
            'Fecha del pago',
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
            'Cliente',
            'Reclamación',
            'Concepto',
            'Importe',
            'Fecha del pago',
            'Exportada (Altai)',
            'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false]],
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

    @if (!Auth::user()->isClient() || !Auth::user()->isAssociate())
        <a href="{{url('invoices-export')}}" class="btn btn-sm btn-success">Exportar Facturas Pagadas</a>
        <a href="{{url('invoices-export-all')}}" class="btn btn-sm btn-primary">Exportar Todas las Facturas</a>
    @endif
    @if (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
    <a href="{{url('invoices-export-conta')}}" class="btn btn-sm btn-info">Exportar Facturas Pagadas (Altai)</a>
    <a href="{{url('invoices-export-all-conta')}}" class="btn btn-sm btn-info">Exportar Todas las Facturas (Altai)</a>
@endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin() || Auth::user()->isGestor())
                        @if( $invoice->claim_id <> 0 )
                            <td>{{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }}</td>
                        @else
                            <td>{{ $invoice->cnofac }}</td>
                        @endif
                    @endif
                    @if( $invoice->claim_id <> 0 )
                        <td><a href="{{ url('/claims/' . $invoice->claim_id ) }}">#{{$invoice->claim_id}}</a></td>
                    @else
                        <td>Varias</td>
                    @endif
                    <td>{{ $invoice->description }}</td>
                    <td>{{ number_format(($invoice->amount) ,2,',','.')}} €</td>
                    <td>{{ $invoice->payment_date <> null ? Carbon\Carbon::parse($invoice->payment_date)->format('d/m/Y') : '' }}</td>
                    @if (Auth::user()->isSuperAdmin())
                        <td>{{ $invoice->trafac }}</td>
                    @endif
                    <td>{{ $invoice->status == 1 ? 'Pagado' : ($invoice->status == 2 ? 'Pendiente parcial':'Pendiente') }}</td>
                    <td>
                     <nobr>
                        <a target="_blank" href="{{ url('/claims/invoices/' . $invoice->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                        @if ((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()) && $invoice->status <> 1)
                        <a href="{{ url('/collects/create/' . $invoice->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Generar cobro">
                                <i class="fa fa-lg fa-fw fa-money-bill"></i>
                            </button>
                        </a>
                        @endif
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
