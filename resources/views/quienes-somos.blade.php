<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ZTvvFBs0fJ6f864MWTU3BPQOJfKdC9Xa0PneA26E">

    <meta name="robots" content="index, follow" />

    <title>Dividae - ¿Quiénes somos?</title>
    <meta name="description" content="Dividae es una plataforma 100% online que ofrece a PYMES y autónomos la solución para reclamar facturas impagadas."/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('landing') }}/app_quental.css">
    @include('styles2')

    <style>
        .owl-carousel img {
            display: inline-block !important;
            width: auto !important;
        }

        .progressbar {
            -webkit-transition: width 1s ease;
            transition: width 1s ease
        }

        .vue-step-wizard {
            background-color: #f7f8fc;
            width: 900px;
            margin: auto;
            padding: 40px
        }

        .step-progress {
            height: 1rem;
            background: #fff;
            border-radius: 1rem;
            margin: 1rem 0
        }

        .step-progress .bar {
            content: "";
            height: 1rem;
            border-radius: 1rem;
            background-color: #4b8aeb
        }

        .step-pills {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            background-color: #fff;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 1rem;
            -webkit-box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .step-pills .step-item {
            background-color: #f5f5f5;
            border-radius: 10px;
            padding: 5px 20px;
            list-style-type: none;
            padding: .5rem 1.5rem
        }

        .step-pills .step-item a {
            text-decoration: none;
            color: #7b7b7b
        }

        .step-pills .step-item.active {
            border: 1px solid #4b8aeb
        }

        .step-pills .step-item.validated {
            border: 1px solid #008011
        }

        .step-body {
            background-color: #fff;
            margin-left: auto;
            -webkit-box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .step-body,
        .step-footer {
            padding: 1rem;
            border-radius: 1rem
        }

        .step-footer {
            margin-left: auto;
            margin: 1rem 0;
            text-align: center
        }

        .step-button {
            font-weight: 700;
            line-height: 1;
            text-transform: uppercase;
            position: relative;
            max-width: 30rem;
            text-align: center;
            border: 1px solid;
            border-radius: 12px;
            color: #22292f;
            color: rgba(34, 41, 47, var(--text-opacity));
            padding: .5rem 1.25rem;
            font-size: .875rem;
            margin: .5rem;
            color: #fff;
            outline: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important
        }

        .step-button-next {
            background-color: #126fde
        }

        .step-button-previous {
            background-color: #3deaba
        }

        .step-button-submit {
            background-color: #4fa203
        }

        .step-button-reset {
            background-color: #037da2
        }

        .tabStatus {
            display: inline-block;
            width: 1.5rem;
            height: 1.5rem;
            margin-right: .5rem;
            line-height: 1.5rem;
            color: #fff;
            text-align: center;
            background: rgba(0, 0, 0, .38);
            border-radius: 50%
        }

    </style>

</head>

<body>
    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-c7d18d50="">
                <div data-v-c7d18d50="" data-v-effc9f78="" class="block-About">
                    {{--
                    <nav data-v-5fddf304="" data-v-c7d18d50="" class="navbar navbar-expand-lg navbar-dark"
                        data-v-effc9f78="">
                        <div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="{{ url('/') }}"
                                class="navbar-brand router-link-active">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/grafico-logo-negativo.png"
                                        class="graficologonegativo"></div>
                            </a> <a data-v-5fddf304="" href="{{ url('/') }}" class="navbar-brand router-link-active"
                                style="display: none;">
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
                                            href="{{ url('/') }}/testimonios" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Testimonios
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('/') }}/quienes-somos" aria-current="page"
                                            class="nav-link router-link-exact-active router-link-active"><span
                                                data-v-5fddf304="" class="Type-something">
                                                ¿Quiénes somos?
                                            </span></a>
                                        <div data-v-5fddf304="" class="punto-active"></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('/') }}/preguntas" class="nav-link"><span
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
                                            href="{{ url('/') }}/contacto" class="nav-link"><span
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
                    </nav>--}}

                    @include('front.navbar')

                    <div data-v-c7d18d50="" data-v-effc9f78="" class="container About">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title">Sobre nosotros</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text">

                                </div>
                            </div>
                        </div>
                    </div>


                    @include('followus')
                </div>
                <div class="container text-center bottom-text">
                    <br>
                    <p><b>Dividae</b> es una plataforma 100% online, que ofrece a empresarios y autónomos la solución para reclamar facturas que nunca les pagaron. Esta línea de negocio es parte de
                        <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b>,
                        uno de los principales proveedores de servicios de recuperación de deuda de España.</p>
                </div>

                <!--
                            <div data-v-c7d18d50="" data-v-effc9f78="" class="block-Claim-video">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="Claim">
                                    <div data-v-c7d18d50="" data-v-effc9f78="" class="container">
                                        <div data-v-c7d18d50="" data-v-effc9f78="" class="text-center Claim-title">
                                            Claim - Dividae
                                        </div>
                                        <div data-v-c7d18d50="" data-v-effc9f78="" class="Claim-text">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo. Vestibulum aliquam hendrerit molestie. Mauris malesuada nisi sit amet augue accumsan tincidunt.
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                <div data-v-c7d18d50="" data-v-effc9f78="" class="block-nosotros">
                    <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros container">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78="" class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros-title">Sobre nosotros</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros-text">

                                    <p><b>Dividae</b> forma parte de <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b>,
                                        líder en el sector de la recuperación de deuda en España, que, a través de la aplicación de una tecnología avanzada, permite ofrecer a sus clientes elevados niveles de <b>eficiencia</b> y <b>calidad</b> en todos sus servicios.

                                    <p>Gracias al conocimiento del sector, su equipo de profesionales y su firme apuesta tecnológica, en el año 2021 nace
                                        <b>Dividae</b> para revolucionar el mundo de la recuperaci&oacute;n de facturas impagadas a nivel digital.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--
                <div class="container text-center bottom-text">
                    <img data-v-494d1a60=""
                    style="border-radius: 12px;"
                    src="{{ url('landing') }}/images/HP/HP/Nuestra filosofía/equipo_dividae.jpg"
                    class="img-amistosa img-fluid">
                </div>
                --}}


                {{-- <div data-v-861c26ae="" data-v-c7d18d50="" class="block-SlidesAbout" data-v-effc9f78="">
    <div data-v-861c26ae="" class="SlidesAbout container">

    	<div id="about-slider" class="owl-carousel owl-theme">
    		<div data-v-861c26ae="">
	            <img data-v-861c26ae="" src="{{url('landing')}}/assets/slider-equipo-1.png" class="card-text rectangle1 img-fluid" />
	        </div>
	        <div data-v-861c26ae="">
	            <img data-v-861c26ae="" src="{{url('landing')}}/assets/slider-equipo-2.png" class="card-text rectangle1 img-fluid" />
	        </div>
	        <div data-v-861c26ae="">
	            <img data-v-861c26ae="" src="{{url('landing')}}/assets/slider-equipo-3.png" class="card-text rectangle1 img-fluid" />
	        </div>
    	</div>
    </div>
</div> --}}

                {{-- <div data-v-3860c0f6="" data-v-c7d18d50="" class="block-NEquipo" data-v-effc9f78=""><div data-v-3860c0f6="" class="container"><div data-v-3860c0f6="" class="NEquipo"><div data-v-3860c0f6="" class="NEquipo-title">
                Nuestro equipo
            </div>

            <div data-v-3860c0f6="" class="row"><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-1.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre1</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-2.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre2</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-3.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre3</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-4.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre4</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-5.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre5</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-6.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre6</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-7.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre7</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div><div data-v-3860c0f6="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 NEquipo-content mb-4"><div data-v-3860c0f6="" class="card-deck"><div data-v-3860c0f6="" class="card"><div data-v-3860c0f6="" class="NEquipo-img"><img data-v-3860c0f6="" src="{{url('landing')}}/assets/equipo-8.png" class="iconsplay img-fluid"></div> <div data-v-3860c0f6="" class="card-body"><div data-v-3860c0f6="" class="NEquipo-nombre card-text">Nombre8</div> <div data-v-3860c0f6="" class="NEquipo-puesto card-text">PUESTO</div></div></div></div></div></div></div></div></div> --}}

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
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono plataforma digital"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Plataforma 100% Digital</b>
                                    </p>
                                    {{--
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        Podrás conocer el proceso de la reclamación en tiempo real.
                                    </p>--}}
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-digital.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono seguridad juridica"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Máxima seguridad Jurídica</b>
                                    </p>
                                    {{--
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b>Dividae</b>, como línea de negocio de <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b>, es parte de ANGECO y cumple con todos los requisitos de calidad.
                                    </p>--}}
                                </div>
                            </div>

                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-seguridad.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono experiencia"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Experiencia Contrastada</b>
                                    </p>
                                    {{--
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b><a href="https://www.atlantelt.com" target="_blank" style="color:#e65927">Atlante</a></b> cuenta con experiencia contrastada desde 2016, siendo uno de los
                                        principales proveedores de servicios de recuperación de deuda de España.
                                    </p>--}}
                                </div>
                            </div>


                            <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a=""
                                        src="{{ url('landing') }}/assets/icon-large-justicia.png"
                                        class="iconlargejusticia img-thumbnails img-fluid" alt="Icono transparencia"></div>
                                <div data-v-43503c2a="">
                                    <p data-v-43503c2a="" class="Recovery-title">
                                        <b>Transparente</b>
                                    </p>
                                    {{--
                                    <p data-v-43503c2a="" class="Recovery-text">
                                        <b>Dividae</b> no te cobrará nada sin tu consentimiento. Además, la suscripción
                                        y análisis de la reclamación es totalmente gratuito.
                                    </p>--}}
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>


                    </div>
                </div>


                <div data-v-e047c7bc="" data-v-63cd6604="" class="blockEstadisticas" data-v-effc9f78="">
                    <div data-v-e047c7bc="" class="row estadisticas container">
                        <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p data-v-e047c7bc="" class="estadisticas-title">2021</p>
                            <p data-v-e047c7bc="" class="estadisticas-text">Año de creación</p>
                        </div>
                        <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p data-v-e047c7bc="" class="estadisticas-title">+16.000</p>
                            <p data-v-e047c7bc="" class="estadisticas-text">notificaciones diarias</p>
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

                {{-- <div data-v-dd3c5654="" data-v-c7d18d50="" class="blockExitos" data-v-effc9f78=""><div data-v-dd3c5654="" class="container"><div data-v-dd3c5654="" class="Exitos-title">
            Casos de éxito
        </div> <div data-v-dd3c5654="" class="row my-5 Exitos"><div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Planday.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Umbraco.png"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Brightpearl.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/VoloDA.png" class="Exitos-img"></div></div></div></div> --}}

                @include('footer', ['contact' => true])

            </div>
        </main>
    </div>
    <!-- Scripts -->
    {{-- <script src="https://asemarrecovery.quentalstaging.com/js/app.js" defer=""></script> --}}
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

    @yield('extrajs')

    <script>
        var owl = $('#about-slider').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });
    </script>



</body>

</html>
