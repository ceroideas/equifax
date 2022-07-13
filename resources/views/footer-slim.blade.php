<style>
    b {
        color: #e65927;
    }
</style>


<footer data-v-a242bae8="" data-v-effc9f78="">
    <div data-v-a242bae8="" class="container pb-5">
        <div data-v-a242bae8="" class="row row-cols-2 footer-content">
            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a data-v-a242bae8=""
                    href="{{ url('/') }}/" class="align-items-center mb-3 link-dark">
                    <p data-v-a242bae8=""><img data-v-a242bae8=""
                            src="{{ url('landing') }}/assets/grafico-logo-negativo.png" class="graficologonegativo"></p>
                </a>
                <p data-v-a242bae8="" class=" footer-text">
                    <b>Dividae</b> es una plataforma 100% digital que surge para dar una solución a la recuperación de
                    facturas impagadas de forma <b>sencilla, exitosa y económica. </b>
                </p>
            </div>
            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <h5 data-v-a242bae8="" class="footer-title "> Sobre nosotros</h5>
                <ul data-v-a242bae8="" class="nav flex-column">
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{ url('/') }}/"
                            class="nav-link p-0 footer-text router-link-active">Inicio</a></li>
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8=""
                            href="{{ url('/') }}/quienes-somos" class="nav-link p-0 footer-text">¿Quiénes
                            somos?</a></li>
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8=""
                            href="{{ url('/') }}/preguntas" class="nav-link p-0 footer-text">Preguntas
                            frecuentes</a></li>
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8=""
                            href="{{ url('/') }}/contacto" aria-current="page"
                            class="nav-link p-0 footer-text router-link-exact-active router-link-active">Contacto</a>
                    </li>
                </ul>
            </div>

            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <h5 data-v-a242bae8="" class="footer-title">Legal</h5>
                <ul data-v-a242bae8="" class="nav flex-column">
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="javascript:;"
                            data-target="#terminos" data-toggle="modal" class="nav-link p-0 footer-text">Términos y
                            Condiciones</a></li>
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="javascript:;"
                            data-target="#contratacion" data-toggle="modal" class="nav-link p-0 footer-text">Condiciones
                            de Contratación</a></li>
                </ul>
            </div>

            <div class="modal fade" id="terminos" style="max-width: 100%;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header" style="color: #111"></div>
                        <div class="modal-body">
                            @include('terminos-condiciones')
                        </div>
                        {{-- <div class="modal-footer"></div> --}}
                    </div>
                </div>
            </div>

            <div class="modal fade" id="contratacion" style="max-width: 100%;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header" style="color: #111"></div>
                        <div class="modal-body">
                            @include('terminos-contratacion')
                        </div>
                        {{-- <div class="modal-footer"></div> --}}
                    </div>
                </div>
            </div>

            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <h5 data-v-a242bae8="" class="footer-title ">Contacto</h5>
                <ul data-v-a242bae8="" class="nav flex-column">
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#"
                            class="nav-link p-0 footer-text"><img data-v-a242bae8=""
                                src="{{ url('landing') }}/assets/icons-phone-white.png" class="img-fluid"> <a href="tel:+34680933286">+34 680933286</a>
                        </a></li>
                    <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#"
                            class="nav-link p-0 footer-text"><img data-v-a242bae8=""
                                src="{{ url('landing') }}/assets/icons-email-white.png" class="img-fluid">
                                <a href="mailto:info@dividae.com">info@dividae.com</a>
                        </a></li>
                </ul>
            </div>
        </div>
        <div data-v-a242bae8="" class="row row-cols-2 justify-content-start border-top pt-4">
            <div data-v-a242bae8="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 copyright-text">
                © Dividae 2022 . All Rights Reserved.
            </div>

            <div data-v-a242bae8=""
                class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 icons-social d-flex justify-content-end">

                <a data-v-a242bae8="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page"
                    class="router-link-exact-active router-link-active"><img data-v-a242bae8=""
                        src="{{ url('landing') }}/assets/linkedin.png" class="img-fluid"></a>

                {{-- <a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-whatsapp.png" class="img-fluid s-icon"></a>

                  <a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-instagram.png" class="img-fluid"></a> --}}

            </div>
        </div>
    </div>
</footer>
