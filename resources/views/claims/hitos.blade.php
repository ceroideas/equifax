@php
$config = ['tags' => true];
@endphp

<x-adminlte-select2 name="subject" id="subject" class="form-control select2" :config="$config" required>

	{{-- @foreach (config('app.actuations') as $key => $ph) --}}
	@foreach (App\Models\Hito::whereNull('parent_id')->get() as $key => $ph)

		@if (count($ph['hitos']) && in_array($phase[0], $ph['phase']) && $ph['name'])
			@if ($ph['hitos'])
			<optgroup label="{{$ph['name']}}">
				@foreach ($ph['hitos'] as $ht)
			    	<option value="{{$ht['ref_id']}}">{{$ht['ref_id']}} - {{$ht['name']}}</option>
				@endforeach
			</optgroup>
			@else
				<option value="{{$ph['ref_id']}}">{{$ph['ref_id']}} - <b>{{$ph['name']}}</b></option>
			@endif
		@endif

	@endforeach

</x-adminlte-select2>
