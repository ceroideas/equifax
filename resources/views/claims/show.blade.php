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

    <div class="card">
        <div class="card-header card-orange card-outline">
            <h3 class="card-title">Detalles de la Reclamación</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body" style="display: block;">
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
                    <h5 class="mt-5 text-muted">Documentación de la Deuda</h5>
                    
                    {{-- <ul class="list-unstyled">
                    
                        <li>
                    
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                        </li>
                    
                    
                        <li>
                    
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                    
                        </li>
                    
                        <li>
                    
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                    
                        </li>
                    
                        <li>
                    
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                    
                        </li>
                    
                        <li>
                    
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                    
                        </li>
                    
                    </ul> --}}
                    
                    <div class="text-center mt-5 mb-3 float-bottom">
                    
                        <a href="#" class="btn btn-sm btn-primary">#</a>
                    
                        <a href="#" class="btn btn-sm btn-warning">#</a>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop
