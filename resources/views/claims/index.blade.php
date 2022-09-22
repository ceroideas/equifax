@extends('adminlte::page')

@section('title', 'Reclamaciones')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reclamaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Reclamaciones</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
{{-- Configuración del componente para el datatable --}}
    @php
    if (Auth::user()->isGestor() || Auth::user()->isSuperAdmin()) {
        $heads = [
            'ID',
            'Usuario',
            'Acreedor',
            'Deudor',
            'Importe reclamado',
            'Cobros recibidos',
            'Importe pendiente de pago',
            ['label' => 'Tipo de Reclamación'],
            ['label' => 'Status'],
            ['label' => 'Saldo Generado'],
            ['label' => 'Acciones','width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null, null, ['orderable' => false]],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }else{

        $heads = [
            'ID',
            'Usuario',
            'Acreedor',
            'Deudor',
            'Importe reclamado',
            'Cobros recibidos',
            'Importe pendiente de pago',
            ['label' => 'Tipo de Reclamación'],
            ['label' => 'Status'],
            ['label' => 'Acciones','width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null, ['orderable' => false]],
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


    {{-- TODO: Esto mostraba el saldo al cliente gestoria, revisar porque lo puso Cero Ideas
    @if (!Auth::user()->isClient())--}}
    @if (Auth::user()->isSuperAdmin())
        <a href="{{url('export-all')}}" class="btn btn-sm btn-primary">Exportar Reclamaciones</a>
        <a href="{{url('export-all')}}" class="btn btn-sm btn-success">Exportar Nuevas Ramaciones</a>
        <a href="{{url('export-actuations-all')}}" class="btn btn-sm btn-primary">Exportar Actuaciones</a>
        <a href="{{url('export-all')}}" class="btn btn-sm btn-success">Exportar Nuevas actuaciones</a>

        <form action="{{url('import-actuations')}}" style="display: inline-block; margin: 0;" method="POST" enctype="multipart/form-data">
            @csrf

            <label style="margin: 0;" for="actuations" class="btn btn-danger btn-sm">Importar Actuaciones</label>

            <input name="file" type="file" id="actuations" style="display: none;">

        </form>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" class="table-responsive" striped hoverable bordered compresed responsive :config="$config">
            @foreach($claims as $claim)
                <tr>
                    <td>
                        {{ ($claim->debt) ? $claim->debt->document_number:'No existe' }}</td>
                    <td>
                        {{--  Partido judicial, no se usara
                        @php
                            $pc = App\Models\PostalCode::where('code',$claim->debtor->cop)->first();

                            $juzgado = "--";
                            $procurador = "--";

                            if ($pc) {
                                $type = App\Models\Type::where('locality',$pc->province)->first();

                                if ($type) {
                                    $juzgado = $type->type;

                                    $party = App\Models\Party::where('locality',$pc->province)->first();

                                    if ($party) {
                                        $procurador = $party->procurator;
                                    }
                                }
                            }
                        @endphp
                    --}}
                    {{-- $juzgado.'/'.$procurador --}}
                        {{ ($claim->owner) ? $claim->owner->name:'No existe'}}</td>
                    <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
                    <td>{{ ($claim->debtor)? $claim->debtor->name :'No existe'}}</td>
                    <td>{{ number_format($claim->debt->pending_amount, 2,',','.') }} €</td>
                    <td>{{ number_format($claim->amountClaimed(), 2,',','.') /* + $claim->debt->partialAmounts()*/ }} €</td>
                    <td>{{ number_format($claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/), 2,',','.') }} €</td>
                    <td>{{ $claim->getType() }}</td>
                    <td>{{ $claim->getHito() }}</td>
                    {{--  TODO: Esto mostraba el descontar saldo en el listado de reclamaciones al cliente gestoria, revisar porque lo puso cero ideas--}}
                    @if (Auth::user()->isSuperAdmin())
                        <td>
                            {{$claim->saldo() - $claim->discounts()}}€ <a data-toggle="modal" href="#view-details-{{$claim->id}}"><i class="fa fa-eye"></i></a>

                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#discount-{{$claim->id}}">Descontar Saldo</button>

                            <div class="modal fade" id="view-details-{{$claim->id}}">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">Detalle de Saldo</div>
                                        <div class="modal-body">
                                            Saldo Principal: <b>{{$claim->saldo()}}€</b>

                                            <hr>

                                            Descuentos:

                                            @forelse (App\Models\Discount::where('claim_id',$claim->id)->get() as $key => $value)
                                                <li>{{str_replace(',', '.', $value->amount)}}€</li>
                                            @empty
                                                --
                                            @endforelse

                                            <hr>

                                            Saldo Final: <b>{{$claim->saldo() - $claim->discounts()}}€</b>

                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="discount-{{$claim->id}}">
                                <div class="modal-dialog modal-sm">
                                    <form class="modal-content" method="POST" action="{{url('saveDiscount')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="claim_id" value="{{$claim->id}}">
                                        <div class="modal-header">Descontar importe por pago recibido</div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Monto a descontar</label>
                                                <input type="number" step="0.01" min="0" max="{{$claim->saldo() - $claim->discounts()}}" class="form-control" name="amount" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm btn-success">Aceptar</button>
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    @endif

                    @if (Auth::user()->isGestor()) <td>{{$claim->saldo() - $claim->discounts()}}€</td>@endif

                    {{--<td>{{ $claim->actuations()->count() ? $claim->actuations()->get()->last()->getRawOriginal('subject') : '' }}</td>--}}
                    {{-- <td>{{ $claim->getStatus() }}</td> --}}
                    <td>
                     <nobr>
                        @can('create', $claim)
                            {{-- <a href="{{ url('/claims/' . $claim->id . '/edit/') }}">
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </a> --}}
                            <form id="delete-form-{{ $claim->id }}" action="{{ url('/claims/' . $claim->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                            {{-- <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $claim->id }}').submit();">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button> --}}
                        @endcan

                        @if (Auth::user()->id == $claim->owner_id && $claim->status == 11 && $claim->claim_type == 1)
                            <form action="{{url('uploadApudActa')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$claim->id}}">
                                <input type="file" style="display: none;" id="apud-{{$claim->id}}" name="file">
                                <label for="apud-{{$claim->id}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Apud acta" style="margin: 0">
                                    <i class="fa fa-lg fa-fw fa-upload"></i>
                                </label>
                            </form>
                        @endif

                        @if (!Auth::user()->isClient() && ($claim->isFinished() && $claim->claim_type == 2))
                            <a href="{{ url('claims/'. $claim->id . '/viable',1) }}" class="btn btn-xs btn-success">Reclamación Judicial</a>
                        @endif

                        <a href="{{ url('/claims/' . $claim->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>

                        @if ($claim->invoices)
                            <a href="{{ url('/claims/actuations/' . $claim->id ) }}">
                                <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Actuaciones">
                                    <i class="fa fa-lg fa-fw fa-list"></i>
                                </button>
                            </a>
                        @endif

                        @if (Auth::user()->id == $claim->owner_id && $claim->last_invoice)
                            @if ($claim->status != -1)
                            <a href="{{ url('/claims/payment/' . $claim->id ) }}">
                                <button class="btn btn-xs btn-default text-info mx-1 shadow" title="Pagar">
                                    <i class="fa fa-lg fa-fw fa-credit-card"></i>
                                </button>
                            </a>
                            @endif
                        @endif
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop

@section('js')

    <script>
        $('[name="file"]').change(function (e) {
            e.preventDefault();

            if (confirm("¿Desea subir el archivo seleccionado?") == true) {
                $(this).parent().submit();
            }

        });
    </script>

@stop
