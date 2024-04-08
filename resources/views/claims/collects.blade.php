@extends('adminlte::page')

@section('title', 'Cobros')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cobros</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Cobros</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')
    @php
        $heads = [
            'Serie',
            'Factura',
            'ID',
            'Fecha cobro',
            'Importe',
            'Concepto',
            'Forma de pago',
            'Observaciones',
            'Exportado (Altai)',
            'Usuario'
        ];
        $config = [

            'columns' => [null, null, null, null, null, null, null, null, null, null],
            'order'=>[[0,'desc'],[1,'desc']],
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

    @if (Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())
        <a href="{{url('collects-export')}}" class="btn btn-sm btn-info">Exportar nuevos cobros (Formato contable)</a>
        <a href="{{url('collects-export-all')}}" class="btn btn-sm btn-primary">Exportar todos los cobros (Formato contable)</a>
        <a href="{{ url('/collects/create/') }}"><x-adminlte-button class="btn-flat btn-sm float-top bg-orange " style="color: white !important; font-size: 16px;" type="button" label="Registrar un cobro" icon="fas fa-lg fa-pencil"/></a>

        <form action="{{url('import-collects')}}" style="display: inline-block; margin: 0;" method="POST" enctype="multipart/form-data">
            @csrf

            <label style="margin: 0;" for="collects" class="btn btn-danger btn-sm">Importar cobros</label>

            <input name="file" type="file" id="collects" style="display: none;">

        </form>
    @endif



    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" class="table-responsive" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">

            @foreach($collects as $collect)
                <tr>
                    <td>{{ $collect->tipcob }}</td>
                    <td>{{ $collect->invoice_id }}</td>
                    <td>{{ $collect->id }}</td>
                    <td>{{ Carbon\Carbon::parse($collect->feccob)->format('d/m/Y') }}</td>
                    <td>{{number_format($collect->impcob,2,',','.')}} &euro;</td>
                    <td>{{ $collect->cptcob }}</td>
                    <td>{{ $collect->fpacob }}</td>
                    <td>{{ $collect->obscob }}</td>
                    <td>{{ $collect->tracob == 1 ? 'Exportado' : 'No exportado' }}</td>
                    @php
                        $decryptedName = isset($collect->usuario->name) ? Crypt::decryptString(trim($collect->usuario->name)) : 'No existe';
                    @endphp
                    <td>{{ $decryptedName }}</td>
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
