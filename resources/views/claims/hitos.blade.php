@php
$config = ['tags' => true];
@endphp
	            				
<x-adminlte-select2 name="subject" id="subject" class="form-control select2" :config="$config" required>

	@foreach (config('app.actuations') as $key => $ph)

		@if ($ph['phase'] == $fase)
			@if ($ph['hitos'])
			<optgroup label="{{$ph['name']}}">
				@foreach ($ph['hitos'] as $ht)
			    	<option value="{{$ht['id']}}">{{$ht['name']}}</option>
				@endforeach
			</optgroup>
			@else
				<option value="{{$ph['id']}}">- <b>{{$ph['name']}}</b></option>
			@endif
		@endif

	@endforeach

	{{-- <option>Se ha enviado una carta al deudor</option>
	<option>Se ha enviado un sms certificado al deudor</option>
	<option>Se ha enviado un email al deudor</option>
	<option>Se ha llamado al deudor</option>
	<option>El deudor ha pagado el monto reclamado</option>
	<option>El deudor contesta pero no quiere pagar</option>
	<option>El deudor no contesta o no se ha encontrado el domicilio</option>
	<option>El deudor quiere llegar a un acuerdo de pago</option>
	<option>El deudor ha incumplido el acuerdo de pago</option> --}}
</x-adminlte-select2>