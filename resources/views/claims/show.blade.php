@extends('adminlte::page')

@section('title', 'Reclamación #' . $claim->id)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Reclamaci&oacute;n #{{ $claim->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif
    @if(session()->has('msj_apud'))
        <x-adminlte-alert theme="warning" dismissable>
            {{ session('msj_apud') }}
        </x-adminlte-alert>
    @endif

    @if(!$claim->isViable())
        <x-adminlte-modal id="modalMin" title="Informe de Inviabilidad" theme="primary" size="lg" v-centered="true">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-12">
                            {!! $claim->observation !!}
                    </div>
                    </div>
                </div>
            </div>
            <x-slot name="footerSlot">
                {{-- <x-adminlte-button class="mr-auto" theme="success" label="Accept"/> --}}
                <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
            </x-slot>
        </x-adminlte-modal>
    @endif
    <div class="card">
        <div class="card-header card-orange card-outline">
            <h3 class="card-title"  style="color:#e65927;" >Detalles de la Reclamaci&oacute;n - {{ $claim->debt->document_number }} - {{ $claim->getStatus() }} </h3>
            <div class="card-tools">
                <input type="button" class="btn-secondary" name="imprimir" value="Imprimir reclamaci&oacute;n" onclick="window.print();">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-8 order-2 order-md-1">

                    <div class="row">

                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Importe  original</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{number_format( ($claim->debt->total_amount + (($claim->debt->total_amount * $claim->debt->tax)/100) ) , 2,',','.') }} €</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Importe  reclamado</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{number_format($claim->debt->pending_amount, 2,',','.') }} €</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Cobros recibidos</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ (number_format($claim->amountClaimed(), 2,',','.') /*+ $claim->debt->partialAmounts()*/) ? (number_format($claim->amountClaimed(), 2,',','.') /*+ $claim->debt->partialAmounts()*/).' €' : '--' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Importe pendiente de pago</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ number_format($claim->debt->pending_amount - ($claim->amountClaimed() ), 2,',','.') }} €</span>
                                    {{--<span class="info-box-number text-center text-muted mb-0">{{ $claim->debt->pending_amount - ($claim->amountClaimed() /*+ $claim->debt->partialAmounts()*/) }}€</span>--}}

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">

                            <h4>Detalles del Deudor</h4>

                            <div class="post">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Nombre:</b> <p>{{ $claim->debtor->name }}</p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>DNI/CIF:</b> <p>{{ $claim->debtor->dni }} </p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Email:</b> <p>{{ $claim->debtor->email }}</p></div>
                                    {{-- <div class="col-lg-3 col-sm-6 col-md-6"><b>Tipo de Deudor:</b> <p>{{ $claim->debtor->getType() }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3"><b>Dirección:</b><p> {{ $claim->debtor->address }}</p></div>
                                    <div class="col-lg-3"><b>Localidad:</b> <p>{{ $claim->debtor->location }}</p> </div>
                                    <div class="col-lg-3"><b>Código Postal:</b><p> {{ $claim->debtor->cop }}</p></div> --}}
                                    <div class="col-lg-3"><b>N° Tlf:</b><p> {{ $claim->debtor->phone }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12"><b>Datos adicionales del deudor / Observaciones :</b><p> {{ $claim->debtor->additional }}</p></div>
                                </div>
                            </div>

                            <div class="post clearfix">
                                <h4>Detalles de la Deuda</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6"><b>Concepto o Justificaci&oacute;n:</b> <p>{{ $claim->debt->concept }}</p></div>
                                    {{-- <div class="col-lg-6 col-sm-6 col-md-6"><b>N° De Documento:</b> <p>{{ $claim->debt->document_number }} </p></div> --}}
                                    {{--<div class="col-lg-6 col-sm-6 col-md-6"><b>Fecha de la Deuda:</b> <p>{{ $claim->debt->debt_date }}</p></div> --}}
                                    <div class="col-lg-6 col-sm-6 col-md-6"><b>Fecha de la Deuda:</b> <p>{{ date('d/m/Y', strtotime($claim->debt->debt_date)) }}</p></div>
                                    {{-- <div class="col-lg-6 col-sm-6 col-md-6"><b>Fecha de Vencimiento de la Deuda:</b>

                                        @if ($claim->debt->debt_expiration_date)
                                            @php
                                                $f1 = Carbon\Carbon::parse($claim->debt->debt_expiration_date);
                                                $tdy = Carbon\Carbon::now();
                                            @endphp

                                            @if ($f1 < $tdy)
                                                <p class="text-danger">{{ $claim->debt->debt_expiration_date }} <br> <b>Deuda expirada</b></p>
                                            @else
                                                <p>{{ $claim->debt->debt_expiration_date }}</p>
                                            @endif
                                        @else
                                            N/A
                                        @endif

                                    </div>--}}
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12"><b>Datos adicionales del deudor / Observaciones :</b><p> {{ $claim->debt->additionals }}</p></div>
                                    <div class="col-12"><b>Tipo de la deuda :</b><p>

                                        @if ($claim->debt->type == '-1')
                                            {{ '('.$claim->debt->type_extra.')'}}
                                        @else
                                            {{ config('app.deudas')[$claim->debt->type]['deuda'] }}
                                        @endif
                                    </p></div>
                                </div>
                            </div>

                            @if ($claim->debt->hasAgreement())
                                <div class="post">
                                    <h4>Detalles del Acuerdo</h4>

                                    @if($claim->debt->hasAgreement())
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-md-6"><b>M&iacute;nimo:</b> <p>{{ $claim->debt->agreements->take }}€</p></div>
                                        <div class="col-lg-3 col-sm-6 col-md-6"><b>M&aacute;ximo <span data-toggle="tooltip" style="color:#e65927; data-placement="top" title="Plazo en el que estás dispuesto a recuperar la deuda.">espera</span>:</b> <p>{{ $claim->debt->agreements->wait }} </p></div>
                                        <div class="col-lg-6 col-sm-12 col-md-12"><b>Observaciones :</b><p> {{ $claim->debt->additionals }}</p></div>
                                    </div>
                                    <div class="row mt-3">

                                    </div>
                                    @else
                                    <div class="row mt-3">
                                        <div class="col-12">N/A</div>
                                    </div>
                                    @endif

                                </div>
                            @endif


                            @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                                <div class="post">
                                    <div class="form-group">
                                        <b>FECHA DE REGISTRO DE EXPEDIENTE: </b> {{date('d/m/Y', strtotime($claim->created_at))}}<br>
                                        <b>DIAS TRANSCURRIDOS:
                                            @if($dias>30)
                                                <span style="color:#e65927;">
                                            @else
                                                <span>
                                            @endif
                                            {{$dias}}</b></span>
                                    </div>

                                    <b>DEUDOR CON C&Oacute;DIGO POSTAL:</b> {{$claim->debtor->cop}}

                                    <select name="postal_code_id" class="js-data-example-ajax form-control">
                                        @if ($claim->debtor->cop)
                                        @php
                                            $pc = \App\Models\PostalCode::where('code',$claim->debtor->cop)->first();
                                        @endphp
                                            @if ($pc)
                                                <option value="{{$pc->id}}">{{$pc->code.' - '.$pc->province}}</option>
                                            @endif
                                        @endif
                                    </select>

                                    <br>

                                    @if ($claim->debtor->cop)

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

                                    <div class="form-group">
                                        <b>JUZGADO:</b> <span id="juzgado">{{$juzgado}}</span>
                                    </div>
                                    <div class="form-group">
                                        <b>PROCURADOR:</b> <span id="procurador">{{$procurador}}</span>
                                    </div>

                                    <div class="form-group">
                                        <a href="{{url('exportTemplate',$claim->id)}}" class="btn btn-success"> <i class="fas fa-file"></i> Descargar Word DDA MONITORIO DIVIDAE</a>
                                    </div>

                                    @endif

                                </div>
                            @endif

                            @if($claim->getIdHito()==30037)
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <x-adminlte-alert theme="warning">
                                            Para poder continuar con la reclamaci&oacute;n, debes aceptar que continuemos a la siguiente fase.
                                            <div class="text-center">
                                                <x-adminlte-button label="Continuar con la reclamación" data-toggle="modal" data-target="#modalContinue" theme="success"/>
                                                    <x-adminlte-modal id="modalContinue" title="¿Desea continuar con la reclamación {{$claim->id}}?" size="lg" v-centered="true">
                                                        <p>La reclamaci&oacute;n <strong>{{$claim->id}}</strong> del usuario <strong>{{ $claim->debtor->name }}</strong> continuara a la fase judicial</p>
                                                        <x-slot name="footerSlot">
                                                            <a href="{{url('claims/continue',$claim->id)}}" class="btn btn-md btn-success" class="mr-auto" theme="success">Aceptar</a>
                                                            <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
                                                        </x-slot>
                                                    </x-adminlte-modal>
                                            </div>
                                        </x-adminlte-alert>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-sm-12 col-lg-4 order-1 order-md-2">

                    <h4>Detalles del acreedor</h4>

                    <h3 class="text-primary"><i class="fas fa-user"></i> {{ $claim->user_id ? $claim->client->name : $claim->representant->name  }}</h3>

                    <div class="text-muted">
                       <div class="row">
                           <div class="col-sm-6">
                                <b>DNI/CIF</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->dni : $claim->representant->dni }}
                                </p>
                           </div>
                           <div class="col-sm-6">
                                <b>N° de Tel&eacute;fono</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->phone : 'N/A' }}
                                </p>
                            </div>
                       </div>
                       <div class="row">
                            <div class="col-sm-6">
                                <b>Direcci&oacute;n</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->address : $claim->representant->address }}
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <b>Poblaci&oacute;n</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->location : $claim->representant->location }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <br>
                    @if(/*$claim->isPending()*/true)
                        <h5 class="mt-5 text-muted">Documentaci&oacute;n de la Deuda</h5>

                        <ul class="list-unstyled">

                            @foreach (App\Models\DebtDocument::where('debt_id',$claim->debt->id)->get() as $key => $d)
                                @php
                                    $h = json_decode($d['hitos'],true);
                                @endphp
                                @include('claims.document', ['doc' => $d, 'idx' => $key, 'h' => $h])
                            @endforeach
                        </ul>
                    @endif

                    @if($claim->claim_type == 1)
                        <h5 class="mt-5 text-muted">Apud Acta</h5>
                        @if($claim->user_id)
                            @if(isset($claim->client->apud_acta))
                                <div class="text-center my-3">
                                    <li style="list-style: none;">
                                        <a href="{{ url('storage/'.$claim->client->apud_acta) }}" class="btn-link text-secondary" target="_blank"
                                            download="Apud Acta - {{ $claim->client->name }} - {{ $claim->client->dni }}.pdf">
                                            <i class="far fa-fw fa-file"></i>Descargar Apud Acta</a>
                                    </li>
                                </div>
                            @else
                                <x-adminlte-alert theme="warning">
                                    <p>No existe apud acta en cliente, descarga las
                                        <a href="/docs/Instrucciones_apud_acta_electronico.pdf" target="_blank"> instrucciones para generar el apud acta.</a>
                                    </p>
                                    <form action="{{url('uploadApudActa')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$claim->id}}">
                                        <input type="file" style="display: none;" id="apud-{{$claim->id}}" name="file">
                                        <label for="apud-{{$claim->id}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Apud acta" style="margin: 0">
                                            <i class="fa fa-lg fa-fw fa-upload"></i>
                                        </label>
                                    </form>
                                </x-adminlte-alert>
                            @endif
                        @else
                            @if(isset($claim->representant->apud_acta))
                                <div class="text-center my-3">
                                    <li style="list-style: none;">
                                        <a href="{{ url('storage/'.$claim->representant->apud_acta) }}" class="btn-link text-secondary" target="_blank"
                                            download="Apud Acta - {{ $claim->representant->name }} - {{ $claim->representant->dni }}.pdf">
                                            <i class="far fa-fw fa-file"></i>Descargar Apud Acta</a>
                                    </li>
                                </div>
                            @else
                                <x-adminlte-alert theme="warning">
                                    <p>No existe apud acta en representado, descarga las
                                        <a href="/docs/Instrucciones_apud_acta_electronico.pdf" target="_blank"> instrucciones para generar el apud acta.</a>
                                    </p>
                                    <form action="{{url('uploadApudActa')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$claim->id}}">
                                        <input type="file" style="display: none;" id="apud-{{$claim->id}}" name="file">
                                        <label for="apud-{{$claim->id}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Apud acta" style="margin: 0">
                                            <i class="fa fa-lg fa-fw fa-upload"></i>
                                        </label>
                                    </form>
                                </x-adminlte-alert>
                            @endif
                        @endif
                        <hr>
                    @endif

                    @if(((Auth::user()->isAdmin() || Auth::user()->isGestor()) || Auth::user()->isSuperAdmin()) && $claim->isPending())

                        <div class="text-center mt-5 mb-3 float-bottom">

                            <a href="{{ url('claims/'. $claim->id . '/viable/') }}" class="btn btn-sm btn-primary">Reclamaci&oacute;n Viable</a>

                            <a href="{{ url('claims/'. $claim->id . '/non-viable/') }}" class="btn btn-sm btn-danger">Reclamaci&oacute;n Inviable</a>

                        </div>
                        @elseif(!$claim->isViable() && !$claim->isPending() && !$claim->isFinished())

                        <div class="text-center">
                            <x-adminlte-button label="Ver Informe de Inviabilidad" data-toggle="modal" data-target="#modalMin" theme="primary"/>
                        </div>
                        @else

                        @if ($claim->isFinished())

                            <div class="row text-center">
                                <div class="col-sm-6 offset-sm-3">
                                    <div class="alert-danger">
                                        <p>Reclamaci&oacute;n Finalizada</p>
                                    </div>
                                </div>
                            </div>

                        @else
                        <h5 class="mt-5 text-muted">&Uacute;ltima actuaci&oacute;n</h5>
                            @if ($claim->getHito()&& $claim->getIdHito()<>30037)
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <x-adminlte-alert theme="success">
                                            {{-- <p>{{ $claim->getType() }}</p> --}}
                                            {{ $claim->getHito() }}
                                        </x-adminlte-alert>
                                    </div>
                                </div>
                            @endif
                            <a href="actuations/{{$claim->id}}" class="btn btn-info">Ver todas las actuaciones</a>
                        @endif

                        @if ($claim->viable_observation)
                            <div class="text-center my-3">
                                <b>Observaciones del Administrador: </b>
                               <p> {{ $claim->viable_observation }}</p>
                            </div>
                        @endif

                        @if ($claim->isFinished() && $claim->claim_type == 2 && !Auth::user()->isClient())
                            <div class="text-center my-3">

                            <a href="{{ url('claims/'. $claim->id . '/viable',1) }}" class="btn btn-sm btn-primary">Reclamaci&oacute;n Judicial Viable</a>

                            <a href="{{ url('claims/'. $claim->id . '/non-viable',1) }}" class="btn btn-sm btn-danger">Reclamaci&oacute;n Judicial Inviable</a>

                            </div>
                        @endif


                    @endif


                    {{--@if ((Auth::user()->isAdmin() || Auth::user()->isGestor()||Auth::user()->isSuperAdmin()) && !$claim->isFinished() && !$claim->isPending())--}}
                    @if (!$claim->isFinished() && !$claim->isPending())
                    <br>
                        <div class="text-center">
                            <x-adminlte-button label="Finalizar Reclamación {{$claim->id}}" data-toggle="modal" data-target="#modalFinish" theme="danger"/>
                                <x-adminlte-modal id="modalFinish" title="¿Desea dar por finalizada la reclamación {{$claim->id}}?" size="lg" v-centered="true">
                                    @if($claim->claim_type == 2)
                                            <p>La relamaci&oacute;n <strong>{{$claim->id}} </strong> usuario <strong>{{ $claim->debtor->name }} </strong> finalizar&aacute;</p>
                                        @else
                                            <p>La reclamaci&oacute;n <strong>{{$claim->id}}</strong> del usuario <strong>{{ $claim->debtor->name }}</strong> esta en fase judicial, el equipo de Dividae se pondr&aacute; en contacto contigo</p>
                                        @endif

                                    <x-slot name="footerSlot">
                                        <a href="{{url('claims/close',$claim->id)}}" class="btn btn-md btn-success" class="mr-auto" theme="success">Aceptar</a>
                                        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
                                    </x-slot>
                                </x-adminlte-modal>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>

        $('.js-data-example-ajax').select2({
          placeholder: 'Busca por código',
          language: {
            searching: function() {
                return "Buscando";
            },
            noResults: function() {
                return "No hay resultados";
            }
          },
          ajax: {
            url: '{{url('api/load-postal-codes')}}',
            dataType: 'json',
            processResults: function (data) {
                return {
                  results: data,
                  pagination: {
                    more: false
                  }
                }
            },
          }
        });

        $('[name="postal_code_id"]').on('change', function(event) {
            event.preventDefault();
            /* Act on the event */
            $.post('{{url('api/save-postal-code')}}', {id: {{$claim->id}}, postal_code_id: $(this).val()}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                console.log(data);

                $('#juzgado').text(data[0]);
                $('#procurador').text(data[1]);
            });
        });

        $('[name="file"]').change(function (e) {
            e.preventDefault();

            if (confirm("¿Desea subir el archivo seleccionado?") == true) {
                $(this).parent().submit();
            }

        });

    </script>
@stop
