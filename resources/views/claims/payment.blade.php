@extends('adminlte::page')

@section('title', 'Reclamación #' . $claim->id)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Pago de Reclamación #{{ $claim->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

<style>
	.operation-cards {
		margin: 10px;
		width: 39px;
	}

	.operation-cards#first-card
	{
		margin-left: 0;
	}

	.operation-cards#last-card
	{
		margin-right: 0;
	}
</style>

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    {{-- @if(!$claim->isViable())
        <x-adminlte-modal id="modalMin" title="Informe de Inviabilidad" theme="primary" size="lg" v-centered="true">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-12">
                            {!! $claim->observation !!}
                    </div>
                    </div>
                </div>
            </div>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
            </x-slot>
        </x-adminlte-modal>
    @endif --}}

    <div class="card">
        <div class="card-header card-orange card-outline">
        	<h3>ACEPTACIÓN Y PAGO</h3>
            {{-- <h3 class="card-title">Detalles de Pago - {{ $claim->getStatus() }} <br> <br> Concepto: <b>{{ $claim->last_invoice->description }}</b></h3> --}}
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>

            <iframe src="https://pay-demo.wannme.com/1694705087918611870B"></iframe>

            <a href="https://pay-demo.wannme.com/1694705087918611870B">Pagar</a>
        </div>

        <div class="card-body">
            <div class="row">

            	<div class="col-md-4 offset-md-4">

                    @if(Auth::user())
                        @if (Auth::user()->card_alias)
                            <p>Tienes una tarjeta guardada con el alias <b>({{Auth::user()->card_alias}})</b> <br>

                                <form id="pagoPorClick" role="form" action="{{url('claims/payToken')}}"  method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="claim_id" value="{{$claim->id}}">
                                    <input type="hidden" name="amount" value="{{$amount*100}}">
                                    {{-- Quitamos el modal de la aceptacion de contratacion --}}
                                    {{--<button class="subscribe btn btn-primary btn-block" data-toggle="modal" data-target="#terminos-2" type="button"> Pagar ({{number_format($amount ,2,',','.')}} &euro;) Con tarjeta guardada </button>
                                    <button data-dismiss="modal" id="accept-terms-2" class="btn btn-sm btn-success">Aceptar las Condiciones</button>--}}
                                    <button class="subscribe btn btn-primary btn-block" type="button" id="accept-terms-2"> Pagar ({{number_format($amount ,2,',','.')}} &euro;) Con tarjeta guardada </button>
                                </form>
                            </p>
                            <hr>
                        @endif
                    @endif

            		<form role="form" id="paycometPaymentForm" action="{{url('claims/payment')}}"  method="POST">
						<input type="hidden" name="amount" value="{{$amount*100}}">
						<input type="hidden" name="claim_id" value="{{$claim->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id: ""}}">
						<input type="hidden" data-paycomet="jetID" value="{{config('jet.arg4')}}">
						{{csrf_field()}}
                        @if(Auth::user())
                            <div class="form-group">
                                <label for="card_alias">Alias para guardar ésta tarjeta para futuros pagos</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="card_alias" placeholder="(Ej. Tarjeta de Pedro)">
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group.// -->
                        @endif
						<div class="form-group">
							<label for="username">Nombre completo (en la tarjeta)</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" class="form-control" name="username" data-paycomet="cardHolderName" placeholder="" required="">
							</div> <!-- input-group.// -->
						</div> <!-- form-group.// -->

						<div class="form-group">
							<label for="cardNumber">Nº Tarjeta</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-credit-card"></i></span>
								</div>
								<div class="form-control" id="paycomet-pan" style="padding:0px; height:36px;"></div>
								<input class="form-control" paycomet-style="width: 100%; height: 26px; font-size:14px; padding-left:8px; padding-top:4px; border:0px; outline: none" paycomet-name="pan">
							</div> <!-- input-group.// -->
						</div> <!-- form-group.// -->

						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label><span class="hidden-xs">Expiración</span> </label>
									<div class="form-inline">
										<select class="form-control" style="width:45%" data-paycomet="dateMonth">
											<option>MM</option>
											<option value="01">01 - Enero</option>
											<option value="02">02 - Febrero</option>
											<option value="03">03 - Marzo</option>
											<option value="04">04 - Abril</option>
											<option value="05">05 - Mayo</option>
											<option value="06">06 - Junio</option>
											<option value="07">07 - Julio</option>
											<option value="08">08 - Agosto</option>
											<option value="09">09 - Septiembre</option>
											<option value="10">10 - Octubre</option>
											<option value="11">11 - Noviembre</option>
											<option value="12">12 - Diciembre</option>
										</select>
										<span style="width:10%; text-align: center"> / </span>
										<select class="form-control" style="width:45%" data-paycomet="dateYear">
											<option>YY</option>
											<option value="20">2020</option>
											<option value="21">2021</option>
											<option value="22">2022</option>
											<option value="23">2023</option>
											<option value="24">2024</option>
											<option value="25">2025</option>
											<option value="26">2026</option>
											<option value="27">2027</option>
											<option value="28">2028</option>
											<option value="29">2029</option>
											<option value="30">2030</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label data-toggle="tooltip" style="color:#e65927; title=""
										data-original-title="3 digits code on back side of the card">CVV <i
											class="fa fa-question-circle"></i></label>
									<div id="paycomet-cvc2" style="height: 36px; padding:0px;"></div>
									<input paycomet-name="cvc2"
									paycomet-style="
									    width: 91%;
									    height: 32px;
									    font-size: 12px;
									    padding-left: 7px;
									    border: 1px solid #ced4da;
									    border-radius: .25rem;
									" class="form-control" required="" type="text">
								</div> <!-- form-group.// -->
							</div>

						</div> <!-- row.// -->
						{{--<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#terminos" type="button" id="accept-terms"> Pagar ({{number_format($amount ,2,',','.')}} &euro;) </button>--}}
                        <button class="btn btn-primary btn-block" type="button" id="accept-terms"> Pagar ({{number_format($amount ,2,',','.')}} &euro;) </button>
						<button class="subscribe btn btn-primary btn-block d-none" id="subscribe" type="submit"> Pagar ({{number_format($amount ,2,',','.')}} &euro;) </button>
					</form>
					<div id="paymentErrorMsg"></div>

					<div class="operation-cards__container" style="width: 100%; text-align: center;">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-visa.svg" id="first-card" class="operation-cards">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-mastercard.svg" class="operation-cards">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-amex.svg" class="operation-cards">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-discover.svg" class="operation-cards">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-jcb.svg" class="operation-cards">
                        <img src="https://api.paycomet.com/gateway/PAYCOMET_template/img/operation-dinnerclub.svg" id="last-card" class="operation-cards">

                        <br>
                        <br>

                    	<img src="{{url('logo-paycomet.png')}}" alt="" style="width: 100%;">
                    </div>

            </div>
        </div>
    </div>

<div class="modal fade" id="terminos" style="max-width: 100%;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header" style="color: #111"></div>
	    <div class="modal-body">

	        <div style="height: 500px; overflow: auto;">
	          {{-- @include('terminos-condiciones')

	          <br> --}}

	          @include('terminos-contratacion')

	          <button data-dismiss="modal" id="accept-terms" class="btn btn-sm btn-success">Aceptar las Condiciones</button>
	          <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
	        </div>
	    </div>
	    {{-- <div class="modal-footer"></div> --}}
	  </div>
	</div>
</div>

<div class="modal fade" id="terminos-2" style="max-width: 100%;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header" style="color: #111"></div>
	    <div class="modal-body">

	        <div style="height: 500px; overflow: auto;">
	          {{-- @include('terminos-condiciones')

	          <br> --}}

	          @include('terminos-contratacion')

	          <button data-dismiss="modal" id="accept-terms-2" class="btn btn-sm btn-success">Aceptar las Condiciones</button>
	          <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
	        </div>
	    </div>
	    {{-- <div class="modal-footer"></div> --}}
	  </div>
	</div>
</div>

<script src="https://api.paycomet.com/gateway/paycomet.jetiframe.js?lang=es"></script>

@stop

@section('js')
<script>
	$('#accept-terms').click(function (e) {
		e.preventDefault();

		$('#subscribe').click();
	});

	$('#accept-terms-2').click(function (e) {
		e.preventDefault();

		$('#pagoPorClick').submit();
	});
</script>
@stop
