<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ZTvvFBs0fJ6f864MWTU3BPQOJfKdC9Xa0PneA26E">


    <title>Dividae</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('landing') }}/app_quental.css">

    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('landing') }}/plugins/owl/owl.theme.default.min.css">

    @include('styles2')

    <style>
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
            <div data-v-effc9f78="" data-v-eb5d4bee="">
                <div data-v-eb5d4bee="" data-v-effc9f78="" class="block-Testimonios">
                    {{--
                    <nav data-v-5fddf304="" data-v-eb5d4bee="" class="navbar navbar-expand-lg navbar-dark"
                        data-v-effc9f78="">
                        <div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="{{ url('/') }}"
                                class="navbar-brand router-link-active">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                                        src="{{ url('landing') }}/assets/grafico-logo-negativo.png"
                                        class="graficologonegativo"></div>
                            </a> <a data-v-5fddf304="" href="{{ url('/') }}"
                                class="navbar-brand router-link-active" style="display: none;">
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
                                            href="{{ url('/') }}/testimonios" aria-current="page"
                                            class="nav-link router-link-exact-active router-link-active"><span
                                                data-v-5fddf304="" class="Type-something">
                                                Testimonios
                                            </span></a>
                                        <div data-v-5fddf304="" class="punto-active"></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                                            href="{{ url('/') }}/quienes-somos" class="nav-link"><span
                                                data-v-5fddf304="" class="Type-something">
                                                ¿Quiénes somos?
                                            </span></a>
                                        <div data-v-5fddf304="" class=""></div>
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
                            </div>
                        </div>
                    </nav> --}}

                    @include('front.navbar')
                    <div data-v-eb5d4bee="" data-v-effc9f78="" class="container Testimonios">
                        <div data-v-eb5d4bee="" data-v-effc9f78="" class="row">
                            <div data-v-eb5d4bee="" data-v-effc9f78=""
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div data-v-eb5d4bee="" data-v-effc9f78="" class="Testimonios-title">La opinión de
                                    nuestros clientes</div>
                            </div>
                            <div data-v-eb5d4bee="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-eb5d4bee="" data-v-effc9f78="" class="Testimonios-text"></div>
                            </div>
                        </div>
                    </div>


                    @include('followus')

                </div>

                <!--
                    <div class="container text-center bottom-text">
                        <p class="text-center">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo. Vestibulum aliquam hendrerit molestie. <br>
                            Mauris malesuada nisi sit amet augue accumsan tincidunt. Maecenas tincidunt, velit ac porttitor pulvinar.

                        </p>
                    </div>
                    -->
                <div data-v-455dcd3f="" data-v-63cd6604="" class="blockOpiniones" data-v-effc9f78="">

                    <div data-v-455dcd3f="" class="content">

                        <div id="test-3" class="owl-carousel owl-theme">

                            <div data-v-455dcd3f="" class="container Opinion">
                                <div data-v-455dcd3f="" class="row">

                                    <div data-v-455dcd3f=""
                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                        <div data-v-455dcd3f="" class="block-DR">
                                            <div data-v-455dcd3f="" class="text-deuda-recuperada"
                                                style="color:#285ba3;">
                                                Cantidad recuperada
                                            </div>
                                            <div data-v-455dcd3f="" class="price-DR">
                                                10.000<span data-v-455dcd3f="" class="text-style-1">€</span></div>
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
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-up">
                                        <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-up.png" class="blockquote">
                                    </div> --}}
                                                <div data-v-455dcd3f="" class="col-10 block-text">

                                                    <p style="color:#285ba3;">"Soy Antonio y tengo una gestoría en La
                                                        Rioja. <b>Dividae</b> se
                                                        puso en contacto conmigo para incorporar el servicio de
                                                        recuperación
                                                        de facturas impagadas y poder ofrecer valor añadido a mis
                                                        clientes,
                                                        ya que son muchos los que tienen facturas pendientes de pago y
                                                        las daban por perdidas.</p>

                                                    <p style="color:#285ba3;">Con <b>Dividae</b>, muchos de mis
                                                        clientes ya han recuperado sus facturas impagadas y
                                                        se ha convertido en un servicio esencial de la gestoría.
                                                        <b>Dividae</b>, agiliza en tiempos y ofrece un servicio
                                                        transparente durante todo el servicio".
                                                    </p>

                                                </div>
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-down">
                                    <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-down.png" class="blockquote">
                                </div> --}}
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
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-up">
                                        <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-up.png" class="blockquote">
                                    </div> --}}
                                                <div data-v-455dcd3f="" class="col-10 block-text">

                                                    <p style="color:#285ba3;">"Trabajo desde hace más de 10 años como
                                                        aparejadora y llegó un punto en el que tenía
                                                        muchas facturas impagadas que daba por perdidas. Intenté
                                                        encontrar un abogado que
                                                        no saliera por un ojo de la cara, pero no fui capaz de asumir el
                                                        coste.</p>

                                                    <p style="color:#285ba3;">Decidí realizar una búsqueda en internet
                                                        y ahí es cuando encontré <b>Dividae</b>.
                                                        Gracias a este novedoso y transparente servicio, conseguí
                                                        recuperar las facturas
                                                        que tenía pendientes. Además, fue un proceso muy sencillo, en el
                                                        que me sentí siempre acompañada".</p>

                                                </div>
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-down">
                                    <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-down.png" class="blockquote">
                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div data-v-455dcd3f=""
                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1">
                                        <div data-v-455dcd3f="" class="block-DR">
                                            <div data-v-455dcd3f="" class="text-deuda-recuperada"
                                                style="color:#285ba3;">
                                                Cantidad recuperada
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
                                            <div data-v-455dcd3f="" class="text-deuda-recuperada"
                                                style="color:#285ba3;">
                                                Cantidad recuperada
                                            </div>
                                            <div data-v-455dcd3f="" class="price-DR">
                                                3.500<span data-v-455dcd3f="" class="text-style-1">€</span></div>
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
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-up">
                                        <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-up.png" class="blockquote">
                                    </div> --}}
                                                <div data-v-455dcd3f="" class="col-10 block-text">

                                                    <p style="color:#285ba3;">"Mi gestor me recomendó <b>Dividae</b>,
                                                        ya que él más que nadie conoce
                                                        el estado de mis cuentas y facturas. Desde el principio,
                                                        me pareció una idea innovadora y necesaria en el sector.</p>

                                                    <p style="color:#285ba3;">Gracias a mi gestoría, he podido
                                                        recuperar muchas de las facturas impagadas que tenía olvidadas.
                                                        El servicio que ofrece mi gestoría gracias a <b>Dividae</b>, ya
                                                        es indispensable para todos sus clientes".</p>

                                                </div>
                                                {{-- <div data-v-455dcd3f="" class="col-1 blockquote-down">
                                    <img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-down.png" class="blockquote">
                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div data-v-455dcd3f="" class="container OCliente">
                            <div data-v-455dcd3f="" class="OCliente-title">¿Qué opinan nuestros clientes?</div>
                            <div data-v-455dcd3f="" class="OCliente-text" style="color:#285ba3;">
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
                                                Experiencia de Usuario inmejorable. En todo momento conoces el estado de
                                                la reclamación. 100% recomendable.
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
                                                <div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4=""
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
                                                Conocí <b>Dividae</b> por mi gestoría. Transparente y sencillo. Además
                                                comienzan la reclamación con un único pago y te mantienen informado
                                                siempre. No vas a pagar nada que no sepas.
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
                                                <div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4=""
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
                                                <div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4=""
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
                            <p data-v-e047c7bc="" class="estadisticas-title">+120.000</p>
                            <p data-v-e047c7bc="" class="estadisticas-text"> Procedimientos iniciados</p>
                        </div>
                        <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p data-v-e047c7bc="" class="estadisticas-title">+150.000</p>
                            <p data-v-e047c7bc="" class="estadisticas-text">Demandas</p>
                        </div>
                    </div>
                </div>


                @include('footer')

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
    </script>

</body>

</html>
