@extends('adminlte::page')

@section('title', 'Reclamaciones Finalizadas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reclamaciones Finalizadas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Reclamaciones Finalizadas</li>
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
        'order'=>[[0,'desc']],
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

    @if (!Auth::user()->isClient() && !Auth::user()->isGestor())
        <a href="{{url('export-finished')}}" class="btn btn-sm btn-warning">Exportar Reclamaciones Finalizadas</a>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($claims as $claim)
                <tr>
                    @if($claim->debt)
                        <td>{{ $claim->debt->document_number }}</td>
                    @else
                        <td>No existe</td>
                    @endif
                    <td>
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

                    {{ $juzgado.'/'.$procurador }}</td>
                    <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
                    <td>{{ $claim->debtor->name }}</td>

                    @if($claim->debt)
                        <td>{{ number_format($claim->debt->pending_amount, 2,',','.') }} &euro;</td>
                        <td>{{ number_format($claim->amountClaimed(), 2,',','.') /* + $claim->debt->partialAmounts()*/ }} &euro;</td>
                        <td>{{ number_format($claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/), 2,',','.') }} &euro;</td>
                    @else
                        <td>- &euro;</td>
                        <td>{{ number_format($claim->amountClaimed(), 2,',','.') /* + $claim->debt->partialAmounts()*/ }} &euro;</td>
                        <td>- &euro;</td>
                    @endif                    

                    <td>{{ $claim->getType() }}</td>
                    <td>{{ $claim->getHito() }}</td>
                    <td>
                    <nobr>
                        @if(Auth::user()->id === $claim->user_id && $claim->status  == 1)
                            <a href="{{ url('/claims/' . $claim->id . '/edit/') }}">
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </a>
                            <form id="delete-form-{{ $claim->id }}" action="{{ url('/claims/' . $claim->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $claim->id }}').submit();">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        @endif
                        <a href="{{ url('/claims/' . $claim->id ) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>

                        <a href="{{ url('/claims/actuations/' . $claim->id ) }}">
                                <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Actuaciones">
                                    <i class="fa fa-lg fa-fw fa-list"></i>
                                </button>
                        </a>
                    </nobr>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
