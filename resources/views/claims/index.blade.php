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

    @php
    if (Auth::user()->isGestor() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance()) {
        $heads = [
            'ID',
            'Usuario',
            'Acreedor',
            'Deudor',
            'Importe original',
            'Importe reclamado',
            'Cobros recibidos',
            'Importe pendiente de pago',
            ['label' => 'Tipo de Reclamación'],
            ['label' => 'Status'],
            //['label' => 'Saldo Generado'],
            ['label' => 'Acciones','width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null, null, ['orderable' => false]],
            'order'=>[[0,'desc']],
            'pageLength' => 25,
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }else{

        $heads = [
            'ID',
            'Usuario',
            'Acreedor',
            'Deudor',
            'Importe original',
            'Importe reclamado',
            'Cobros recibidos',
            'Importe pendiente de pago',
            ['label' => 'Tipo de Reclamación'],
            ['label' => 'Status'],
            ['label' => 'Acciones','width' => 5],
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null, null, ['orderable' => false]],
            'order'=>[[0,'desc']],
            'language' => ['url' => '/js/datatables/dataTables.spanish.json']
        ];
    }

    @endphp


    @if(session()->has('msj'))
        @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">{{ session('msj') }}</span>
                <span class="info-box-number">Actuaciones importadas: {{session('total_actuaciones')}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    Reclamaciones actualizadas: {{session('id_claims')}}
                </span>
                </div>
            </div>
        @else
            <x-adminlte-alert theme="success" dismissable>
                {{ session('msj') }}
            </x-adminlte-alert>
        @endif
    @endif

    @if(session()->has('err'))
        <x-adminlte-alert theme="warning" dismissable>
            {{ session('err') }}
        </x-adminlte-alert>
    @endif

    @if (Auth::user()->isGestor() || Auth::user()->isClient())
        <a href="{{url('export-all')}}" class="btn btn-sm btn-primary">Exportar Reclamaciones</a>
    @endif
    @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
        <a href="{{url('export-all')}}" class="btn btn-sm btn-primary">Exportar Reclamaciones</a>
        <a href="{{url('export-new-claims')}}" class="btn btn-sm btn-success">Exportar Nuevas Reclamaciones</a>
        <a href="{{url('export-actuations-all')}}" class="btn btn-sm btn-primary">Exportar Actuaciones</a>
        <a href="{{url('export-new-actuations')}}" class="btn btn-sm btn-success">Exportar Nuevas actuaciones</a>

        <form action="{{url('import-actuations')}}" style="display: inline-block; margin: 0;" method="POST" enctype="multipart/form-data">
            @csrf
            <label style="margin: 0;" for="actuations" class="btn btn-danger btn-sm">Importar Actuaciones</label>
            <input name="file" type="file" id="actuations" style="display: none;">
        </form>

        <form action="{{url('import-collects-kmaleon')}}" style="display: inline-block; margin: 0;" method="POST" enctype="multipart/form-data">
            @csrf
            <label style="margin: 0;" for="collects" class="btn btn-danger btn-sm">Importar cobros (Kmaleon)</label>
            <input name="file" type="file" id="collects" style="display: none;">
        </form>

    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" class="table-responsive" striped hoverable bordered compresed responsive :config="$config">
            @foreach($claims as $claim)
                <tr>
                    <td>{{ ($claim->debt) ? $claim->debt->document_number:'No existe' }}</td>
                    <td>{{ ($claim->owner) ? $claim->owner->name:'No existe'}}</td>
                    <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
                    <td>{{ ($claim->debtor)? $claim->debtor->name :'No existe'}}</td>
                    <td>{{ ($claim->debt) ? number_format( ($claim->debt->total_amount + (($claim->debt->total_amount * $claim->debt->tax)/100) ) , 2,',','.'):'-' }} &euro; </td>
                    <td>{{ ($claim->debt) ? number_format($claim->debt->pending_amount, 2,',','.'): '-' }} &euro;</td>
                    <td>{{ number_format($claim->amountClaimed(), 2,',','.') /* + $claim->debt->partialAmounts()*/ }} &euro;</td>
                    <td>{{ ($claim->debt) ? number_format($claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/), 2,',','.'):'-' }} &euro;</td>

                    @switch($claim->owner->role)
                        @case(3)
                            <td><b>Gestoría:</b> {{ $claim->getType() }}</td>
                            @break

                        @case(4)
                            <td><b>Asociado:</b> {{ $claim->getType() }}</td>
                            @break

                        @default
                            <td><b>Cliente:</b> {{ $claim->getType() }}</td>
                    @endswitch

                    <td>
                        @if ($claim->getIdHito()==30037 || $claim->getIdHito()==30049)
                            <a href="{{ url('/claims/' . $claim->id ) }}" style="color:#e65927;font-weight: bold;"> {{ $claim->getHito() }} </a>
                        @else
                            {{ $claim->getHito() }}
                        @endif
                    </td>

                    <td>
                     <nobr>
                        @can('create', $claim)
                            <form id="delete-form-{{ $claim->id }}" action="{{ url('/claims/' . $claim->id) }}" method="POST"  style="display: none;">@csrf @method('DELETE')</form>
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
                            <!--<a href="{ { url('/claims/payment/' . $claim->id ) } }">-->
                                <a href="{{$claim->last_invoice->payurlfac}}" target="_blank">
                                <button class="btn btn-xs btn-default text-info mx-1 shadow" title="Pagar factura Pasarela">
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
