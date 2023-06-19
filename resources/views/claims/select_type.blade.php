@extends('adminlte::page')

@section('title', 'Nueva Reclamaci&oacute;n')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tipo de reclamaci&oacute;n</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamaci&oacute;n</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
   <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
        <div data-v-9cc878a2="" class="text-center card-tarifa container">
            <div data-v-9cc878a2="" class="text-tarifa">Selecciona el tipo de reclamaci&oacute;n</div>

            <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                <!-- Card 1 -->
                <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                    <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                        <div data-v-9cc878a2="" class="pt-5">
                            <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                <small>Reclamaci&oacute;n extrajudicial</small>
                            </span>
                        </div>
                        <div data-v-9cc878a2="" >
                            <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">
                                <li data-v-9cc878a2="">
                                    <div class="card-text pt-4">
                                        Comienza con tu reclamacion por v&iacute;a extrajudicial
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <span data-v-9cc878a2="" class="fw-normal text-t1 pt-3">
                            <small>Por solo</small> 19,90€
                        </span>
                        <div class="col-12 pb-3 pt-3">
                            <a data-v-9cc878a2="" href="/claims/save-type-claim/2" aria-current="page"
                                class="btn btn-light-descubre" type="button">Reclamaci&oacute;n Extrajudicial</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                    <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                        <div data-v-9cc878a2="" class="pt-5">
                            <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                <small>Reclamaci&oacute;n judicial</small>
                            </span>
                        </div>
                        <div data-v-9cc878a2="">
                            <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">
                                <li data-v-9cc878a2="">
                                    <div class="card-text pt-4">
                                        Comienza con tu reclamaci&oacute;n por v&iacute;a judicial
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <span data-v-9cc878a2="" class="fw-normal text-t1 pt-3">
                            <small>Desde</small> 69,90€
                        </span>
                        <div class="col-12 pb-3 pt-3">
                            <a data-v-9cc878a2="" href="/claims/save-type-claim/1" aria-current="page"
                                class="btn btn-light-descubre" type="button">Reclamaci&oacute;n Judicial</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


