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
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
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
                                    <span class="info-box-text text-center text-muted">Importe  Principal</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $claim->debt->total_amount }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Importe Pendiente</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $claim->debt->pending_amount }}</span>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Abonos Realizados</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $claim->debt->partials_amount ? $claim->debt->partials_amount : 'N/A' }}</span>
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
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Tipo de Deudor:</b> <p>{{ $claim->debtor->getType() }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-3"><b>Dirección:</b><p> {{ $claim->debtor->address }}</p></div>
                                    <div class="col-lg-3"><b>Localidad:</b> <p>{{ $claim->debtor->location }}</p> </div>
                                    <div class="col-lg-3"><b>Código Postal:</b><p> {{ $claim->debtor->cop }}</p></div>
                                    <div class="col-lg-3"><b>N° Tlf:</b><p> {{ $claim->debtor->phone }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12"><b>Datos Adicionales del Deudor / Observaciones :</b><p> {{ $claim->debtor->additional }}</p></div>
                                </div>
                            </div>

                            <div class="post clearfix">
                                <h4>Detalles de la Deuda</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Concepto O Justificación:</b> <p>{{ $claim->debt->concept }}</p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>N° De Documento:</b> <p>{{ $claim->debt->document_number }} </p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Fecha de la Deuda:</b> <p>{{ $claim->debt->debt_date }}</p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Fecha de Vencimiento de la Deuda:</b> <p>{{ $claim->debt->debt_expiration_date ? $claim->debt->debt_expiration_date : 'N/A'  }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12"><b>Datos Adicionales del Deudor / Observaciones :</b><p> {{ $claim->debt->additionals }}</p></div>
                                </div>
                            </div>

                            <div class="post">
                                <h4>Detalles del Acuerdo</h4>

                                @if($claim->debt->hasAgreement())
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Quitas:</b> <p>{{ $claim->debt->agreements->take }}</p></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6"><b>Espera:</b> <p>{{ $claim->debt->agreements->wait }} </p></div>
                                    <div class="col-lg-6 col-sm-12 col-md-12"><b>Datos Adicionales del Deudor / Observaciones :</b><p> {{ $claim->debt->additionals }}</p></div>
                                </div>
                                <div class="row mt-3">
                                    
                                </div>
                                @else 
                                <div class="row mt-3">
                                    <div class="col-12">N/A</div>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-sm-12 col-lg-4 order-1 order-md-2">

                    <h3 class="text-primary"><i class="fas fa-user"></i> {{ $claim->client->name ? $claim->client->name : $claim->representant->name  }}</h3>

               
                    <div class="text-muted">
                       <div class="row">
                           <div class="col-sm-4">
                                <b>DNI/CIF</b>
                                <p>
                                    {{ $claim->client->dni ? $claim->client->dni : $claim->representant->dni }}
                                </p>
                           </div>
                           <div class="col-sm-4">
                                <b>N° de Teléfono</b>
                                <p>
                                    {{ $claim->client->phone ? $claim->client->phone : 'N/A' }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <b>Tipo</b>
                                <p>
                                    {{ $claim->client->getRole() ? $claim->client->getRole() : 'Representante' }}
                                </p>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-sm-4">
                                <b>Dirección</b>
                                <p>
                                    {{ $claim->client->address ? $claim->client->address : $claim->representant->address }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <b>Población</b>
                                <p>
                                    {{ $claim->client->location ? $claim->client->location : $claim->representant->location }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <b>Código Postal</b>
                                <p>
                                    {{ $claim->client->cop ? $claim->client->cop : $claim->representant->cop }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col text-center">
                                <img src="{{ $claim->client->dni_img ? asset($claim->client->dni_img) : asset($claim->representant->dni_img )}}" alt="" class="img img-fluid img-responsive" width="400" height="200">
                            </div>
                        </div>
                    </div>
                
                    <br>
                    @if($claim->isPending())
                        <h5 class="mt-5 text-muted">Documentación de la Deuda</h5>
                        
                        <ul class="list-unstyled">
                            <div class="row">
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
                                        <a href="{{ asset($claim->debt->albaran) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif

                                </div>
                                <div class="col-sm-4">

                                    @if($claim->debt->documentacion_pedido)
                                    <li>
                                        <a href="{{ asset($claim->debt->documentacion_pedido) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">

                                    @if($claim->debt->documentacion_pedido)
                                    <li>
                                        <a href="{{ asset($claim->debt->documentacion_pedido) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    @if($claim->debt->extracto)
                                    <li>
                                        <a href="{{ asset($claim->debt->extracto) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    @if($claim->debt->reconocimiento_deuda)
                                    <li>
                                        <a href="{{ asset($claim->debt->reconocimiento_deuda) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">


                                    @if($claim->debt->escritura_notarial)
                                    <li>
                                        <a href="{{ asset($claim->debt->escritura_notarial) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">

                                    @if($claim->debt->reclamacion_previa)
                                    <li>
                                        <a href="{{ asset($claim->debt->reclamacion_previa) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    @if($claim->debt->motivo_reclamacion_previa)
                                    <li>
                                        <a href="{{ asset($claim->debt->motivo_reclamacion_previa) }}" class="btn-link text-secondary" target="_blank" download="Factura Reclamo #{{ $claim->id }}"><i class="far fa-fw fa-file"></i>Factura</a>
                                    </li>
                                    @endif
                                </div>
                            </div>
                        </ul>
                    @endif

                    @if((Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()) && $claim->isPending())
                    
                        <div class="text-center mt-5 mb-3 float-bottom">
                        
                            <a href="{{ url('claims/viable/select-type') }}" class="btn btn-sm btn-primary">Reclamación Viable</a>
                        
                            <a href="{{ url('claims/'. $claim->id . '/non-viable/') }}" class="btn btn-sm btn-danger">Reclamación Inviable</a>
                        
                        </div>
                        @elseif(!$claim->isViable() && !$claim->isPending())

                        <div class="text-center">
                            <x-adminlte-button label="Ver Informe de Inviabilidad" data-toggle="modal" data-target="#modalMin" theme="primary"/>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>




@stop
