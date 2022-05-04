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