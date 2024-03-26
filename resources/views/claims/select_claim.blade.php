@extends('adminlte::page')

@section('title', 'Campañas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reclamaciones previas</h1>
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
    $heads = [
        'Id',
    	'Fecha registro',
        'Fase',
        'Tipo',
        'Acreedor',
        'Deudor',
        'Importe',
        'Tipo deuda',
        'Mínimo aceptado',
        'Tiempo espera',
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null, null, null, null, null, null, null, null, null, null,['orderable' => false]],
        'order'=>[[0,'desc']],
        'pageLength' => 25,
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    {{-- Datatable para los usuarios --}}

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
			@foreach($claimTmps as $claimTmp)
				<tr>
					<td>{{ $claimTmp->id }}</td>
                    <td>{{ Carbon\Carbon::parse($claimTmp->updated_at)->format('d/m/Y - H:i:s') }}</td>
                    @switch($claimTmp->status)
                        @case(1)
                                <td>1. Datos acreedor</td>
                            @break
                        @case(2)
                                <td>2. Tipo de deuda</td>
                            @break
                        @case(3)
                                <td>3. Datos deudor</td>
                            @break
                        @case(4)
                                <td>4. Datos deuda</td>
                            @break
                        @case(5)
                                <td>5. Opciones de acuerdo</td>
                            @break
                        @case(6)
                                <td>6. Aceptación y pago</td>
                            @break

                        @default
                                <td>No existe</td>
                    @endswitch

					<td>{{ isset($claimTmp->claim_type)?($claimTmp->claim_type==1?'Judicial':'Extrajudicial'):'' }}</td>
                    @php
                        $decryptedClientName = isset($claimTmp->client->name) ? Crypt::decryptString($claimTmp->client->name) : NULL;
                        $decryptedRepresentantName = isset($claimTmp->representant->name) ? Crypt::decryptString($claimTmp->representant->name) : NULL;
                        $decryptedDebtorName = isset($claimTmp->debtor->name) ? Crypt::decryptString($claimTmp->debtor->name) : NULL;
                    @endphp

                    <td>{{ isset($claimTmp->user_id) ? $decryptedClientName : (isset($claimTmp->representant->name)?$decryptedRepresentantName:'')}}</td>
                    <td>{{ isset($claimTmp->debtor)? $decryptedDebtorName:'' }}</td>
                    <td>{{ isset($claimTmp->debtTmp) ? number_format( $claimTmp->debtTmp->pending_amount , 2,',','.') :'' }}
                        @if($claimTmp->debtTmp)
                            &euro;
                        @endif
                    </td>
                    @switch($claimTmp->debt_type)
                        @case(0)
                                <td>Cheques / Pagarés</td>
                            @break
                        @case(1)
                                <td>Venta de productos a consumidor final</td>
                            @break
                        @case(2)
                                <td>Honorarios de profesionales</td>
                            @break
                        @case(3)
                                <td>Venta de productos farmaceúticos</td>
                            @break
                        @case(4)
                                <td>Abono comida y habitación en hoteles</td>
                            @break
                        @case(5)
                                <td>Prestación de servicios</td>
                            @break
                        @case(6)
                                <td>Venta de productos mayorista</td>
                            @break
                        @case(7)
                                <td>Compraventa de bienes muebles para reventa</td>
                            @break
                        @case(8)
                                <td>Pagos aplazados</td>
                            @break
                        @case(9)
                                <td>Resto de deudas no incluidas en las anteriores</td>
                            @break
                        @case(10)
                                <td>Hipotecaria / Alquileres bienes inmuebles. Recuperación de cantidades económicas</td>
                            @break
                        @case(11)
                                <td>Comunidades de propietarios</td>
                            @break
                        @default
                                <td>{{$claimTmp->debt_type_description}}</td>
                    @endswitch
                    <td>{{ isset($claimTmp->agreementTmp)? $claimTmp->agreementTmp->take:'' }}</td>
                    <td>{{ isset($claimTmp->agreementTmp)? $claimTmp->agreementTmp->wait:'' }}</td>
					<td>
						<nobr>
							{{-- <a href="{{ url('/blogs/'. $blog->id . '/edit/') }}"> --}}
                            <a href="{{ url('claims/restore/'.$claimTmp->id)}}">
								<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Completar reclamación">
									<i class="fa fa-lg fa-fw fa-check"></i>
								</button>
							</a>
						</nobr>
                    </td>
				</tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
