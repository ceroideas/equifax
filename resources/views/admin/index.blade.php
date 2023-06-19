@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

<style>
    @font-face{
        font-family: "Roobert";
        src: url({{url('landing')}}/fonts/Roobert-Light.otf?d941cb2e666a7aa59bde258fee032353);
        font-weight: normal;
        font-style: normal;
    }
    .btn-light-descubre {
        border-radius: 37.5px !important !important;
        background-color: #e65927 !important;
        font-family: Roobert !important;
        font-size: 14px !important;
        font-weight: normal !important;
        font-stretch: normal !important;
        font-style: normal !important;
        line-height: normal !important;
        letter-spacing: normal !important;
        text-align: center !important;
        color: #fff !important;
        /*margin-top: 14px !important;*/
        color: #fff !important !important;
        margin-left: -10px !important;
        border: 1px solid #e65927 !important;
    }
</style>

@if (!Auth::user()->isClient())
    @section('content_header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>&Aacute;rea personal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">&Aacute;rea personal</li>
                    </ol>
                </div>
            </div>
        </div>
    @stop
@endif


@if (Auth::user()->isClient())
    @section('extra_header')

    <div style="background-color: #e65927; color: #fff" class="text-center">

        <small>Área Clientes</small>

        <h3 style="padding-bottom: 10px !important">Inicio</h3>

    </div>

    @stop
@endif

@section('content')

<style>
    .blockBackoffice {
        padding-top: 20px;
    }

    .btn-dividae {
        border-radius: 20px;
        border: 1px solid #e65927;
        color: #e65927 !important;
    }
</style>

    @if(session()->has('alert'))
    <x-adminlte-alert theme="danger" dismissable>
        {{ session('alert') }}
    </x-adminlte-alert>
    @endif

    @if(session()->has('msj'))
    <x-adminlte-alert theme="success" dismissable>
        {{ session('msj') }}
    </x-adminlte-alert>
    @endif

    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin() )
        <div class="row">
            <div class="col-sm-4">
                <form action="{{url('importPostalCode')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <div class="btn-group btn-group-toggle">
                      <label for="importPostalCode" class="btn btn-info btn-sm">
                        Subir Excel para Códigos Postales
                     </label>
                      <a download="Ejemplo Excel para Códigos Postales.xlsx" href="{{url('excels/postal_codes.xlsx')}}" class="btn btn-secondary">
                        Ejemplo
                      </a>
                    </div>
                    <input type="file" name="file" style="display: none;" id="importPostalCode" class="upload-excel">
                </form>
            </div>
            <div class="col-sm-4">
                <form action="{{url('importType')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <div class="btn-group btn-group-toggle">
                      <label for="importType" class="btn btn-info btn-sm">
                        Subir Excel para Tipos de Procedimiento
                      </label>
                      <a download="Ejemplo Excel para Tipos de Procedimiento.xlsx" href="{{url('excels/types.xlsx')}}" class="btn btn-secondary">
                        Ejemplo
                      </a>
                    </div>
                    <input type="file" name="file" style="display: none;" id="importType" class="upload-excel">
                </form>
            </div>

            <div class="col-sm-4">
                <form action="{{url('importParty')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <div class="btn-group btn-group-toggle">
                      <label for="importParty" class="btn btn-info btn-sm">
                        Subir Excel para Partidos Judíciales
                      </label>
                      <a download="Ejemplo Excel para Partidos Judíciales.xlsx" href="{{url('excels/parties.xlsx')}}" class="btn btn-secondary">
                        Ejemplo
                      </a>
                    </div>
                    <input type="file" name="file" style="display: none;" id="importParty" class="upload-excel">
                </form>
            </div>
        </div>
        <br>
    @endif

    <div class="row">

        @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin() )
            {{--<div class="col-lg-3 col-6">
                <div class="small-box bg-warning ">
                    <div class="inner">
                        <h3 class="">{{ $clients }}</h3>
                        <p class="">Clientes Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="{{ url('/users/pending') }}" class="small-box-footer"><span class="">Ir a Clientes </span><i class="fas fa-arrow-circle-right text-white"></i></a>
                </div>
            </div>--}}
        @else
            <div class="col-md-3 col-sm-3 col-xs-12 d-none d-sm-block" style="position: relative;">

                <div style="position: absolute; width: calc(100% - 20px); bottom: 20px;">
                    <h5>¿Podemos ayudarte?</h5>

                    <div style="position: relative; height: 200px;">

                        <div style="position: absolute; height: 80%; width: 100%; background-color: #e65927; border-radius: 8px; bottom: 0;">

                        </div>
                        <img src="{{url('landing/assets/contacto.png')}}" alt="" style="position: absolute; bottom: 0; right: 0; width: 100%">
                    </div>

                    <div class="text-center">
                        <br>
                        <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                            <a target="_blank" data-v-7b4478c1="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/linkedin.png" style="padding: 4px; width: 100%"></a>
                        </span>

                        <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                            <a target="_blank" data-v-7b4478c1="" href="mailto:info@dividae.com" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/mail.png" style="padding: 4px; width: 100%"></a>
                        </span>
                    </div>
                </div>


            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="card">

                    <div class="card-body text-left">
                        <h3 style="margin-top: 0;">¡Bienvenido, {{Auth::user()->name}}! </h3>
                        @if(isset($message))
                            {{$message}}
                        @endif
                        {{--  Advertencia datos incompletos profile cliente
                        @if (Auth::user()->isClient() && (!Auth::user()->dni || !Auth::user()->phone || !Auth::user()->cop))
                        <x-adminlte-alert theme="warning" dismissable>
                            <div class="row">
                                <div class="col-9">
                                    Tienes información pendiente de completar en tu perfil. Antes de realizar la contratación de una reclamación, deberás rellenar todos los datos en tu cuenta de cliente.
                                </div>
                                <div class="col-3">
                                    <a data-v-9cc878a2="" href="{{url('users',Auth::id())}}" aria-current="page" class="btn btn-light-descubre" type="button" style="border-radius: 20px !important; padding: 8px; margin: auto; text-decoration: none;">COMPLETAR AHORA</a>
                                </div>
                            </div>
                        </x-adminlte-alert>
                        @endif
                        --}}

                        {{-- Campaign sorteo --}}
                        @if(isset(Auth::user()->campaign))
                            @if(Auth::user()->id ==71)
                                <div style="background-color: #f8fafc; padding: 8px 0; text-align:center;">
                                    <div class="row">
                                        <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                            <img src="{{url('landing/assets/sorteo.png')}}" alt="" style="width: 60%;">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-7 text-justify">
                                            <h4><b>¡Enhorabuena!</b><small> <span style="font-weight:600;">Has sido el ganador de una de las camisetas firmadas por todos los jugadores de la S.D.Tarazona.
                                                En breve nos pondremos en contacto contigo</span></small></h4>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div style="background-color: #f8fafc; padding: 8px 0; text-align:center;">
                                    <div class="row">
                                        <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                            <img src="{{url('landing/assets/sorteo.png')}}" alt="" style="width: 60%;">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-7 text-justify">
                                            <h4><small><span style="font-weight:600;">Lo sentimos, no has sido premiado, muchas gracias por participar</span></small></h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div style="background-color: #f8fafc; padding: 8px 0;">
                            <div class="row">
                                <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                    <img src="{{url('landing/assets/grafico-ilustraciones-simulador.png')}}" alt="" style="width: 60%;">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-7">
                                    <h4>Contrata una reclamación <br> <small>y di adiós a tus facturas impagadas.</small></h4>

                                    <a data-v-9cc878a2="" href="{{url('claims/select-client')}}" aria-current="page" class="btn btn-light-descubre" type="button" style="border-radius: 20px !important; padding: 8px; margin: auto">NUEVA RECLAMACIÓN</a>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <h5>Mis reclamaciones

                                    <small onclick="window.open('{{url('claims')}}','_self')" style="font-size: 12px; float: right; cursor: pointer;">Ver todas <i class="fas fa-arrow-right"></i></small>
                                </h5>

                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-10">
                                                        <img src="{{url('landing/assets/handshake.png')}}" alt="" style="width: 50%;">
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="badge badge-info">
                                                            @if (Auth::user()->isGestor())
                                                            {{App\Models\Claim::where('gestor_id',Auth::id())->whereNotIn('status',[-1,0,1])->where('claim_type',2)->count()}}
                                                            @else
                                                            {{Auth::user()->claims()->whereNotIn('status',[-1,0,1])->where('claim_type',2)->count()}}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>

                                                <br>

                                                <h6>Reclamaciones en gestión extrajudicial</h6>

                                                <br>

                                                <div class="text-left">
                                                    <a data-v-63cd6604="" href="{{url('claims')}}" class="btn btn-dividae" data-v-effc9f78="">
                                                    Ver <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-10">
                                                        <img src="{{url('landing/assets/auction.png')}}" alt="" style="width: 50%;">
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="badge badge-info">
                                                            @if (Auth::user()->isGestor())
                                                            {{App\Models\Claim::where('gestor_id',Auth::id())->whereNotIn('status',[-1,0,1])->where('claim_type',1)->count()}}
                                                            @else
                                                            {{Auth::user()->claims()->whereNotIn('status',[-1,0,1])->where('claim_type',1)->count()}}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>

                                                <br>

                                                <h6>Reclamaciones en gestión judicial</h6>

                                                <br>

                                                <div class="text-left">
                                                    <a data-v-63cd6604="" href="{{url('claims')}}" class="btn btn-dividae" data-v-effc9f78="">
                                                    Ver <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4">

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-10">
                                                        <img src="{{url('landing/assets/archive.png')}}" alt="" style="width: 50%;">
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="badge badge-info">
                                                            @if (Auth::user()->isGestor())
                                                            {{App\Models\Claim::where('gestor_id',Auth::id())->whereIn('status',[-1,0,1])->count()}}
                                                            @else
                                                            {{Auth::user()->claims()->whereIn('status',[-1,0,1])->count()}}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>

                                                <br>

                                                <h6>Reclamaciones finalizadas/no viables</h6>

                                                <br>

                                                <div class="text-left">
                                                    <a data-v-63cd6604="" href="{{url('claims/pending')}}" class="btn btn-dividae" data-v-effc9f78="">
                                                    Ver <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 text-center">


                                <img src="{{url('landing/assets/save-money.png')}}" alt="" style="width: 50%; max-width: 80px;">
                                <br>
                                <br>

                                <h6>¿Quieres saber si tu <br> reclamación es <br> viable?</h6>
                                <br>


                                <a data-v-9cc878a2="" data-toggle="modal" href="#consulta-viabilidad" aria-current="page" class="btn btn-light-descubre" type="button" style="border-radius: 20px !important; padding: 8px; margin: auto">COMPROBAR DEUDA</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
                    <h3>{{ $claims }}</h3>
                    @else
                    <h3>{{ Auth::user()->claims()->whereIn('status', [-1,0,1])->count(); }}</h3>
                    @endif
                    <p>Reclamaciones Finalizadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-circle-right"></i>
                </div>
                <a href="{{ url('/claims/pending') }}" class="small-box-footer">Ir a Reclamaciones <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}

    </div>


@stop

@section('js')
<script>
    $('.upload-excel').on('change',function(e){
        e.preventDefault();
        $(this).parent().submit();
    })
</script>
@endsection
