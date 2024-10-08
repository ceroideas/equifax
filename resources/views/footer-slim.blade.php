<style>
    b {
        color: #9E1B42;
    }
</style>


<footer data-v-a242bae8="" data-v-effc9f78="">
    <div data-v-a242bae8="" class="container pb-5">
        <div data-v-a242bae8="" class="row row-cols-2 footer-content">
            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a data-v-a242bae8=""
                    href="{{ url('/') }}/" class="align-items-center mb-3 link-dark">
                    <p data-v-a242bae8=""><img data-v-a242bae8=""
                            src="{{ url('landing') }}/assets/equifax-logo.png" class="graficologonegativo" alt="Logo Asnef"></p>
                </a>
                <p data-v-a242bae8="" class=" footer-text">
                    <b>Asnef empresas recupera</b> es una plataforma 100% digital que surge para dar una solución a la recuperación de
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
                    </div>
                </div>
            </div>
            <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <h5 data-v-a242bae8="" class="footer-title ">Contacto</h5>
                <ul data-v-a242bae8="" class="nav flex-column">
                    <li data-v-a242bae8="" class="nav-item mb-2">
                        <a data-v-a242bae8="" href="tel:913258610" class="nav-link p-0 footer-text">
                            <img data-v-a242bae8="" src="/landing/assets/icons-phone-white.png" class="img-fluid" alt="Icono telefono Dividae"> +34 913 258 610
                        </a>
                    </li>
                    <li data-v-a242bae8="" class="nav-item mb-2">
                        <a data-v-a242bae8="" href="mailto:info@dividae.com" class="nav-link p-0 footer-text">
                            <img data-v-a242bae8="" src="/landing/assets/icons-email-white.png" class="img-fluid" alt="Icono email Dividae"> info@dividae.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div data-v-a242bae8="" class="row row-cols-2 justify-content-start border-top pt-4">
            <div data-v-a242bae8="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 copyright-text">
                &copy; Dividae <?php echo date('Y'); ?>. All Rights Reserved.
            </div>

            <div data-v-a242bae8=""
                class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 icons-social d-flex justify-content-end">

                <a data-v-a242bae8="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page"
                    class="router-link-exact-active router-link-active"><img data-v-a242bae8=""
                        src="{{ url('landing') }}/assets/linkedin.png" class="img-fluid" alt="Icono Linkedin Dividae"></a>
            </div>
        </div>
    </div>
</footer>
