<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vQquIOeFCyXeIRVqPhnUsIPBw3b13PWS9mA9pMmF">


    <title>Dividae | Inicia gratis tu reclamación</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{url('landing')}}/plugins/owl/owl.carousel.min.css">

    <link href="{{url('landing')}}/app.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    {{-- Configured Stylesheets --}}
    @include('adminlte::plugins', ['type' => 'css'])

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="{{url('landing')}}/plugins/owl/owl.theme.default.min.css">

  {{-- @foreach(config('adminlte.plugins') as $pluginName => $plugin)
      @if($plugin['active'] || View::getSection('plugins.' . ($plugin['name'] ?? $pluginName)))
          @foreach($plugin['files'] as $file)

              @php
                  if (! empty($file['asset'])) {
                      $file['location'] = asset($file['location']);
                  }
              @endphp

              @if($file['type'] == 'css')
                  <link rel="stylesheet" href="{{ $file['location'] }}">
              @endif

          @endforeach
      @endif
  @endforeach --}}
@include('styles2')

<style>
.navbar-dark {
  background-color: #e65927;
}
#form-p {
    margin: 0 !important;
}
.formulario-reclamacion {
    padding-top: 16px !important;
}
</style>

<body>

    <div id="app"><main>
      <div data-v-effc9f78="" data-v-63cd6604=""><div data-v-66372912="" data-v-63cd6604="" data-v-effc9f78="">

        {{-- <div data-v-66372912="" class="block-CMO-FUNCIONA"><a data-v-66372912="" href="#como-funciona" class="CMO-FUNCIONA">NUESTRA FILOSOFÍA <img data-v-66372912="" src="{{url('landing')}}/assets/icons-arrow-down-white.png" class="iconsarrow-down img-fluid"></a></div> --}}

        <nav data-v-5fddf304="" data-v-66372912="" class="navbar navbar-expand-lg navbar-dark"><div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="{{url('/')}}" aria-current="page" class="navbar-brand router-link-exact-active router-link-active" style=""><div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304="" src="{{url('landing')}}/assets/grafico-logo-negativo.png" class="graficologonegativo"></div></a> <a data-v-5fddf304="" href="{{url('/')}}" aria-current="page" class="navbar-brand router-link-exact-active router-link-active" style="display: none;"><div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304="" src="{{url('landing')}}/assets/grafico-logo-negativo.png" class="graficologonegativo"></div></a>

            <button data-v-5fddf304="" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse1" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">

            <span data-v-5fddf304="" class="navbar-toggler-icon"></span></button>

            <div data-v-5fddf304="" id="navbarCollapse1" class="collapse navbar-collapse">

                <ul data-v-5fddf304="" class="navbar-nav">

                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('testimonios')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Testimonios
                        </span></a> <div data-v-5fddf304="" class=""></div></li>

                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('quienes-somos')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            ¿Quiénes somos?
                        </span></a> <div data-v-5fddf304="" class=""></div></li>
                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('preguntas')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            ¿Tienes dudas?
                        </span></a> <div data-v-5fddf304="" class=""></div></li>
                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('tarifas')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Tarifas
                        </span></a> <div data-v-5fddf304="" class=""></div></li>
                    <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('contacto')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Contacto
                        </span></a> <div data-v-5fddf304="" class=""></div></li></ul>

                        @include('front.loginButtons')

                            <!----></div></div></nav>

            </div>

                            @yield('extra_header')



                            <div id="title-container" class="container"><div style="margin-top:50px"></div>
                                @yield('content_header')
                            </div>

                                <div data-v-43503c2a="" data-v-63cd6604="" class="blockBackoffice" data-v-effc9f78=""><div data-v-43503c2a="" class="container">

                                	<div data-v-43503c2a="" class="text-center RText">


                                		@yield('content')

        </div> </div></div>





        @include('footer', ['modal' => false, 'nofooter' => true])


                            </div></main></div>
    <!-- Scripts -->

    <!-- <script src="{{url('landing')}}/app.js" defer=""></script> -->

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script src="{{url('landing')}}/plugins/owl/js/owl.carousel.js"></script>
    <script src="{{url('landing')}}/plugins/owl/js/owl.navigation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	@include('adminlte::plugins', ['type' => 'js'])

	<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>


    @stack('js')
    @yield('js')

    @yield('extrajs')



</body></html>
