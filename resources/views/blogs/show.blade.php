<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="UETvHgU9M9ghKF4FaRP6CQx9K6YSEpZ1s0rZMz1a">


    <title>Dividae blog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('landing') }}/app_quental.css">

    @include('styles2')

    <style>

        .blog-title{
            font-family: Nordeco;
            font-size: 40px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #285ba3;
            padding-bottom: 3rem;
            text-align: center;
        }
        .blog-image{
            padding-bottom: 3rem;
            text-align: center;
        }

        .blog-body{
            padding-bottom: 3rem;
            text-align: justify;
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
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title">Blog</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text">

                                </div>
                            </div>
                        </div>
                    </div> {{-- @include('followus') --}}
                </div>


                <div class="container bottom-text">
                    <br>
                    @if (!isset($blog))
                        <p>No existe el artículo</p>
                    @else
                        <div class="blog-title">
                            {{$blog->title}}
                        </div>

                        <div class="blog-image">
                            <img src="{{URL::asset('storage/'.$blog->image_post)}}" alt="Imagen principal del post">
                        </div>

                        <div class="blog-body">
                            {!!$blog->body!!}
                        </div>

                        <div>
                            Publicado: {{$blog->created_at->format('d-m-Y')}}
                        </div>


                    @endif

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
