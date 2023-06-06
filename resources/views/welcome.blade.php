<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vQquIOeFCyXeIRVqPhnUsIPBw3b13PWS9mA9pMmF">

    <meta name="robots" content="index, follow" />
    <title>Di adiós a tus facturas impagadas, di Dividae</title>
    <meta name="description" content="Dividae es una plataforma 100% digital que surge para dar una solución a la recuperación de facturas impagadas de forma sencilla, exitosa y económica."/>

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
	background-color: #e65927;
	border: 1px solid #e65927;
	box-shadow: 0 16px 22px -17px #e65927;
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

.floating-social-bar button:hover {
    background-color: #ffffff;
	color: #e65927;
}

.floating-social-bar button:focus {
    outline: none;
}

.floating-social-bar span {
    /*flex: 0 0 50%;*/
    max-width: 50%;
    margin-left: 3%;
}
.floating-social-bar img {
    margin-left: 3%;
}

@media (min-width: 100px) and (max-width: 1200px) {
.floating-social-bar {
    visibility: hidden;
}


.floating-comprobar button {
    border-radius: 37.5px;
	background-color: #e65927;
	border: 1px solid #e65927;
	box-shadow: 0 16px 22px -17px #e65927;
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
	color: #e65927;
}

.floating-comprobar button:focus {
    outline: none;
}
}

@media (min-width: 1201px) {
.floating-comprobar {
    visibility: hidden;
}
}



    </style>
</head>
<?php include_once("analyticstracking.php") ?>

<body>

    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-63cd6604="">
                <div data-v-66372912="" data-v-63cd6604="" class="portada-3dblue" data-v-effc9f78="">


                   <video id="background-video" autoplay loop muted >
                        <source src="{{ url('landing/videohome.mp4') }}" type="video/mp4">
                   </video>

                    <div data-v-66372912="" class="block-CMO-FUNCIONA"><a data-v-66372912="" href="#como-funciona"
                            class="CMO-FUNCIONA"><img data-v-66372912=""
                                src="{{ url('landing') }}/assets/icons-arrow-down.png"
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
                                aria-label="Toggle navigation" class="navbar-toggler">

                                <span data-v-5fddf304=""
                                    class="navbar-toggler-icon" style="color: #333">
                                        <img src="https://icon-library.com/images/burger-menu-icon/burger-menu-icon-4.jpg" alt="" style="width: 100%;">
                                    </span>

                                </button>
                            <div data-v-5fddf304="" id="navbarCollapse" class="collapse navbar-collapse">
                                <ul data-v-5fddf304="" class="navbar-nav">

                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                        href="{{ url('quienes-somos') }}" class="nav-link"><span
                                            data-v-5fddf304="" class="Type-something">
                                            ¿Quiénes somos?
                                        </span></a>
                                    <div data-v-5fddf304="" class=""></div>
                                </li>

                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('testimonios') }}" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Testimonios
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

                            <!-- Modal -->
                            <!--<div data-v-66372912="" id="text-p" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
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
                                                <a data-v-66372912="" href="{{ url('register') }}" class="btn btn-registerHome">
                                                    <span data-v-66372912="" class="text-register-btn">
                                                        Regístrate
                                                        <img data-v-66372912="" src="{{ url('landing') }}/assets/icons-arrow-right.png" class="iconsarrow-right img-fluid">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            @include('followus')

                        </div>
                    </div>
                </div>

                {{-- Floating social bar --}}
                <div data-v-66372912="" id="pagetop" data-toggle="modal" data-target="#consulta-viabilidad" class="fixed right bottom" style="display: none-;">
                    <div class="floating-social-bar">
                        <img src="{{ url('landing') }}/assets/group.png">
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
                        <div data-v-9cc878a2="" class="text-tarifa" style="padding:0">¿Cu&aacute;l es nuestra <b>misi&oacute;n</b>?</div>
                        <div class="container text-center bottom-text" style="font-weight:normal !important">
                            <p>En <b>Dividae</b>, queremos revolucionar el mundo de la recuperaci&oacute;n de facturas impagadas a nivel digital de una manera
                                <b>automatizada</b> y <b>transparente</b>. ¿Nuestro principal objetivo? Que digas <b>adi&oacute;s a tus facturas impagadas</b>. Conoce m&aacute;s acerca de
                                <b><a href="{{ url('quienes-somos') }}">nosotros</a></b>.</p>
                        </div>

                        <div data-v-63cd6604="" data-v-effc9f78=""><a data-v-63cd6604="" href="{{ url('register') }}" class="btn QSomos-btn" data-v-effc9f78="">Regístrate</a></div>

                        <div class="videoDividae">
                            <video class="videoDividae" controls autoplay muted >
                                <source src="{{ url('landing/dividaemision.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>


                <div data-v-43503c2a="" data-v-63cd6604="" class="blockRecovery" data-v-effc9f78="">
                    <div data-v-43503c2a="" class="container">
                        <div data-v-43503c2a="" class="text-center RText">
                            ¿Por qué <b>Dividae</b>?
                        </div>

                        <div data-v-43503c2a="" class="row Recovery">
                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Plataforma 100% Digital</b>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Inicio de Bloque cuanto cuesta --}}
                <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        <div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div>
                        <div class="container text-center bottom-text">
                            <p style="font-weight:normal !important"><b>Dividae</b> cuenta con tarifas fijas. Nuestro mayor objetivo es que no pagues nada que
                                no sepas, ser <b>100% transparentes</b> y que tú estés <b>100% tranquilo</b> durante
                                todo el proceso. </p>
                        </div>
                        <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            </div>
                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
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
                                                <p style="color:#285ba3; text-align: center;">
                                                    Comienza con tu reclamacion por vía extrajudicial
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
                                                class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                                <br>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
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
                                                <p style="color:#285ba3; text-align: center;">
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
                                                class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                                <br>
                                        </div>
                                    </div>

                                    <br>

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
                                <p data-v-e047c7bc="" class="estadisticas-text">Procedmiientos en gestión</p>
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
                                                    Cantidad recuperada
                                                </div>
                                                <div data-v-455dcd3f="" class="price-DR">
                                                    10.220<span data-v-455dcd3f="" class="text-style-1">€</span></div>
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
                                                    1.640<span data-v-455dcd3f="" class="text-style-1">€</span></div>
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
                                                    3.550<span data-v-455dcd3f="" class="text-style-1">€</span>
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
                                                    impagada. Repetiré.
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

    </script>

</body>

</html>
