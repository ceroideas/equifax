@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pedidos de gestor&iacute;a @isset($gestoria)-{{ $gestoria }} @endisset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Pedidos gestor&iacute;a</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
{{-- Configuración del componente para el datatable --}}
    @php
    //if (Auth::user()->isClient()) {
        /*$heads = [
            'ID',
            'Reclamación',
            'Concepto',
            'Importe',
            'Fecha del pago',
            'Tipo de cobro',
            'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];*/
    //}else{
        $heads = [
            'ID',
            'Gestoria',
            'Reclamación',
            'Concepto',
            'Importe',
            'Fecha',
            'Facturado',
            //'Num. Factura',
            //'Status',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    //}

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
        <a href="{{url('orders-export')}}" class="btn btn-sm btn-warning">Exportar pedidos</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}
                    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin() || Auth::user()->isGestor())
                    <td>{{ $order->claim->gestor->name }}</td>
                    @endif
                    <td><a href="{{ url('/claims/' . $order->claim_id ) }}">#{{$order->claim_id}}</a></td>
                    <td>{{ $order->description }}</td>
                    <td>{{ number_format($order->totord ,2,',','.') }}</td>
                    {{--<td>{{ number_format(($invoice->amount) ,2,',','.')}}   €</td>--}}


                    <td>{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}   </td>
                    {{--<td>{{ $order->id }}</td>--}}
                    <td>{{ $order->facord == 1 ? 'Facturado' : 'Pendiente' }}</td>
                    <td>

                     <nobr>
                        <a href="{{ url('/claims/' . $order->claim_id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver reclamación">
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
