<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vQquIOeFCyXeIRVqPhnUsIPBw3b13PWS9mA9pMmF">

    <meta name="robots" content="index, follow" />
    <title>Di adi&oacute;s a tus facturas impagadas, di Asnef</title>
    <meta name="description" content="Asnef empresas recupera es una plataforma 100% digital que surge para dar una soluci&oacute;n a la recuperación de facturas impagadas de forma sencilla, exitosa y econ&oacute;mica."/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.theme.default.min.css">

    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="c407bf19-3d4d-481c-a62b-c46cc4fd3031" data-blockingmode="auto" type="text/javascript"></script>

    {{-- @foreach (config('adminlte.plugins') as $pluginName => $plugin)
      @if ($plugin['active'] || View::getSection('plugins.' . ($plugin['name'] ?? $pluginName)))
          @foreach ($plugin['files'] as $file)

              @php
                  if (! empty($file['asset'])) {
                      $file['location'] = asset($file['location']);
                  }
              @endphp

              @if ($file['type'] == 'css')
                  <link rel="stylesheet" href="{{ $file['location'] }}">
              @endif

          @endforeach
      @endif
  @endforeach --}}

    <!-- Styles -->
    <link href="{{ url('landing') }}/app.css" rel="stylesheet">
    @include('styles')

    <style>
        .floating-social-bar {
            display:flex;
            border-radius: 10px;
            position:fixed;
            bottom: 4px;
            left:70%;
            width: 30%;
            height: 7%;
            padding: 5px 0;
            text-align: left;
            background-color: #2c60aa;
            font-family: 'Roobert', Arial, Helvetica, sans-serif, serif;
            color:#ffff;
            z-index: 999;
        }


        /*Antes .floating-button*/
        .floating-social-bar button {
            border-radius: 37.5px;
            background-color: #007298;
            border: 1px solid #007298;
            box-shadow: 0 16px 22px -17px #007298;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            line-height: 12px;
            padding: 12px 20px;
            position: fixed;
            bottom: 22px;
            right: 20px;
            z-index: 999;
        }

        .floating-social-bar button:hover {
            background-color: #ffffff;
            color: #007298;
        }

        .floating-social-bar button:focus {
            outline: none;
        }

        .floating-social-bar span {
            flex: 0 0 50%;
            max-width: 50%;
            margin-left: 3%;
        }
        .floating-social-bar img {
            margin-left: 3%;
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 4% auto 0 auto; /* 5% from the top and centered */
        /*padding: 20px;*/
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }

        @media (min-width: 100px) and (max-width: 1200px) {
            .floating-social-bar {
                visibility: hidden;
            }


            .floating-comprobar button {
                border-radius: 37.5px;
                background-color: #007298;
                border: 1px solid #007298;
                box-shadow: 0 16px 22px -17px #007298;
                color: #fff;
                cursor: pointer;
                font-size: 16px;
                line-height: 12px;
                padding: 12px 20px;
                position: fixed;
                bottom: 15px;
                right: 20px;
                z-index: 999;
            }


            .floating-comprobar button:hover {
                background-color: #ffffff;
                color: #007298;
            }

            .floating-comprobar button:focus {
                outline: none;
            }
            .modal-content {
                margin: 30% auto 0 auto; /* 5% from the top and centered */
            }
        }

        @media (min-width: 1201px) {
            .floating-comprobar {
                visibility: hidden;
            }
        }

        /*@media only screen and (max-width: 800px) {
            .modal-content {
                margin: 30% auto 0 auto;
            }
        }*/





    </style>
</head>
<?php include_once("analyticstracking.php") ?>

<body>

    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-63cd6604="">
                <div data-v-66372912="" data-v-63cd6604="" class="portada-3dblue" data-v-effc9f78="">

                   {{-- <video id="background-video" autoplay loop muted >
                        <source src="{{ url('landing/videohome.mp4') }}" type="video/mp4">
                   </video> --}}
                   {{-- <img src="{{ url('landing/background_home.png') }}" alt="Landing home"> --}}

                    <div data-v-66372912="" class="block-CMO-FUNCIONA"><a data-v-66372912="" href="#como-funciona"
                            class="CMO-FUNCIONA"><img data-v-66372912=""
                                src="{{ url('landing') }}/assets/icons-arrow-down.png"
                                class="iconsarrow-down img-fluid" alt="Icono flecha"></a></div>

                    <nav data-v-5fddf304="" data-v-66372912="" class="navbar navbar-expand-lg navbar-dark">
                        <div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="" aria-current="page"
                                class="navbar-brand router-link-exact-active router-link-active" style="">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/equifax-logo.png"
                                        class="graficologonegativo" alt="Logotipo"></div>
                            </a> <a data-v-5fddf304="" href="" aria-current="page"
                                class="navbar-brand router-link-exact-active router-link-active" style="display: none;">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/equifax-logo.png"
                                        class="graficologonegativo" alt="Logotipo"></div>
                            </a> <button data-v-5fddf304="" type="button" data-toggle="collapse"
                                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler">

                                <span data-v-5fddf304=""
                                    class="navbar-toggler-icon" style="color: #333">
                                        <img src="https://icon-library.com/images/burger-menu-icon/burger-menu-icon-4.jpg" alt="Icono menu" style="width: 100%;">
                                    </span>

                                </button>
                            <div data-v-5fddf304="" id="navbarCollapse" class="collapse navbar-collapse">
                                <ul data-v-5fddf304="" class="navbar-nav">

                                    {{-- <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                        href="{{ url('quienes-somos') }}" class="nav-link"><span
                                            data-v-5fddf304="" class="Type-something">
                                            ¿Quiénes somos?
                                        </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li> --}}

{{--                                     <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('testimonios') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Testimonios
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li> --}}

                                    {{-- <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('preguntas') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                ¿Tienes dudas?
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li> --}}
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('tarifas') }}" class="nav-link"><span data-v-5fddf304=""
                                                class="Type-something">
                                                Tarifas
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                        href="{{ url('blog') }}" class="nav-link"><span data-v-5fddf304=""
                                            class="Type-something">
                                            Blog
                                        </span></a>
                                    <div data-v-5fddf304="" class=""></div>
                                </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('contacto') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Contacto
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                </ul>
                                @include('front.loginButtons')
                                <!---->
                            </div>
                        </div>
                    </nav>
                    <div data-v-66372912="" class="container">
                        <div data-v-66372912="" class="row">
                            <div data-v-66372912="" id="text-p" class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                @if (session('msg'))
                                    <div class="alert alert-warning">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                                <div data-v-66372912="" style="padding-top: 60px;"><span data-v-66372912="" class="Te-ayudamos-a-recupe">
                                        Di adi&oacute;s a las facturas <br> impagadas
                                    </span></div>
                                <div data-v-66372912="">
                                    <div data-v-66372912="" class="blockRegistro"><a data-v-66372912=""
                                            href="{{ url('register') }}" class="btn btn-registerHome"><span
                                                data-v-66372912="" class="text-register-btn">
                                                Reg&iacute;strate
                                                <img data-v-66372912=""
                                                    src="{{ url('landing') }}/assets/icons-arrow-right.png"
                                                    class="iconsarrow-right img-fluid" alt="Icono flecha"></span></a></div>

                                </div>
                            </div>

                            <!-- Modal Sorteo -->
                            {{--
                            <div data-v-66372912="" id="text-p" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <div class="modal fade" id="sorteoModal" tabindex="-1" role="dialog" aria-labelledby="sorteoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img data-v-66372912="" src="{{ url('landing') }}/assets/main_sorteo.png" style="max-width:100%">
                                            </div>

                                            <div class="modal-footer">
                                                <div>
                                                    <a href="{{ url('bases-sorteo') }}">Ver bases legales </a>

                                                </div>
                                                <div>
                                                    <a data-v-66372912="" href="{{ url('register') }}" class="btn btn-registerHome">
                                                        <span data-v-66372912="" class="text-register-btn">
                                                            Reg&iacute;strate
                                                            <img data-v-66372912="" src="{{ url('landing') }}/assets/icons-arrow-right.png" class="iconsarrow-right img-fluid">
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            {{-- @include('followus') --}}

                        </div>
                    </div>
                </div>

                {{-- Floating social bar --}}
                <div data-v-66372912="" id="pagetop" data-toggle="modal" data-target="#consulta-viabilidad" class="fixed right bottom" style="display: none-;">
                    <div class="floating-social-bar">
                        <img src="{{ url('landing') }}/assets/group.png" alt="Icono reclamacion viable">
                        <span>¿Quieres saber si tu reclamación es viable?</span>
                        <button>Comprobar</button>
                    </div>
                </div>


                {{-- Floating boton --}}
                <div data-v-66372912="" id="pagetop" data-toggle="modal" data-target="#consulta-viabilidad" class="fixed right bottom" style="display: none-;">
                    <div class="floating-comprobar">
                        <button>Comprobar deuda</button>
                    </div>
                </div>

                <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        <div data-v-9cc878a2="" class="fs-2-5x fw-600 fc-primary" >¿Cu&aacute;l es nuestra <span class="fc-secondary">misi&oacute;n</span>?</div>
                        <div class="container text-center fs-1x">
                            <p>En <span class="fc-secondary">Asnef</span>, queremos revolucionar el mundo de la recuperaci&oacute;n de facturas impagadas a nivel digital de una manera
                                <span class="fc-secondary">automatizada</span> y <span class="fc-secondary">transparente</span>. ¿Nuestro principal objetivo? Que digas <span class="fc-secondary">adi&oacute;s a tus facturas impagadas</span>. Conoce m&aacute;s acerca de
                                <span class="fc-secondary"><a href="{{ url('quienes-somos') }}">nosotros</a></span>.</p>
                        </div>

                        <div data-v-63cd6604="" data-v-effc9f78="" class="pb-3"><a data-v-63cd6604="" href="{{ url('register') }}" class="btn QSomos-btn" data-v-effc9f78="">Regístrate</a></div>


                        <div class="mt-5"></div>


                        <!-- Trigger/Open The Modal -->
                        {{-- <button id="videoBtn">
                            <img src="{{ url('landing') }}/assets/portada_video_dividae.png" style="max-width:100%;" alt="Icono portada video">
                        </button> --}}

                        <!-- The Modal -->
                        {{-- <div id="videoModal" class="modal"> --}}

                        <!-- Modal content -->
                        {{-- <div id="home-video" class="modal-content-video">
                            <span id="stop" class="close">&times;</span>
                            <video controls autoplay muted playsinline preload="none" style="width: -moz-available;">
                                <source src="{{ url('landing/dividaemision.mp4') }}" type="video/mp4">
                            </video>
                        </div> --}}

                        </div>


                        <!--<div class="videoDividae">
                            <video class="videoDividae" controls autoplay muted >
                                <source src="{{ url('landing/dividaemision.mp4') }}" type="video/mp4">
                            </video>
                        </div>-->
                    </div>
                </div>


                <div data-v-43503c2a="" data-v-63cd6604="" class="blockRecovery" data-v-effc9f78="">
                    <div data-v-43503c2a="" class="container">
                        {{-- <div data-v-43503c2a="" class="text-center RText">
                            ¿Por qué <span class="fc-secondary">Dividae</span>?
                        </div> --}}

                        <div data-v-9cc878a2="" class="text-center fs-2-5x fw-600 fc-primary" >
                            ¿Por qu&eacute; <span class="fc-secondary">Asnef</span>?
                        </div>

                        <div data-v-43503c2a="" class="row Recovery">
                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono plataforma digital"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <span class="fc-secondary">Plataforma 100% Digital</span>
                                    </p>
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-digital.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono seguridad juridica"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <span class="fc-secondary">Máxima seguridad Jurídica</span>
                                    </p>
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-seguridad.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono experiencia"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <span class="fc-secondary">Experiencia Contrastada</span>
                                    </p>
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono transparencia"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <span class="fc-secondary">Transparente</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5"></div>


                {{-- Inicio de Bloque cuanto cuesta --}}
                <div data-  v-9cc878a2="" data-v-63cd6604="" class="blockTarifa pt-5" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        {{-- <div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div> --}}
                        <div data-v-9cc878a2="" class="text-center fs-2-5x fw-600 fc-primary" >
                            ¿Cu&aacute;nto cuesta?
                        </div>
                        <div class="container text-center bottom-text">
                            <p><span class="fc-secondary">Asnef</span> cuenta con tarifas fijas. Nuestro mayor objetivo es que no pagues nada que
                                no sepas, ser <b>100% transparentes</b> y que tú estés <b>100% tranquilo</b> durante
                                todo el proceso. </p>
                        </div>

                        <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                            <!-- Card 1 -->
                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                                    <div data-v-9cc878a2="" class="pt-5">
                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <small>Protecci&oacute;n de impagos</small>
                                        </span>
                                    </div>
                                    <div data-v-9cc878a2="" >
                                        <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">
                                            <li data-v-9cc878a2="">
                                                <div class="card-text pt-4 pb-4">
                                                    Recupera tus impagados
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <span data-v-9cc878a2="" class="fw-normal text-t1 pt-3">
                                        <small>Por solo</small> 20&euro;/mes
                                    </span>

                                    <!--<div class="row">
                                        <div class="col-sm-2">mt-xl-3 mb-xl-3</div>-->
                                        <div class="col-12 pb-3 pt-3">
                                            <a data-v-9cc878a2="" href="{{ url('tarifas') }}" aria-current="page"
                                                class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                        </div>
                                    <!--</div>-->
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                                    <div data-v-9cc878a2="" class="pt-5">
                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <small>Reclamación judicial</small>
                                        </span>
                                    </div>
                                    <div data-v-9cc878a2="">
                                        <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">
                                            <li data-v-9cc878a2="">
                                                <div class="card-text pt-4">
                                                    Comienza con tu reclamación por vía judicial
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <span data-v-9cc878a2="" class="fw-normal text-t1 pt-3">
                                        <small>Desde</small> 99&euro;
                                    </span>

                                    <!--<div class="row">
                                        <div class="col-sm-2"></div>-->
                                        <div class="col-12 pb-3 pt-3">
                                            <a data-v-9cc878a2="" href="{{ url('tarifas') }}" aria-current="page"
                                                class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                        </div>
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div data-v-43503c2a="" data-v-63cd6604="" class="blockRecovery" data-v-effc9f78="">
                    <div data-v-e047c7bc="" data-v-63cd6604="" class="blockEstadisticas" data-v-effc9f78="">
                        <div data-v-e047c7bc="" class="row estadisticas container">
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">2021</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Año de creación</p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+16.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Notificaciones diarias</p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+190.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text"> Procedimientos iniciados</p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+240.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Procedmientos en gestión</p>
                            </div>
                        </div>
                    </div>


                    <div data-v-455dcd3f="" data-v-63cd6604="" class="blockOpiniones" data-v-effc9f78="">

                        <div data-v-455dcd3f="" class="content">

                            {{-- <div id="test-3" class="owl-carousel owl-theme">

                                <div data-v-455dcd3f="" class="container Opinion">
                                    <div data-v-455dcd3f="" class="row">

                                        <div data-v-455dcd3f=""
                                            class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                            <div data-v-455dcd3f="" class="block-DR">
                                                <div data-v-455dcd3f="" class="text-deuda-recuperada">
                                                    Cantidad recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    10.220<span data-v-455dcd3f="" class="text-style-1">&euro;</span></div>
                                            </div> <img data-v-455dcd3f=""
                                                src="{{ url('landing') }}/assets/testimonio-1.png"
                                                class="testimonio-1 img-fluid">
                                        </div>

                                        <div data-v-455dcd3f=""
                                            class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 Opinion-col2">
                                            <div data-v-455dcd3f="" class="Opinion-empresa">Gestoría AFER</div>
                                            <div data-v-455dcd3f="" class="Opinion-cliente">Antonio Fernández </div>
                                            <div data-v-455dcd3f="" class="Opinion-text">
                                                <div data-v-455dcd3f="" class="row">
                                                    <div data-v-455dcd3f="" class="col-10 block-text">
                                                        <p>"Soy Antonio y tengo una gestoría en La Rioja. <b>Dividae</b> se
                                                            puso en contacto conmigo para incorporar el servicio de recuperación
                                                            de facturas impagadas y poder ofrecer valor añadido a mis clientes,
                                                            ya que son muchos los que tienen facturas pendientes de pago y las daban por perdidas.</p>
                                                        <p>Con <b>Dividae</b>, muchos de mis clientes ya han recuperado sus facturas impagadas y
                                                            se ha convertido en un servicio esencial de la gestoría.
                                                        <b>Dividae</b>, agiliza en tiempos y ofrece un servicio transparente durante todo el servicio".</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-v-455dcd3f="" class="container Opinion">
                                    <div data-v-455dcd3f="" class="row">

                                        <div data-v-455dcd3f=""
                                            class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 Opinion-col2">
                                            <div data-v-455dcd3f="" class="Opinion-empresa">Aparejadora</div>
                                            <div data-v-455dcd3f="" class="Opinion-cliente">Alba Rodríguez </div>
                                            <div data-v-455dcd3f="" class="Opinion-text">
                                                <div data-v-455dcd3f="" class="row">
                                                    <div data-v-455dcd3f="" class="col-10 block-text">
                                                        <p>"Trabajo desde hace más de 10 años como aparejadora y llegó un punto en el que tenía
                                                            muchas facturas impagadas que daba por perdidas. Intenté encontrar un abogado que
                                                            no saliera por un ojo de la cara, pero no fui capaz de asumir el coste.</p>
                                                        <p>Decidí realizar una búsqueda en internet y ahí es cuando encontré <b>Dividae</b>.
                                                            Gracias a este novedoso y transparente servicio, conseguí recuperar las facturas
                                                            que tenía pendientes. Además, fue un proceso muy sencillo, en el que me sentí siempre acompañada".</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div data-v-455dcd3f=""
                                            class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                            <div data-v-455dcd3f="" class="block-DR">
                                                <div data-v-455dcd3f="" class="text-deuda-recuperada">
                                                    Cantidad recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    1.640<span data-v-455dcd3f="" class="text-style-1">&euro;</span></div>
                                            </div> <img data-v-455dcd3f=""
                                                src="{{ url('landing') }}/assets/testimonio-2.png"
                                                class="testimonio-1 img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div data-v-455dcd3f="" class="container Opinion">
                                    <div data-v-455dcd3f="" class="row">
                                        <div data-v-455dcd3f=""
                                            class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                            <div data-v-455dcd3f="" class="block-DR">
                                                <div data-v-455dcd3f="" class="text-deuda-recuperada">
                                                    Cantidad recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    3.550<span data-v-455dcd3f="" class="text-style-1">&euro;</span>
                                                </div>
                                            </div> <img data-v-455dcd3f=""
                                                src="{{ url('landing') }}/assets/testimonio-3.png"
                                                class="testimonio-1 img-fluid">
                                        </div>

                                        <div data-v-455dcd3f=""
                                            class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 Opinion-col2">
                                            <div data-v-455dcd3f="" class="Opinion-empresa">Electricista</div>
                                            <div data-v-455dcd3f="" class="Opinion-cliente">Ángel López </div>
                                            <div data-v-455dcd3f="" class="Opinion-text">
                                                <div data-v-455dcd3f="" class="row">
                                                    <div data-v-455dcd3f="" class="col-10 block-text">
                                                        <p>"Mi gestor me recomendó <b>Dividae</b>, ya que él más que nadie conoce
                                                            el estado de mis cuentas y facturas. Desde el principio,
                                                            me pareció una idea innovadora y necesaria en el sector.</p>
                                                        <p>Gracias a mi gestoría, he podido recuperar muchas de las facturas impagadas que tenía olvidadas.
                                                            El servicio que ofrece mi gestoría gracias a <b>Dividae</b>, ya es indispensable para todos sus clientes".</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div data-v-455dcd3f="" class="container OCliente">
                                <div data-v-455dcd3f="" class="OCliente-title">Colaboraciones</div>

                                <br>
                                <br>

                                <div id="testimonios" class="owl-carousel owl-theme">

                                    <div>
                                        <a href = "https://avae.es/" target="_blank"><img src="{{ url('landing') }}/assets/logo_avae.png" alt="Icono Avae"></a>
                                    </div>
                                    <div>
                                        <a href = "https://avecal.es/" target="_blank"><img src="{{ url('landing') }}/assets/logo_avecal.png" alt="Icono Avecal"></a>
                                    </div>
                                    <div>
                                        <a href = "https://www.gestorestoledo.org/" target="_blank"><img src="{{ url('landing') }}/assets/logo_toledo.png" alt="Icono Gestores Toledo"></a>
                                    </div>
                                    <div>
                                        <a href = "https://gestoresextremadura.com/" target="_blank"><img src="{{ url('landing') }}/assets/logo_extremadura.png" alt="Icono Gestores Extremadura"></a>
                                    </div>

                                </div>
                            </div> --}}

                        </div>
                    </div>

                    @include('footer', ['modal' => true])
                </div>
        </main>
    </div>
    <!-- Scripts -->

    <!-- <script src="{{ url('landing') }}/app.js" defer=""></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ url('landing') }}/plugins/owl/js/owl.carousel.js"></script>
    <script src="{{ url('landing') }}/plugins/owl/js/owl.navigation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X7LBKM6LDD"></script>

    <!--<script type="text/javascript">
        $(window).on('load', function() {
            $('#sorteoModal').modal('show');
        });
    </script>-->

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-X7LBKM6LDD');
    </script>

    <!-- Pixel Code for https://overtracking.com/ -->
    <script defer src="https://overtracking.com/p/TtP9IRSJvJGgs18A"></script>
    <!-- END Pixel Code -->

    <!-- Pixel Code for https://panel.getconver.com/ -->
    <script defer src="https://panel.getconver.com/pixel/g25kechl8jfcbn24sobjz8b82hqx8r8l"></script>
    <!-- END Pixel Code -->

    @yield('extrajs')

    <script>

        var owl = $('#testimonios').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

        var owl2 = $('#test-3').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.changetype').click(function(e) {
            e.preventDefault();

            $('.changetype').removeClass('active');

            $(this).addClass('active');

            $('.Reclamacion').text($(this).text());

            let other = $('.img-amistosa').attr('other');
            let src = $('.img-amistosa').attr('src');
            $('.img-amistosa').attr('src', other);
            $('.img-amistosa').attr('other', src);
        });




        // Get the modal
        var modal = document.getElementById("videoModal");

        // Get the button that opens the modal
        var btn = document.getElementById("videoBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                $('video').trigger('pause');
                modal.style.display = "none";
            }
        }

        $("#stop").on('click', function(){
            $('video').trigger('pause');
        });
    </script>

    <!-- Start of oct8ne code -->
   <!--<script type="text/javascript">
        var oct8ne = document.createElement("script");
        oct8ne.server = "backoffice-eu.oct8ne.com/";
        oct8ne.type = "text/javascript";
        oct8ne.async = true;
        oct8ne.license ="8B19E88F4BCE8B83D8E70D88F9647A4D";
        oct8ne.src = (document.location.protocol == "https:" ? "https://" : "http://") + "static-eu.oct8ne.com/api/v2/oct8ne.js?" + (Math.round(new Date().getTime() / 86400000));
        oct8ne.locale = "es-ES";
        oct8ne.baseUrl ="//www.dividae.com";
        var s = document.getElementsByTagName("script")[0];
        insertOct8ne();
        function insertOct8ne() {
                s.parentNode.insertBefore(oct8ne, s);
        }
    </script>-->
    <!--End of oct8ne code -->


    <!--Start of Tawk.to Script-->
    <!--<script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6579becd70c9f2407f7f7619/1hhhp2l9t';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>-->
    <!--End of Tawk.to Script-->

</body>

</html>
