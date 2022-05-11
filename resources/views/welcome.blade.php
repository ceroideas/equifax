<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="vQquIOeFCyXeIRVqPhnUsIPBw3b13PWS9mA9pMmF">
    

    <title>Dividae</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{url('landing')}}/plugins/owl/owl.carousel.min.css">
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

    <!-- Styles -->
    <link href="{{url('landing')}}/app.css" rel="stylesheet">
<style>.modal-vue .fade-enter[data-v-e8aafb5e],
.modal-vue .fade-leave-to[data-v-e8aafb5e] {
  transform: translateX(10px);
  opacity: 0;
}
.modal-vue .fade-enter-active[data-v-e8aafb5e] {
  transition: all 0.3s ease;
}
.modal-vue .fade-leave-active[data-v-e8aafb5e] {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}
.modal-vue .modal-overlay[data-v-e8aafb5e] {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 1500;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
}
.modal-vue .modal-dialog[data-v-e8aafb5e] {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1600;
  width: 90%;
  margin: 0;
}
.modal-vue .modal-dialog .modal-content[data-v-e8aafb5e] {
  border-radius: 16px;
  box-shadow: 0 4px 8px 0 rgba(96, 97, 112, 0.16), 0 0 2px 0 rgba(40, 41, 61, 0.04);
}
.modal-vue .modal-dialog .modal-content .modal-body .dialog-text[data-v-e8aafb5e] {
  opacity: 0.8;
  border-radius: 4px;
  background-color: #051c2c;
  padding: 10px 16px;
}
.modal-vue .modal-dialog .modal-content .modal-body .dialog-text .info-text[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #fff;
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text[data-v-e8aafb5e] {
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 10px;
  font-family: CynthoNext;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.56;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text-info[data-v-e8aafb5e] {
  font-family: CynthoNext;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal[data-v-e8aafb5e] {
  height: 40px;
  border-radius: 37.5px;
  background-color: #e65927;
  margin-right: auto;
  margin-left: auto;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal .footer-text[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.formulario-reclamacion[data-v-e8aafb5e] {
  margin: 0 1px 0 0;
  padding: 32px 21px 0px 24px;
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
}
.formulario-reclamacion .reclamacion-title[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.formulario-reclamacion #rangeDeuda[data-v-e8aafb5e] {
  width: 100%;
  height: 1.5rem;
  padding: 0;
}
.formulario-reclamacion .range-label[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.formulario-reclamacion .importe-range1[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
  float: right;
}
.formulario-reclamacion .small-text[data-v-e8aafb5e] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
}
.formulario-reclamacion .d-right[data-v-e8aafb5e] {
  float: right;
  margin-top: 6px;
}
.formulario-reclamacion hr[data-v-e8aafb5e] {
  margin-left: -24px;
  margin-right: -21px;
}
.formulario-reclamacion .disponibilidad-radio[data-v-e8aafb5e] {
  margin-top: 5px;
  /* .radio-y {
      margin-right: 15px;
  } */
}
@media (min-width: 320px) and (max-width: 360px) {
.formulario-reclamacion .disponibilidad-radio[data-v-e8aafb5e] {
    text-align: center;
}
}
.formulario-reclamacion .select-documento[data-v-e8aafb5e] {
  display: flex;
  justify-content: flex-end;
  /* select {
      -webkit-appearance: none;
      -moz-appearance: none;
      -o-appearance: none;
      appearance: none;
  }

  .form-control {
      background-image: url("storageassets/ic-arrow-drop-down.png");
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      background-size: 20px 24px;
      margin-right: 50px;

      @media (min-width: 375px) and (max-width: 390px) {
          margin-right: 135px;
      }
  } */
}
@media (min-width: 320px) and (max-width: 360px) {
.formulario-reclamacion .select-documento[data-v-e8aafb5e] {
    display: initial;
}
}
.formulario-reclamacion .btn-form-deuda[data-v-e8aafb5e] {
  width: 280px;
  height: 48px;
  border-radius: 37.5px;
  background-color: #e65927;
  border-color: #e65927;
  margin-top: 12px;
  margin-bottom: 35px;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
@media (max-width: 320px) {
.formulario-reclamacion .btn-form-deuda[data-v-e8aafb5e] {
    width: auto !important;
}
}
.formulario-reclamacion .btn[data-v-e8aafb5e]:hover {
  background-color: #fff;
  border-color: #051c2c;
  color: #051c2c;
}</style><style>#social-sidebar[data-v-7b4478c1] {
  /* position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: 999999;
  margin-left: -170px; */
  left: -4%;
  position: fixed;
  top: 65%;
  z-index: 999999;
}
@media (min-width: 2000px) {
#social-sidebar[data-v-7b4478c1] {
    left: 22%;
}
}
@media (min-width: 1600px) and (max-width: 1900px) {
#social-sidebar[data-v-7b4478c1] {
    left: 12%;
}
}
@media (min-width: 1440px) and (max-width: 1590px) {
#social-sidebar[data-v-7b4478c1] {
    left: 2%;
}
}
@media (min-width: 1280px) and (max-width: 1400px) {
#social-sidebar[data-v-7b4478c1] {
    left: -4;
}
}
@media (min-width: 1024px) and (max-width: 1200px) {
#social-sidebar[data-v-7b4478c1] {
    left: -6%;
}
}
@media (min-width: 768px) and (max-width: 1000px) {
#social-sidebar[data-v-7b4478c1] {
    left: -8%;
}
}
@media (min-width: 430px) and (max-width: 750px) {
#social-sidebar[data-v-7b4478c1] {
    left: -15%;
}
}
@media (min-width: 375px) and (max-width: 425px) {
#social-sidebar[data-v-7b4478c1] {
    left: -18%;
}
}
@media (min-width: 320px) and (max-width: 370px) {
#social-sidebar[data-v-7b4478c1] {
    left: -21%;
}
}
#social-sidebar .follow-social[data-v-7b4478c1] {
  transform: rotate(-90deg);
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #3f607d;
  margin-top: 60px;
  list-style: none;
}
#social-sidebar .icons-social[data-v-7b4478c1] {
  width: 32px;
  height: 32px;
  border-radius: 10px;
  background-color: #2c60aa;
  margin-right: auto;
  margin-left: auto;
  margin-bottom: 15px;
  list-style: none;
}</style><style>img.graficologonegativo[data-v-5fddf304] {
  margin: 0 39px 0 0;
  -o-object-fit: contain;
     object-fit: contain;
}
.Type-something[data-v-5fddf304] {
  height: 17px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #e65927;
}
@media (max-width: 425px) {
.blockAcceso[data-v-5fddf304] {
    margin-bottom: 15px;
    margin-top: 15px;
}
}
.blockAcceso .btn-acceso[data-v-5fddf304] {
  height: 40px;
  margin-right: 16px;
  border-radius: 37.5px;
  border: solid 1px #e65927;
  color: #e65927;
}
.blockAcceso .btn-acceso .btn-text-acceso[data-v-5fddf304] {
  height: 17px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  top: 2px;
  position: relative;
}
.blockRegistro .btn-registerHome[data-v-5fddf304] {
  border-radius: 37.5px;
  background-color: #2c60aa;
}
.blockRegistro .btn-registerHome .text-register-btn[data-v-5fddf304] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.blockRegistro .btn-registerHome img.iconsarrow-right[data-v-5fddf304] {
  margin: 0 0 0 27.2px;
  -o-object-fit: contain;
     object-fit: contain;
}
.areaCliente[data-v-5fddf304] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.logout[data-v-5fddf304] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.hidden[data-v-5fddf304] {
  display: none;
}
.scroll-header[data-v-5fddf304] {
  background-color: #fff !important;
  border-bottom: 1px solid #E9E6E6;
  position: fixed;
  width: 100%;
  /* height: 70px; */
  display: flex;
  align-items: center;
  transition: all 0.2s ease-in-out;
  z-index: 2000;
}
.scroll-header .Type-something[data-v-5fddf304] {
  height: 17px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
@media (max-width: 425px) {
.scroll-header .blockAcceso[data-v-5fddf304] {
    margin-bottom: 15px;
    margin-top: 15px;
}
}
.scroll-header .blockAcceso .btn-acceso[data-v-5fddf304] {
  height: 40px;
  margin-right: 16px;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
}
.scroll-header .blockAcceso .btn-acceso .btn-text-acceso[data-v-5fddf304] {
  height: 17px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
@media (max-width: 400px) {
.nav-link.router-link-active[data-v-5fddf304] {
    border-bottom: 2px solid #fff;
    width: 50%;
}
}
@media (min-width: 1024px) {
.punto-active[data-v-5fddf304] {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #fff;
    margin-left: auto;
    margin-right: auto;
}
}</style><style>div.portada-3dblue[data-v-66372912] {
  height: 100vh;
  /* height: 870px;


  @media (min-width: 375px) and (max-width: 425px) {
      height: 1370px;
  }

  @media (min-width:320px) and (max-width: 360px) {
      height: auto !important;
  } */
  -o-object-fit: contain;
     object-fit: contain;
  /*background: url("{{url('landing')}}/assets/portada-3-d-blue.png");*/
  background-color: #f8fafc;
  background-size: cover;
  background-repeat: no-repeat;
}
#text-p[data-v-66372912] {
  margin-top: 65px;
}
#form-p[data-v-66372912] {
  /*margin-top: 35px;*/
}
.Lorem-ipsum-dolor-si p {
  font-family: Roobert !important;
}
.Lorem-ipsum-dolor-si[data-v-66372912] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #e65927;
}
.Te-ayudamos-a-recupe[data-v-66372912] {
  font-family: Nordeco;
  font-size: 56px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #e65927;
}
@media (max-width: 425px) {
.Te-ayudamos-a-recupe[data-v-66372912] {
    font-size: 35px;
}
}
.blockRegistro .btn-registerHome[data-v-66372912] {
  /* width: 196px;
  height: 48px; */
  margin: 56px 0 70px 0;
  border-radius: 37.5px;
  background-color: #2c60aa;
}
.blockRegistro .btn-registerHome .text-register-btn[data-v-66372912] {
  /* width: 96.8px;
  height: 19px;
  margin: 2px 27.2px 3px 0; */
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.blockRegistro .btn-registerHome img.iconsarrow-right[data-v-66372912] {
  /* width: 24px;
  height: 24px; */
  margin: 0 0 0 27.2px;
  -o-object-fit: contain;
     object-fit: contain;
}
.block-CMO-FUNCIONA[data-v-66372912] {

  position: absolute;
  bottom: 0;
  width: 100%;
  margin-top: 40px;
  margin-bottom: 40px;
  -moz-text-align-last: center;
       text-align-last: center;
}
.block-CMO-FUNCIONA .CMO-FUNCIONA[data-v-66372912] {
  width: 147px;
  height: 19px;
  margin: 3px 4px 2px 0;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
#blockform-scroll[data-v-66372912] {
  position: fixed;
  top: 80%;
  right: 20%;
  width: 20%;
  border-radius: 8px;
  box-shadow: 0 4px 8px 0 rgba(96, 97, 112, 0.16), 0 0 2px 0 rgba(40, 41, 61, 0.04);
  background-color: #254158;
  z-index: 3;
}
@media (min-width: 1440px) and (max-width: 1600px) {
#blockform-scroll[data-v-66372912] {
    right: 11%;
    width: 25%;
}
}
@media (min-width: 1200px) and (max-width: 1280px) {
#blockform-scroll[data-v-66372912] {
    right: 6%;
    width: 30%;
}
}
@media (min-width: 1024px) and (max-width: 1024px) {
#blockform-scroll[data-v-66372912] {
    right: 3%;
    width: 40%;
}
}
@media (min-width: 768px) and (max-width: 768px) {
#blockform-scroll[data-v-66372912] {
    width: 50%;
    left: 45%;
}
}
@media (max-width: 425px) {
#blockform-scroll[data-v-66372912] {
    right: 0%;
    width: 90%;
}
}
#blockform-scroll .Scroll[data-v-66372912] {
  height: 55px;
}
#blockform-scroll .Scroll-icon[data-v-66372912] {
  margin-top: 7px;
  margin-left: 10px;
}
#blockform-scroll .Scroll-text[data-v-66372912] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #fff;
  margin-top: 7px;
  margin-left: -10px;
}
#blockform-scroll .Scroll-btn .btn-light[data-v-66372912] {
  border-radius: 37.5px !important;
  background-color: #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  margin-top: 14px;
  margin-left: -10px;
  border: 1px solid #e65927;
}
#blockform-scroll .Scroll-btn .btn[data-v-66372912]:hover {
  background-color: #fff;
  color: #e65927;
  border: 1px solid #e65927;
}</style><style>#como-funciona[data-v-494d1a60] {
  padding: 100px 0;
  background-color: #fff;
  position: relative;
  z-index: 2;
}
#como-funciona #block-reclamacion .text-reclamacion[data-v-494d1a60] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
#como-funciona #block-reclamacion .Lorem-ipsum-dolor-si[data-v-494d1a60] {
  width: 65%;
  margin-top: 20px;
  margin-left: auto;
  margin-right: auto;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
#como-funciona .card-reclamacion[data-v-494d1a60] {
  padding: 24px 19px 37px 32px;
  border-radius: 16px;
  -webkit-backdrop-filter: blur(2px);
  backdrop-filter: blur(2px);
  background-color: #f8fafc;
}
#como-funciona .card-reclamacion .Reclamacion[data-v-494d1a60] {
  font-family: CynthoNext;
  font-size: 28px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  float: left;
}
#como-funciona .card-reclamacion .Lorem-ipsum-dolor-si[data-v-494d1a60] {
  /* width: 544px; */
  margin-top: 14px;
  margin-bottom: 20px;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
#como-funciona .card-reclamacion .card-text[data-v-494d1a60] {
  text-align: initial;
}
#como-funciona .card-reclamacion .img-amistosa[data-v-494d1a60] {
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  -o-object-fit: contain;
     object-fit: contain;
  border-radius: 16px;
}
#como-funciona .card-reclamacion .blockBTN .text-center[data-v-494d1a60] {
  background-color: #fff;
  display: inline-flex;
  border-radius: 22px;
}
#como-funciona .card-reclamacion .btn.active[data-v-494d1a60] {
  border-radius: 22px;
  background-color: #e65927;
  color: #fff !important;
}
#como-funciona .card-reclamacion .btn[data-v-494d1a60] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
  border-radius: 22px;
  background-color: #fff;
}
#como-funciona .card-reclamacion .block-CMO-FUNCIONA[data-v-494d1a60] {
  margin-top: 32px;
}
#como-funciona .card-reclamacion .block-CMO-FUNCIONA .CMO-FUNCIONA[data-v-494d1a60] {
  width: 147px;
  height: 19px;
  margin: 3px 4px 2px 0;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}</style><style>.blockTarifa[data-v-9cc878a2] {
  margin-top: 50px;
}
.blockTarifa .card-tarifa[data-v-9cc878a2] {
  border-radius: 16px;
  -webkit-backdrop-filter: blur(2px);
  backdrop-filter: blur(2px);
  background-color: #f8fafc;
}
.blockTarifa .card-tarifa .text-tarifa[data-v-9cc878a2] {
  padding-bottom: 70px;
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockTarifa .blockCard .card[data-v-9cc878a2] {
  border: 0px;
}
.blockTarifa .blockCard .card.active[data-v-9cc878a2] {
  border: solid 1px #254158;
}
.blockTarifa .blockCard .card-footer .btn.active[data-v-9cc878a2] {
  color: #fff;
  background-color: #e65927;
}
.blockTarifa .blockCard .text-t1[data-v-9cc878a2] {
  font-family: Nordeco;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockTarifa .blockCard .badge-price[data-v-9cc878a2] {
  border-radius: 8px;
  background-color: #e8eef6;
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #285ba3;
}
.blockTarifa .blockCard .card-text[data-v-9cc878a2] {
  text-align: initial;
}
.blockTarifa .blockCard .btn-tarifa[data-v-9cc878a2] {
  border-radius: 37.5px;
  border: solid 1px #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  margin-top: 10px;
  margin-bottom: 15px;
}
@media (min-width: 768px) and (max-width: 768px) {
.blockTarifa .blockCard .OPFrecuente[data-v-9cc878a2] {
    margin-top: 40px;
}
}
.blockTarifa .blockCard .op-frecuente[data-v-9cc878a2] {
  /* width: 410px; */
  height: 40px;
  /* margin: 0 0 24px;*/
  margin: -40px 0 0px;
  padding: 12px 0 12px 0;
  border-radius: 8px 8px 0 0;
  background-color: #051c2c;
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
@media (min-width: 375px) and (max-width: 390px) {
.blockTarifa .blockCard .op-frecuente[data-v-9cc878a2] {
    margin: 0 !important;
}
}</style><style>.blockRecovery[data-v-43503c2a] {
  padding: 50px 0;
  background-color: #fff;
  /*     @media (min-width: 1024px){
      .row{
          margin-right: 0;
          margin-left: 0;
      }
  } */
}
.blockRecovery .RText[data-v-43503c2a] {
  margin-bottom: 50px;
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockRecovery .Recovery-img[data-v-43503c2a] {
  -moz-text-align-last: center;
       text-align-last: center;
  -o-object-fit: contain;
     object-fit: contain;
}
.blockRecovery .Recovery-title[data-v-43503c2a] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockRecovery .Recovery-text[data-v-43503c2a] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
@media (min-width: 1280px) {
.blockRecovery .Recovery-text[data-v-43503c2a] {
    /* width: 38%; */
    margin-left: auto;
    margin-right: auto;
}
}</style><style>.blockEstadisticas[data-v-e047c7bc] {
  -o-object-fit: contain;
     object-fit: contain;
  background-image: url("{{url('landing')}}/assets/fondo-estadisticas.png");
}
.blockEstadisticas .estadisticas[data-v-e047c7bc] {
  padding: 66px 0;
  margin-left: auto;
  margin-right: auto;
}
.blockEstadisticas .estadisticas-title[data-v-e047c7bc] {
  font-family: Nordeco;
  font-size: 48px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.blockEstadisticas .estadisticas-text[data-v-e047c7bc] {
  font-family: CynthoNext;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}</style><style>/**
 * Swiper 5.4.5
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 * http://swiperjs.com
 *
 * Copyright 2014-2020 Vladimir Kharlampidi
 *
 * Released under the MIT License
 *
 * Released on: June 16, 2020
 */

</style><style>.blockOpiniones[data-v-455dcd3f] {
  background-color: #f8fafc;
  padding-top: 50px;
  padding-bottom: 50px;
}
.blockOpiniones .content[data-v-455dcd3f] {
  padding-top: 30px;
}
.blockOpiniones .content .Opinion[data-v-455dcd3f] {
  border-radius: 16px;
  background-color: #fff;
  /* @media (min-width: 1280px) {
      margin-left: 130px;
      margin-right: 130px; 
  } */
  /* &-col1 {
      margin: 50px 0 50px;
  } */
}
.blockOpiniones .content .Opinion .block-DR[data-v-455dcd3f] {
  border-radius: 8px;
  border: solid 1px #254158;
  background-color: #fff;
  width: 30%;
  position: absolute;
  top: 22%;
  left: 80%;
  transform: translate(-50%, -50%);
}
.blockOpiniones .content .Opinion .block-DR .text-deuda-recuperada[data-v-455dcd3f] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
  margin: 8px 15px;
}
.blockOpiniones .content .Opinion .block-DR .price-DR[data-v-455dcd3f] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  margin: 8px 15px;
}
.blockOpiniones .content .Opinion .block-DR .price-DR .text-style-1[data-v-455dcd3f] {
  font-size: 16px;
}
.blockOpiniones .content .Opinion-col2[data-v-455dcd3f] {
  margin-top: 40px;
}
.blockOpiniones .content .Opinion-empresa[data-v-455dcd3f] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #051c2c;
  margin-left: 55px;
}
.blockOpiniones .content .Opinion-cliente[data-v-455dcd3f] {
  font-family: Roobert;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  margin-left: 55px;
}
.blockOpiniones .content .Opinion-text[data-v-455dcd3f] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
.blockOpiniones .content .Opinion-text .row[data-v-455dcd3f] {
  margin-top: 25px;
}
@media (min-width: 1168px) {
.blockOpiniones .content .Opinion-text .blockquote-up[data-v-455dcd3f] {
    left: 20px;
}
.blockOpiniones .content .Opinion-text .blockquote-down[data-v-455dcd3f] {
    top: 180px;
    right: 30px;
}
}
@media (min-width: 800px) and (max-width: 1024px) {
.blockOpiniones .content .Opinion-text .blockquote-up[data-v-455dcd3f] {
    left: 15px;
}
.blockOpiniones .content .Opinion-text .blockquote-down[data-v-455dcd3f] {
    top: 175px;
    right: 50px;
}
}
@media (min-width: 375px) and (max-width: 768px) {
.blockOpiniones .content .Opinion-text .blockquote-up[data-v-455dcd3f] {
    left: 0px;
}
.blockOpiniones .content .Opinion-text .blockquote-down[data-v-455dcd3f] {
    top: 218px;
    right: 30px;
}
}
.blockOpiniones .content .OCliente[data-v-455dcd3f] {
  margin-top: 100px;
}
.blockOpiniones .content .OCliente-title[data-v-455dcd3f] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.blockOpiniones .content .OCliente-text[data-v-455dcd3f] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
@media (max-width: 375px) {
.blockOpiniones .content .OCliente-slides[data-v-455dcd3f] {
    margin-top: 35px;
}
}</style><style>.blockExitos[data-v-dd3c5654] {
  padding: 40px 0;
  background-color: #fff;
}
.blockExitos .Exitos-title[data-v-dd3c5654] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockExitos .Exitos-img[data-v-dd3c5654] {
  margin-top: 13px;
}
.blockExitos .Exitos-brands[data-v-dd3c5654] {
  text-align: center;
}</style><style>.blockContacto[data-v-18ec2fe4] {
  background-color: #f8fafc;
}
.blockContacto .Contacto-title[data-v-18ec2fe4] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.blockContacto .Contacto-btn[data-v-18ec2fe4] {
  font-family: CynthoNext;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}
.blockContacto .Contacto-btn[data-v-18ec2fe4]:hover {
  background-color: #fff;
  font-family: CynthoNext;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  border: 1px solid #e65927;
}</style><style>/* @media (max-width: 1024px) and (min-width: 768px) {
  .row{
    margin-right: 0;
    margin-left: 0;
  }
} */
footer[data-v-a242bae8] {
  background-color: #285ba3;
  position: relative;
  bottom: 0;
  color: white;
}
footer .footer-content[data-v-a242bae8] {
  padding: 80px 0 45px 0;
}
footer .footer-content .footer-text[data-v-a242bae8] {
  opacity: 0.8;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #fff;
}
footer .footer-content .footer-title[data-v-a242bae8] {
  font-family: Roobert;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
footer .container .copyright-text[data-v-a242bae8] {
  opacity: 0.8;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
footer .container .icons-social .s-icon[data-v-a242bae8] {
  margin-right: 10px;
}</style><style>/* @media (min-width: 1024px){
  .row{
    margin-right: auto;
    margin-left: auto;
  }
} */
@media (max-width: 768px) and (min-width: 768px) {
.row[data-v-63cd6604] {
    margin-right: 0;
    margin-left: 0;
}
}
@media (max-width: 320px) and (min-width: 320px) {
.row[data-v-63cd6604] {
    margin-right: 0;
    margin-left: 0;
}
}
@media (max-width: 375px) and (min-width: 375px) {
.row[data-v-63cd6604] {
    margin-right: 0;
    margin-left: 0;
}
}
@media (max-width: 384px) and (min-width: 384px) {
.row[data-v-63cd6604] {
    margin-right: 0;
    margin-left: 0;
}
}
.blockQSomos[data-v-63cd6604] {
  padding: 70px 0;
  background-color: #fff;
}
.blockQSomos .card[data-v-63cd6604] {
  border-radius: 16px;
  background-color: #f8fafc;
}
@media (min-width: 1024px) {
.blockQSomos .card .QSomos[data-v-63cd6604] {
    padding: 60px 70px;
}
}
.blockQSomos .card .QSomos-title[data-v-63cd6604] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 20px;
}
.blockQSomos .card .QSomos-text[data-v-63cd6604] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  text-align: inherit;
}
.blockQSomos .card .QSomos-btn[data-v-63cd6604] {
  border-radius: 37.5px;
  background-color: #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  margin-top: 10px;
}
.blockQSomos .card .QSomos-btn[data-v-63cd6604]:hover {
  background-color: #fff;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  border: 1px solid #e65927;
}
.blockQSomos .card .img-QSomos[data-v-63cd6604] {
  -o-object-fit: contain;
     object-fit: contain;
}
@media (min-width: 1024px) {
.blockQSomos .card .img-QSomos[data-v-63cd6604] {
    margin: 80px -35px 40px;
}
}
@media (max-width: 320px) and (max-width: 768px) {
.blockQSomos .card .img-QSomos[data-v-63cd6604] {
    margin-top: 30px;
}
}</style><style>.block-CheckClaim[data-v-837e15c2] {
  padding-top: 40px;
  background-color: #fff;
}
.block-CheckClaim .CheckClaim-title[data-v-837e15c2] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.block-CheckClaim .CheckClaim-text[data-v-837e15c2] {
  margin-top: 20px;
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
.block-CheckClaim .CheckClaim-btn[data-v-837e15c2] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}</style><style>.block-Testimonios[data-v-eb5d4bee] {
  -o-object-fit: contain;
     object-fit: contain;
  background: url("{{url('landing')}}/assets/fondo-testimonios.png");
  background-size: cover;
}
@media (min-width: 768px) {
.block-Testimonios[data-v-eb5d4bee] {
    height: 432px;
}
}
.block-Testimonios .Testimonios-title[data-v-eb5d4bee] {
  margin-top: 40px;
  font-family: Nordeco;
  font-size: 56px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.29;
  letter-spacing: normal;
  color: #fff;
}
.block-Testimonios .Testimonios-text[data-v-eb5d4bee] {
  margin-top: 40px;
  opacity: 0.8;
  font-family: CynthoNext;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.56;
  letter-spacing: normal;
  color: #f8f8f3;
}</style><style>.block-PFrecuentes[data-v-038cfd70] {
  height: 320px;
  -o-object-fit: contain;
     object-fit: contain;
  background: url("{{url('landing')}}/assets/fondo-Pfrecuentes.png");
  background-size: cover;
}
.block-PFrecuentes .PFrecuentes-subtitle[data-v-038cfd70] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.block-PFrecuentes .PFrecuentes-title[data-v-038cfd70] {
  font-family: Nordeco;
  font-size: 56px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.block-PFrecuentes-collapse[data-v-038cfd70] {
  background-color: #f8fafc;
  padding-top: 30px;
  padding-bottom: 70px;
}
.block-PFrecuentes-collapse .Categoria[data-v-038cfd70] {
  /* &-img{

  } */
}
.block-PFrecuentes-collapse .Categoria-content[data-v-038cfd70] {
  padding: 15px 0 10px;
}
.block-PFrecuentes-collapse .Categoria-name[data-v-038cfd70] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-PFrecuentes-collapse .Selected[data-v-038cfd70] {
  border-radius: 16px;
  border: solid 1px #254158;
}
.block-PFrecuentes-collapse .block-Accordion[data-v-038cfd70] {
  padding: 0 0 30px;
  border-radius: 16px;
  background-color: #fff;
}
.block-PFrecuentes-collapse .block-Accordion .Categoria-title[data-v-038cfd70] {
  padding: 20px 20px 0;
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.block-PFrecuentes-collapse .block-Accordion .accordion .card[data-v-038cfd70] {
  border: none;
}
.block-PFrecuentes-collapse .block-Accordion .accordion .card-header[data-v-038cfd70] {
  background-color: #fff;
}
.block-PFrecuentes-collapse .block-Accordion .accordion .card-header .card-title[data-v-038cfd70] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #1a2139;
}
.block-PFrecuentes-collapse .block-Accordion .accordion .card-header .panel-title .less[data-v-038cfd70] {
  opacity: 1;
  background-color: #fceae4;
  border-radius: 50%;
}
.block-PFrecuentes-collapse .block-Accordion .accordion .card-line-bottom[data-v-038cfd70] {
  background-color: #254158;
  margin-top: 0;
  margin-bottom: 0;
}</style><style>.video-container[data-v-5d313d1e] {
  border-radius: 4px;
  margin: 0 auto;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.4);
}
.video-container .video-wrapper[data-v-5d313d1e] {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.video-container video[data-v-5d313d1e] {
  width: 100%;
  height: 100%;
  border-radius: 4px;
}
.play-button-wrapper[data-v-5d313d1e] {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: auto;
  pointer-events: none;
}
.play-button-wrapper #circle-play-b[data-v-5d313d1e] {
  cursor: pointer;
  pointer-events: auto;
}
.play-button-wrapper #circle-play-b svg[data-v-5d313d1e] {
  width: 100px;
  height: 100px;
  fill: #fff;
  stroke: #fff;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 50%;
  opacity: 0.9;
}</style><style>.block-SlidesAbout[data-v-861c26ae] {
  background-color: #f8fafc;
  padding: 60px 0px 70px;
}
.block-SlidesAbout .SlidesAbout-title[data-v-861c26ae] {
  font-family: MunaleLoird;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
</style><style>.block-NEquipo[data-v-3860c0f6] {
  padding: 40px 0;
  background-color: #fff;
}
.block-NEquipo .NEquipo-title[data-v-3860c0f6] {
  font-family: MunaleLoird;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
  margin: 40px 0 40px;
}
.block-NEquipo .NEquipo-content .card[data-v-3860c0f6] {
  border-radius: 8px;
  background-color: #f8fafc;
  border: none !important;
}
.block-NEquipo .NEquipo-content .card .NEquipo-img[data-v-3860c0f6] {
  margin-left: auto;
  margin-right: auto;
  margin-top: 25px;
}
.block-NEquipo .NEquipo-content .card .NEquipo-nombre[data-v-3860c0f6] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-NEquipo .NEquipo-content .card .NEquipo-puesto[data-v-3860c0f6] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}</style><style>.block-About[data-v-c7d18d50] {
  -o-object-fit: contain;
     object-fit: contain;
  background: url("{{url('landing')}}/assets/fondo-about.png");
  background-size: cover;
}
@media (min-width: 768px) {
.block-About[data-v-c7d18d50] {
    height: 432px;
}
}
.block-About .About-title[data-v-c7d18d50] {
  margin-top: 40px;
  font-family: Nordeco;
  font-size: 52px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.38;
  letter-spacing: normal;
  color: #fff;
}
.block-About .About-text[data-v-c7d18d50] {
  margin-top: 40px;
  opacity: 0.8;
  font-family: CynthoNext;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.56;
  letter-spacing: normal;
  color: #f8fafc;
}
.block-Claim-video .Claim[data-v-c7d18d50] {
  background-color: #fff;
}
.block-Claim-video .Claim-title[data-v-c7d18d50] {
  padding-top: 40px;
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-Claim-video .Claim-text[data-v-c7d18d50] {
  margin-top: 10px;
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
.block-Claim-video .Claim-video[data-v-c7d18d50] {
  margin-top: 40px;
  border-radius: 16px;
  padding-bottom: 80px;
}
.block-nosotros[data-v-c7d18d50] {
  background-color: #f8fafc;
}
@media (min-width: 768px) {
.block-nosotros[data-v-c7d18d50] {
    padding: 80px 0px 60px;
}
}
.block-nosotros .Nosotros[data-v-c7d18d50] {
  border-radius: 16px;
  border: solid 1px #254158;
}
@media (min-width: 768px) {
.block-nosotros .Nosotros[data-v-c7d18d50] {
    padding: 25px 0 25px;
}
}
.block-nosotros .Nosotros-title[data-v-c7d18d50] {
  margin-top: 30px;
  font-family: Nordeco;
  font-size: 40px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
@media (min-width: 768px) {
.block-nosotros .Nosotros-title[data-v-c7d18d50] {
    margin-left: 50px;
}
}
.block-nosotros .Nosotros-text[data-v-c7d18d50] {
  margin-top: 20px;
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
@media (min-width: 768px) {
.block-nosotros .Nosotros-text[data-v-c7d18d50] {
    margin-right: 58px;
}
}</style><style>.Block-FormContact[data-v-ab748da8] {
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
  padding: 1.5rem;
  margin-right: 0;
  margin-left: 0;
  border-width: 0.2rem;
}
.Block-FormContact .FormContact label[data-v-ab748da8] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Block-FormContact .FormContact .btn-primary[data-v-ab748da8] {
  border-radius: 37.5px;
  background-color: #e65927;
  border: 1px solid #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
}
.Block-FormContact .FormContact .btn-primary[data-v-ab748da8]:hover {
  border-radius: 37.5px;
  background-color: #fff;
  color: #e65927;
  border: 1px solid #e65927;
}</style><style>.block-Contacto[data-v-cfd2b624] {
  background-color: #e65927;
}
.block-Contacto .Contacto-subtitle[data-v-cfd2b624] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.block-Contacto .Contacto-title[data-v-cfd2b624] {
  font-family: Nordeco;
  font-size: 56px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.block-Contacto .Contacto .block-text[data-v-cfd2b624] {
  margin-top: 30px;
}
.block-Contacto .Contacto .block-form[data-v-cfd2b624] {
  margin-top: 30px;
}
.block-ShowContact[data-v-cfd2b624] {
  background-color: #f8fafc;
  padding: 50px 0;
}
.block-ShowContact .ShowContact[data-v-cfd2b624] {
  border-radius: 16px;
  border: solid 1px #254158;
}
.owl-carousel img {
  display: inline-block !important;
  width: auto !important;
}
.block-ShowContact .ShowContact .img-fluid[data-v-cfd2b624] {
  display: flex;
  margin: 0 auto;
  margin-top: 30px;
  border-radius: 50%;
  overflow: hidden;
  justify-content: center;
}
.block-ShowContact .ShowContact .ShowContact-text[data-v-cfd2b624] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-ShowContact .ShowContact .ShowContact-text .location-street[data-v-cfd2b624] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}</style><style>.show-hide i[data-v-5a228f80] {
  cursor: pointer;
  display: none;
}
.show-hide i.hide[data-v-5a228f80]:before {
  content: "\f070";
}
input:valid ~ .show-hide i[data-v-5a228f80] {
  display: block;
}
.blockLogin[data-v-5a228f80] {
  background-color: #f8fafc;
  padding: 8px 0px;
}
.blockLogin .header-login[data-v-5a228f80] {
  border-bottom: solid 1px #e4e4df;
}
.block-FormLogin[data-v-5a228f80] {
  padding-top: 70px;
  padding-bottom: 250px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.block-FormLogin .login-form[data-v-5a228f80] {
  /* @media (min-width:1024px) {
      width: 575px;
      height: 520px;
  } */
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
  padding: 0px 45px;
}
.block-FormLogin .login-form .card-text[data-v-5a228f80] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
.block-FormLogin .login-form .text-register[data-v-5a228f80] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form .card-title[data-v-5a228f80] {
  margin-top: 30px;
  font-family: Nordeco;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form form .form-text[data-v-5a228f80] {
  font-family: CynthoNext;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.block-FormLogin .login-form form .pwd-recovery[data-v-5a228f80] {
  font-family: CynthoNext;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.block-FormLogin .login-form form .btn-login[data-v-5a228f80] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
  margin-top: 50px;
}
.block-FormLogin .login-form form .btn[data-v-5a228f80]:hover {
  color: #e65927;
  background-color: #fff;
  border: 1px solid #e65927;
}
.block-FormLogin .login-form .circle[data-v-5a228f80] {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: solid 1px #e4e4df;
  overflow: hidden;
  margin-left: -6px;
  margin-right: -6px;
  margin-top: 10px;
}
.block-FormLogin .login-form .buttons-social[data-v-5a228f80] {
  margin-top: 20px;
}
.block-FormLogin .login-form .buttons-social .btn-google[data-v-5a228f80] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
  float: right;
}
@media (max-width: 425px) {
.block-FormLogin .login-form .buttons-social .btn-google[data-v-5a228f80] {
    margin-bottom: 5px;
}
}
.block-FormLogin .login-form .buttons-social .btn-facebook[data-v-5a228f80] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
  background-color: #3a5998;
}</style><style>.block-ResetPwd[data-v-41baacce] {
  background-color: #f8fafc;
  padding: 8px 0px;
}
.block-ResetPwd .header-ResetPwd[data-v-41baacce] {
  border-bottom: solid 1px #e4e4df;
}
.ResetPwd[data-v-41baacce] {
  margin-top: 70px;
  margin-bottom: 240px;
}
.ResetPwd-card[data-v-41baacce] {
  padding: 50px;
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
}
.ResetPwd-card .ResetPwd-icon[data-v-41baacce] {
  margin-top: 10px;
  margin-right: -50px;
}
.ResetPwd-card .ResetPwd-icon .img-fluid[data-v-41baacce] {
  margin-left: 15px;
}
.ResetPwd-card .card-title[data-v-41baacce] {
  margin-left: -25px;
  font-family: Roobert;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.ResetPwd-card .card-text[data-v-41baacce] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
  width: 80%;
  margin-left: auto;
  margin-right: auto;
}
.ResetPwd #submitForm label[data-v-41baacce] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ResetPwd #submitForm .block-btn[data-v-41baacce] {
  margin-top: 25px;
}
.ResetPwd #submitForm .block-btn .btn-ResetPwd[data-v-41baacce] {
  border-radius: 37.5px;
  color: #fff;
  background-color: #e65927;
}
.ResetPwd #submitForm .block-btn .btn[data-v-41baacce]:hover {
  color: #e65927;
  background-color: #fff;
  border: 1px solid #e65927;
}</style><style>.show-hide i[data-v-d4f9cbe2] {
  cursor: pointer;
  display: none;
}
.show-hide i.hide[data-v-d4f9cbe2]:before {
  content: "\f070";
}
input:valid ~ .show-hide i[data-v-d4f9cbe2] {
  display: block;
}
.modal-vue .fade-enter[data-v-d4f9cbe2],
.modal-vue .fade-leave-to[data-v-d4f9cbe2] {
  transform: translateX(10px);
  opacity: 0;
}
.modal-vue .fade-enter-active[data-v-d4f9cbe2] {
  transition: all 0.3s ease;
}
.modal-vue .fade-leave-active[data-v-d4f9cbe2] {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}
.modal-vue .modal-overlay[data-v-d4f9cbe2] {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 1500;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
}
.modal-vue .modal-dialog[data-v-d4f9cbe2] {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1600;
  width: 90%;
  margin: 0;
}
.modal-vue .modal-dialog .modal-content[data-v-d4f9cbe2] {
  border-radius: 16px;
  box-shadow: 0 4px 8px 0 rgba(96, 97, 112, 0.16), 0 0 2px 0 rgba(40, 41, 61, 0.04);
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 10px;
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text .email-modal[data-v-d4f9cbe2] {
  font-style: italic;
}
.modal-vue .modal-dialog .modal-content .modal-body .dialog-text .text-title[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal[data-v-d4f9cbe2] {
  height: 40px;
  border-radius: 37.5px;
  background-color: #55f5a3;
  margin-right: auto;
  margin-left: auto;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal .footer-text[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockLogin[data-v-d4f9cbe2] {
  background-color: #f8fafc;
  padding: 8px 0px;
}
.blockLogin .header-login[data-v-d4f9cbe2] {
  border-bottom: solid 1px #e4e4df;
}
.blockLogin .Recovery[data-v-d4f9cbe2] {
  margin-right: auto;
  margin-left: auto;
  margin-bottom: 90px;
}
.blockLogin .Recovery-img[data-v-d4f9cbe2] {
  -moz-text-align-last: center;
       text-align-last: center;
  -o-object-fit: contain;
     object-fit: contain;
}
.blockLogin .Recovery-title[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockLogin .Recovery-text[data-v-d4f9cbe2] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
@media (min-width: 1280px) {
.blockLogin .Recovery-text[data-v-d4f9cbe2] {
    /* width: 38%; */
    margin-left: auto;
    margin-right: auto;
}
}
.block-FormLogin[data-v-d4f9cbe2] {
  padding-top: 70px;
  padding-bottom: 165px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.block-FormLogin .login-form[data-v-d4f9cbe2] {
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
  padding: 0px 45px;
}
@media (min-width: 1024px) {
.block-FormLogin .login-form[data-v-d4f9cbe2] {
    width: 600px;
}
}
.block-FormLogin .login-form .card-text[data-v-d4f9cbe2] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
.block-FormLogin .login-form .text-register[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form .card-title[data-v-d4f9cbe2] {
  margin-top: 30px;
  font-family: Nordeco;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form form .pwd-recovery[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.block-FormLogin .login-form form .btn-login[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
  margin-top: 30px;
}
.block-FormLogin .login-form form .btn[data-v-d4f9cbe2]:hover {
  color: #e65927;
  border: solid 1px #e65927;
  background-color: #fff;
}
.block-FormLogin .login-form .circle[data-v-d4f9cbe2] {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: solid 1px #e4e4df;
  overflow: hidden;
  margin-left: -6px;
  margin-right: -6px;
  margin-top: 10px;
}
.block-FormLogin .login-form .buttons-social[data-v-d4f9cbe2] {
  margin-top: 20px;
}
.block-FormLogin .login-form .buttons-social .btn-google[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
  float: right;
}
@media (max-width: 425px) {
.block-FormLogin .login-form .buttons-social .btn-google[data-v-d4f9cbe2] {
    margin-bottom: 5px;
}
}
.block-FormLogin .login-form .buttons-social .btn-facebook[data-v-d4f9cbe2] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
  background-color: #3a5998;
}</style><style>.show-hide i {
  cursor: pointer;
  display: none;
}
.show-hide i.hide:before {
  content: "\f070";
}
input:valid ~ .show-hide i {
  display: block;
}
.blockLogin {
  background-color: #f8f8f3;
  padding: 8px 0px;
}
.blockLogin .header-login {
  border-bottom: solid 1px #e4e4df;
}
.blockLogin .Recovery {
  margin-right: auto;
  margin-left: auto;
  margin-bottom: 90px;
}
.blockLogin .Recovery-img {
  -moz-text-align-last: center;
       text-align-last: center;
  -o-object-fit: contain;
     object-fit: contain;
}
.blockLogin .Recovery-title {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.blockLogin .Recovery-text {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
@media (min-width: 1280px) {
.blockLogin .Recovery-text {
    /* width: 38%; */
    margin-left: auto;
    margin-right: auto;
}
}
.block-FormLogin {
  padding-top: 70px;
  padding-bottom: 165px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.block-FormLogin .login-form {
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
  padding: 0px 45px;
}
@media (min-width: 1024px) {
.block-FormLogin .login-form {
    width: 600px;
}
}
.block-FormLogin .login-form .card-text {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}
.block-FormLogin .login-form .text-register {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form .card-title {
  margin-top: 30px;
  font-family: Roobert;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.block-FormLogin .login-form form .pwd-recovery {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.block-FormLogin .login-form form .btn-login {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
  border-radius: 37.5px;
  background-color: #55f5a3;
  margin-top: 30px;
}
.block-FormLogin .login-form form .circle {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: solid 1px #e4e4df;
  overflow: hidden;
  margin-left: -6px;
  margin-right: -6px;
  margin-top: 10px;
}
.block-FormLogin .login-form form .buttons-social {
  margin-top: 20px;
}
.block-FormLogin .login-form form .buttons-social .btn-google {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  border-radius: 37.5px;
  border: solid 1px #051c2c;
  float: right;
}
@media (max-width: 425px) {
.block-FormLogin .login-form form .buttons-social .btn-google {
    margin-bottom: 5px;
}
}
.block-FormLogin .login-form form .buttons-social .btn-facebook {
  font-family: Roobert;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
  border-radius: 37.5px;
  background-color: #3a5998;
}</style><style>#loading[data-v-39d685c0] {
  background-color: #fff;
  color: #fff;
  font-size: 32px;
  padding-top: 10vh;
  height: 100vh;
  text-align: center;
}
.message[data-v-39d685c0] {
  margin-top: 30px;
  font-family: Nordeco;
  font-size: 42px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}</style><style>.BlockCliente[data-v-110d8d2b] {
  background-color: #e65927;
  padding-bottom: 10px;
}
.BlockCliente .Cliente-title[data-v-110d8d2b] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.BlockCliente .Cliente-text[data-v-110d8d2b] {
  font-family: Nordeco;
  font-size: 40px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.Cliente[data-v-110d8d2b] {
  background-color: #f8fafc;
  padding-top: 25px;
}
.Cliente .ClienteIzq-top[data-v-110d8d2b] {
  padding-bottom: 130px;
}
.Cliente .ClienteIzq-top .menuTop[data-v-110d8d2b] {
  margin-bottom: 15px;
}
.Cliente .ClienteIzq-top .menu-title[data-v-110d8d2b] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Cliente .ClienteIzq-bottom[data-v-110d8d2b] {
  padding-top: 100px;
  padding-bottom: 100px;
}
.Cliente .ClienteIzq-bottom .support-title[data-v-110d8d2b] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Cliente .ClienteIzq-bottom .menuBottom[data-v-110d8d2b] {
  text-align: center;
}
.Cliente .ClienteIzq-bottom .menuBottom .negative[data-v-110d8d2b] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}</style><style>.modal-vue .fade-enter[data-v-994d5cde],
.modal-vue .fade-leave-to[data-v-994d5cde] {
  transform: translateX(10px);
  opacity: 0;
}
.modal-vue .fade-enter-active[data-v-994d5cde] {
  transition: all 0.3s ease;
}
.modal-vue .fade-leave-active[data-v-994d5cde] {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}
.modal-vue .modal-overlay[data-v-994d5cde] {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 1500;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
}
.modal-vue .modal-dialog[data-v-994d5cde] {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1600;
  width: 90%;
  margin: 0;
}
.modal-vue .modal-dialog .modal-content[data-v-994d5cde] {
  border-radius: 16px;
  box-shadow: 0 4px 8px 0 rgba(96, 97, 112, 0.16), 0 0 2px 0 rgba(40, 41, 61, 0.04);
}
.modal-vue .modal-dialog .modal-content .modal-body .dialog-text[data-v-994d5cde] {
  opacity: 0.8;
  border-radius: 4px;
  background-color: #051c2c;
  padding: 10px 16px;
}
.modal-vue .modal-dialog .modal-content .modal-body .dialog-text .info-text[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #fff;
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text[data-v-994d5cde] {
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 10px;
  font-family: CynthoNext;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.56;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.modal-vue .modal-dialog .modal-content .modal-body .modal-text-info[data-v-994d5cde] {
  font-family: CynthoNext;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal[data-v-994d5cde] {
  height: 40px;
  border-radius: 37.5px;
  background-color: #e65927;
  margin-right: auto;
  margin-left: auto;
}
.modal-vue .modal-dialog .modal-content .modal-footer .btn-modal .footer-text[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.formulario-reclamacion[data-v-994d5cde] {
  margin: 0 1px 0 0;
  padding: 32px 21px 0px 24px;
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(96, 97, 112, 0.1), 0 -1px 1px 0 rgba(40, 41, 61, 0.04);
  background-color: #fff;
}
.formulario-reclamacion .reclamacion-title[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.formulario-reclamacion #rangeDeuda[data-v-994d5cde] {
  width: 100%;
  height: 1.5rem;
  padding: 0;
}
.formulario-reclamacion .range-label[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.formulario-reclamacion .importe-range1[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
  float: right;
}
.formulario-reclamacion .small-text[data-v-994d5cde] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
}
.formulario-reclamacion .d-right[data-v-994d5cde] {
  float: right;
  margin-top: 6px;
}
.formulario-reclamacion hr[data-v-994d5cde] {
  margin-left: -24px;
  margin-right: -21px;
}
.formulario-reclamacion .disponibilidad-radio[data-v-994d5cde] {
  margin-top: 5px;
  /* .radio-y {
      margin-right: 15px;
  } */
}
@media (min-width: 320px) and (max-width: 360px) {
.formulario-reclamacion .disponibilidad-radio[data-v-994d5cde] {
    text-align: center;
}
}
.formulario-reclamacion .select-documento[data-v-994d5cde] {
  display: flex;
  justify-content: flex-end;
  /* select {
      -webkit-appearance: none;
      -moz-appearance: none;
      -o-appearance: none;
      appearance: none;
  }

  .form-control {
      background-image: url("storageassets/ic-arrow-drop-down.png");
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      background-size: 20px 24px;
      margin-right: 50px;

      @media (min-width: 375px) and (max-width: 390px) {
          margin-right: 135px;
      }
  } */
}
@media (min-width: 320px) and (max-width: 360px) {
.formulario-reclamacion .select-documento[data-v-994d5cde] {
    display: initial;
}
}
.formulario-reclamacion .btn-form-deuda[data-v-994d5cde] {
  width: 280px;
  height: 48px;
  border-radius: 37.5px;
  background-color: #e65927;
  border-color: #e65927;
  margin-top: 12px;
  margin-bottom: 35px;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
@media (max-width: 320px) {
.formulario-reclamacion .btn-form-deuda[data-v-994d5cde] {
    width: auto !important;
}
}
.formulario-reclamacion .btn[data-v-994d5cde]:hover {
  background-color: #fff;
  border-color: #051c2c;
  color: #051c2c;
}</style><style>.modal-vue .fade-enter[data-v-532fcf25],
.modal-vue .fade-leave-to[data-v-532fcf25] {
  transform: translateX(10px);
  opacity: 0;
}
.modal-vue .fade-enter-active[data-v-532fcf25] {
  transition: all 0.3s ease;
}
.modal-vue .fade-leave-active[data-v-532fcf25] {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}
.modal-vue .modal-overlay[data-v-532fcf25] {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 2000;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
}
.modal-vue .modal-dialog[data-v-532fcf25] {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2500;
  width: 90%;
  margin: 0;
}
.modal-vue .modal-dialog .modal-content[data-v-532fcf25] {
  border-radius: 16px;
  box-shadow: 0 4px 8px 0 rgba(96, 97, 112, 0.16), 0 0 2px 0 rgba(40, 41, 61, 0.04);
}
.ClienteDer[data-v-532fcf25] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 20px 10px 20px;
  margin-bottom: 60px;
}
.ClienteDer-title[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 32px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 15px;
}
.ClienteDer-title .perfilComplete[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
  float: right;
  margin-top: 15px;
}
.ClienteDer-alertData[data-v-532fcf25] {
  border-radius: 4px;
  border: solid 1px #fadad0;
  background-color: #fceae4;
}
.ClienteDer-alertData .text-alertData[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.31;
  letter-spacing: normal;
  color: #ba4620;
}
.ClienteDer-alertData .btn-cliente[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}
.ClienteDer .newReclamacion[data-v-532fcf25] {
  border-radius: 8px;
  background-color: #f8fafc;
}
.ClienteDer .newReclamacion .blockLeft[data-v-532fcf25] {
  padding: 10px 20px;
}
@media (min-width: 668px) {
.ClienteDer .newReclamacion .line-vertical[data-v-532fcf25] {
    border-left: 1px solid #d3d3ce;
    height: 120px;
    position: absolute;
    top: 28px;
}
}
@media (max-width: 400px) {
.ClienteDer .newReclamacion .line-vertical[data-v-532fcf25] {
    display: none;
}
.ClienteDer .newReclamacion .line-horizontal[data-v-532fcf25] {
    width: 160px;
    position: absolute;
    left: 17%;
    border: 1px solid #d3d3ce;
}
}
.ClienteDer .newReclamacion .blockRight[data-v-532fcf25] {
  margin-right: 40px;
  margin-top: 32px;
}
.ClienteDer .newReclamacion .blockRight-title[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.17;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 5px;
}
.ClienteDer .newReclamacion .blockRight-subtitle[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.33;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 10px;
}
.ClienteDer .newReclamacion .blockRight-button .btn-newClaim[data-v-532fcf25] {
  border-radius: 37.5px;
  color: #fff;
  background-color: #e65927;
}
.ClienteDer .MyClaims-header[data-v-532fcf25] {
  margin-top: 20px;
}
.ClienteDer .MyClaims-header .claims-title[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ClienteDer .MyClaims-header .claims-all[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
@media (min-width: 668px) {
.ClienteDer .MyClaims-header .claims-all[data-v-532fcf25] {
    float: right;
}
}
.ClienteDer .MyClaims .line-bottom[data-v-532fcf25] {
  border-radius: 16px;
  background-color: #fff;
  border: 1px solid #d3d3ce;
}
.ClienteDer .MyClaims .block-cards .card-columns .card[data-v-532fcf25] {
  padding: 10px 0 10px;
  max-height: 200px;
  min-height: 270px;
}
.ClienteDer .MyClaims .block-cards .card-columns .card .badge-light[data-v-532fcf25] {
  font-stretch: normal;
  font-style: normal;
  line-height: 1.75;
  letter-spacing: normal;
  text-align: center;
  color: #285ba3;
  background-color: #e8eef6;
  border-radius: 50%;
}
.ClienteDer .MyClaims .block-cards .card-columns .card .card-title[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.ClienteDer .MyClaims .block-cards .card-columns .card .btnUnique[data-v-532fcf25] {
  margin-top: 28px;
}
.ClienteDer .MyClaims .block-cards .card-columns .card .btn-MyClaims[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  border-radius: 37.5px;
  border: solid 1px #e65927;
}
.ClienteDer .MyClaims .block-right[data-v-532fcf25] {
  margin-top: 100px;
  -moz-text-align-last: center;
       text-align-last: center;
}
.ClienteDer .MyClaims .block-right .text-img[data-v-532fcf25] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.56;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.ClienteDer .MyClaims .block-right .btn-checkDebt[data-v-532fcf25] {
  border-radius: 37.5px;
  background-color: #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}</style><style>.btn-save[data-v-50c65af6] {
  border-radius: 37.5px;
  background-color: #051c2c;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.btn-light[data-v-50c65af6] {
  border-radius: 37.5px;
}</style><style>.btn-save[data-v-beb10cda] {
  border-radius: 37.5px;
  background-color: #051c2c;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.btn-light[data-v-beb10cda] {
  border-radius: 37.5px;
}</style><style>.btn-save[data-v-58bd35e9] {
  border-radius: 37.5px;
  background-color: #051c2c;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.btn-light[data-v-58bd35e9] {
  border-radius: 37.5px;
}</style><style>.perfilCliente[data-v-50ef3d5e] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 20px 10px 20px;
}
.perfilCliente-header .title[data-v-50ef3d5e] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.perfilCliente-header .incomplete[data-v-50ef3d5e] {
  border-radius: 4px;
  border: solid 1px #fadad0;
  background-color: #fceae4;
  float: right;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #ba4620;
}
.perfilCliente-header .editInfo[data-v-50ef3d5e] {
  float: right;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
  cursor: pointer;
}
.perfilCliente-header .editPass[data-v-50ef3d5e] {
  float: right;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
  cursor: pointer;
}
.perfilCliente .line-bottom[data-v-50ef3d5e] {
  border-radius: 16px;
  background-color: #fff;
  border: 1px solid #d3d3ce;
}
.perfilCliente .btn-complete[data-v-50ef3d5e] {
  margin-top: 25px;
  border-radius: 37.5px;
  background-color: #e65927;
  color: #fff;
}
.perfilCliente .hidden[data-v-50ef3d5e] {
  display: none;
}
.perfilCliente .infoData[data-v-50ef3d5e] {
  padding: 20px 20px;
}</style><style>.BlockCard.card[data-v-02ce8cf3] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 30px;
}
.BlockCard.card .text[data-v-02ce8cf3] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockCard.card .borrador[data-v-02ce8cf3] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  border: none;
  background-color: #fff;
}
.BlockCard.card .BlockTitle[data-v-02ce8cf3] {
  font-family: Nordeco;
  font-size: 32px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockCard.card .BlockSubTitle[data-v-02ce8cf3] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockCard.card .Cardline-bottom[data-v-02ce8cf3] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.BlockCard.card .BlockText[data-v-02ce8cf3] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin-bottom: 30px;
  margin-top: 20px;
}
.BlockCard.card .Check .card[data-v-02ce8cf3] {
  padding: 10px 0;
}
.BlockCard.card .Check .card .form-check[data-v-02ce8cf3] {
  margin: 10px 15px;
}
.BlockCard.card .Check .card .form-check .img-fluid[data-v-02ce8cf3] {
  width: 56px;
}
.BlockCard.card .Check .card .body-text[data-v-02ce8cf3] {
  margin: 5px 15px;
}
.BlockCard.card .show-more[data-v-02ce8cf3] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.BlockCard.card .show-less[data-v-02ce8cf3] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.BlockCard.card .hidden[data-v-02ce8cf3] {
  display: none;
}
.BlockCard.card .OpClaimTitle[data-v-02ce8cf3] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockCard.card .OpClaimText[data-v-02ce8cf3] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin: 15px 0px;
}
.BlockCard.card .Importe[data-v-02ce8cf3] {
  font-family: CynthoNext;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockCard.card .blockBtn[data-v-02ce8cf3] {
  margin: 30px 0px;
  text-align: center;
}
.BlockCard.card .blockBtn .btn-next[data-v-02ce8cf3] {
  width: 30%;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}</style><style>.BlockResumen .resumen-title[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockResumen .resumen-edit[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.BlockResumen .Cardline-bottom[data-v-07c800bf] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.BlockResumen .list-group .list-group-item[data-v-07c800bf] {
  background-color: #f8fafc !important;
  border: none !important;
  padding: 0.25rem 0.25rem;
}
.BlockResumen .list-group .list-group-item .detail-title[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockResumen .list-group .list-group-item .detailt-input[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 15px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.BlockResumen .list-group .list-group-item .resumen-title[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockResumen .list-group .list-group-item .resumen-pago[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #254158;
}
.BlockResumen .list-group .list-group-item .total[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.BlockResumen .list-group .list-group-item .importe-total[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.BlockResumen .list-group .line-bottom[data-v-07c800bf] {
  margin-top: 10px;
  border: solid 1px #d3d3ce;
}
.BlockResumen .list-group .pago-title[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.31;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 15px;
}
.BlockResumen .list-group .contact-text[data-v-07c800bf] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}</style><style>.Deudor[data-v-4eb8c287] {
  background-color: #f8fafc;
  padding: 20px 20px;
}
.Deudor-title[data-v-4eb8c287] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.17;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .line-bottom[data-v-4eb8c287] {
  border-radius: 16px;
  background-color: #fff;
  border: solid 1px #e4e4df;
  margin-top: 10px;
}
.Deudor .Block-top[data-v-4eb8c287] {
  margin: 20px 0;
  padding: 0px 100px;
}
.Deudor .Block-top .badge-info.active[data-v-4eb8c287] {
  background-color: #e2ecfa !important;
}
.Deudor .Block-top .badge-info[data-v-4eb8c287] {
  background-color: #95958f;
}
.Deudor .Block-top .block-text[data-v-4eb8c287] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .BlockCard.card[data-v-4eb8c287] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 30px;
}
.Deudor .BlockCard.card .text[data-v-4eb8c287] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .borrador[data-v-4eb8c287] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
  border: none;
  background-color: #fff;
}
.Deudor .BlockCard.card .BlockTitle[data-v-4eb8c287] {
  font-family: Nordeco;
  font-size: 32px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .BlockSubTitle[data-v-4eb8c287] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .Cardline-bottom[data-v-4eb8c287] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.Deudor .BlockCard.card .BlockText[data-v-4eb8c287] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin-bottom: 30px;
  margin-top: 20px;
}
.Deudor .BlockCard.card .tipoDeudor[data-v-4eb8c287] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .form-check-label[data-v-4eb8c287] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
.Deudor .BlockCard.card .blockBtn[data-v-4eb8c287] {
  margin: 30px 0px;
  text-align: center;
}
.Deudor .BlockCard.card .blockBtn .btn-next[data-v-4eb8c287] {
  width: 30%;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}</style><style>.Deudor[data-v-799a0de0] {
  background-color: #f8fafc;
  padding: 20px 20px;
}
.Deudor-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.17;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .line-bottom[data-v-799a0de0] {
  border-radius: 16px;
  background-color: #fff;
  border: solid 1px #e4e4df;
  margin-top: 10px;
}
.Deudor .Block-top[data-v-799a0de0] {
  margin: 20px 0;
  padding: 0px 100px;
}
.Deudor .Block-top .badge-info.active[data-v-799a0de0] {
  background-color: #e2ecfa !important;
}
.Deudor .Block-top .badge-info[data-v-799a0de0] {
  background-color: #95958f;
}
.Deudor .Block-top .block-text[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .BlockCard.card[data-v-799a0de0] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 30px;
}
.Deudor .BlockCard.card .text[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .borrador[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.Deudor .BlockCard.card .BlockTitle[data-v-799a0de0] {
  font-family: Nordeco;
  font-size: 32px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .BlockSubTitle[data-v-799a0de0] {
  margin-top: 20px;
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .Cardline-bottom[data-v-799a0de0] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.Deudor .BlockCard.card .table .block-addDocument[data-v-799a0de0] {
  margin: 10px 0;
  background-color: #f8fafc;
}
.Deudor .BlockCard.card .Document.card[data-v-799a0de0] {
  padding: 15px 15px;
  border-radius: 8px;
  border: solid 1px #254158;
  background-color: #fff;
}
.Deudor .BlockCard.card .Document.card .Document-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .Document.card .form-check-label[data-v-799a0de0] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
.Deudor .BlockCard.card .Document.card .btn-save[data-v-799a0de0] {
  border-radius: 37.5px;
  background-color: #051c2c;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.Deudor .BlockCard.card .Document.card .btn-light[data-v-799a0de0] {
  border-radius: 37.5px;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.Deudor .BlockCard.card .tipoPago-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockCard.card .tipoPago .Cardline-bottom[data-v-799a0de0] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.Deudor .BlockCard.card .tipoPago-card[data-v-799a0de0] {
  padding: 20px 0;
}
.Deudor .BlockCard.card .tipoPago-card .card[data-v-799a0de0] {
  padding: 10px 10px;
}
.Deudor .BlockCard.card .PrecioTotal[data-v-799a0de0] {
  margin-top: 20px;
  text-align: center;
}
.Deudor .BlockCard.card .PrecioTotal-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .BlockCard.card .PrecioTotal-importe[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Deudor .BlockCard.card .TerminosCondiciones[data-v-799a0de0] {
  margin-bottom: 60px;
}
.Deudor .BlockCard.card .TerminosCondiciones-text[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
  padding: 0px 50px;
}
.Deudor .BlockCard.card .BlockText[data-v-799a0de0] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin-bottom: 30px;
  margin-top: 20px;
}
.Deudor .BlockCard.card .blockBtn[data-v-799a0de0] {
  margin: 30px 0px;
  text-align: center;
}
.Deudor .BlockCard.card .blockBtn .btn-next[data-v-799a0de0] {
  width: 40%;
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  border-radius: 37.5px;
  background-color: #e65927;
}
.Deudor .BlockResumen .resumen-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 18px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockResumen .resumen-edit[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.Deudor .BlockResumen .Cardline-bottom[data-v-799a0de0] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.Deudor .BlockResumen .list-group .list-group-item[data-v-799a0de0] {
  background-color: #f8fafc !important;
  border: none !important;
  padding: 0.25rem 0.25rem;
}
.Deudor .BlockResumen .list-group .list-group-item .detail-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockResumen .list-group .list-group-item .detailt-input[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 15px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.Deudor .BlockResumen .list-group .list-group-item .resumen-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockResumen .list-group .list-group-item .resumen-pago[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #254158;
}
.Deudor .BlockResumen .list-group .list-group-item .total[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.Deudor .BlockResumen .list-group .list-group-item .importe-total[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.Deudor .BlockResumen .list-group .line-bottom[data-v-799a0de0] {
  margin-top: 10px;
  border: solid 1px #d3d3ce;
}
.Deudor .BlockResumen .list-group .pago-title[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.31;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 15px;
}
.Deudor .BlockResumen .list-group .contact-text[data-v-799a0de0] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}</style><style>.HeaderBG[data-v-e558d370] {
  background-color: #e65927;
}
.ModalReclamacion[data-v-e558d370] {
  padding: 40px 0;
}
.ModalReclamacion .card[data-v-e558d370] {
  border-radius: 16px;
  background-color: #fff;
  padding: 40px 50px;
  /* .img-fluid {
      padding-top: 60px;
  } */
}
.ModalReclamacion .card-title[data-v-e558d370] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .ref[data-v-e558d370] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
  margin-bottom: 10px;
}
.ModalReclamacion .card .ref-val[data-v-e558d370] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card-text[data-v-e558d370] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin-bottom: 25px;
}
.ModalReclamacion .card .btn[data-v-e558d370] {
  border-radius: 37.5px;
  border: solid 1px #e65927;
  width: 50%;
}
.ModalReclamacion .card .btn-checkReclamacion[data-v-e558d370] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.ModalReclamacion .card .BlockData[data-v-e558d370] {
  margin-top: 50px;
}
.ModalReclamacion .card .BlockData .title[data-v-e558d370] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .line-bottom[data-v-e558d370] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item[data-v-e558d370] {
  background-color: #fff;
  border: none !important;
  padding: 0.25rem 0.25rem;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .detail-title[data-v-e558d370] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .detailt-input[data-v-e558d370] {
  font-family: Roobert;
  font-size: 15px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .resumen-title[data-v-e558d370] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .Cardline-bottom[data-v-e558d370] {
  margin: 10px 0;
  border: solid 1px #e4e4df;
}</style><style>.Tarifa[data-v-12fc0943] {
  background-color: #f8fafc;
  padding: 20px 20px;
}
.Tarifa .back[data-v-12fc0943] {
  cursor: pointer;
}
.Tarifa-title[data-v-12fc0943] {
  font-family: Roobert;
  font-size: 24px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.17;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Tarifa .line-bottom[data-v-12fc0943] {
  border-radius: 16px;
  background-color: #fff;
  border: solid 1px #e4e4df;
  margin-top: 10px;
}
.Tarifa .Block-top[data-v-12fc0943] {
  margin: 20px 0;
  padding: 0px 100px;
}
.Tarifa .Block-top .contenedor[data-v-12fc0943] {
  position: relative;
  text-align: center;
}
.Tarifa .Block-top .centrado[data-v-12fc0943] {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.Tarifa .Block-top .badge-info.active[data-v-12fc0943] {
  background-color: #e2ecfa !important;
}
.Tarifa .Block-top .badge-info[data-v-12fc0943] {
  background-color: #95958f;
}
.Tarifa .Block-top .block-text[data-v-12fc0943] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.Tarifa.hidden[data-v-12fc0943] {
  display: none;
}</style><style>.ClienteDer[data-v-1ddd7adb] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 20px 10px 20px;
  margin-bottom: 80px;
  /* .table-striped>tbody>tr:nth-child(even)>td, 
    .table-striped>tbody>tr:nth-child(even)>th {
     background-color: #fff;//cambiar color
    }
    .table-striped>thead>tr>th {
       background-color: #eee;
    } */
}
.ClienteDer .blockTop .blockButtons .filter[data-v-1ddd7adb] {
  border-radius: 37.5px;
  border: solid 1px #051c2c;
}
.ClienteDer .blockTop .blockButtons .filter .btn-filter[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #051c2c;
}
.ClienteDer .blockTop .blockButtons .blockClaim .btn-newclaim[data-v-1ddd7adb] {
  border-radius: 37.5px;
  background-color: #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
  height: 40px;
  vertical-align: middle;
}
.ClienteDer .btnTab[data-v-1ddd7adb] {
  border-radius: 16px;
  background-color: #051c2c;
}
.ClienteDer .btnTab input[type=radio][data-v-1ddd7adb] {
  opacity: 0;
  visibility: hidden;
  width: 0;
  height: 0;
  position: absolute;
}
.ClienteDer .btnTab .tabText[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #fff;
}
.ClienteDer .btnLight[data-v-1ddd7adb] {
  border-radius: 16px;
  background-color: #fff;
}
.ClienteDer .btnLight input[type=radio][data-v-1ddd7adb] {
  opacity: 0;
  visibility: hidden;
  width: 0;
  height: 0;
  position: absolute;
}
.ClienteDer .btnLight .tabText[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
}
.ClienteDer .line-bottom[data-v-1ddd7adb] {
  border: solid 1px #254158;
}
.ClienteDer .table[data-v-1ddd7adb] {
  border-color: #fff;
}
.ClienteDer .table .title-table[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.38;
  letter-spacing: normal;
  color: #254158;
}
.ClienteDer .table .text-table[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 15px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ClienteDer .table .text-table .type_claim[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #254158;
}
.ClienteDer .table .actions-btn[data-v-1ddd7adb] {
  display: flex;
}
.ClienteDer .table .badge-ok[data-v-1ddd7adb] {
  padding: 8px 11px;
  border-radius: 16px;
  border: solid 1px #c4f7dd !important;
  background-color: #dbfbea !important;
}
.ClienteDer .table .badge-ok .badge-text[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #11aa5d !important;
}
.ClienteDer .table .badge-ko[data-v-1ddd7adb] {
  border-radius: 16px;
  border: solid 1px #fadad0 !important;
  background-color: #fceae4 !important;
}
.ClienteDer .table .badge-ko .badge-text[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #b61616 !important;
}
.ClienteDer .table .badge-cancel[data-v-1ddd7adb] {
  border-radius: 16px;
  border: solid 1px #b61616 !important;
  background-color: #b61616 !important;
}
.ClienteDer .table .badge-cancel .badge-text[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff !important;
}
.ClienteDer .table .btn-showClaim[data-v-1ddd7adb] {
  border-radius: 8px;
  border: solid 0.5px #3f607d;
}
.ClienteDer .table-striped > tbody > tr:nth-child(odd) > td[data-v-1ddd7adb],
.ClienteDer .table-striped > tbody > tr:nth-child(odd) > th[data-v-1ddd7adb] {
  background-color: #f8fafc;
}
.ClienteDer .result[data-v-1ddd7adb] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: left;
  color: #254158;
}
.ClienteDer .pagination[data-v-1ddd7adb] {
  justify-content: end;
}</style><style>.Representacion[data-v-9bfde6aa] {
  border-radius: 16px;
  background-color: #fff;
  padding: 10px 20px 10px 20px;
}
.Representacion .btn-representacion[data-v-9bfde6aa] {
  border-radius: 37.5px;
  background-color: #e65927;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}
.Representacion-header[data-v-9bfde6aa] {
  margin-top: 50px;
}
.Representacion-header .title[data-v-9bfde6aa] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.Representacion-header .btn-actions[data-v-9bfde6aa] {
  float: right;
  display: flex;
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
  cursor: pointer;
}
.Representacion .line-bottom[data-v-9bfde6aa] {
  border-radius: 16px;
  background-color: #fff;
  border: 1px solid #d3d3ce;
}
.Representacion ul li[data-v-9bfde6aa] {
  list-style: none;
}</style><style>.ModalReclamacion[data-v-0cb2147a] {
  margin-bottom: 80px;
}
.ModalReclamacion .backPage[data-v-0cb2147a] {
  margin-bottom: 10px;
}
.ModalReclamacion .backPage .volver[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card[data-v-0cb2147a] {
  border-radius: 16px;
  background-color: #fff;
  padding: 40px 50px;
  /* .img-fluid {
      padding-top: 60px;
  } */
}
.ModalReclamacion .card .blockBadge .badge-ok[data-v-0cb2147a] {
  padding: 8px 11px;
  border-radius: 16px;
  border: solid 1px #c4f7dd !important;
  background-color: #dbfbea !important;
}
.ModalReclamacion .card .blockBadge .badge-ok .badge-text[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #11aa5d !important;
}
.ModalReclamacion .card .blockBadge .badge-ko[data-v-0cb2147a] {
  border-radius: 16px;
  border: solid 1px #fadad0 !important;
  background-color: #fceae4 !important;
}
.ModalReclamacion .card .blockBadge .badge-ko .badge-text[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #b61616 !important;
}
.ModalReclamacion .card .blockBadge .badge-cancel[data-v-0cb2147a] {
  border-radius: 16px;
  border: solid 1px #b61616 !important;
  background-color: #b61616 !important;
}
.ModalReclamacion .card .blockBadge .badge-cancel .badge-text[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #fff !important;
}
.ModalReclamacion .card .ref[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 32px;
  font-weight: 300;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .ref-val[data-v-0cb2147a] {
  font-weight: normal;
}
.ModalReclamacion .card .dateClaim[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.85;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .dateClaim-text[data-v-0cb2147a] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
}
.ModalReclamacion .card-text[data-v-0cb2147a] {
  font-family: CynthoNext;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  color: #254158;
  margin-bottom: 25px;
}
.ModalReclamacion .card .btn[data-v-0cb2147a] {
  border-radius: 37.5px;
  border: solid 1px #e65927;
  width: 50%;
}
.ModalReclamacion .card .btn-checkReclamacion[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.ModalReclamacion .card .BlockData[data-v-0cb2147a] {
  margin-top: 50px;
}
.ModalReclamacion .card .BlockData .title[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 20px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.4;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .line-bottom[data-v-0cb2147a] {
  margin-top: 10px;
  border: solid 1px #254158;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item[data-v-0cb2147a] {
  background-color: #fff;
  border: none !important;
  padding: 0.25rem 0.25rem;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .detail-title[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 12px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .detailt-input[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 15px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .list-group .list-group-item .resumen-title[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 13px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #051c2c;
}
.ModalReclamacion .card .BlockData .Cardline-bottom[data-v-0cb2147a] {
  margin: 10px 0;
  border: solid 1px #e4e4df;
}
.ModalReclamacion .card .block-Cancel .block-btn[data-v-0cb2147a] {
  -moz-text-align-last: center;
       text-align-last: center;
}
.ModalReclamacion .card .block-Cancel .block-btn .btn-cancel[data-v-0cb2147a] {
  border-radius: 37.5px;
  border: solid 1px #e65927;
  margin: 30px 0px;
  text-align: center;
}
.ModalReclamacion .card .block-Cancel .block-btn .btn-cancel .btn-text[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #e65927;
}
.ModalReclamacion .card .block-Cancel .text-cancel[data-v-0cb2147a] {
  font-family: Roobert;
  font-size: 14px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #254158;
}</style><style>@import url(https://fonts.googleapis.com/css?family=Montserrat:400,600,700);</style><style>@import url(https://fonts.googleapis.com/css?family=Catamaran:400,800);</style><style>.error-container[data-v-167ae8c1] {
  text-align: center;
  font-size: 180px;
  font-family: "Catamaran", sans-serif;
  font-weight: 800;
  margin: 20px 15px;
}
.error-container > span[data-v-167ae8c1] {
  display: inline-block;
  line-height: 0.7;
  position: relative;
  color: #FFB485;
}
.error-container > span[data-v-167ae8c1] {
  display: inline-block;
  position: relative;
  vertical-align: middle;
}
.error-container > span[data-v-167ae8c1]:nth-of-type(1) {
  color: #D1F2A5;
  -webkit-animation: colordancing-data-v-167ae8c1 4s infinite;
          animation: colordancing-data-v-167ae8c1 4s infinite;
}
.error-container > span[data-v-167ae8c1]:nth-of-type(3) {
  color: #F56991;
  -webkit-animation: colordancing2-data-v-167ae8c1 4s infinite;
          animation: colordancing2-data-v-167ae8c1 4s infinite;
}
.error-container > span[data-v-167ae8c1]:nth-of-type(2) {
  width: 120px;
  height: 120px;
  border-radius: 999px;
}
.error-container > span[data-v-167ae8c1]:nth-of-type(2):before,
.error-container > span[data-v-167ae8c1]:nth-of-type(2):after {
  border-radius: 0%;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: inherit;
  height: inherit;
  border-radius: 999px;
  box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4), inset 0 30px 0 rgba(239, 250, 180, 0.4), inset -30px 0 0 rgba(255, 196, 140, 0.4), inset 0 -30px 0 rgba(245, 105, 145, 0.4);
  -webkit-animation: shadowsdancing-data-v-167ae8c1 4s infinite;
          animation: shadowsdancing-data-v-167ae8c1 4s infinite;
}
.error-container > span[data-v-167ae8c1]:nth-of-type(2):before {
  transform: rotate(45deg);
}
.screen-reader-text[data-v-167ae8c1] {
  position: absolute;
  top: -9999em;
  left: -9999em;
}
@-webkit-keyframes shadowsdancing-data-v-167ae8c1 {
0% {
    box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4), inset 0 30px 0 rgba(239, 250, 180, 0.4), inset -30px 0 0 rgba(255, 196, 140, 0.4), inset 0 -30px 0 rgba(245, 105, 145, 0.4);
}
25% {
    box-shadow: inset 30px 0 0 rgba(245, 105, 145, 0.4), inset 0 30px 0 rgba(209, 242, 165, 0.4), inset -30px 0 0 rgba(239, 250, 180, 0.4), inset 0 -30px 0 rgba(255, 196, 140, 0.4);
}
50% {
    box-shadow: inset 30px 0 0 rgba(255, 196, 140, 0.4), inset 0 30px 0 rgba(245, 105, 145, 0.4), inset -30px 0 0 rgba(209, 242, 165, 0.4), inset 0 -30px 0 rgba(239, 250, 180, 0.4);
}
75% {
    box-shadow: inset 30px 0 0 rgba(239, 250, 180, 0.4), inset 0 30px 0 rgba(255, 196, 140, 0.4), inset -30px 0 0 rgba(245, 105, 145, 0.4), inset 0 -30px 0 rgba(209, 242, 165, 0.4);
}
100% {
    box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4), inset 0 30px 0 rgba(239, 250, 180, 0.4), inset -30px 0 0 rgba(255, 196, 140, 0.4), inset 0 -30px 0 rgba(245, 105, 145, 0.4);
}
}
@keyframes shadowsdancing-data-v-167ae8c1 {
0% {
    box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4), inset 0 30px 0 rgba(239, 250, 180, 0.4), inset -30px 0 0 rgba(255, 196, 140, 0.4), inset 0 -30px 0 rgba(245, 105, 145, 0.4);
}
25% {
    box-shadow: inset 30px 0 0 rgba(245, 105, 145, 0.4), inset 0 30px 0 rgba(209, 242, 165, 0.4), inset -30px 0 0 rgba(239, 250, 180, 0.4), inset 0 -30px 0 rgba(255, 196, 140, 0.4);
}
50% {
    box-shadow: inset 30px 0 0 rgba(255, 196, 140, 0.4), inset 0 30px 0 rgba(245, 105, 145, 0.4), inset -30px 0 0 rgba(209, 242, 165, 0.4), inset 0 -30px 0 rgba(239, 250, 180, 0.4);
}
75% {
    box-shadow: inset 30px 0 0 rgba(239, 250, 180, 0.4), inset 0 30px 0 rgba(255, 196, 140, 0.4), inset -30px 0 0 rgba(245, 105, 145, 0.4), inset 0 -30px 0 rgba(209, 242, 165, 0.4);
}
100% {
    box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4), inset 0 30px 0 rgba(239, 250, 180, 0.4), inset -30px 0 0 rgba(255, 196, 140, 0.4), inset 0 -30px 0 rgba(245, 105, 145, 0.4);
}
}
@-webkit-keyframes colordancing-data-v-167ae8c1 {
0% {
    color: #D1F2A5;
}
25% {
    color: #F56991;
}
50% {
    color: #FFC48C;
}
75% {
    color: #EFFAB4;
}
100% {
    color: #D1F2A5;
}
}
@keyframes colordancing-data-v-167ae8c1 {
0% {
    color: #D1F2A5;
}
25% {
    color: #F56991;
}
50% {
    color: #FFC48C;
}
75% {
    color: #EFFAB4;
}
100% {
    color: #D1F2A5;
}
}
@-webkit-keyframes colordancing2-data-v-167ae8c1 {
0% {
    color: #FFC48C;
}
25% {
    color: #EFFAB4;
}
50% {
    color: #D1F2A5;
}
75% {
    color: #F56991;
}
100% {
    color: #FFC48C;
}
}
@keyframes colordancing2-data-v-167ae8c1 {
0% {
    color: #FFC48C;
}
25% {
    color: #EFFAB4;
}
50% {
    color: #D1F2A5;
}
75% {
    color: #F56991;
}
100% {
    color: #FFC48C;
}
}
/* demo stuff */
*[data-v-167ae8c1] {
  box-sizing: border-box;
}
body[data-v-167ae8c1] {
  background-color: #416475;
  margin-bottom: 50px;
}
html[data-v-167ae8c1],
button[data-v-167ae8c1],
input[data-v-167ae8c1],
select[data-v-167ae8c1],
textarea[data-v-167ae8c1] {
  font-family: "Montserrat", Helvetica, sans-serif;
  color: #92a4ad;
}
h1[data-v-167ae8c1] {
  text-align: center;
  margin: 30px 15px;
}
.zoom-area[data-v-167ae8c1] {
  max-width: 490px;
  margin: 30px auto 30px;
  font-size: 19px;
  text-align: center;
}
.link-container[data-v-167ae8c1] {
  text-align: center;
}
a.more-link[data-v-167ae8c1] {
  text-transform: uppercase;
  font-size: 13px;
  background-color: #92a4ad;
  padding: 10px 15px;
  border-radius: 0;
  color: #416475;
  display: inline-block;
  margin-right: 5px;
  margin-bottom: 5px;
  line-height: 1.5;
  text-decoration: none;
  margin-top: 50px;
  letter-spacing: 1px;
}</style>

<style>@font-face{
    font-family: "MunaleLoird";
    src: url({{url('landing')}}/fonts/Munale-Loird.otf?b5ddd702f74ba4b37fafa1a41cbfeda6);
    font-weight: normal;
    font-style: normal;
}

@font-face{
    font-family: "Roobert";
    src: url({{url('landing')}}/fonts/Roobert-Light.otf?d941cb2e666a7aa59bde258fee032353);
    font-weight: normal;
    font-style: normal;
}

@font-face{
    font-family: "Nordeco";
    src: url({{url('landing')}}/fonts/Nordeco-Bold.ttf?8af6374e99a291f2eface98ea0ae60fb);
    font-weight: normal;
    font-style: normal;
}

@font-face{
    font-family: "CynthoNext";
    src: url({{url('landing')}}/fonts/CynthoNextRegular.otf?4507693a090cb6984955b7d663cebfa8);
    font-weight: normal;
    font-style: normal;
}
#background-video {
  width: 100%;
  height: 100vh;
  object-fit: cover;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: 0;
}

.navbar-dark {
  background-color: #fff;
}

</style>



<body>
  <div data-v-e8aafb5e="" class="modal-vue modal fade" id="reclamacion-viable">

    <div data-v-e8aafb5e="" role="document" class="modal-dialog"><div data-v-e8aafb5e="" class="modal-content"><div data-v-e8aafb5e="" class="modal-header"><button data-v-e8aafb5e="" type="button" data-dismiss="modal" aria-label="Close" class="close"><span data-v-e8aafb5e="" aria-hidden="true">×</span></button></div> <div data-v-e8aafb5e="" class="modal-body"><div data-v-e8aafb5e="" class="modal-img text-center"><img data-v-e8aafb5e="" src="{{url('landing/assets/grafico-ilustraciones-simulador-exito.png')}}" class="img-fluid"></div> <!----> <div data-v-e8aafb5e="" class="modal-text-info text-center">
                            Su reclamación es viable <a data-v-e8aafb5e=""><img data-v-e8aafb5e="" src="{{url('landing/assets/icons-info-line.png')}}" class="img-fluid"></a></div> <div data-v-e8aafb5e="" class="modal-text text-center">
                            ¡Registre su reclamación para que nuestros abogados comiencen a trabajar!
                        </div></div> <div data-v-e8aafb5e="" class="modal-footer"><a data-v-e8aafb5e="" href="{{url('register')}}" class="btn btn-modal"><span data-v-e8aafb5e="" class="footer-text">¡Regístrate y recupera tu deuda!</span></a></div></div></div></div>


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




    <div id="app"><main>
      <div data-v-effc9f78="" data-v-63cd6604=""><div data-v-66372912="" data-v-63cd6604="" class="portada-3dblue" data-v-effc9f78="">


        <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
          <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4">
        </video>

        <div data-v-66372912="" class="block-CMO-FUNCIONA"><a data-v-66372912="" href="#como-funciona" class="CMO-FUNCIONA">NUESTRA FILOSOFÍA <img data-v-66372912="" src="{{url('landing')}}/assets/icons-arrow-down-white.png" class="iconsarrow-down img-fluid"></a></div>

        <nav data-v-5fddf304="" data-v-66372912="" class="navbar navbar-expand-lg navbar-dark"><div data-v-5fddf304="" class="container"><a data-v-5fddf304="" href="" aria-current="page" class="navbar-brand router-link-exact-active router-link-active" style=""><div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304="" src="{{url('landing')}}/assets/grafico-logo-positivo.png" class="graficologonegativo"></div></a> <a data-v-5fddf304="" href="" aria-current="page" class="navbar-brand router-link-exact-active router-link-active" style="display: none;"><div data-v-5fddf304="" class="bartopbardefault-copy-3"><img data-v-5fddf304="" src="{{url('landing')}}/assets/grafico-logo-positivo.png" class="graficologonegativo"></div></a> <button data-v-5fddf304="" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span data-v-5fddf304="" class="navbar-toggler-icon"></span></button> <div data-v-5fddf304="" id="navbarCollapse" class="navbar-collapse" style="display: none;"><ul data-v-5fddf304="" class="navbar-nav"><li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('testimonios')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Testimonios
                        </span></a> <div data-v-5fddf304="" class=""></div></li> <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('quienes-somos')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            ¿Quiénes somos?
                        </span></a> <div data-v-5fddf304="" class=""></div></li> <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('preguntas')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            ¿Tienes dudas?
                        </span></a> <div data-v-5fddf304="" class=""></div></li> <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('tarifas')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Tarifas
                        </span></a> <div data-v-5fddf304="" class=""></div></li> <li data-v-5fddf304="" class="nav-item"><a data-v-5fddf304="" href="{{url('contacto')}}" class="nav-link"><span data-v-5fddf304="" class="Type-something">
                            Contacto
                        </span></a> <div data-v-5fddf304="" class=""></div></li></ul> <div data-v-5fddf304="" class="navbar-nav ml-auto"><div data-v-5fddf304="" class="blockAcceso"><a data-v-5fddf304="" href="{{url('login')}}" class="btn btn-acceso"><span data-v-5fddf304="" class="btn-text-acceso">
                            Acceso
                        </span></a></div> <div data-v-5fddf304="" class="blockRegistro"><a data-v-5fddf304="" href="{{url('register')}}" class="btn btn-registerHome"><span data-v-5fddf304="" class="text-register-btn">
                            Regístrate
                            <img data-v-5fddf304="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-right"></span></a></div></div> <!----></div></div></nav> <div data-v-66372912="" class="container"><div data-v-66372912="" class="row"><div data-v-66372912="" id="text-p" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                              {{-- <span data-v-66372912="" class="Lorem-ipsum-dolor-si">
                                Lorem ipsum dolor sit amet, consectetur
                              </span> --}}
                    <div data-v-66372912=""><span data-v-66372912="" class="Te-ayudamos-a-recupe">
                        Con Dividae, verás recuperada esa deuda que dabas por perdida
                    </span></div> <div data-v-66372912=""><div data-v-66372912="" class="blockRegistro"><a data-v-66372912="" href="{{url('register')}}" class="btn btn-registerHome"><span data-v-66372912="" class="text-register-btn">
                                Regístrate
                                <img data-v-66372912="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-right img-fluid"></span></a></div></div>


                              </div>
                                 <ul data-v-7b4478c1="" data-v-66372912="" id="social-sidebar" style=""><li data-v-7b4478c1="" class="icons-social"><a data-v-7b4478c1="" href="" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/icon-whatsapp.png"></a></li> <li data-v-7b4478c1="" class="icons-social"><a data-v-7b4478c1="" href="" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/icon-instagram.png"></a></li> <li data-v-7b4478c1="" class="follow-social">
        Síguenos en
    </li></ul> <div data-v-66372912="" id="pagetop" data-toggle="modal" data-target="#consulta-viabilidad" class="fixed right-0 bottom-0" style="display: none-;"><div data-v-66372912="" id="blockform-scroll">

      <div data-v-66372912="" class="row Scroll"><div data-v-66372912="" class="col-2 Scroll-icon"><img data-v-66372912="" src="{{url('landing')}}/assets/group.png"></div> <div data-v-66372912="" class="col-6 Scroll-text">
                                ¿Quieres saber si tu reclamación es viable?
                            </div> <div data-v-66372912="" class="col-4 Scroll-btn"><button data-v-66372912="" class="btn btn-light">Comprobar</button></div></div></div></div>

                  </div></div></div> <div data-v-494d1a60="" data-v-63cd6604="" id="como-funciona" data-v-effc9f78=""><div data-v-494d1a60="" class="card text-center card-reclamacion container"><div data-v-494d1a60="" id="block-reclamacion"><div data-v-494d1a60="" class="text-reclamacion mb-4 mt-4">NUESTRA FILOSIFÍA</div></div> <div data-v-494d1a60="" class="blockBTN"><div data-v-494d1a60="" class="text-center">

                    {{-- <a data-v-494d1a60="" class="changetype btn active"><span data-v-494d1a60="" class="text-btn">Reclamación amistosa</span></a>
                    <a data-v-494d1a60="" class="changetype btn"><span data-v-494d1a60="" class="text-btn">Reclamación judicial</span></a> --}}
                  </div></div>

                  <div data-v-494d1a60="" href="#amistosa" class="card-body">

                    <div data-v-494d1a60="" class="row">

                      <div data-v-494d1a60="" class="col-xl-12 col-lg-12 col-sm-12 col-xs-12"><div data-v-494d1a60="" class="card-text Reclamacion">Reclamación amistosa</div></div>

                      <div data-v-494d1a60="" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div data-v-494d1a60="" class="card-text Lorem-ipsum-dolor-si">
                          <p>
                            <b>Dividae</b> surge para ofrecer una solución a los miles de autónomos y pequeños empresarios que desconocen que una factura impagada sí puede reclamarse 100% online de forma <b>sencilla, exitosa y económica.</b> 
                          </p>
                          <p>
                            Nuestra <b>filosofía</b> se basa en una dinámica de trabajo 100% transparente, informando a nuestros clientes de del estado de la recuperación en tiempo real y de forma automatizada a través del área personal. 
                          </p>
                          <p>
                            ¿Nuestro principal objetivo? Tu libertad y tranquilidad <b>¿Te unes?</b>
                          </p>
                        </div>

                        <div class="floating-bubble" style="width: 180px; height: 180px; padding: 10px; border-radius: 200px; background-color: #2c60aa; position: relative; margin: auto">
                          
                          <div style="height: fit-content; position: absolute; margin: auto; top: 0; bottom: 0; left: 0; right: 0; color: #fff">La <b>suscripción</b> y <br> el análisis de la <br> <b>reclamación</b> es <br> totalmente <br> gratuito!</div>

                        </div>

                    {{-- <p data-v-494d1a60="" class="card-text"><img data-v-494d1a60="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                        (Funcionalidad 1) Mauris malesuada nisi sit amet augue accumsan tincidunt. Maecenas tincidunt, velit ac porttitor pulvinar, tortor eros facilisis libero, vitae commodo nunc quam et ligula.
                    </p> <p data-v-494d1a60="" class="card-text"><img data-v-494d1a60="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                        (Funcionalidad 2) Ut nec ipsum sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer id nisi nec nulla luctus lacinia non eu turpis.
                    </p> <p data-v-494d1a60="" class="card-text"><img data-v-494d1a60="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                        (Funcionalidad 3) Etiam in ex imperdiet justo tincidunt egestas. Ut porttitor urna ac augue cursus tincidunt sit amet sed orci.
                    </p> --}}

                    </div> <div data-v-494d1a60="" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"><img data-v-494d1a60=""
                      other="{{url('landing')}}/assets/judicial.jpg"
                      src="{{url('landing')}}/assets/amistosa.jpg" class="img-amistosa img-fluid"></div>

                    </div>

                  </div> <!----></div></div>

                    <div data-v-9cc878a2="" data-v-63cd6604="" class="blockTarifa" data-v-effc9f78=""><div data-v-9cc878a2="" class="text-center card-tarifa container"><div data-v-9cc878a2="" class="text-tarifa">¿Cuánto cuesta?</div> <div data-v-9cc878a2="" class="row mb-3 text-center blockCard">

                      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        
                      </div>

                      {{-- <div data-v-9cc878a2="" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><!----> <div data-v-9cc878a2="" class="card mb-4 rounded-3"><div data-v-9cc878a2="" class="py-3"><span data-v-9cc878a2="" class="my-0 fw-normal text-t1">Tarifa 1</span></div> <div data-v-9cc878a2="" class="card-body"><span data-v-9cc878a2="" class="badge rounded-pill badge-price">100€</span> <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4"><li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 1) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li> <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 2) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li> <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 3) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li></ul></div> <div data-v-9cc878a2="" class="card-footer bg-transparent shadow-sm"><a data-v-9cc878a2="" href="" aria-current="page" class="btn btn-tarifa router-link-exact-active router-link-active" type="button">
                            DESCUBRIR MÁS
                            <!----> <span data-v-9cc878a2=""><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-arrow-right-black.png" class="iconsarrow-right"></span></a></div></div></div> --}}

                            <div data-v-9cc878a2="" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 OPFrecuente"><div data-v-9cc878a2="" class="op-frecuente">Opción más frecuente</div> <div data-v-9cc878a2="" class="card mb-4 rounded-3"><div data-v-9cc878a2="" class="py-3"><span data-v-9cc878a2="" class="my-0 fw-normal text-t1">Tarifa única</span></div> <div data-v-9cc878a2="" class="card-body"><span data-v-9cc878a2="" class="badge rounded-pill badge-price">19,90€</span> <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4">

                              <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    Dividae trabaja de forma clara con las tarifas establecidas. Toda reclamación comienza de manera amistosa con una tarifa única.
                                </p>
                              </li>

                              {{-- <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 2) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li>

                              <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 3) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li> --}}

                              </ul></div> <div data-v-9cc878a2="" class="card-footer bg-transparent shadow-sm"><a data-v-9cc878a2="" href="" aria-current="page" class="btn btn-tarifa router-link-exact-active router-link-active" type="button">
                            DESCUBRIR MÁS
                            <!----> <span data-v-9cc878a2=""><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-arrow-right-black.png" class="iconsarrow-right"></span></a></div></div></div>

                            {{-- <div data-v-9cc878a2="" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12"><!----> <div data-v-9cc878a2="" class="card mb-4 rounded-3"><div data-v-9cc878a2="" class="py-3"><span data-v-9cc878a2="" class="my-0 fw-normal text-t1">Tarifa 3</span></div> <div data-v-9cc878a2="" class="card-body"><span data-v-9cc878a2="" class="badge rounded-pill badge-price">200€</span> <ul data-v-9cc878a2="" class="list-unstyled mt-3 mb-4"><li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 1) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li> <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 2) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li> <li data-v-9cc878a2=""><p data-v-9cc878a2="" class="card-text"><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-check-circle.png" class="iconscheck-circle">
                                    (Funcionalidad 3) Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p></li></ul></div> <div data-v-9cc878a2="" class="card-footer bg-transparent shadow-sm"><a data-v-9cc878a2="" href="" aria-current="page" class="btn btn-tarifa router-link-exact-active router-link-active" type="button">
                            DESCUBRIR MÁS
                            <!----> <span data-v-9cc878a2=""><img data-v-9cc878a2="" src="{{url('landing')}}/assets/icons-arrow-right-black.png" class="iconsarrow-right"></span></a></div></div></div> --}}

                          </div></div></div> <div data-v-63cd6604="" data-v-effc9f78="" class="blockQSomos"><div data-v-63cd6604="" data-v-effc9f78="" class="container card"><div data-v-63cd6604="" data-v-effc9f78="" class="row"><div data-v-63cd6604="" data-v-effc9f78="" class="col-lg-8 col-md-12 col-xs-12 col-sm-12 QSomos"><div data-v-63cd6604="" data-v-effc9f78="" class="QSomos-title">
                        ¿Quiénes somos?
                    </div> <div data-v-63cd6604="" data-v-effc9f78="" class="QSomos-text">

                      <p><b>Dividae</b> es una plataforma 100% online que ofrece a empresarios y autónomos la solución para reclamar facturas que nunca les pagaron. Esta línea de negocio es parte de <b>Atlante</b>, uno de los principales proveedores de servicios de recuperación de deuda de España. </p>

                      <p>Desde sus inicios, <b>Atlante</b> ha identificado la forma de automatizar y estandarizar los procesos. Ante un sector tradicionalmente poco digitalizado, <b>Atlante</b> se ha centrado en disponer de todos los recursos tecnológicos necesarios para la representación procesal y gestión documental en carteras masivas. </p>

                      <p>Gracias al conocimiento del sector,  su equipo de profesionales y a la firme apuesta tecnológica, en el año 2021 se crea <b>Dividae</b> con la firme intención de convertirse líderes en el mercado, mejorar las eficiencias y ganar en tiempo con la recuperación de facturas impagadas 100% digital. </p>


                    </div> <div data-v-63cd6604="" data-v-effc9f78=""><span data-v-63cd6604="" data-v-effc9f78=""><a data-v-63cd6604="" href="{{url('quienes-somos')}}" class="btn QSomos-btn" data-v-effc9f78="">
                                DESCUBRIR MÁS
                                <img data-v-63cd6604="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-right img-fluid"></a></span></div></div> <div data-v-63cd6604="" data-v-effc9f78="" class="col-lg-4 col-md-12 col-xs-12 col-sm-12 img-QSomos"><img data-v-63cd6604="" data-v-effc9f78="" src="{{url('landing')}}/assets/element-shape-rd-16.png" class="img-fluid"></div></div></div></div>



                                <div data-v-43503c2a="" data-v-63cd6604="" class="blockRecovery" data-v-effc9f78=""><div data-v-43503c2a="" class="container"><div data-v-43503c2a="" class="text-center RText">
            ¿Por qué Dividae?
        </div> <div data-v-43503c2a="" class="row Recovery"><div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a="" src="{{url('landing')}}/assets/icon-large-digital.png" class="iconlargejusticia img-thumbnails img-fluid"></div> <div data-v-43503c2a=""><p data-v-43503c2a="" class="Recovery-title">
                        Plataforma 100% digital
                    </p> <p data-v-43503c2a="" class="Recovery-text">
                        Todo el proceso de reclamación se realiza de manera 100% digital, conociendo en tiempo real el estado de la reclamación.
                    </p></div></div> <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a="" src="{{url('landing')}}/assets/icon-large-seguridad.png" class="iconlargejusticia img-thumbnails img-fluid"></div> <div data-v-43503c2a=""><p data-v-43503c2a="" class="Recovery-title">
                        Con máxima seguridad jurídica
                    </p> <p data-v-43503c2a="" class="Recovery-text">
                        Dividae es parte de ANGECO y cuenta con el sello de “Confianza Online”. Además, cumple con todos los requisitos de calidad ofreciendo a sus clientes máxima protección y confidencialidad durante todo el proceso. 
                    </p></div></div> <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a="" src="{{url('landing')}}/assets/icon-large-justicia.png" class="iconlargejusticia img-thumbnails img-fluid"></div> <div data-v-43503c2a=""><p data-v-43503c2a="" class="Recovery-title">
                        Experiencia contrastada
                    </p> <p data-v-43503c2a="" class="Recovery-text">
                        Dividae cuenta con experiencia contrastada ya que desde 2016 es uno de los proveedores de servicios de recuperación de deuda de España. 
                    </p></div></div>
                    <div data-v-43503c2a="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><div data-v-43503c2a="" class="Recovery-img"><img data-v-43503c2a="" src="{{url('landing')}}/assets/icon-large-justicia.png" class="iconlargejusticia img-thumbnails img-fluid"></div> <div data-v-43503c2a=""><p data-v-43503c2a="" class="Recovery-title">
                        Transparente
                    </p> <p data-v-43503c2a="" class="Recovery-text">
                        No te cobraremos nada sin tu consentimiento. Además, la suscripción y el análisis de la reclamación es totalmente gratuito. 
                    </p></div></div>
                  </div></div></div>


                     <div data-v-e047c7bc="" data-v-63cd6604="" class="blockEstadisticas" data-v-effc9f78=""><div data-v-e047c7bc="" class="row estadisticas container"><div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6"><p data-v-e047c7bc="" class="estadisticas-title">2021</p> <p data-v-e047c7bc="" class="estadisticas-text">año de creación</p></div> <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6"><p data-v-e047c7bc="" class="estadisticas-title">+16.000</p> <p data-v-e047c7bc="" class="estadisticas-text">notificaciones diarias</p></div> <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6"><p data-v-e047c7bc="" class="estadisticas-title">+120.000</p> <p data-v-e047c7bc="" class="estadisticas-text"> Procedimientos iniciados desde 2021</p></div> <div data-v-e047c7bc="" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6"><p data-v-e047c7bc="" class="estadisticas-title">+150.000</p> <p data-v-e047c7bc="" class="estadisticas-text">Demandas</p></div></div></div>


                    <div data-v-455dcd3f="" data-v-63cd6604="" class="blockOpiniones" data-v-effc9f78=""><div data-v-455dcd3f="" class="content"><div data-v-455dcd3f="" class="container Opinion"><div data-v-455dcd3f="" class="row"><div data-v-455dcd3f="" class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 Opinion-col1"><div data-v-455dcd3f="" class="block-DR"><div data-v-455dcd3f="" class="text-deuda-recuperada">
                            Deuda recuperada
                        </div> <div data-v-455dcd3f="" class="price-DR">
                            3.000<span data-v-455dcd3f="" class="text-style-1">€</span></div></div> <img data-v-455dcd3f="" src="{{url('landing')}}/assets/testimonio-1.png" class="testimonio-1 img-fluid"></div> <div data-v-455dcd3f="" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 Opinion-col2"><div data-v-455dcd3f="" class="Opinion-empresa">Gestoría Antonio</div> <div data-v-455dcd3f="" class="Opinion-cliente">Antonio Fernández </div> <div data-v-455dcd3f="" class="Opinion-text"><div data-v-455dcd3f="" class="row"><div data-v-455dcd3f="" class="col-1 blockquote-up"><img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-up.png" class="blockquote"></div> <div data-v-455dcd3f="" class="col-10 block-text">

                              <p>Soy Antonio y tengo una gestoría en La Rioja. <b>Dividae</b> se puso en contacto conmigo para poder ofrecer a mis clientes sus servicios. Dentro de mi cartera de clientes, muchos son los que tienen facturas pendientes de pago y las daban por perdidas.</p>

                              <p>Con Dividae, muchos clientes recuperan sus facturas impagadas y ahora se ha convertido en parte de unos de los servicios esenciales que ofrecemos en la gestoría. Agilizamos en tiempo y ofrecemos transparencia durante todo el proceso. </p>

                            </div> <div data-v-455dcd3f="" class="col-1 blockquote-down"><img data-v-455dcd3f="" src="{{url('landing')}}/assets/blockquote-down.png" class="blockquote"></div></div></div></div></div></div>  <div data-v-455dcd3f="" class="container OCliente"><div data-v-455dcd3f="" class="OCliente-title">¿Qué opinan nuestros clientes?</div> <div data-v-455dcd3f="" class="OCliente-text">
                Conoce las opiniones de personas que ya han confiado en <b>Dividae</b>.
            </div>

            <br>
            <br>



                          <div id="testimonios" class="owl-carousel owl-theme">

                            <div data-v-1cb0bef4="" class="card"><div data-v-1cb0bef4="" class="card-body"><div data-v-1cb0bef4="" class="row block-slide-1"><div data-v-1cb0bef4="" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/blockquote-up.png" class="img-fluid"></div> <div data-v-1cb0bef4="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                Experiencia de Usuario inmejorable. En todo momento conoces el estado de la reclamación. 100% recomendable. 
                            </div></div> <br> <div data-v-1cb0bef4="" class="row block-slide-2"><div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/rectangle3.png"></div> <div data-v-1cb0bef4="" class="col OClientes-text-slides2"><div data-v-1cb0bef4="">
                                    Laura Fernandez
                                    <br data-v-1cb0bef4="">
                                    @Empresa4
                                </div></div> <div data-v-1cb0bef4="" class="col OClientes-rating-slides2"><div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"></div></div></div></div></div>


                                <div data-v-1cb0bef4="" class="card"><div data-v-1cb0bef4="" class="card-body"><div data-v-1cb0bef4="" class="row block-slide-1"><div data-v-1cb0bef4="" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/blockquote-up.png" class="img-fluid"></div> <div data-v-1cb0bef4="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                Conocí <b>Dividae</b> por mi gestoría. Transparente y sencillo. Además comienzan la reclamación con un único pago y te mantienen informado siempre. No vas a pagar nada que no sepas. 
                            </div></div> <br> <div data-v-1cb0bef4="" class="row block-slide-2"><div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/rectangle2.png"></div> <div data-v-1cb0bef4="" class="col OClientes-text-slides2"><div data-v-1cb0bef4="">
                                    Juan Benito Gonzalez 
                                    <br data-v-1cb0bef4="">
                                    @Empresa5
                                </div></div> <div data-v-1cb0bef4="" class="col OClientes-rating-slides2"><div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"></div></div></div></div></div>


                                <div data-v-1cb0bef4="" class="card"><div data-v-1cb0bef4="" class="card-body"><div data-v-1cb0bef4="" class="row block-slide-1"><div data-v-1cb0bef4="" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 OClientes-blockquote-slides"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/blockquote-up.png" class="img-fluid"></div> <div data-v-1cb0bef4="" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 OClientes-text-slides">
                                Ahora que conozco <b>Dividae</b>, nunca más dejaré pasar una factura impagada por muy bajo que sea el importe. Repetiré.
                            </div></div> <br> <div data-v-1cb0bef4="" class="row block-slide-2"><div data-v-1cb0bef4="" class="col OClientes-img-slides2"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/rectangle1.png"></div> <div data-v-1cb0bef4="" class="col OClientes-text-slides2"><div data-v-1cb0bef4="">
                                    Sofía Villaverde 
                                    <br data-v-1cb0bef4="">
                                    @Empresa6
                                </div></div> <div data-v-1cb0bef4="" class="col OClientes-rating-slides2"><div data-v-1cb0bef4="" class="rating"><img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"> <img data-v-1cb0bef4="" src="{{url('landing')}}/assets/icons-star.png" class="img-fluid"></div></div></div></div></div>
                          </div>
                              </div></div></div>

                              <div data-v-dd3c5654="" data-v-63cd6604="" class="blockExitos" data-v-effc9f78=""><div data-v-dd3c5654="" class="container"><div data-v-dd3c5654="" class="Exitos-title">
            Casos de éxito
        </div> <div data-v-dd3c5654="" class="row my-5 Exitos"><div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Planday.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Umbraco.png"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/Brightpearl.png" class="Exitos-img"></div> <div data-v-dd3c5654="" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 Exitos-brands"><img data-v-dd3c5654="" src="{{url('landing')}}/assets/VoloDA.png" class="Exitos-img"></div></div></div></div>


        @include('footer', ['modal' => true])


                            </div></main></div>
    <!-- Scripts -->

    <!-- <script src="{{url('landing')}}/app.js" defer=""></script> -->

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  {{-- @foreach(config('adminlte.plugins') as $pluginName => $plugin)
      @if($plugin['active'] || View::getSection('plugins.' . ($plugin['name'] ?? $pluginName)))
          @foreach($plugin['files'] as $file)
              @php
                  if (! empty($file['asset'])) {
                      $file['location'] = asset($file['location']);
                  }
              @endphp

              @if($file['type'] == 'js')
                  <script src="{{ $file['location'] }}" @if(! empty($file['defer'])) defer @endif></script>
              @endif

          @endforeach
      @endif
  @endforeach

  @stack('js') --}}

    <script src="{{url('landing')}}/plugins/owl/js/owl.carousel.js"></script>
    <script src="{{url('landing')}}/plugins/owl/js/owl.navigation.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
      
      var owl = $('#testimonios').owlCarousel({
          loop:true,
          margin:10,
          nav:false,
          dots: true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:3
              }
          }
      });

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

      $('.changetype').click(function (e) {
        e.preventDefault();

        $('.changetype').removeClass('active');

        $(this).addClass('active');

        $('.Reclamacion').text($(this).text());

        let other = $('.img-amistosa').attr('other');
        let src = $('.img-amistosa').attr('src');
        $('.img-amistosa').attr('src',other);
        $('.img-amistosa').attr('other',src);
      });

      /**/

      $('.card.mb-4.rounded-3').click(function (e) {
        e.preventDefault();
        $('.card.mb-4.rounded-3').removeClass('active');
        $(this).addClass('active');
      });

    </script>



</body></html>