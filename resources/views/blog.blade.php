<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="UETvHgU9M9ghKF4FaRP6CQx9K6YSEpZ1s0rZMz1a">

    <meta name="robots" content="index, follow" />
    <title>Dividae - Novedades y actualidad para PYMES y AUTÓNOMOS</title>
    <meta name="description" content="A través del blog de Dividae podrás estar al día de todas las novedades del sector dirigido a PYMES y autónomos con facturas impagadas."/>

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

                            @foreach($blogs as $blog)

                                <div data-v-9cc878a2="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 OPFrecuente">
                                    <div class="card mb-12 rounded-3" style="width: 17rem; height: 33rem;">
                                        <img class="card-img-top" src="{{url('storage/'.$blog->image_post)}}" alt="image" >
                                        <span data-v-9cc878a2="" class="my-0 fw-normal text-t1">
                                            <br>
                                            <small>{{ \Illuminate\Support\Str::limit($blog->title,27, $end='...')}}</small>
                                        </span>
                                        <div class="card-body">
                                            <p class="card-text">{!! \Illuminate\Support\Str::limit($blog->extract,150, $end='...')!!}</p>
                                        </div>
                                        <div>
                                            <a href="{{ url('blog/'.$blog->slug)}}" class="btn btn-primary">Leer más</a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div>{{ $blogs->links() }}</div>
                    </div>
                </div>
                @include('footer')
            </div>
        </main>
    </div>

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
