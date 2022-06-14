<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vQquIOeFCyXeIRVqPhnUsIPBw3b13PWS9mA9pMmF">


    <title>Dividae</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.theme.default.min.css">

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

    </style>



<body>

    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-63cd6604="">
                <div data-v-66372912="" data-v-63cd6604="" class="portada-3dblue" data-v-effc9f78="">


                    <video id="background-video" autoplay loop muted poster="{{ url('landing/cover.jpg') }}">
                        <source src="{{ url('landing/video.mp4') }}" type="video/mp4">
                    </video>

                    <div data-v-66372912="" class="block-CMO-FUNCIONA"><a data-v-66372912="" href="#como-funciona"
                            class="CMO-FUNCIONA">NUESTRA FILOSOFÍA <img data-v-66372912=""
                                src="{{ url('landing') }}/assets/icons-arrow-down-white.png"
                                class="iconsarrow-down img-fluid"></a></div>

                    <nav data-v-5fddf304="" data-v-66372912="" class="navbar navbar-expand-lg navbar-dark">
                        <div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="" aria-current="page"
                                class="navbar-brand router-link-exact-active router-link-active" style="">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/grafico-logo-positivo.png"
                                        class="graficologonegativo"></div>
                            </a> <a data-v-5fddf304="" href="" aria-current="page"
                                class="navbar-brand router-link-exact-active router-link-active" style="display: none;">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/grafico-logo-positivo.png"
                                        class="graficologonegativo"></div>
                            </a> <button data-v-5fddf304="" type="button" data-toggle="collapse"
                                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler"><span data-v-5fddf304=""
                                    class="navbar-toggler-icon"></span></button>
                            <div data-v-5fddf304="" id="navbarCollapse" class="navbar-collapse" style="display: none;">
                                <ul data-v-5fddf304="" class="navbar-nav">
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('testimonios') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Testimonios
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('quienes-somos') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                ¿Quiénes somos?
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('preguntas') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                ¿Tienes dudas?
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('tarifas') }}" class="nav-link"><span data-v-5fddf304=""
                                                class="Type-something">
                                                Tarifas
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
                            <div data-v-66372912="" id="text-p"
                                class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                {{-- <span data-v-66372912="" class="Lorem-ipsum-dolor-si">
                                Lorem ipsum dolor sit amet, consectetur
                              </span> --}}
                                <div data-v-66372912=""><span data-v-66372912="" class="Te-ayudamos-a-recupe">
                                        Di adiós a las facturas <br> impagadas
                                    </span></div>
                                <div data-v-66372912="">
                                    <div data-v-66372912="" class="blockRegistro"><a data-v-66372912=""
                                            href="{{ url('register') }}" class="btn btn-registerHome"><span
                                                data-v-66372912="" class="text-register-btn">
                                                Regístrate
                                                <img data-v-66372912=""
                                                    src="{{ url('landing') }}/assets/icons-arrow-right.png"
                                                    class="iconsarrow-right img-fluid"></span></a></div>
                                </div>


                            </div>
                            @include('followus')
                            <div data-v-66372912="" id="pagetop" data-toggle="modal" data-target="#consulta-viabilidad"
                                class="fixed right-0 bottom-0" style="display: none-;">
                                <div data-v-66372912="" id="blockform-scroll">

                                    <div data-v-66372912="" class="row Scroll">
                                        <div data-v-66372912="" class="col-2 Scroll-icon"><img data-v-66372912=""
                                                src="{{ url('landing') }}/assets/group.png"></div>
                                        <div data-v-66372912="" class="col-6 Scroll-text">
                                            ¿Quieres saber si tu reclamación es viable?
                                        </div>
                                        <div data-v-66372912="" class="col-4 Scroll-btn"><button data-v-66372912=""
                                                class="btn btn-light">Comprobar</button></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div data-v-494d1a60="" data-v-63cd6604="" id="como-funciona" data-v-effc9f78="">

                    <div data-v-494d1a60="" class="card- text-center container">
                        <div data-v-494d1a60="" class="blockBTN">
                            <div data-v-494d1a60="" class="text-center">

                                {{-- <a data-v-494d1a60="" class="changetype btn active"><span data-v-494d1a60="" class="text-btn">Reclamación amistosa</span></a>
                        <a data-v-494d1a60="" class="changetype btn"><span data-v-494d1a60="" class="text-btn">Reclamación judicial</span></a> --}}
                            </div>
                        </div>

                        <div data-v-494d1a60="" href="#amistosa" class="card-body-">

                            <div data-v-494d1a60="" class="row">

                                <div data-v-494d1a60="" class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12"
                                    style="position: relative;">

                                    <div
                                        style="width: 200px; position: absolute; border-bottom: 4px solid #e65927; top: 50%; z-index: 2; left: -40px;">
                                    </div>

                                    <div style="position: absolute; background-color: #e65927; height: 200px; width: 50%; border-radius: 12px;
                            z-index: 0; margin: auto; left: 90px; right: 0; top: 30%;
                            ">

                                    </div>

                                    <img data-v-494d1a60=""
                                        style="position: relative; border-radius: 12px; z-index: 1; top: 40%; width: 120%; max-width: 120%"
                                        other="{{ url('landing') }}/assets/judicial.jpg"
                                        src="{{ url('landing') }}/images/HP/HP/Nuestra filosofía/equipo manos.jpg"
                                        class="img-amistosa img-fluid">
                                </div>

                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">

                                    <div data-v-494d1a60="" class="card-reclamacion">
                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">

                                                <div data-v-494d1a60="" id="block-reclamacion">
                                                    <div data-v-494d1a60="" class="text-reclamacion mb-4 mt-4">NUESTRA
                                                        FILOSOFÍA</div>
                                                </div>
                                                {{-- <div class="row"> --}}
                                                {{-- <div data-v-494d1a60="" class="col-xl-12 col-lg-12 col-sm-12 col-xs-12"><div data-v-494d1a60="" class="card-text Reclamacion">Reclamación amistosa</div></div> --}}
                                                {{-- </div> --}}
                                                <div data-v-494d1a60="" class="card-text Lorem-ipsum-dolor-si">
                                                    <p>
                                                        <b>Dividae</b> surge para ofrecer una solución a los miles de
                                                        autónomos y pequeños empresarios que desconocen que una factura
                                                        impagada sí puede reclamarse 100% online de forma <b>sencilla,
                                                            exitosa y económica.</b>
                                                    </p>
                                                    <p>
                                                        Nuestra <b>filosofía</b> se basa en una dinámica de trabajo 100%
                                                        transparente, informando a nuestros clientes del estado de la
                                                        recuperación en tiempo real y de forma automatizada a través del
                                                        área personal.
                                                    </p>
                                                    <p>
                                                        ¿Nuestro principal objetivo? Tu libertad y tranquilidad <b>¿Te
                                                            unes?</b>
                                                    </p>


                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <div data-v-63cd6604="" data-v-effc9f78=""><span data-v-63cd6604=""
                                                    data-v-effc9f78=""><a data-v-63cd6604=""
                                                        href="{{ url('register') }}" class="btn QSomos-btn"
                                                        data-v-effc9f78="">
                                                        REGÍSTRATE
                                                    </a></span></div>
                                        </div>
                                    </div>



                                </div>

                            </div>

                        </div>
                        <!---->
                    </div>
                </div>

                <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        <div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div>
                        <div class="container text-center bottom-text">
                            <p><b>Dividae</b> cuenta con tarifas fijas. Nuestro mayor objetivo es que no pagues nada que
                                no sepas, ser <b>100% transparentes</b> y que tu estés <b>100% tranquilo</b> durante
                                todo el proceso. </p>
                        </div>
                        <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">



                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">

                            </div>

                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">

                                {{-- <div data-v-9cc878a2="" class="op-frecuente">Opción más frecuente</div> --}}

                                <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                                    <div data-v-9cc878a2="" class="py-3">

                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <br>
                                            <small>Reclamación extrajudicial</small>
                                        </span>

                                    </div>
                                    <div data-v-9cc878a2="" class="card-body">

                                        <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">

                                            <li data-v-9cc878a2="">
                                                <p data-v-9cc878a2="" class="card-text">

                                                    {{-- <img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle"> --}}

                                                <p class="text-left">
                                                    Comienza de manera amistosa con una tarifa única.
                                                </p>

                                            </li>

                                        </ul>
                                    </div>

                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <small>Por solo</small> 19,90€
                                    </span>

                                    <br>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <a data-v-9cc878a2="" href="{{ url('tarifas') }}" aria-current="page"
                                                class="btn btn-light-descubre" type="button"> DESCUBRIR MÁS</a>
                                        </div>
                                    </div>

                                    <br>

                                </div>
                            </div>

                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">

                                {{-- <div data-v-9cc878a2="" class="op-frecuente">Opción más frecuente</div> --}}

                                <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                                    <div data-v-9cc878a2="" class="py-3">

                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <br>
                                            <small>Reclamación judicial</small>
                                        </span>

                                    </div>
                                    <div data-v-9cc878a2="" class="card-body">

                                        <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">

                                            <li data-v-9cc878a2="">
                                                <p data-v-9cc878a2="" class="card-text">

                                                    {{-- <img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle"> --}}

                                                <p class="text-left">
                                                    Comienza con tu reclamación por vía judicial
                                                </p>

                                            </li>

                                        </ul>
                                    </div>

                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <small>Desde</small> 69,90€
                                    </span>

                                    <br>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <a data-v-9cc878a2="" href="{{ url('tarifas') }}" aria-current="page"
                                                class="btn btn-light-descubre" type="button"> DESCUBRIR MÁS</a>
                                        </div>
                                    </div>

                                    <br>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-v-63cd6604="" data-v-effc9f78="" class="blockQSomos">
                    <div data-v-63cd6604="" data-v-effc9f78="" class="container card">
                        <div data-v-63cd6604="" data-v-effc9f78="" class="row">
                            <div data-v-63cd6604="" data-v-effc9f78=""
                                class="col-lg-8 col-md-12 col-xs-12 col-sm-12 QSomos">
                                <div data-v-63cd6604="" data-v-effc9f78="" class="QSomos-title">
                                    ¿Quiénes somos?
                                </div>
                                <div data-v-63cd6604="" data-v-effc9f78="" class="QSomos-text">

                                    <p><b>Dividae</b> es una plataforma 100% online que ofrece a empresarios y autónomos
                                        la solución para reclamar facturas que nunca les pagaron. Esta línea de negocio
                                        es parte de <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b>, uno de los principales proveedores de servicios de
                                        recuperación de deuda de España. </p>

                                    <p>Desde sus inicios, <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b> ha identificado la forma de automatizar y
                                        estandarizar los procesos. Ante un sector tradicionalmente poco digitalizado,
                                        <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b> se ha centrado en disponer de todos los recursos tecnológicos
                                        necesarios para la representación procesal y gestión documental en carteras
                                        masivas. </p>

                                    <p>Gracias al conocimiento del sector, su equipo de profesionales y a la firme
                                        apuesta tecnológica, en el año 2021 se crea <b>Dividae</b> con la firme
                                        intención de convertirse en líderes en el mercado, mejorar las eficiencias y
                                        ganar en tiempo con la recuperación de facturas impagadas de manera 100%
                                        digital. </p>


                                </div>
                                <div data-v-63cd6604="" data-v-effc9f78=""><span data-v-63cd6604=""
                                        data-v-effc9f78=""><a data-v-63cd6604="" href="{{ url('quienes-somos') }}"
                                            class="btn QSomos-btn" data-v-effc9f78="">
                                            DESCUBRIR MÁS
                                            <img data-v-63cd6604=""
                                                src="{{ url('landing') }}/assets/icons-arrow-right.png"
                                                class="iconsarrow-right img-fluid"></a></span></div>
                            </div>
                            <div data-v-63cd6604="" data-v-effc9f78=""
                                class="col-lg-4 col-md-12 col-xs-12 col-sm-12 img-QSomos"><img data-v-63cd6604=""
                                    data-v-effc9f78=""
                                    src="{{ url('landing') }}/images/HP/HP/Quienes somos/INM_2100.jpg"
                                    style="border-radius: 12px;" class="img-fluid"></div>
                        </div>
                    </div>
                </div>



                <div data-v-43503c2a="" data-v-63cd6604="" class="blockRecovery" data-v-effc9f78="">

                    <div data-v-43503c2a="" class="container">
                        <div data-v-43503c2a="" class="text-center RText">
                            ¿Por qué <b>Dividae</b>?
                        </div>

                        <div data-v-43503c2a="" class="row Recovery">

                            {{-- <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"> --}}

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Plataforma 100% Digital</b>
                                    </p>
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        Podrás conocer el proceso de la reclamación en tiempo real.
                                    </p>
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-digital.png"
                                        class="iconlargejusticia img-thumbnails img-fluid"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Máxima seguridad Jurídica</b>
                                    </p>
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b>Dividae</b>, como línea de negocio de <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b>, es parte de ANGECO y cumple con todos los requisitos de calidad.
                                    </p>
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-seguridad.png"
                                        class="iconlargejusticia img-thumbnails img-fluid"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Experiencia Contrastada</b>
                                    </p>
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b> cuenta con experiencia contrastada desde 2016, siendo uno de los
                                        principales proveedores de servicios de recuperación de deuda de España.
                                    </p>
                                </div>
                            </div>


                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Transparente</b>
                                    </p>
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b>Dividae</b> no te cobrará nada sin tu consentimiento. Además, la suscripción
                                        y análisis de la reclamación es totalmente gratuito.
                                    </p>
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>

                    </div>


                    <div data-v-e047c7bc="" data-v-63cd6604="" class="blockEstadisticas" data-v-effc9f78="">
                        <div data-v-e047c7bc="" class="row estadisticas container">
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">2016</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Año de creación</p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+16.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Notificaciones diarias</p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+120.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text"> Procedimientos iniciados desde 2016
                                </p>
                            </div>
                            <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <p data-v-e047c7bc="" class="estadisticas-title">+150.000</p>
                                <p data-v-e047c7bc="" class="estadisticas-text">Demandas</p>
                            </div>
                        </div>
                    </div>


                    <div data-v-455dcd3f="" data-v-63cd6604="" class="blockOpiniones" data-v-effc9f78="">

                        <div data-v-455dcd3f="" class="content">

                            <div id="test-3" class="owl-carousel owl-theme">

                                <div data-v-455dcd3f="" class="container Opinion">
                                    <div data-v-455dcd3f="" class="row">

                                        <div data-v-455dcd3f=""
                                            class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                            <div data-v-455dcd3f="" class="block-DR">
                                                <div data-v-455dcd3f="" class="text-deuda-recuperada">
                                                    Deuda recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    3.000<span data-v-455dcd3f="" class="text-style-1">€</span></div>
                                            </div> <img data-v-455dcd3f=""
                                                src="{{ url('landing') }}/assets/testimonio-1.png"
                                                class="testimonio-1 img-fluid">
                                        </div>

                                        <div data-v-455dcd3f=""
                                            class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 Opinion-col2">
                                            <div data-v-455dcd3f="" class="Opinion-empresa">Gestoría Antonio</div>
                                            <div data-v-455dcd3f="" class="Opinion-cliente">Antonio Fernández </div>
                                            <div data-v-455dcd3f="" class="Opinion-text">
                                                <div data-v-455dcd3f="" class="row">
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-up"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-up.png"
                                                            class="blockquote"></div>
                                                    <div data-v-455dcd3f="" class="col-10 block-text">

                                                        <p>Soy Antonio y tengo una gestoría en La Rioja. <b>Dividae</b>
                                                            se puso en contacto conmigo para poder ofrecer a mis
                                                            clientes sus servicios. Dentro de mi cartera de clientes,
                                                            muchos son los que tienen facturas pendientes de pago y las
                                                            daban por perdidas.</p>

                                                        <p>Con <b>Dividae</b>, muchos clientes recuperan sus facturas
                                                            impagadas y ahora se ha convertido en parte de unos de los
                                                            servicios esenciales que ofrecemos en la gestoría.
                                                            Agilizamos en tiempo y ofrecemos transparencia durante todo
                                                            el proceso. </p>

                                                    </div>
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-down"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-down.png"
                                                            class="blockquote"></div>
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
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-up"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-up.png"
                                                            class="blockquote"></div>
                                                    <div data-v-455dcd3f="" class="col-10 block-text">

                                                        <p>Trabajo desde hace más de 10 como aparejadora y llegó un
                                                            punto en el que tenía muchas facturas impagadas. No sabía
                                                            qué hacer… Intenté encontrar un abogado que no saliera por
                                                            un ojo de la cara, pero no fui capaz de asumirlo
                                                            económicamente.</p>

                                                        <p>Decidí buscar en internet y ahí fue cuando encontré
                                                            <b>Dividae</b>. Gracias a ellos y su transparencia conseguí
                                                            recuperar todas aquellas facturas que había dado por
                                                            perdidas. Además, fue un proceso muy sencillo, en el que me
                                                            sentí siempre acompañada. </p>

                                                    </div>
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-down"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-down.png"
                                                            class="blockquote"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div data-v-455dcd3f=""
                                            class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                            <div data-v-455dcd3f="" class="block-DR">
                                                <div data-v-455dcd3f="" class="text-deuda-recuperada">
                                                    Deuda recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    1.500<span data-v-455dcd3f="" class="text-style-1">€</span></div>
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
                                                    Deuda recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    10.000<span data-v-455dcd3f="" class="text-style-1">€</span>
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
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-up"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-up.png"
                                                            class="blockquote"></div>
                                                    <div data-v-455dcd3f="" class="col-10 block-text">

                                                        <p>Mi gestor me recomendó <b>Dividae</b>, ya que él más que
                                                            nadie conoce el estado de mis cuentas y facturas. Me pareció
                                                            una idea muy innovadora y necesaria en el sector.</p>

                                                        <p>Gracias a mi gestoría, he podido recuperar muchas facturas
                                                            impagadas que tenía olvidadas. El servicio que ofrece mi
                                                            gestoría gracias a <b>Dividae</b>, se ha convertido en un
                                                            servicio indispensable. No lo dudes, regístrate y empieza a
                                                            decir adiós a las facturas impagadas.</p>

                                                    </div>
                                                    <div data-v-455dcd3f="" class="col-1 blockquote-down"><img
                                                            data-v-455dcd3f=""
                                                            src="{{ url('landing') }}/assets/blockquote-down.png"
                                                            class="blockquote"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div data-v-455dcd3f="" class="container OCliente">
                                <div data-v-455dcd3f="" class="OCliente-title">¿Qué opinan nuestros clientes?</div>
                                <div data-v-455dcd3f="" class="OCliente-text">
                                    Conoce las opiniones de personas que ya han confiado en <b>Dividae</b>.
                                </div>

                                <br>
                                <br>



                                <div id="testimonios" class="owl-carousel owl-theme">

                                    <div data-v-1cb0bef4="" class="card">
                                        <div data-v-1cb0bef4="" class="card-body">
                                            <div data-v-1cb0bef4="" class="row block-slide-1">
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides">
                                                    <img data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/blockquote-up.png"
                                                        class="img-fluid"></div>
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                                    Experiencia de Usuario inmejorable. En todo momento conoces el
                                                    estado de la reclamación. 100% recomendable.
                                                </div>
                                            </div> <br>
                                            <div data-v-1cb0bef4="" class="row block-slide-2">
                                                <div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img
                                                        data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/rectangle3.png"></div>
                                                <div data-v-1cb0bef4="" class="col OClientes-text-slides2">
                                                    <div data-v-1cb0bef4="">
                                                        Amelia González
                                                        <br data-v-1cb0bef4="">
                                                        @AmeliaGlez_
                                                    </div>
                                                </div>
                                                <div data-v-1cb0bef4="" class="col OClientes-rating-slides2">
                                                    <div data-v-1cb0bef4="" class="rating"><img
                                                            data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div data-v-1cb0bef4="" class="card">
                                        <div data-v-1cb0bef4="" class="card-body">
                                            <div data-v-1cb0bef4="" class="row block-slide-1">
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides">
                                                    <img data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/blockquote-up.png"
                                                        class="img-fluid"></div>
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                                    Conocí <b>Dividae</b> por mi gestoría. Transparente y sencillo.
                                                    Además comienzan la reclamación con un único pago y te mantienen
                                                    informado siempre. No vas a pagar nada que no sepas.
                                                </div>
                                            </div> <br>
                                            <div data-v-1cb0bef4="" class="row block-slide-2">
                                                <div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img
                                                        data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/rectangle2.png"></div>
                                                <div data-v-1cb0bef4="" class="col OClientes-text-slides2">
                                                    <div data-v-1cb0bef4="">
                                                        Emilio Castro
                                                        <br data-v-1cb0bef4="">
                                                        @EmiCastro1
                                                    </div>
                                                </div>
                                                <div data-v-1cb0bef4="" class="col OClientes-rating-slides2">
                                                    <div data-v-1cb0bef4="" class="rating"><img
                                                            data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div data-v-1cb0bef4="" class="card">
                                        <div data-v-1cb0bef4="" class="card-body">
                                            <div data-v-1cb0bef4="" class="row block-slide-1">
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides">
                                                    <img data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/blockquote-up.png"
                                                        class="img-fluid"></div>
                                                <div data-v-1cb0bef4=""
                                                    class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                                    Ahora que conozco <b>Dividae</b>, nunca más dejaré pasar una factura
                                                    impagada por muy bajo que sea el importe. Repetiré.
                                                </div>
                                            </div> <br>
                                            <div data-v-1cb0bef4="" class="row block-slide-2">
                                                <div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img
                                                        data-v-1cb0bef4=""
                                                        src="{{ url('landing') }}/assets/rectangle1.png"></div>
                                                <div data-v-1cb0bef4="" class="col OClientes-text-slides2">
                                                    <div data-v-1cb0bef4="">
                                                        Sara Trujillo
                                                        <br data-v-1cb0bef4="">
                                                        @SaraTrujilloo
                                                    </div>
                                                </div>
                                                <div data-v-1cb0bef4="" class="col OClientes-rating-slides2">
                                                    <div data-v-1cb0bef4="" class="rating"><img
                                                            data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"> <img data-v-1cb0bef4=""
                                                            src="{{ url('landing') }}/assets/icons-star.png"
                                                            class="img-fluid"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div data-v-dd3c5654="" data-v-63cd6604="" class="blockExitos" data-v-effc9f78=""><div data-v-dd3c5654="" class="container"><div data-v-dd3c5654="" class="Exitos-title">
            Casos de éxito
        </div> <div data-v-dd3c5654="" class="row my-5 Exitos"><div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Planday.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Umbraco.png"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Brightpearl.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/VoloDA.png" class="Exitos-img"></div></div></div></div> --}}






                    @include('footer', ['modal' => true])


                </div>
        </main>
    </div>
    <!-- Scripts -->

    <!-- <script src="{{ url('landing') }}/app.js" defer=""></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- @foreach (config('adminlte.plugins') as $pluginName => $plugin)
      @if ($plugin['active'] || View::getSection('plugins.' . ($plugin['name'] ?? $pluginName)))
          @foreach ($plugin['files'] as $file)
              @php
                  if (! empty($file['asset'])) {
                      $file['location'] = asset($file['location']);
                  }
              @endphp

              @if ($file['type'] == 'js')
                  <script src="{{ $file['location'] }}" @if (!empty($file['defer'])) defer @endif></script>
              @endif

          @endforeach
      @endif
  @endforeach

  @stack('js') --}}

    <script src="{{ url('landing') }}/plugins/owl/js/owl.carousel.js"></script>
    <script src="{{ url('landing') }}/plugins/owl/js/owl.navigation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

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

        /**/

        /*$('.card.mb-4.rounded-3').click(function (e) {
          e.preventDefault();
          $('.card.mb-4.rounded-3').removeClass('active');
          $(this).addClass('active');
        });*/
    </script>



</body>

</html>
