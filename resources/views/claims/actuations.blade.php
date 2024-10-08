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
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Actuaciones | Reclamaci&oacute;n #{{ $claim->id }}</li>
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
                <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
            </x-slot>
        </x-adminlte-modal>
    @endif

    <div class="card">
        <div class="card-header card-orange card-outline">
            <h3 class="card-title">Actuaciones de la Reclamaci&oacute;n #{{ $claim->id }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="timeline">
                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    @forelse ($actuations as $act)
                        <div class="pt-3"></div>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i>&nbsp;{!! date('d/m/Y H:i', strtotime($act->actuation_date)) !!}</span>
                            <h3 class="timeline-header text-left"><b style="color: #333">@if (Auth::user()->isSuperAdmin()){{$act->getRawOriginal('subject')}} - @endif
                                {{$act->subject}}</b></h3>
                            <div class="timeline-body text-left">
                                <p style="margin: 0">{{$act->description}}</p>
                                @if ($act->amount)
                                    <b style="color: #333">Importe recuperado:</b> {{ number_format($act->amount, 2,',','.') }} &euro; <br>
                                @endif

                                @if ($act->documents)
                                    @foreach ($act->documents as $document)
                                    <div class="row">
                                        <div class="col-sm-4">

                                                <a href="{{ url('/uploads/actuations/' . $act->id . '/documents',$document->document_name) }}" class="btn-link text-secondary" target="_blank" download="{{$document->document_name}}"><i class="far fa-fw fa-file"></i>{{$document->document_name}}</a>

                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
        			@empty
                        <div class="col-sm-12">
                            @if ($claim->isFinished())
                                <h4>No se registraron actuaciones en esta reclamaci&oacute;n</h4>
                            @else
                                <h4>No se han registrado actuaciones en esta reclamaci&oacute;n</h4>
                            @endif
                        </div>
        			@endforelse

                </div>
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>

        </div>

        @if ((Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()) && !$claim->isFinished())
            <hr>
            <form action="{{url('claims/actuations',$claim->id)}}" method="POST" id="actuation-form" enctype="multipart/form-data">
                {{csrf_field()}}

                <h4>Registrar nueva actuación</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="subject">Hito</label>
                            <div id="select-ph">
                                @include('claims.hitos', ['phase' => $claim->getPhase()])
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actuation_date">Fecha de la actuaci&oacute;n</label>
                            @php
                                $config = ['format' => 'DD-MM-YYYY HH:ss'];
                            @endphp
                            <x-adminlte-input-date name="actuation_date" id="actuation_date" :config="$config" required/>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Descripci&oacute;n</label>
                            <x-adminlte-textarea name="description" id="description" placeholder="Inserte descripci&oacute;n..."/>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <x-adminlte-input-file id="ifMultiple" name="files[]" label="Archivos de la actuaci&oacute;n"
                                placeholder="Puede subir varios archivos..." igroup-size="lg" legend="Seleccione" multiple>
                                {{-- accept=".jpg,.png,.pdf"> --}}
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-primary">
                                        <i class="fas fa-file-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                        </div>
                    </div>
                    <div class="col-sm-12 d-none">
                        <label for="type">Resultado de la actuación</label>
                        <x-adminlte-input-switch name="type" id="type" data-on-text="Exitoso" data-off-text="No Exitoso" data-on-color="teal" checked/>
                    </div>
                </div>
                <hr>
                <div class="row" style="display: none-;">
                    <div class="col-sm-12">
                        <x-adminlte-input name="amount" label="Si se ha recuperado alg&uacute;n importe, especificarlo" placeholder="Importe" min="0" step="0.01" type="number"
                            igroup-size="sm" >
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-euro"></i>
                                    </div>
                                </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <div class="d-none">
                    <div class="row" style="display: none-;" id="invoice-data">
                        <div class="col-sm-12">
                            <label for="mailable">¿Desea notificar al cliente de ésta actuaci&oacute;n?</label>
                            <x-adminlte-input-switch name="mailable" id="mailable" data-on-text="Si" data-off-text="No" data-on-color="teal"/>
                        </div>
                    </div>
                    <hr>
                    <div id="invoice-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="invoice">¿Desea generar factura por el importe recuperado? (ésto en caso que el deudor haya realizado la transferencia al cliente en vez de a DIVIDAE)</label>
                                <x-adminlte-input-switch name="invoice" data-on-text="Si" data-off-text="No" data-on-color="teal"/>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div id="honorarios-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="invoice_2">¿Desea generar factura por el pago de honorarios adicionales?</label>
                                <x-adminlte-input-switch name="invoice_2" data-on-text="Si" data-off-text="No" data-on-color="teal"/>
                            </div>
                        </div>
                        <div class="row" style="display: none;" id="invoice-data-2">
                            <div class="col-sm-12">
                                <x-adminlte-input name="honorarios" label="Si se requiere un pago adicional, especificar" placeholder="Importe" step="0.01"  min="0"
                                    igroup-size="sm" >
                                </x-adminlte-input>
                                <x-adminlte-input name="concepto" label="Concepto de la factura" placeholder="Concepto" type="text"
                                    igroup-size="sm" >
                                </x-adminlte-input>
                            </div>
                        </div>
                    </div>
                </div>
                <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            </form>
        @endif


        @if ((Auth::user()->isClient()|| Auth::user()->isGestor()||Auth::user()->isAssociate()) && !$claim->isFinished())
            <hr>
            <h5>Puede añadir intrucciones y archivos a la reclamaci&oacute;n</h5>
            <form action="{{url('claims/actuations',$claim->id)}}" method="POST" id="actuation-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <x-adminlte-input name="description" id="description" placeholder="Inserte descripción..."/>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-adminlte-input-file id="ifMultiple" name="files[]" label="Archivos de la actuaci&oacute;n"
                                placeholder="Puede subir archivos..." igroup-size="lg" legend="Seleccione" multiple>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-primary">
                                        <i class="fas fa-file-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                        </div>
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
        $( document ).ready(function() {
            console.log("Ready function");
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = (day)+"-"+(month)+"-"+now.getFullYear() ;
            $("#actuation_date").val(today);
        });

		$('[name="invoice_2"]').on('switchChange.bootstrapSwitch', function(event) {
			event.preventDefault();

			if ($(this).is(':checked')) {
				$('#invoice-data-2').show();
				$('#invoice-data').hide();
			}else{
				$('#invoice-data-2').hide();
				$('#invoice-data').show();
			}
		});

		$('[name="invoice"]').on('switchChange.bootstrapSwitch', function(event) {
			event.preventDefault();

			if ($(this).is(':checked')) {
				$('#honorarios-data').hide();
			}else{
				$('#honorarios-data').show();
			}
		});

		$('#actuation-form').on('submit', function(event) {
			event.preventDefault();

			var formData = new FormData($(this)[0]);

			$.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				contentType: false,
				processData: false,
				data: formData,
			})
			.done(function() {
				location.reload();
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
	</script>
@stop
