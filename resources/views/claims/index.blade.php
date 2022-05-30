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
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Dashboard</a></li>
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
    $heads = [
        'ID',
        'Gestoría/Asociación',
        'Acreedor',
        'Deudor',
        'Importe reclamado',
        'Cobros recibidos',
        'Importe pendiente de pago',
        ['label' => 'Tipo de Reclamación'],
        ['label' => 'Hito'],
        ['label' => 'Estatus','width' => 5],
    ];

    $config = [
       
        'columns' => [null, null, null, null, null, null, null, null, null, ['orderable' => false]],
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
        <a href="{{url('export-all')}}" class="btn btn-sm btn-warning">Exportar Reclamaciones</a>

        <form action="{{url('import-actuations')}}" style="display: inline-block; margin: 0;" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label style="margin: 0;" for="actuations" class="btn btn-info btn-sm">Importar Actuaciones</label>

            <input name="file" type="file" id="actuations" style="display: none;">
        
        </form>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @foreach($claims as $claim)
                <tr>
                    <td>
                        {{ $claim->debt->document_number }}</td>
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
                    <td>{{ $claim->debt->pending_amount }}€</td>
                    <td>{{ $claim->amountClaimed() /* + $claim->debt->partialAmounts()*/ }}€</td>
                    <td>{{ $claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/) }}€</td>
                    <td>{{ $claim->getType() }}</td>
                    <td>{{ $claim->getHito() }}</td>
                    {{-- <td>{{ $claim->actuations()->count() ? $claim->actuations()->get()->last()->getRawOriginal('subject') : '' }}</td> --}}
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
                                <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Actuaciónes">
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