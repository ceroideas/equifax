<html lang="en">

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
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title">Blog</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text">

                                </div>
                            </div>
                        </div>
                    </div> @include('followus')
                </div>

                <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78="">
                    <div data-v-9cc878a2="" class="text-center card-tarifa container">
                        <div data-v-9cc878a2="" class="text-tarifa">Últimas entradas</div>
                        <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">

                            {{-- Card 1 --}}
                            <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div class="card mb-12 rounded-3" style="width: 17rem;">
                                    <img class="card-img-top" src="https://dividae.com/storage/uploads/blogs/S58S8KEV1LnvwozG5i9gjkClAIMiJm8cqzAormxJ.png" alt="Dividae en Radio Intereconomia" >
                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <br>
                                        <small>Dividae en Radio Intereconomía</small>
                                    </span>
                                    <div class="card-body">
                                    <p class="card-text">El pasado viernes 13, Daniel Jaume, Head of Sales and Business Development en el Grupo Atlante, realizó una entrevista para Radio Intereconomía.</p>
                                    <a href="https://dividae.com/blog/dividae-radio-intereconomia" class="btn btn-primary">Leer más</a>
                                    </div>
                                </div>
                            </div>

                            {{-- Card 2 --}}
                            {{--<div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div class="card mb-12 rounded-3" style="width: 17rem;">
                                    <img class="card-img-top" src="http://dividae.com/landing/assets/testimonio-1.png" alt="Card image cap">
                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <br>
                                        <small>Titulo</small>
                                    </span>
                                    <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Leer más</a>
                                    </div>
                                </div>
                            </div>--}}

                            {{-- Card 3 --}}
                            {{--<div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div class="card mb-12 rounded-3" style="width: 17rem;">
                                    <img class="card-img-top" src="http://127.0.0.1:8000/landing/assets/grafico-ilustraciones-simulador.png" alt="Card image cap">
                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <br>
                                        <small>Titulo</small>
                                    </span>
                                    <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Leer más</a>
                                    </div>
                                </div>
                            </div>--}}

                            {{-- Card 4 --}}
                            {{--<div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                <div class="card mb-12 rounded-3" style="width: 17rem;">
                                    <img class="card-img-top" src="http://dividae.com/landing/assets/testimonio-1.png" alt="Card image cap">
                                    <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                        <br>
                                        <small>Titulo</small>
                                    </span>
                                    <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Leer más</a>
                                    </div>
                                </div>
                            </div>--}}


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
