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
        background-color: #9E1B42 !important;
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
        border: 1px solid #9E1B42 !important;
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

    <div style="background-color: #9E1B42; color: #fff" class="text-center">

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
        border: 1px solid #9E1B42;
        color: #9E1B42 !important;
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

    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())

        <div class="row">

            <div class="col-sm-2">
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{App\Http\Controllers\NotificationsController::countUnread()}}</h3>
                        <p>Notificaciones pendientes</p>
                    </div>
                <div class="icon">
                  <i class="fas fa-envelope"></i>
                </div>
                <a href="/notifications" class="small-box-footer">
                    Notificaciones <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{App\Http\Controllers\NotificationsController::countRead()}}</h3>
                        <p>Notificaciones leidas</p>
                    </div>
                <div class="icon">
                  <i class="fas fa-envelope"></i>
                </div>
                <a href="/notifications/allread" class="small-box-footer">
                    Notificaciones <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
            </div>
            @if(Auth::user()->isSuperAdmin())
            <div class="col-sm-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{App\Http\Controllers\UsersController::countBlockUsers()}}</h3>
                        <p>Usuarios bloqueados</p>
                    </div>
                <div class="icon">
                  <i class="fas fa-user-slash"></i>
                </div>
                <a href="/block-users" class="small-box-footer">
                    Usuarios <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
            </div>
            @endif

            <div class="col-sm-3">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{App\Models\claim::where('claim_type','2')->where('status','!=','-1')->count()}}</h3>
                      <p>Reclamaciones extrajudiciales</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="/claims" class="small-box-footer">
                      Reclamaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
            </div>


            <div class="col-sm-3">
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <h3>{{App\Models\claim::where('claim_type','1')->where('status','!=','-1')->count()}}</h3>
                      <p>Reclamaciones judiciales</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="/claims" class="small-box-footer">
                      Reclamaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
            </div>

            <div class="col-sm-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{App\Models\claim::where('status','-1')->count()}}</h3>
                      <p>Reclamaciones finalizadas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="/claims/pending" class="small-box-footer">
                      Reclamaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
            </div>





            {{--<div class="col-sm-3">
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
            <div class="col-sm-3">
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

            <div class="col-sm-3">
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
            </div>--}}
        </div>


        <!--<a class="nav-link" data-widget="control-sidebar" href="#">Open/close right Sidebar</a>-->

        <!-- Right Sidebar Notifications example -->
        <!--
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">

                  <span class="badge badge-warning navbar-badge"><i class="far fa-bell"></i>14</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>-->

    @endif

    <div class="row">

        @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())
            <div class="col-1"></div>
            <div class="col-9">
                <canvas id="newUsersChart"></canvas>
            </div>


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

                        <div style="position: absolute; height: 80%; width: 100%; background-color: #9E1B42; border-radius: 8px; bottom: 0;">

                        </div>
                        <img src="{{url('landing/assets/contacto.png')}}" alt="" style="position: absolute; bottom: 0; right: 0; width: 100%" alt="Imagen contacto">
                    </div>

                    <div class="text-center">
                        <br>
                        <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                            <a target="_blank" data-v-7b4478c1="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page" class="router-link-exact-active router-link-active">
                                <img data-v-7b4478c1="" src="{{url('landing')}}/assets/linkedin.png" style="padding: 4px; width: 100%" alt="Icono Linkedin"></a>
                        </span>

                        <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                            <a target="_blank" data-v-7b4478c1="" href="mailto:info@dividae.com" aria-current="page" class="router-link-exact-active router-link-active">
                                <img data-v-7b4478c1="" src="{{url('landing')}}/assets/mail.png" style="padding: 4px; width: 100%" alt="Icono email Dividae"></a>
                        </span>
                    </div>
                </div>


            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="card">

                    <div class="card-body text-left">
                        @php $decryptedName = Crypt::decryptString(Auth::user()->name); @endphp
                        <h3 style="margin-top: 0;">¡Bienvenido, {{$decryptedName}}! </h3>
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


{{--                         @if(Auth::user()->referenced =='FEDETO')
                            <div style="background-color: #f8fafc; padding: 8px 0; text-align:center;">
                                <div class="row">
                                    <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                        <img src="{{url('landing/assets/sorteo_fedeto.png')}}" alt="Imagen sorteo Fedeto" style="width: 60%;">
                                    </div>

                                    <div class="col-7 text-justify" style="padding: 0 0 0 3%;">
                                        @if(Auth::user()->referenced =='FEDETO' && Auth::user()->campaign == NULL)
                                            <h4><b>¡Sorteo!</b><br><small> <span>¿Quieres conseguir una comida para dos personas
                                                para dos personas en el restaurante Iv&aacute;n Cerdeño con dos estrellas Michelin? <br><br>
                                                Sube una factura impagada y participa en nuestro sorteo
                                            </span></small></h4>
                                            <a data-v-9cc878a2="" href="{{url('claims/status-claim')}}" aria-current="page" class="btn btn-light-descubre" type="button" style="border-radius: 20px !important; padding: 8px; margin: auto">NUEVA RECLAMACIÓN</a>
                                        @endif
                                        @if(isset(Auth::user()->campaign)&& Auth::user()->referenced =='FEDETO')
                                            <h4><b>¡Enhorabuena!</b><br><small> <span>Est&aacute;s participando en el sorteo FEDETO<br>
                                                Tu n&uacute;mero de participaci&oacute;n es: <b>{{Auth::user()->campaign}}</b></span></small></h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif --}}

                        {{--
                        @if(isset(Auth::user()->campaign))
                            @if(Auth::user()->id ==153 || Auth::user()->id ==161 || Auth::user()->id ==172 || Auth::user()->id ==217 || Auth::user()->id ==232)
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
                        @endif--}}

                        @if(Auth::user()->referenced !='FEDETO')
                            <div style="background-color: #f8fafc; padding: 8px 0;">
                                <div class="row">
                                    <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                        <img src="{{url('landing/assets/grafico_reclamacion_viable.png')}}" alt="Ilustracion simulador" style="width: 60%;">
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-7">
                                        <h4>Contrata una reclamaci&oacute;n <br> <small>y di adi&oacute;s a tus facturas impagadas.</small></h4>

                                        <a data-v-9cc878a2="" href="{{url('claims/status-claim')}}" aria-current="page" class="btn btn-light-descubre" type="button" style="border-radius: 20px !important; padding: 8px; margin: auto">NUEVA RECLAMACIÓN</a>
                                    </div>
                                </div>
                            </div>
                        @endif


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
                                                        <img src="{{url('landing/assets/handshake.png')}}" alt="Icono saludo" style="width: 50%;">
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
                                                        <img src="{{url('landing/assets/auction.png')}}" alt="Icono subasta" style="width: 50%;">
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
                                                        <img src="{{url('landing/assets/archive.png')}}" alt="Icono archivo" style="width: 50%;">
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


                                <img src="{{url('landing/assets/save-money.png')}}" alt="Icono ahorro" style="width: 50%; max-width: 80px;">
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

    <hr>

    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance())
        <div class="col-sm-6">
            <h3>Herramientas</h3>
        </div>

        <div class="row">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Ficheros ejemplo importadores</h3>

                    <div class="card-tools">
                        <!-- This will cause the card to maximize when clicked -->
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button> --}}
                        <!-- This will cause the card to collapse when clicked -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <!-- This will cause the card to be removed when clicked -->
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <div class="info-box">

                        <a download="ejemplo_importar_actuaciones.xlsx" href="{{url('excels/ejemplo_importar_actuaciones.xlsx')}}" class="btn btn-info">
                            <span class="info-box-icon bg-info"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Actuaciones</span>
                            <a download="ejemplo_importar_actuaciones.xlsx" href="{{url('excels/ejemplo_importar_actuaciones.xlsx')}}">
                                <span class="info-box-number">Descargar</span>
                            </a>
                        </div>
                    </div>
                    <div class="info-box">

                        <a download="ejemplo_importar_actuaciones_kmaleon.xlsx" href="{{url('excels/ejemplo_importar_actuaciones_kmaleon.xlsx')}}" class="btn btn-info">
                            <span class="info-box-icon bg-info"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">Actuaciones Kmaleon</span>
                            <a download="ejemplo_importar_actuaciones_kmaleon.xlsx" href="{{url('excels/ejemplo_importar_actuaciones_kmaleon.xlsx')}}">
                                <span class="info-box-number">Descargar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    @endif
@stop

@section('js')
<script>
    $('.upload-excel').on('change',function(e){
        e.preventDefault();
        $(this).parent().submit();
    })
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('newUsersChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        //labels: ['{{\Carbon\Carbon::now()->subMonths(12)->format('F')}}', 'Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre', 'Diciembre','Enero','Febrero', 'Marzo', 'Abril', 'Mayo'],
         labels: [
                   '{{ \Carbon\Carbon::now()->subMonths(12)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(11)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(10)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(9)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(8)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(7)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(6)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(5)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(4)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(3)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(2)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->subMonths(1)->format('F') }}',
                   '{{ \Carbon\Carbon::now()->format('F') }}'
                ],
        datasets: [{
            label: 'Usuarios registrados por mes',
            /* data: [ {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','06')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','07')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','08')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','09')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','10')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','11')->count()}},
                    {{App\Models\user::whereYear('created_at','2023')->whereMonth('created_at','12')->count()}},
                    {{App\Models\user::whereYear('created_at','2024')->whereMonth('created_at','01')->count()}},
                    {{App\Models\user::whereYear('created_at','2024')->whereMonth('created_at','02')->count()}},
                    {{App\Models\user::whereYear('created_at','2024')->whereMonth('created_at','03')->count()}},
                    {{App\Models\user::whereYear('created_at','2024')->whereMonth('created_at','04')->count()}},
                    {{App\Models\user::whereYear('created_at','2024')->whereMonth('created_at','05')->count()}},
                ], */
                data:[
                        {{App\Models\user::whereYear('created_at',now()->subMonths(12)->year)->whereMonth('created_at',now()->subMonths(12)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(11)->year)->whereMonth('created_at',now()->subMonths(11)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(10)->year)->whereMonth('created_at',now()->subMonths(10)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(9)->year)->whereMonth('created_at',now()->subMonths(9)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(8)->year)->whereMonth('created_at',now()->subMonths(8)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(7)->year)->whereMonth('created_at',now()->subMonths(7)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(6)->year)->whereMonth('created_at',now()->subMonths(6)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(5)->year)->whereMonth('created_at',now()->subMonths(5)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(4)->year)->whereMonth('created_at',now()->subMonths(4)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(3)->year)->whereMonth('created_at',now()->subMonths(3)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(2)->year)->whereMonth('created_at',now()->subMonths(2)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->subMonths(1)->year)->whereMonth('created_at',now()->subMonths(1)->month)->count()}},
                        {{App\Models\user::whereYear('created_at',now()->year)->whereMonth('created_at',now()->month)->count()}},
                ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>

@endsection
