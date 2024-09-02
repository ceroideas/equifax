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
    margin-bottom: -30px;
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

  /*clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);*/
  background-color: #f1f1f1;
  color: #9E1B42;
  padding: 20px 0;

  margin-right: -3%;
}

/*progressbar icons*/
#icons {
	padding: 5px 0;
  margin-bottom: -60px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
  width:100%;
  text-align: center;
}
#icons li {
  list-style-type: none;
  /*color: rgb(51, 51, 51);*/
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  width: 22.4%;
  float: left;
  position: relative;

  /*clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);*/
  background-color: #fff;
  color: #9E1B42;
  padding: 20px 0;

  margin-right: -3%;
}


#optionbar {
    padding: 5px 0;
    margin-bottom: -30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
    width:100%;
    text-align: center;
}
#optionbar li {
  list-style-type: none;
  /*color: rgb(51, 51, 51);*/
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  width: 22.4%;
  float: left;
  position: relative;

  /*clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);*/
  /*background-color: #f1f1f1;*/
  color: #9E1B42;
  padding: 1px 0;

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
  background-color: #9E1B42;
  color: #fff;
  font-weight: bold;
}

#optionbar li.active {
  font-weight: bold;
}

@media only screen and (max-width: 600px) {
  #iconos {
    display: none;
  }
}

</style>
    <div class="steps" id="iconos">
        <ul id="icons">
            <li><img src="{{ url('landing/assets/progress1.png') }}" alt="Icono datos de acreedor" ></li>
            <li><img src="{{ url('landing/assets/progress2.png') }}" alt="Icono datos de deudor" ></li>
            <li><img src="{{ url('landing/assets/progress3.png') }}" alt="Icono datos de deuda" ></li>
            <li><img src="{{ url('landing/assets/progress4.png') }}" alt="Icono opciones de acuerdo" ></li>
            <li><img src="{{ url('landing/assets/progress5.png') }}" alt="Icono aceptación y pago" ></li>
        {{-- <li class="{{$step >= 4 ? 'active' : ''}}">Documentación de deuda</li> --}}
        </ul>
    </div>
    <div class="steps">
        <ul id="progressbar">
            <li class="{{$step >= 1 ? 'active' : ''}}"></li>
            <li class="{{$step >= 2 ? 'active' : ''}}"></li>
            <li class="{{$step >= 3 ? 'active' : ''}}"></li>
            <li class="{{$step >= 4 ? 'active' : ''}}"></li>
            <li class="{{$step >= 5 ? 'active' : ''}}"></li>
        </ul>
    </div>

    <div class="steps">
        <ul id="optionbar">
            <li class="{{$step >= 1 ? 'active' : ''}}">Datos <br> Acreedor</li>
            <li class="{{$step >= 2 ? 'active' : ''}}">Datos <br> Deudor</li>
            <li class="{{$step >= 3 ? 'active' : ''}}">Datos <br> Deuda</li>
            <li class="{{$step >= 4 ? 'active' : ''}}">Opciones <br> de acuerdo</li>
            <li class="{{$step >= 5 ? 'active' : ''}}">Aceptación <br> y Pago</li>
        </ul>
    </div>
