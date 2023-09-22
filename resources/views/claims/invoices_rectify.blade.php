@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Facturas Rectificativas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Facturas rectificativas</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
    @php
    if (Auth::user()->isClient() || Auth::user()->isAssociate() || Auth::user()->isGestor()) {
        $heads = [
            'Serie',
            'ID',
            'Reclamación',
            'Concepto',
            'Importe',
            'Status',
            'Fecha del pago',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null,null, null, null, null, null, null, ['orderable' => false]],
            'order'=>[[0,'desc'],[1,'desc']],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }else{
        $heads = [
            'Serie',
            'ID',
            'Cliente',
            'Reclamación',
            'Concepto',
            'Importe',
            'Status',
            'Importe pendiente',
            'Fecha del pago',
            'Exportada (Altai)',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null,null, null, null, null, null, null, null, null, null, ['orderable' => false]],
            'order'=>[[0,'desc'],[1,'desc']],
            'pageLength' => 25,
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }

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

    @if (!Auth::user()->isClient() || !Auth::user()->isAssociate() || !Auth::user()->isGestor())
        <a href="{{url('invoices-rectify-export-all')}}" class="btn btn-sm btn-primary">Exportar todas las facturas rectificativas</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->tipfac}}</td>
                    <td>{{ $invoice->id }}</td>
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                        @if( $invoice->claim_id <> 0 )
                            <td>{{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }}</td>
                        @else
                            <td>{{ $invoice->cnofac }}</td>
                        @endif
                    @endif
                    @if( $invoice->claim_id <> 0 )
                        <td><a href="{{ url('/claims/' . $invoice->claim_id ) }}">{{$invoice->claim_id}}</a></td>
                    @else
                        <td>Varias</td>
                    @endif
                    <td>{{ $invoice->description }}</td>
                    <td>{{ number_format(($invoice->totfac) ,2,',','.')}} &euro;</td>

                    <td>{{ $invoice->status == 1 ? 'Pagado' : ($invoice->status == 2 ? 'Pendiente parcial':'Pendiente') }}</td>

                    @if(Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin())
                        <td>{{ number_format(($invoice->totfac-$invoice->collects()) ,2,',','.')}} &euro;</td>
                    @endif

                    <td>{{ $invoice->payment_date <> null ? Carbon\Carbon::parse($invoice->payment_date)->format('d/m/Y') : '' }}</td>
                    @if (Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin())
                        <td>{{ $invoice->trafac==1 ? 'Exportada': 'No exportada'}}</td>
                    @endif

                    <td>
                     <nobr>
                        <a target="_blank" href="{{ url('/claims/invoices/' .$invoice->tipfac.'/'.$invoice->id ) }}">
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
                        @if ((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()) && ($invoice->status == 0 ||$invoice->status == NULL))
                            <a href="{{ url('/claims/invoices-rectify/create/' . $invoice->id ) }}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Generar factura rectificativa">
                                    <i class="fa fa-lg fa-fw fa-backward"></i>
                                </button>
                            </a>
                        @endif
                        @if((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin() || Auth::user()->isGestor()) && $invoice->type == 'automatic')
                            <a href="{{ url('/claims/gestoria/' . $invoice->user_id.'/'.$invoice->id ) }}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver pedidos de la factura">
                                    <i class="fa fa-lg fa-fw fa-address-book"></i>
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
