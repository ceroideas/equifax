	<style>
        .navbar{
            text-align: right !important;
            /*position: fixed;*/
            /*width:100%;*/
            z-index: 1;
            }
    </style>

<nav data-v-5fddf304="" data-v-66372912="" class="navbar navbar-expand-lg navbar-dark">
    <div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="{{ url('/') }}"
            aria-current="page" class="navbar-brand router-link-exact-active router-link-active"
            style="">
            <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                    src="{{ url('landing') }}/assets/grafico-logo-negativo.png"
                    class="graficologonegativo" alt="Logotipo Dividae"></div>
        </a> <a data-v-5fddf304="" href="{{ url('/') }}" aria-current="page"
            class="navbar-brand router-link-exact-active router-link-active" style="display: none;">
            <div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304=""
                    src="{{ url('landing') }}/assets/grafico-logo-negativo.png"
                    class="graficologonegativo" alt="Logotipo Dividae"></div>
        </a>

        <button data-v-5fddf304="" type="button" data-toggle="collapse"
            data-target="#navbarCollapse1" aria-controls="navbarCollapse1" aria-expanded="false"
            aria-label="Toggle navigation" class="navbar-toggler">

            <span data-v-5fddf304="" class="navbar-toggler-icon"></span></button>

        <div data-v-5fddf304="" id="navbarCollapse1" class="collapse navbar-collapse">

            <ul data-v-5fddf304="" class="navbar-nav">

                {{-- <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                    href="{{ url('quienes-somos') }}" class="nav-link"><span data-v-5fddf304=""
                        class="Type-something">
                        ¿Quiénes somos?
                    </span></a>
                    <div data-v-5fddf304="" class=""></div>
                </li> --}}

{{--                 <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                        href="{{ url('testimonios') }}" class="nav-link"><span data-v-5fddf304=""
                            class="Type-something">
                            Testimonios
                        </span></a>
                    <div data-v-5fddf304="" class=""></div>
                </li> --}}

                {{-- <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304=""
                        href="{{ url('preguntas') }}" class="nav-link"><span data-v-5fddf304=""
                            class="Type-something">
                            ¿Tienes dudas?
                        </span></a>
                    <div data-v-5fddf304="" class=""></div>
                </li> --}}
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
                        href="{{ url('contacto') }}" class="nav-link"><span data-v-5fddf304=""
                            class="Type-something">
                            Contacto
                        </span></a>
                    <div data-v-5fddf304="" class=""></div>
                </li>
            </ul>
            @include('front.loginButtons')
        </div>
    </div>
</nav>

