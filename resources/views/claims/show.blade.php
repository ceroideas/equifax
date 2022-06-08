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
                    <li class="breadcrumb-item active">Reclamación #{{ $claim->id }}</li>
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
            <h3 class="card-title">Detalles de la Reclamación - {{ $claim->getStatus() }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-8 order-2 order-md-1">

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Importe  reclamado</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{number_format($claim->debt->pending_amount, 2,',','.') }} €</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Cobros recibidos</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ (number_format($claim->amountClaimed(), 2,',','.') /*+ $claim->debt->partialAmounts()*/) ? (number_format($claim->amountClaimed(), 2,',','.') /*+ $claim->debt->partialAmounts()*/).' €' : '--' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
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
                                    <div class="col-12"><b>Datos Adicionales del Deudor / Observaciones :</b><p> {{ $claim->debtor->additional }}</p></div>
                                </div>
                            </div>

                            <div class="post clearfix">
                                <h4>Detalles de la Deuda</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-md-6"><b>Concepto o Justificación:</b> <p>{{ $claim->debt->concept }}</p></div>
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
                                    <div class="col-12"><b>Datos Adicionales del Deudor / Observaciones :</b><p> {{ $claim->debt->additionals }}</p></div>
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
                                        <div class="col-lg-3 col-sm-6 col-md-6"><b>Mínimo:</b> <p>{{ $claim->debt->agreements->take }}€</p></div>
                                        <div class="col-lg-3 col-sm-6 col-md-6"><b>Máximo espera:</b> <p>{{ $claim->debt->agreements->wait }} </p></div>
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


                            @if (!Auth::user()->isClient())
                                <div class="post">

                                    <h6>Deudor con código postal: {{$claim->debtor->cop}}</h6>

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
                                <b>N° de Teléfono</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->phone : 'N/A' }}
                                </p>
                            </div>
                            {{-- <div class="col-sm-6">
                                <b>Tipo</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->getRole() : 'Representado' }}
                                </p>
                           </div> --}}
                       </div>
                       <div class="row">
                            <div class="col-sm-6">
                                <b>Dirección</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->address : $claim->representant->address }}
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <b>Población</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->location : $claim->representant->location }}
                                </p>
                            </div>
                            {{-- <div class="col-sm-6">
                                <b>Código Postal</b>
                                <p>
                                    {{ $claim->user_id ? $claim->client->cop : $claim->representant->cop }}
                                </p>
                            </div> --}}
                        </div>
                    </div>

                    {{--
                    <div>
                        <div class="row">
                            <div class="col text-center">
                                @php
                                    $ext = array_reverse(explode('.', $claim->user_id ? $claim->client->dni_img : $claim->representant->dni_img))[0];
                                @endphp
                                @if(strtolower($ext) == 'pdf')
                                 <iframe src="{{ $claim->user_id ? asset($claim->client->dni_img) : asset($claim->representant->dni_img )}}" frameborder="0" style="width: 100%; height:400px "></iframe>
                                @else
                                <img src="{{ $claim->user_id ? asset($claim->client->dni_img) : asset($claim->representant->dni_img )}}" alt="" class="img img-fluid img-responsive" width="400" height="200">
                                @endif

                            </div>
                        </div>
                    </div>
                    --}}
                    <br>
                    @if(/*$claim->isPending()*/true)
                        <h5 class="mt-5 text-muted">Documentación de la Deuda</h5>

                        <ul class="list-unstyled">

                            @foreach (App\Models\DebtDocument::where('debt_id',$claim->debt->id)->get() as $key => $d)
                                @php
                                    $h = json_decode($d['hitos'],true);
                                @endphp
                                @include('claims.document', ['doc' => $d, 'idx' => $key, 'h' => $h])
                            @endforeach
                            {{-- <div class="row">
                                <div class="col-sm-4">

                                    @if($claim->debt->factura)
                                    <li>
                                        <a href="{{ asset($claim->debt->factura) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif

                                </div>
                                <div class="col-sm-4">

                                    @if($claim->debt->albaran)
                                    <li>
                                        <a href="{{ asset($claim->debt->albaran) }}" class="btn-link text-secondary" target="_blank" download="Albarán Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Albarán</a>
                                    </li>
                                    @endif

                                </div>
                                <div class="col-sm-4">

                                    @if($claim->debt->contrato)
                                    <li>
                                        <a href="{{ asset($claim->debt->contrato) }}" class="btn-link text-secondary" target="_blank" download="Contrato de Prestación de Servicios Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Contrato</a>
                                    </li>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">

                                    @if($claim->debt->documentacion_pedido)
                                    <li>
                                        <a href="{{ asset($claim->debt->documentacion_pedido) }}" class="btn-link text-secondary" target="_blank" download="Documentación del Pedido Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Doc. del Pedido</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    @if($claim->debt->extracto)
                                    <li>
                                        <a href="{{ asset($claim->debt->extracto) }}" class="btn-link text-secondary" target="_blank" download="Extracto Bancario Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Extracto</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    @if($claim->debt->reconocimiento_deuda)
                                    <li>
                                        <a href="{{ asset($claim->debt->reconocimiento_deuda) }}" class="btn-link text-secondary" target="_blank" download="Reconocimiento de Deuda Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Reconocimiento</a>
                                    </li>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">


                                    @if($claim->debt->escritura_notarial)
                                    <li>
                                        <a href="{{ asset($claim->debt->escritura_notarial) }}" class="btn-link text-secondary" target="_blank" download="Escritura Notarial Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Escritura Notarial</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">

                                    @if($claim->debt->reclamacion_previa)
                                    <li>
                                        <a href="{{ asset($claim->debt->reclamacion_previa) }}" class="btn-link text-secondary" target="_blank" download="Reclamación Previa Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Reclam. Previa</a>
                                    </li>
                                    @endif
                                </div>
                            </div> --}}
                            {{-- @if($claim->debt->others)

                            <h5 class="mt-3 text-muted">Documentación Extra</h5>

                            <div class="row">
                                @foreach (explode(',', $claim->debt->others) as $doc)

                                    <div class="col-sm">
                                        <li>
                                            <a href="{{ asset($doc) }}" class="btn-link text-secondary" target="_blank" download="Documento Extra #{{ $loop->iteration }} Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Doc. Extra #{{ $loop->iteration }}</a>
                                        </li>
                                    </div>
                                @endforeach
                            </div>
                            @endif --}}
                            {{-- @if($claim->debt->motivo_reclamacion_previa)
                            <div class="row my-4">
                                <div class="col">

                                    <li>

                                        <p><strong>Motivo Reclamación Previa:</strong> {{ $claim->debt->motivo_reclamacion_previa }}</p>
                                    </li>

                                </div>
                            </div>
                            @endif --}}
                        </ul>
                    @endif

                    @if((Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()) && $claim->isPending())

                        <div class="text-center mt-5 mb-3 float-bottom">

                            <a href="{{ url('claims/'. $claim->id . '/viable/') }}" class="btn btn-sm btn-primary">Reclamación Viable</a>

                            <a href="{{ url('claims/'. $claim->id . '/non-viable/') }}" class="btn btn-sm btn-danger">Reclamación Inviable</a>

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
                                        <p>Reclamación Finalizada</p>
                                    </div>
                                </div>
                            </div>

                        @else

                            @if ($claim->getHito())
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <x-adminlte-alert theme="success">
                                            {{-- <p>{{ $claim->getType() }}</p> --}}
                                            {{ $claim->getHito() }}
                                        </x-adminlte-alert>
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if ($claim->viable_observation)
                            <div class="text-center my-3">
                                <b>Observaciones del Administrador: </b>
                               <p> {{ $claim->viable_observation }}</p>
                            </div>
                        @endif

                        @if ($claim->isFinished() && $claim->claim_type == 2 && !Auth::user()->isClient())
                            <div class="text-center my-3">

                            <a href="{{ url('claims/'. $claim->id . '/viable',1) }}" class="btn btn-sm btn-primary">Reclamación Judicial Viable</a>

                            <a href="{{ url('claims/'. $claim->id . '/non-viable',1) }}" class="btn btn-sm btn-danger">Reclamación Judicial Inviable</a>

                            </div>
                        @endif

                        @if ($claim->claim_type == 1 && $claim->owner->apud_acta)
                            <div class="text-center my-3">
                                {{-- <b>Apud Acta: </b> --}}
                                <li style="list-style: none;">
                                    <a href="{{ url('uploads/users/' . $claim->owner->id . '/apud',$claim->owner->apud_acta) }}" class="btn-link text-secondary" target="_blank" download="Apud Acta - {{ $claim->owner->name }} - {{ $claim->owner->dni }}.pdf"><i class="far fa-fw fa-file"></i>Apud Acta</a>
                                </li>
                            </div>
                        @endif
                    @endif

                    @if (Auth::user()->isAdmin() && !$claim->isFinished() && !$claim->isPending())
                        <div class="text-center">
                            <x-adminlte-button label="Finalizar Reclamación" data-toggle="modal" data-target="#modalFinish" theme="info"/>

                            <x-adminlte-modal id="modalFinish" title="¿Desea dar por finalizada la reclamación actual?" theme="primary" size="sm" v-centered="true">
                                {{-- <div class="card">     --}}
                                    {{-- <div class="card-body">
                                        <div class="row">
                                        <div class="col-sm-12">
                                                {!! $claim->observation !!}
                                        </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
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

    </script>
@stop
