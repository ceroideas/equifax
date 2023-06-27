<html lang="en">
    @extends('adminlte::page')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="UETvHgU9M9ghKF4FaRP6CQx9K6YSEpZ1s0rZMz1a">


    <title>Dividae</title>

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
    <style>
        .block-Info[data-v-cfd2b624] {
            background-color: #e65927;
        }

        .content {
            display: flex;
            justify-content: center;
            }

        .blockTotales{
            text-align: right;

            }

    </style>

</head>

<body>
    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-cfd2b624="">

                <div data-v-cfd2b624="" data-v-effc9f78="" class="block-Info">
                    <nav data-v-5fddf304="" data-v-c7d18d50="" class="navbar navbar-expand-lg navbar-dark"
                        data-v-effc9f78="">
                        <div data-v-5fddf304="" class="container">
                            <a data-v-5fddf304="" href="{{ url('/') }}" class="navbar-brand router-link-active">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3">
                                    <img data-v-5fddf304="" src="{{ url('landing') }}/assets/grafico-logo-negativo.png"
                                        class="graficologonegativo">
                                </div>
                            </a>
                            <a data-v-5fddf304="" href="{{ url('/') }}" class="navbar-brand router-link-active"
                                style="display: none;">
                                <div data-v-5fddf304="" class="bartopbardefault-copy-3">
                                    <img data-v-5fddf304="" src="{{ url('landing') }}/assets/grafico-logo-positivo.png"
                                        class="graficologonegativo">
                                </div>
                            </a>
                            <button data-v-5fddf304="" type="button" data-toggle="collapse"
                                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler">
                                <span data-v-5fddf304="" class="navbar-toggler-icon"></span>
                            </button>
                            <div data-v-5fddf304="" id="navbarCollapse" class="navbar-collapse" style="display: none;">
                                <ul data-v-5fddf304="" class="navbar-nav">
                                    <li data-v-5fddf304="" class="nav-item">
                                        <a data-v-5fddf304="" href="{{ url('/') }}/testimonios" class="nav-link">
                                            <span data-v-5fddf304="" class="Type-something">Testimonios</span>
                                        </a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item">
                                        <a data-v-5fddf304="" href="{{ url('/') }}/quienes-somos"
                                            aria-current="page"
                                            class="nav-link router-link-exact-active router-link-active">
                                            <span data-v-5fddf304="" class="Type-something">¿Quiénes somos?</span>
                                        </a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item">
                                        <a data-v-5fddf304="" href="{{ url('/') }}/preguntas" class="nav-link">
                                            <span data-v-5fddf304="" class="Type-something">¿Tienes dudas?</span>
                                        </a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                    <li data-v-5fddf304="" class="nav-item">
                                        <a data-v-5fddf304="" href="{{ url('tarifas') }}" class="nav-link">
                                            <span data-v-5fddf304="" class="Type-something">Tarifas</span>
                                        </a>

                                    </li>
                                    <li data-v-5fddf304="" class="nav-item">
                                        <a data-v-5fddf304="" href="{{ url('/') }}/contacto" class="nav-link">
                                            <span data-v-5fddf304="" class="Type-something">Contacto</span>
                                        </a>
                                        <div data-v-5fddf304="" class=""></div>
                                    </li>
                                </ul>

                                @include('front.loginButtons')
                            </div>
                        </div>
                    </nav>
                    <div data-v-c7d18d50="" data-v-effc9f78="" class="container About">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title"></div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text"></div>
                            </div>
                        </div>
                    </div> @include('followus')
                </div>



                <div data-v-9cc878a2="" data-v-63cd6604="" class="pt-5" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center container pt-5">
                        @if($claim->status<>12)
                            {{-- Inicio Apud Acta --}}
                            @if($claim->user_id)
                                @if($claim->client->apud_acta==NULL)
                                    <x-adminlte-alert theme="warning">
                                        <p>No existe apud acta en cliente, descarga las
                                            <a href="/docs/Instrucciones_apud_acta_electronico.pdf" target="_blank"> instrucciones para generar el apud acta.</a>
                                        </p>
                                        <form action="{{url('uploadApudActa')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$claim->id}}">
                                            <input type="file" style="display: none;" id="apud-{{$claim->id}}" name="file">
                                            <label for="apud-{{$claim->id}}" class="btn btn-light-descubre mx-1 shadow" title="Subir Apud acta" style="margin: 0">
                                                Subir Apud Acta
                                            </label>
                                        </form>
                                    </x-adminlte-alert>
                                @endif
                            @else
                                @if($claim->representant->apud_acta==NULL)
                                    <x-adminlte-alert theme="warning">
                                        <p>No existe apud acta en representado, descarga las
                                            <a href="/docs/Instrucciones_apud_acta_electronico.pdf" target="_blank"> instrucciones para generar el apud acta.</a>
                                        </p>
                                        <form action="{{url('uploadApudActa')}}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$claim->id}}">
                                            <input type="file" style="display: none;" id="apud-{{$claim->id}}" name="file">
                                            <label for="apud-{{$claim->id}}" class="btn btn-light-descubre mx-1 shadow" title="Subir Apud acta" style="margin: 0">
                                                Subir Apud Acta
                                            </label>
                                        </form>
                                    </x-adminlte-alert>
                                @endif
                            @endif
                            {{-- Fin Apud Acta --}}
                        @endif


                        <div data-v-9cc878a2="" class="text-tarifa pt-5">
                                <p>{{$titulo}}</p>
                        </div>

                        <div class="container text-center bottom-text pt-5 pb-5">
                                <p>{{$msg}}</p>
                        </div>

                        @if($claim->getIdHito()==30037)
                            {{--<div class="row text-center">
                                <div class="col-sm-12">
                                    <x-adminlte-alert theme="warning">
                                        {{ $claim->getHito() }}
                                        <div class="text-center">--}}
                                            <x-adminlte-button label="Continuar con la reclamación" data-toggle="modal" data-target="#modalContinue" theme="success"/>
                                                <x-adminlte-modal id="modalContinue" title="¿Desea continuar con la reclamación {{$claim->id}}?" size="lg" v-centered="true">
                                                    <p>La reclamación <strong>{{$claim->id}}</strong> del usuario <strong>{{ $claim->debtor->name }}</strong> continuara a la fase judicial</p>
                                                    <x-slot name="footerSlot">
                                                        <a href="{{url('claims/continue',$claim->id)}}" class="btn btn-md btn-success" class="mr-auto" theme="success">Aceptar</a>
                                                        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
                                                    </x-slot>
                                                </x-adminlte-modal>
                                {{--        </div>
                                    </x-adminlte-alert>
                                </div>
                            </div>--}}

                            <div>
                                <br>
                            </div>
                        @endif





                    </div>
                </div>
            </div>

            @if($claim->status <>12 && !$claim->gestor_id)
                <div data-v-9cc878a2="" data-v-63cd6604="" class="container" data-v-effc9f78="" style="width: 100%;">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="content">
                                <!--<div class="center"><img src="{{url('landing')}}/assets/grafico-logo-positivo.png" class="graficologopositivo"></div>-->
                            </div>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="background-color: #e65927; text-align: center; color: #fff">Tipo de procedimiento</th>
                                        <th style="background-color: #e65927; text-align: center; color: #fff">Importe</th>
                                        <th style="background-color: #e65927; text-align: center; color: #fff">Descuento</th>
                                        <th style="background-color: #e65927; text-align: center; color: #fff">IVA</th>
                                        <th style="background-color: #e65927; text-align: center; color: #fff">Total linea</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($conceptos as $key => $concepto)
                                        <tr>
                                            <td style="color:#285ba3">{{$concepto}}</td>
                                            <!--<td rowspan="5"
                                                style="text-align: center; vertical-align: middle; color:#285ba3">15%</td>-->
                                            <td style="text-align: right;color:#285ba3;">{{number_format($importes[$key],2,',','.')}} €</td>
                                            <td style="text-align: right;color:#285ba3;">{{number_format($descuentos[$key],0)}} %</td>
                                            <td style="text-align: right;color:#285ba3;">{{ $ivas[$key]=='IVA0'?0:21 }} %</td>
                                            <td style="text-align: right;color:#285ba3;">{{number_format($totales[$key],2,',','.')}} €</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th colspan="3"></th>
                                        <th style="text-align: right;color:#285ba3;">Subtotal</th>
                                        <th style="text-align: right;color:#285ba3;">{{ number_format(($invoice[0]->bas1fac+ $invoice[0]->bas2fac+$invoice[0]->bas3fac+$invoice[0]->bas4fac),2,',','.') }} €</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th style="text-align: right;color:#285ba3;">Iva</th>
                                        <th style="text-align: right;color:#285ba3;">{{ number_format(($invoice[0]->iiva1fac+ $invoice[0]->iiva2fac+$invoice[0]->iiva3fac),2,',','.') }} €</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th style="text-align: right;color:#285ba3;">Total</th>
                                        <th style="text-align: right;color:#285ba3;">{{ number_format(($invoice[0]->totfac),2,',','.') }} €</th>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-3">
                                    <a data-v-9cc878a2="" href="/claims/payment/<?php echo $id?>" aria-current="page"
                                        class="btn btn-light-descubre" type="button">Proceder al pago de {{ number_format(($invoice[0]->totfac),2,',','.') }} €</a>
                                        <br>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="row"><p></p></div>
                        </div>
                    </div>
                </div>
            @endif

            @include('footer-slim')

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
    <script>

    $('[name="file"]').change(function (e) {
            e.preventDefault();

            if (confirm("¿Desea subir el archivo seleccionado?") == true) {
                $(this).parent().submit();
            }

        });

    </script>
    @yield('extrajs')

</body>

</html>
