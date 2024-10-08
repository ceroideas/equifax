<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="UETvHgU9M9ghKF4FaRP6CQx9K6YSEpZ1s0rZMz1a">

    <meta name="robots" content="index, follow" />
    <title>Asnef - Tarifas</title>
    <meta name="description" content="Asnef cuenta con tarifas fijas para reclamación extrajudicial y judicial."/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('landing') }}/app_quental.css">

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
            <div data-v-effc9f78="" data-v-cfd2b624="">

                <div data-v-c7d18d50="" data-v-effc9f78="" class="block-About">

                    @include('front.navbar')


                    <div data-v-c7d18d50="" data-v-effc9f78="" class="container About">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title">¿Cuánto Cuesta?</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text">

                                </div>
                            </div>
                        </div>
                    </div> {{-- @include('followus') --}}
                </div>

                <div class="container text-center bottom-text pt-4">
                    <p><b>Asnef</b> cuenta con tarifas fijas. Nuestro
                        mayor objetivo es que no pagues nada que no sepas, ser <b>100% transparentes</b> y que tú estés
                        <b>100% tranquilo</b> durante todo el proceso. </p>

                    <p>Te explicamos paso a paso las fases de la reclamación
                        y sus tarifas.</p>
                </div>

                {{-- <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        <div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div>

                        <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>

                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div data-v-9cc878a2="" class="card mb-4 rounded-3">
                                    <div data-v-9cc878a2="" class="pt-5">
                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <small>Reclamación extrajudicial</small>
                                        </span>
                                    </div>
                                    <div data-v-9cc878a2="" >
                                        <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">
                                            <li data-v-9cc878a2="">
                                                <div class="card-text pt-4">
                                                    Comienza con tu reclamacion por vía extrajudicial
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <span data-v-9cc878a2="" class="fw-normal text-t1 pt-3">
                                        <small>Por solo</small> 19,90&euro;
                                    </span>
                                    <div class="col-12 pb-3 pt-3">
                                        <a data-v-9cc878a2="" href="#tbltarifas" aria-current="page"
                                            class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                    </div>
                                </div>
                            </div>

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
                                        <small>Desde</small> 69,90&euro;
                                    </span>
                                    <div class="col-12 pb-3 pt-3">
                                        <a data-v-9cc878a2="" href="#tbltarifas" aria-current="page"
                                            class="btn btn-light-descubre" type="button"> Descubrir más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


                                {{-- Inicio de Bloque cuanto cuesta --}}
                                <div data-  v-9cc878a2="" data-v-63cd6604="" class="blockTarifa pt-5" data-v-effc9f78="">
                                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                                        {{-- <div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div> --}}
                                        <div data-v-9cc878a2="" class="text-center fs-2-5x fw-600 fc-primary" >
                                            ¿Cu&aacute;nto cuesta?
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

                <div data-v-c7d18d50="" data-v-effc9f78="" class="block-nosotros">
                    <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros container">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros-text">
                                    <ol>
                                        <li>Regístrate de forma totalmente gratuita.</li>
                                        <li>Sube a la plataforma toda la información necesaria (Datos de la deuda, datos
                                            del deudor, factura…)</li>
                                        <li>Acto seguido a través del área de usuario, podrás saber si la reclamación es
                                            viable. </li>
                                        <li>Si es viable y tras tu confirmación, se pagará el importe para comenzar la
                                            reclamación extrajudicial: <b>19,90 euros.</b> </li>
                                    </ol>
                                </div>
                            </div>

                            <div id="tbltarifas" data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="Nosotros-text">
                                    <ol start="5">
                                        <li>Si el deudor se niega a abonar la cantidad, <b>Dividae</b> recomendará el
                                            <b>procedimiento judicial</b> con las siguientes tarifas que encontrarás a
                                            continuación, siempre con el consentimiento del cliente. ¡Es 100%
                                            transparente!</li>
                                        <li><b>Dividae</b> se encarga de la gestión del procedimiento y podrás ver en
                                            tiempo real el estado y evolución de la reclamación. </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p style="font-size:150%; text-align: center; ">
                                    <b>…¡Y ahora ya podrás decir que te han devuelto la factura que nunca te
                                        pagaron!</b>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78=""
                    style="width: 98%;">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <table id="tbltarifas" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="background-color: #9E1B42; text-align: center; color: #fff">Tipo de
                                            procedimiento</th>
                                        <th style="background-color: #9E1B42; text-align: center; color: #fff">Tarifa
                                            de éxito*</th>
                                        <th style="background-color: #9E1B42; text-align: center; color: #fff">Precio
                                            fijo**</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="color:#285ba3">Reclamación amistosa</td>
                                        <td rowspan="5"
                                            style="text-align: center; vertical-align: middle; color:#285ba3">15%</td>
                                        <td style="text-align: right;color:#285ba3;">19,90 &euro;</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#285ba3"><span data-toggle="tooltip"
                                                style="color:#9E1B42; data-placement="top"
                                                title="Es la vía de reclamación civil de cantidades más rápida y ágil.
Se utiliza para exigir el pago de deudas líquidas, determinadas, vencidas y exigibles."
                                                style="color:#9E1B42;">Procedimiento Monitorio</span>
                                            en ámbito nacional.</td>
                                        <td style="text-align: right; color:#285ba3">69,90 &euro;</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#285ba3"><span data-toggle="tooltip"
                                                style="color:#9E1B42; data-placement="top"
                                                title="Es un proceso declarativo dirigido a la resolución de litigios civiles que, bien por la materia o
bien por la cuantía económica (cuantía menor a 6.000€), requieren una tramitación ágil."
                                                style="color:#9E1B42;">Juicio Verbales</span> en ámbito nacional</td>
                                        <td style="text-align: right; color:#285ba3">199,90 &euro;</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#285ba3"><span data-toggle="tooltip"
                                                style="color:#9E1B42; data-placement="top"
                                                title="Es un proceso declarativo dirigido a la resolución de litigios civiles que, bien por la materia o bien por la cuantía económica
(cuantía mayor a 6.000€ o imposible de calcular). Es un procedimiento más largo que los descritos anteriormente."
                                                style="color:#9E1B42;">Juicio Ordinarios</span> en ámbito nacional</td>
                                        <td style="text-align: right; color:#285ba3">399,90 &euro;</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#285ba3"><span data-toggle="tooltip"
                                                style="color:#9E1B42; data-placement="top"
                                                title="Es aquel por el que se pretende el cumplimiento de una resolución judicial dictada, de manera que es una manifestación
del respeto al derecho a la tutela judicial efectiva cuando la parte contraria no cumple con lo indicado en la sentencia."
                                                style="color:#9E1B42;">Ejecución</span> en ámbito nacional</td>
                                        <td style="text-align: right; color:#285ba3">149,90 &euro;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p style="color:#285ba3; font-style: italic;">IVA no incluido</p>

                            <p style="color:#285ba3; font-style: italic;">* Dividae cobrará un 15% sobre las cantidades
                                recuperadas.</p>

                            <p style="color:#285ba3; font-style: italic;">** Precio fijo que deberá abonarse por el
                                cliente previo al inicio de cada procedimiento.</p>

                        </div>

                    </div>

                </div>

                @include('footer')

            </div>
        </main>
    </div>
    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    @yield('extrajs')

</body>

</html>
