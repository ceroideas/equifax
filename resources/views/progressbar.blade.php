<style>
.steps {
  width: 100%;
  margin: 50px auto;
  margin-top: 0;
  position: relative;
  /*z-index: 1;*/
}

/*progressbar*/
#progressbar {
	padding: 5px 0;
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
  width:100%;
  text-align: center;
}
#progressbar li {
  list-style-type: none;
  /*color: rgb(51, 51, 51);*/
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  width: 22.4%;
  float: left;
  position: relative;

  clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
  background-color: #f1f1f1;
  color: #333;
  padding: 20px 0;

  margin-right: -3%;
}
/*#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 36px;
  line-height: 36px;
  display: block;
  font-size: 12px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px auto;
  z-index: 1;
  position: relative;
  box-shadow: 0 1px 4px rgba(0, 0, 0, .7);
}
/*progressbar connectors*/
/*#progressbar li:after {
  content: '';
  width: 100%;
  height: 4px;
  background: white;
  position: absolute;
  left: -50%;
  top: 16px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, .7);
  z-index: 0;
}
#progressbar li:first-child:after {
  content: none; 
}*/
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
/*#progressbar li.active:before,  #progressbar li.active:after{*/
#progressbar li.active {
  background-color: #285ba3;
  color: white;
}
</style>
<div class="steps">
  <ul id="progressbar">
    <li class="{{$step >= 1 ? 'active' : ''}}">1. Datos <br> Acreedor</li>
    <li class="{{$step >= 2 ? 'active' : ''}}">2. Datos <br> Deudor</li>
    <li class="{{$step >= 3 ? 'active' : ''}}">3. Datos <br> Deuda</li>
    {{-- <li class="{{$step >= 4 ? 'active' : ''}}">Documentación de deuda</li> --}}
    <li class="{{$step >= 4 ? 'active' : ''}}">4. Opciones <br> de Acuerdo</li>
    <li class="{{$step >= 5 ? 'active' : ''}}">5. Aceptación <br> y Pago</li>
  </ul>
</div>