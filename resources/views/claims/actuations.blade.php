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
                    <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                    <li class="breadcrumb-item active">Actuaciones | Reclamación #{{ $claim->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.TempusDominusBs4', true)
@section('plugins.BootstrapSwitch', true)

@section('content')

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    @if(!$claim->isViable())
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
                {{-- <x-adminlte-button class="mr-auto" theme="success" label="Accept"/> --}}
                <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
            </x-slot>
        </x-adminlte-modal>
    @endif

    <div class="card">
        <div class="card-header card-orange card-outline">
            <h3 class="card-title">Actuaciones de la Reclamación #{{ $claim->id }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            
        	<div class="row">
        		<div class="col-md-12">

        			<div class="row">
        			@forelse ($actuations as $act)

        				<div class="col-sm-12">
        					
        					<h5>{{$act->subject}}</h5>

        					<p>{{$act->description}}</p>

        					<b>Resultado de la actuación:</b> {!! $act->type ? '<span class="text-success">Exitoso</span>' : '<span class="text-warning">No exitoso</span>' !!}

        					@if ($act->amount)
        					<br>
        						
        						<b>Monto reclamado:</b> {{$act->amount}}€ <br>
        						@if ($act->invoice)
        						<b>Monto a facturar:</b> {{$act->invoice->amount}}€ <br> 
        						<b>Status de la factura:</b> {!!$act->invoice->status ? '<span class="text-success">Pagado</span>' : '<span class="text-info">Pendiente</span>'!!}
        						@else
        							<i>No se ha generado una factura</i>
        						@endif

        					@endif

        					<hr>

        				</div>
        				
        			@empty

        			<div class="col-sm-12">
        				@if ($claim->isFinished())
        				<h4>No se registraron actuaciones en esta reclamación</h4>
        				@else
        				<h4>No se han registrado actuaciones en esta reclamación</h4>
        				@endif
        			</div>
        				
        			@endforelse
        			</div>

        		</div>
        	</div>

            @if ((Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()) && !$claim->isFinished())
            	<hr>

            	<form action="{{url('claims/actuations',$claim->id)}}" method="POST" id="actuation-form">
            		{{csrf_field()}}

	            	<h4>Registrar nueva actuación</h4>

	            	<div class="row">
	            		
	            		<div class="col-sm-6">

	            			<div class="form-group">
	            				
	            				<label for="tipo_viabilidad2">Escenario</label>

	            				@php
	            					$config = ['tags' => true];
	            				@endphp

	            				<x-adminlte-select2 name="subject" class="form-control select2" :config="$config" required>
	            					<option>Se ha enviado una carta al deudor</option>
	            					<option>Se ha enviado un sms certificado al deudor</option>
	            					<option>Se ha enviado un email al deudor</option>
	            					<option>Se ha llamado al deudor</option>
	            					<option>El deudor ha pagado el monto reclamado</option>
	            					<option>El deudor contesta pero no quiere pagar</option>
	            					<option>El deudor no contesta o no se ha encontrado el domicilio</option>
	            					<option>El deudor quiere llegar a un acuerdo de pago</option>
	            					<option>El deudor ha incumplido el acuerdo de pago</option>
	            				</x-adminlte-select2>
			                    {{-- @error('subject')
			                    <span class="invalid-feedback d-block" role="alert">
			                        <strong>{{ $errors->first() }}</strong>
			                    </span>
			                    @enderror --}}

	            			</div>

	            		</div>
	            		<div class="col-sm-6">

	            			<div class="form-group">
	            				
	            				<label for="tipo_viabilidad2">Fecha de la actuación</label>

	            				@php
									$config = ['format' => 'DD-MM-YYYY'];
								@endphp

	            				<x-adminlte-input-date name="actuation_date" :config="$config" required/>

	            			</div>
	            		</div>

	            		<div class="col-sm-12">

	            			<div class="form-group">
	            				
	            				<label for="tipo_viabilidad2">Descripción</label>


	            				<x-adminlte-textarea name="description" required placeholder="Inserte descripción..."/>


	            			</div>

	            		</div>

	            		<div class="col-sm-12">
	            			<label for="tipo_viabilidad2">Resultado de la actuación</label>
	            			<x-adminlte-input-switch name="type" data-on-text="Exitoso" data-off-text="No Exitoso" data-on-color="teal" checked/>
	            		</div>
	            	</div>

	            	<hr>

	            	<div class="row" style="display: none-;" id="invoice-data">
	            		<div class="col-sm-12">

	            			<x-adminlte-input name="amount" label="Si se ha recuperado algún monto, especificarlo" placeholder="Monto" step="0.01" type="number"
			                    igroup-size="sm" >
			                        <x-slot name="appendSlot">
			                            <div class="input-group-text bg-dark">
			                                <i class="fas fa-euro"></i>
			                            </div>
			                        </x-slot>
			                </x-adminlte-input>
	            			
	            		</div>
	            	</div>

	            	<div class="row">
	            		<div class="col-sm-12">
	            			<label for="invoice">¿Desea generar factura por el monto recuperado? (ésto en caso que el deudor haya realizado la transferencia al cliente en vez de a DIVIDAE)</label>
	            			<x-adminlte-input-switch name="invoice" data-on-text="Si" data-off-text="No" data-on-color="teal"/>
	            		</div>
	            	</div>

	            	<x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>

            	</form>
            @endif

        </div>
    </div>

@stop

@section('js')

	<script>
		/*$('[name="invoice"]').on('switchChange.bootstrapSwitch', function(event) {
			event.preventDefault();
			
			if ($(this).is(':checked')) {
				$('#invoice-data').show();
			}else{
				$('#invoice-data').hide();
			}
		});*/

		$('#actuation-form').on('submit', function(event) {
			event.preventDefault();
			
			$.post($(this).attr('action'), $(this).serializeArray(), function(data, textStatus, xhr) {
				location.reload();
			});
		});
	</script>
@stop
