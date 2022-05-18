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
				<button data-v-5fddf304="" class="btn btn-registerHome" data-toggle="dropdown"><span data-v-5fddf304="" class="text-register-btn">
					<img data-v-5fddf304="" src="{{url('landing')}}/assets/profile.png" class="img-profile">
			        {{Auth::user()->name}}
			        <img data-v-5fddf304="" src="{{url('landing')}}/assets/icons-arrow-right.png" style="transform: rotate(90deg);" class="iconsarrow-right">
			    </span></button>
			    <div class="dropdown-menu">
				  <a class="dropdown-item" href="{{url('panel')}}">Dashboard</a>
				  <a class="dropdown-item" href="{{url('users',Auth::user()->id)}}">Mi Perfil</a>
				  <h6 class="dropdown-header">Acreditación de Terceros</h6>
				  <a class="dropdown-item" href="{{url('third-parties/create')}}">Añadir nuevo</a>
				  <a class="dropdown-item" href="{{url('third-parties')}}">Listado de Acreditación de Terceros</a>
				  <h6 class="dropdown-header">Deudores</h6>
				  <a class="dropdown-item" href="{{url('debtors/create')}}">Añadir nuevo</a>
				  <a class="dropdown-item" href="{{url('debtors')}}">Listado de Deudores</a>
				  <h6 class="dropdown-header">Reclamaciones</h6>
				  <a class="dropdown-item" href="{{url('claims/select-client')}}">Nueva Reclamación</a>
				  <a class="dropdown-item" href="{{url('claims/pending')}}">Reclamaciones Pendientes</a>
				  <a class="dropdown-item" href="{{url('claims')}}">Listado de Reclamaciones</a>
				  <a class="dropdown-item" href="{{url('claims/invoices')}}">Facturas</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off text-red"></i>Salir</a>
				</div>
			</div>
		</div>

		<form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
			{{csrf_field()}}
        </form>
	@else

		<div data-v-5fddf304="" class="blockAcceso"><a data-v-5fddf304="" href="{{url('login')}}" class="btn btn-acceso"><span data-v-5fddf304="" class="btn-text-acceso">
	        Acceso
	        </span></a></div>

	    <div data-v-5fddf304="" class="blockRegistro"><a data-v-5fddf304="" href="{{url('register')}}" class="btn btn-registerHome"><span data-v-5fddf304="" class="text-register-btn">
	        Regístrate
	        <img data-v-5fddf304="" src="{{url('landing')}}/assets/icons-arrow-right.png" class="iconsarrow-right"></span></a></div>
	@endif
</div>