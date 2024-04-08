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
            'pageLength' => 50,
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

    @if (!Auth::user()->isClient() || !Auth::user()->isAssociate())
        <a href="{{url('invoices-export')}}" class="btn btn-sm btn-success">Exportar Facturas Pagadas</a>
        <a href="{{url('invoices-export-all')}}" class="btn btn-sm btn-primary">Exportar Todas las Facturas</a>
    @endif
    @if (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())
    <a href="{{url('invoices-export-conta')}}" class="btn btn-sm btn-info">Exportar Facturas Pagadas (Altai)</a>
    <a href="{{url('invoices-export-all-conta')}}" class="btn btn-sm btn-info">Exportar Todas las Facturas (Altai)</a>
@endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($invoices as $invoice)
            @php
                $decryptName = isset($invoice->cnofac) ? Crypt::decryptString(trim($invoice->cnofac)) : 'No existe name';
                $decryptClientName = isset($invoice->claim->client) ? Crypt::decryptString(trim($invoice->claim->client->name)) : 'No existe client';
                $decryptRepresentantName = isset($invoice->claim->representant) ? Crypt::decryptString(trim($invoice->claim->representant->name)) : 'No existe represen';
            @endphp
                <tr>
                    <td>{{ $invoice->tipfac}}</td>
                    <td>{{ $invoice->id }}</td>
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
                        @if( $invoice->claim_id <> 0 )
                            <td>{{-- {{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }} --}}
                                {{ $invoice->claim->client ? $decryptClientName :($invoice->claim->representant?$decryptRepresentantName:'') }}</td>
                        @else
                            <td>{{ $decryptName }}</td>
                        @endif
                    @endif
                    @if( $invoice->claim_id <> 0 )
                        <td><a href="{{ url('/claims/' . $invoice->claim_id ) }}">{{$invoice->claim_id}}</a></td>
                    @else
                        <td>Varias</td>
                    @endif
                    <td>{{ $invoice->description }}</td>
                    <td>{{ number_format(($invoice->totfac) ,2,',','.')}} &euro;</td>



                    @if ($invoice->status == 3)
                        <td><span style="color:#e65927;font-weight: bold;">Rectificativa</span></td>
                    @elseif($invoice->status == 4)
                        <td><span style="color:#e92626;font-weight: bold;">Anulada</span></td>
                    @elseif($invoice->status == 5)
                        <td><span style="color:#e92626;font-weight: bold;">Anulada parcialmente</span></td>
                    @else
                        <td>{{ $invoice->status == 1 ? 'Pagado' : ($invoice->status == 2 ? 'Pendiente parcial':' Pendiente') }}</td>
                    @endif

                    @if(Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()|| Auth::user()->isFinance())
                        {{-- <td>{{$invoice->totfac-$invoice->collects()!==NULL ? number_format(($invoice->totfac-$invoice->collects()) ,2,',','.'):'--' }} &euro;</td> --}}
                        @if (is_numeric($invoice->totfac) && $invoice->collects())
                            {{-- <td>{{ number_format(($invoice->totfac-$invoice->collects()) ,2,',','.') }} &euro;</td> --}}
                            <td>{{ gettype($invoice->totfac)}} / {{$invoice->totfac}} - {{gettype($invoice->collects())}} / {{$invoice->collects()}} : {{(float)$invoice->totfac-(float)$invoice->collects()}}</td>
                        @else
                            <td>-- &euro;</td>
                        @endif
                    @endif

                    <td>{{ $invoice->payment_date <> null ? Carbon\Carbon::parse($invoice->payment_date)->format('d/m/Y') : '' }}</td>
                    @if (Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()|| Auth::user()->isFinance())
                        <td>{{ $invoice->trafac==1 ? 'Exportada': 'No exportada'}}</td>
                    @endif

                    <td>
                     <nobr>
                        <a target="_blank" href="{{ url('/claims/invoices/' .$invoice->tipfac.'/'.$invoice->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>


                        @if ($invoice->status != 1 && $invoice->status != 3 && $invoice->status != 4 && $invoice->status != 5)
                        <a target="_blank" href="{{ $invoice->payurlfac }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Pagar factura">
                                <i class="fa fa-lg fa-fw fa-credit-card"></i>
                            </button>
                        </a>
                        @endif

                        {{--@if ((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()) && ($invoice->status == null || $invoice->status == 2)) --}}
                        @if (Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()|| Auth::user()->isFinance())
                            <a href="{{ url('/collects/create/' . $invoice->tipfac.'/'. $invoice->id ) }}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Generar cobro"
                                @disabled((($invoice->status==null||$invoice->status==2)&&Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())?false:true)>
                                    <i class="fa fa-lg fa-fw fa-money-bill"></i>
                                </button>
                            </a>
                        @endif
                        @if (Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin() || Auth::user()->isFinance())
                        {{--@if ((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin()) && ($invoice->status == 0 ||$invoice->status == NULL))--}}
                            <a href="{{ url('/invoices/rectify/create/' . $invoice->tipfac.'/'.$invoice->id ) }}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Generar factura rectificativa"
                                @disabled((($invoice->status==null||$invoice->status==0||$invoice->status==2)&&Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())?false:true)>

                                    <i class="fa fa-lg fa-fw fa-backward"></i>
                                </button>
                            </a>
                        @endif
                        @if((Auth::user()->isSuperAdmin()|| Auth::user()->isAdmin() || Auth::user()->isGestor()|| Auth::user()->isFinance()) && $invoice->type == 'automatic')
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
