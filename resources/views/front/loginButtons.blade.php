<div data-v-5fddf304="" class="navbar-nav ml-auto">
	<style>
		.img-profile {
			width: 25px;
		    position: relative;
		    top: -1px;
		    margin-right: 16px;
		    margin-left: -3px;
		}
		.btn-registerHome {
			border-top-right-radius: 37.5px !important;
    		border-bottom-right-radius: 37.5px !important;
		}

		.blockAcceso .btn-nueva[data-v-5fddf304] {
		  height: 40px;
		  margin-right: 16px;
		  border-radius: 37.5px;
		  background-color: #1e7e34;
		  color: #fff;
		}
	</style>
	@if (Auth::check())
		<div data-v-5fddf304="" class="blockAcceso"><a data-v-5fddf304="" href="{{url('claims/select-client')}}" class="btn btn-nueva"><span data-v-5fddf304="" class="btn-text-acceso">
	        Nueva Reclamación
	        </span></a></div>

		<div data-v-5fddf304="" class="blockRegistro">

			<div class="btn-group">
				<button data-v-5fddf304="" class="btn btn-registerHome" data-toggle="dropdown">
                    <span data-v-5fddf304="" class="text-register-btn">
					    <img data-v-5fddf304="" src="{{url('landing')}}/assets/profile.png" class="img-profile">
			                {{ Str::ucfirst(Str::before(Auth::user()->name, ' ')) }} {{ Str::substr(Str::ucfirst(Str::afterLast(Auth::user()->name, ' ')), 0, 1) }}.
			            <img data-v-5fddf304="" src="{{url('landing')}}/assets/icons-arrow-right.png" style="transform: rotate(90deg);" class="iconsarrow-right">
			        </span>
                </button>
			    <div class="ddown-menu">
                  <h6 class="ddown-header"><a style="color:#e65927" href="{{url('panel')}}">Área personal</a></h6>
				  <a class="ddown-item" href="{{url('users',Auth::user()->id)}}">Mi perfil</a>
				  <a class="ddown-item" href="{{url('change-password')}}">Cambiar contraseña</a>
				  <h6 class="ddown-header">Acreditación de terceros</h6>
				  <a class="ddown-item" href="{{url('third-parties/create')}}">Añadir nuevo</a>
				  <a class="ddown-item" href="{{url('third-parties')}}">Mis representados</a>
				  <h6 class="ddown-header">Deudores</h6>
				  <a class="ddown-item" href="{{url('debtors/create')}}">Añadir nuevo</a>
				  <a class="ddown-item" href="{{url('debtors')}}">Listado de Deudores</a>
				  <h6 class="ddown-header">Reclamaciones</h6>
				  <a class="ddown-item" href="{{url('claims')}}">Listado de Reclamaciones</a>
				  <a class="ddown-item" href="{{url('claims/pending')}}">Reclamaciones no viables</a>
				  <a class="ddown-item" href="{{url('claims/select-client')}}">Nueva Reclamación</a>
				  <a class="ddown-item" href="{{url('claims/invoices')}}">Facturas</a>
				  <div class="dropdown-divider"></div>
				  <a class="ddown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off text-red"></i>Salir</a>
				</div>
			</div>
		</div>

		<form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
			{{csrf_field()}}
        </form>
	@else

		<div data-v-5fddf304="" class="blockAcceso"><a data-v-5fddf304="" href="{{url('login')}}" class="btn btn-acceso"><span data-v-5fddf304="" class="btn-text-acceso">
	        Perfil Personal
	        </span></a></div>

	    <div data-v-5fddf304="" class="blockRegistro"><a data-v-5fddf304="" href="{{url('register')}}" class="btn btn-registerHome"><span data-v-5fddf304="" class="text-register-btn">
	        Regístrate
	        <img data-v-5fddf304="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-right"></span></a></div>
	@endif
</div>
