<style>
b {
  color: #e65927;
}
</style>
@if (!isset($nofooter))
  @isset ($contact)
    <div data-v-18ec2fe4="" data-v-c7d18d50="" class="blockContacto" data-v-effc9f78=""><div data-v-18ec2fe4="" class="container mt-5 Contacto"><div data-v-18ec2fe4="" class="row"><div data-v-18ec2fe4="" class="col my-5"><div data-v-18ec2fe4="" class="Contacto-title">
                      Contáctanos, llámanos o escríbenos
                  </div> <div data-v-18ec2fe4="" class="row my-4"><div data-v-18ec2fe4="" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-phone.png" class="img-fluid mr-1"> +34 654 321 345
                      </div> <div data-v-18ec2fe4="" class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-email.png" class="img-fluid mr-1"> contacto@dividae.com
                      </div></div> <div data-v-18ec2fe4=""><span data-v-18ec2fe4=""><a data-v-18ec2fe4="" href="{{url('/')}}/contacto" class="btn Contacto-btn">
                              Contacto
                              <img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-down ml-4 img-fluid"></a></span></div></div> <div data-v-18ec2fe4="" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 my-5"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/grafico-ilustraciones-contacto.png" class="img-fluid"></div></div></div></div>

  @else
  <div data-v-837e15c2="" data-v-cfd2b624="" class="block-CheckClaim" data-v-effc9f78=""><div data-v-837e15c2="" class="container CheckClaim"><div data-v-837e15c2="" class="row"><div data-v-837e15c2="" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12"><div data-v-837e15c2="" class="CheckClaim-title">
                      ¿Quieres saber si tu reclamación es viable?
                  </div> <div data-v-837e15c2="" class="CheckClaim-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et.
                  </div> <div data-v-837e15c2="">

                    @isset ($modal)
                      <a data-v-837e15c2=""
                      data-toggle="modal" href="#consulta-viabilidad"
                      class="CheckClaim-btn btn">Comprobar deuda <img data-v-837e15c2="" src="{{url('landing')}}/assets/icons-arrow-right-white.png" class="img-fluid"></a>
                    @else
                      <a data-v-837e15c2="" href="{{url('/')}}" class="CheckClaim-btn btn">Comprobar deuda <img data-v-837e15c2="" src="{{url('landing')}}/assets/icons-arrow-right-white.png" class="img-fluid"></a>
                    @endisset


                  </div></div> <div data-v-837e15c2="" class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 my-5"><img data-v-837e15c2="" src="{{url('landing')}}/assets/grafico-ilustraciones-simulador.png" class="img-fluid"></div></div></div></div>
  @endisset
@endif

                <footer data-v-a242bae8="" data-v-effc9f78=""><div data-v-a242bae8="" class="container pb-5"><div data-v-a242bae8="" class="row row-cols-2 footer-content"><div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a data-v-a242bae8="" href="{{url('/')}}/" class="align-items-center mb-3 link-dark"><p data-v-a242bae8=""><img data-v-a242bae8="" src="{{url('landing')}}/assets/grafico-logo-negativo.png" class="graficologonegativo"></p></a> <p data-v-a242bae8="" class=" footer-text">
                  <b>Dividae</b> es una plataforma 100% digital que surge para dar una solución a la recuperación de facturas impagadas de forma <b>sencilla, exitosa y económica. </b>
                </p></div> <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><h5 data-v-a242bae8="" class="footer-title "> Sobre nosotros</h5> <ul data-v-a242bae8="" class="nav flex-column"><li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/" class="nav-link p-0 footer-text router-link-active">Inicio</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/quienes_somos" class="nav-link p-0 footer-text">¿Quiénes somos?</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/preguntas" class="nav-link p-0 footer-text">Preguntas frecuentes</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="nav-link p-0 footer-text router-link-exact-active router-link-active">Contacto</a></li></ul></div>

<div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
  <h5 data-v-a242bae8="" class="footer-title">Legal</h5>
  <ul data-v-a242bae8="" class="nav flex-column">
      <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="javascript:;" data-target="#terminos" data-toggle="modal" class="nav-link p-0 footer-text">Términos y Condiciones</a></li>
      <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="javascript:;" data-target="#contratacion" data-toggle="modal" class="nav-link p-0 footer-text">Condiciones de Contratación</a></li>
  </ul>
</div>

<div class="modal fade" id="terminos" style="max-width: 100%;">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    
    <div class="modal-header" style="color: #111">Términos y Condiciones</div>
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
    
    <div class="modal-header" style="color: #111">Condiciones de Contratación</div>
    <div class="modal-body">
      @include('terminos-contratacion')
    </div>
    {{-- <div class="modal-footer"></div> --}}
  </div>
</div>
</div>

                <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><h5 data-v-a242bae8="" class="footer-title ">Contacto</h5> <ul data-v-a242bae8="" class="nav flex-column"><li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#" class="nav-link p-0 footer-text"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icons-phone-white.png" class="img-fluid"> +34 654 321 345
                        </a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#" class="nav-link p-0 footer-text"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icons-email-white.png" class="img-fluid"> contacto@recovery.com
                        </a></li></ul></div></div> <div data-v-a242bae8="" class="row row-cols-2 justify-content-start border-top pt-4"><div data-v-a242bae8="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 copyright-text">
                    © Dividae 2022 . All Rights Reserved.
                </div> <div data-v-a242bae8="" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 icons-social d-flex justify-content-end"><a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-whatsapp.png" class="img-fluid s-icon"></a> <a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-instagram.png" class="img-fluid"></a></div></div></div></footer>