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
    color: rgb(51, 51, 51);
  text-transform: uppercase;
  font-size: 9px;
  width: 16.66%;
  float: left;
  position: relative;
}
#progressbar li:before {
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
#progressbar li:after {
  content: '';
  width: 100%;
  height: 4px;
  background: white;
  position: absolute;
  left: -50%;
  top: 16px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, .7);
  z-index: 0; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #fd7e14;
  color: white;
}
</style>
<div class="steps">
  <ul id="progressbar">
    <li class="{{$step >= 1 ? 'active' : ''}}">Datos de demandante</li>
    <li class="{{$step >= 2 ? 'active' : ''}}">Registro de deudor</li>
    <li class="{{$step >= 3 ? 'active' : ''}}">Registro de deuda</li>
    <li class="{{$step >= 4 ? 'active' : ''}}">Documentación de deuda</li>
    <li class="{{$step >= 5 ? 'active' : ''}}">Acuerdo de pagos</li>
    <li class="{{$step >= 6 ? 'active' : ''}}">Finalización</li>
  </ul>
</div>