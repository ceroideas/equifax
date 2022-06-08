<style>
b {
  color: #e65927;
}
</style>
@if (!isset($nofooter))
  @isset ($contact)
    <div data-v-18ec2fe4="" data-v-c7d18d50="" class="blockContacto" data-v-effc9f78=""><div data-v-18ec2fe4="" class="container mt-5 Contacto"><div data-v-18ec2fe4="" class="row"><div data-v-18ec2fe4="" class="col my-5"><div data-v-18ec2fe4="" class="Contacto-title">
                      Contáctanos, llámanos o escríbenos
                  </div> <div data-v-18ec2fe4="" class="row my-4"><div data-v-18ec2fe4="" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-phone.png" class="img-fluid mr-1"> +34 680 933 286
                      </div> <div data-v-18ec2fe4="" class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-email.png" class="img-fluid mr-1"> info@dividae.com
                      </div></div> <div data-v-18ec2fe4=""><span data-v-18ec2fe4=""><a data-v-18ec2fe4="" href="{{url('/')}}/contacto" class="btn Contacto-btn">
                              Contacto
                              <img data-v-18ec2fe4="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-down ml-4 img-fluid"></a></span></div></div> <div data-v-18ec2fe4="" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 my-5"><img data-v-18ec2fe4="" src="{{url('landing')}}/assets/grafico-ilustraciones-contacto.png" class="img-fluid"></div></div></div></div>

  @else
  <div data-v-837e15c2="" data-v-cfd2b624="" class="block-CheckClaim" data-v-effc9f78=""><div data-v-837e15c2="" class="container CheckClaim"><div data-v-837e15c2="" class="row"><div data-v-837e15c2="" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12"><div data-v-837e15c2="" class="CheckClaim-title">
                      ¿Quieres saber si tu reclamación es viable?
                  </div>



                    <div data-v-837e15c2="">

                    {{-- @isset ($modal) --}}
                      <a data-v-837e15c2=""
                      data-toggle="modal" href="#consulta-viabilidad"
                      class="CheckClaim-btn btn">Comprobar deuda <img data-v-837e15c2="" src="{{url('landing')}}/assets/icons-arrow-right-white.png" class="img-fluid"></a>
                    {{-- @else
                      <a data-v-837e15c2="" href="{{url('/')}}" class="CheckClaim-btn btn">Comprobar deuda <img data-v-837e15c2="" src="{{url('landing')}}/assets/icons-arrow-right-white.png" class="img-fluid"></a>
                    @endisset --}}


                  </div></div> <div data-v-837e15c2="" class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 my-5"><img data-v-837e15c2="" src="{{url('landing')}}/assets/grafico-ilustraciones-simulador.png" class="img-fluid"></div></div></div></div>
  @endisset
@endif

                <footer data-v-a242bae8="" data-v-effc9f78=""><div data-v-a242bae8="" class="container pb-5"><div data-v-a242bae8="" class="row row-cols-2 footer-content"><div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a data-v-a242bae8="" href="{{url('/')}}/" class="align-items-center mb-3 link-dark"><p data-v-a242bae8=""><img data-v-a242bae8="" src="{{url('landing')}}/assets/grafico-logo-negativo.png" class="graficologonegativo"></p></a> <p data-v-a242bae8="" class=" footer-text">
                  <b>Dividae</b> es una plataforma 100% digital que surge para dar una solución a la recuperación de facturas impagadas de forma <b>sencilla, exitosa y económica. </b>
                </p></div> <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><h5 data-v-a242bae8="" class="footer-title "> Sobre nosotros</h5> <ul data-v-a242bae8="" class="nav flex-column"><li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/" class="nav-link p-0 footer-text router-link-active">Inicio</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/quienes-somos" class="nav-link p-0 footer-text">¿Quiénes somos?</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/preguntas" class="nav-link p-0 footer-text">Preguntas frecuentes</a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="nav-link p-0 footer-text router-link-exact-active router-link-active">Contacto</a></li></ul></div>

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

                <div data-v-a242bae8="" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><h5 data-v-a242bae8="" class="footer-title ">Contacto</h5> <ul data-v-a242bae8="" class="nav flex-column"><li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#" class="nav-link p-0 footer-text"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icons-phone-white.png" class="img-fluid"> +34 680 933 286
                        </a></li> <li data-v-a242bae8="" class="nav-item mb-2"><a data-v-a242bae8="" href="#" class="nav-link p-0 footer-text"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icons-email-white.png" class="img-fluid"> info@dividae.com
                        </a></li></ul></div></div> <div data-v-a242bae8="" class="row row-cols-2 justify-content-start border-top pt-4"><div data-v-a242bae8="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 copyright-text">
                    © Dividae 2022 . All Rights Reserved.
                </div>

                <div data-v-a242bae8="" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 icons-social d-flex justify-content-end">

                  <a data-v-a242bae8="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/linkedin.png" class="img-fluid"></a>

                  {{-- <a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-whatsapp.png" class="img-fluid s-icon"></a>

                  <a data-v-a242bae8="" href="{{url('/')}}/contacto" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-a242bae8="" src="{{url('landing')}}/assets/icon-instagram.png" class="img-fluid"></a> --}}

                </div></div></div></footer>


<div class="modal fade" id="consulta-viabilidad">
    <div class="modal-dialog">

      <div class="modal-content">

        <div data-v-66372912="" id="form-p"><div data-v-e8aafb5e="" data-v-66372912=""><form data-v-e8aafb5e="" class="formulario-reclamacion"><!----> <div data-v-e8aafb5e="" class="reclamacion-title">
              Consulte si es viable su reclamación
          </div> <hr data-v-e8aafb5e="" class="Line-Copy"> <div data-v-e8aafb5e="" class="row mb-4"><div data-v-e8aafb5e="" class="col-12 RangoDeuda"><div data-v-e8aafb5e="" class="form-outline my-2"><div data-v-e8aafb5e="" class="form-group"><label data-v-e8aafb5e="" for="customRange1" class="form-label range-label">
                              El importe de tu deuda asciende a…
                          </label> <span data-v-e8aafb5e="" class="importe-range1">
                              0 €
                          </span> <input data-v-e8aafb5e="" required type="range" min="0" max="100000" value="0" id="rangeDeuda"> <div data-v-e8aafb5e=""><small data-v-e8aafb5e="" class="small-text">0€</small> <small data-v-e8aafb5e="" class="small-text d-right">100.000€</small></div> <!----></div></div></div> <div data-v-e8aafb5e="" class="col-12 my-1 RangoImporte"><div data-v-e8aafb5e="" class="form-outline"><div data-v-e8aafb5e="" class="form-group"><label data-v-e8aafb5e="" for="customRange2" class="form-label range-label">
                              La antiguedad de tu deuda es…
                          </label> <span data-v-e8aafb5e="" class="importe-range1">
                              0-30 días
                          </span> <input data-v-e8aafb5e="" type="range" min="0" max="4" value="0" step="1" id="rangeDeuda" class="rangeDeuda1"> <div data-v-e8aafb5e=""><small data-v-e8aafb5e="" class="small-text">0 - 30 días</small> <small data-v-e8aafb5e="" class="small-text d-right">+ 10 años</small></div></div></div></div> <div data-v-e8aafb5e="" class="col-12 mt-3"><div data-v-e8aafb5e="" class="form-outline"><div data-v-e8aafb5e="" class="form-group"><label data-v-e8aafb5e="" for="TipoAcreedor">
                              Eres… (tipo de acreedor)
                          </label> <div data-v-e8aafb5e="" class="row block-radio"><div data-v-e8aafb5e="" class="col-md-4 col-sm-4"><div data-v-e8aafb5e="" class="form-check radio-item"><input data-v-e8aafb5e="" type="radio" name="type" id="Persona física" class="form-check-input" value="Persona física"> <label data-v-e8aafb5e="" for="Persona física" class="form-check-label">Persona física</label></div></div><div data-v-e8aafb5e="" class="col-md-4 col-sm-4"><div data-v-e8aafb5e="" class="form-check radio-item"><input data-v-e8aafb5e="" type="radio" name="type" id="Persona jurídica" class="form-check-input" value="Persona jurídica"> <label data-v-e8aafb5e="" for="Persona jurídica" class="form-check-label">Persona jurídica</label></div></div><div data-v-e8aafb5e="" class="col-md-4 col-sm-4"><div data-v-e8aafb5e="" class="form-check radio-item"><input data-v-e8aafb5e="" type="radio" name="type" id="Autónomo" class="form-check-input" value="Autónomo" required> <label data-v-e8aafb5e="" for="Autónomo" class="form-check-label">Autónomo</label></div></div></div> <span data-v-e8aafb5e="" class=""></span> <span data-v-e8aafb5e="" class="invalid-feedback">El campo es requerido</span></div></div></div> <div data-v-e8aafb5e="" class="col-12 mt-3"><div data-v-e8aafb5e="" class="form-outline"><div data-v-e8aafb5e="" class="form-group"><label data-v-e8aafb5e="" for="TipoDocumento">
                              ¿Dispones del documento que soporta la deuda?
                          </label> <div data-v-e8aafb5e="" class="row block-radio"><div data-v-e8aafb5e="" class="col disponibilidad-radio"><div data-v-e8aafb5e="" class="form-check form-check-inline radio-item"><input data-v-e8aafb5e="" type="radio" id="Si" class="form-check-input" required name="document" value="Si"> <label data-v-e8aafb5e="" for="Si" class="form-check-label">Si</label></div><div data-v-e8aafb5e="" class="form-check form-check-inline radio-item"><input data-v-e8aafb5e="" type="radio" id="No" class="form-check-input" required name="document" value="No"> <label data-v-e8aafb5e="" for="No" class="form-check-label">No</label></div> <span data-v-e8aafb5e="" class=""></span> <span data-v-e8aafb5e="" class="invalid-feedback">El campo es requerido</span></div> <div data-v-e8aafb5e="" class="col select-documento"><!----></div></div></div></div></div></div> <hr data-v-e8aafb5e="" class="Line-Copy"> <div data-v-e8aafb5e="" class="text-center"><button data-v-e8aafb5e="" class="btn btn-form-deuda">COMPROBAR DEUDA</button></div></form> <div data-v-e8aafb5e="" class="modal-vue"><!----> <!----></div></div></div>
      </div>

    </div>
  </div>

  <div data-v-e8aafb5e="" class="modal-vue modal fade" id="reclamacion-viable">

    <div data-v-e8aafb5e="" role="document" class="modal-dialog"><div data-v-e8aafb5e="" class="modal-content"><div data-v-e8aafb5e="" class="modal-header"><button data-v-e8aafb5e="" type="button" data-dismiss="modal" aria-label="Close" class="close"><span data-v-e8aafb5e="" aria-hidden="true">×</span></button></div> <div data-v-e8aafb5e="" class="modal-body"><div data-v-e8aafb5e="" class="modal-img text-center"><img data-v-e8aafb5e="" src="{{url('landing/assets/grafico-ilustraciones-simulador-exito.png')}}" class="img-fluid"></div> <!----> <div data-v-e8aafb5e="" class="modal-text-info text-center">
                            Su reclamación es viable <a data-v-e8aafb5e=""><img data-v-e8aafb5e="" src="{{url('landing/assets/icons-info-line.png')}}" class="img-fluid"></a></div> <div data-v-e8aafb5e="" class="modal-text text-center">
                            ¡Registre su reclamación para que nuestros abogados comiencen a trabajar!
                        </div></div>

                        @if (!Auth::check())
                        <div data-v-e8aafb5e="" class="modal-footer"><a data-v-e8aafb5e="" href="{{url('register')}}" class="btn btn-modal"><span data-v-e8aafb5e="" class="footer-text">¡Regístrate y recupera tu deuda!</span></a></div>
                        @else
                        <div data-v-e8aafb5e="" class="modal-footer"><a data-v-e8aafb5e="" href="{{url('claims/select-client')}}" class="btn btn-modal"><span data-v-e8aafb5e="" class="footer-text">NUEVA RECLAMACIÓN</span></a></div>
                        @endif

                      </div></div></div>

  @section('extrajs')

  <script>
    $('#rangeDeuda').on('input',function(event) {
        /* Act on the event */
        console.log($(this).val())
        $('.importe-range1:first').text($(this).val()+' €')
      });

      $('.rangeDeuda1').on('input',function(event) {
        let text = "0-30 días"
        let val = $(this).val();
        switch (val)
        {
          case "1":
            text = '1-3 años';
            break;
          case "2":
            text = '4-6 años';
            break;
          case "3":
            text = '7-9 años';
            break;
          case "4":
            text = '+10 años';
            break;
          default:
            text = '0-30 días'
        }
        console.log(val,typeof val,text)
        $('.importe-range1:last').text(text)
      });

      $('.formulario-reclamacion').on('submit',function(e){
        e.preventDefault();

        $('#consulta-viabilidad').modal('hide')

        setTimeout(()=>{
          $('#reclamacion-viable').modal('show')
        },200)
      })
  </script>

  @stop
