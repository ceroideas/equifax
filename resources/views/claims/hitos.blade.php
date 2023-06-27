@php
$config = ['tags' => true];
@endphp

<x-adminlte-select2 name="subject" id="subject" class="form-control select2" :config="$config" required>

	@foreach (App\Models\Hito::whereNull('parent_id')->get() as $key => $ph)
		@if (count($ph['hitos']) && in_array($phase[0], $ph['phase']) && $ph['name'])
			@if ($ph['hitos'])
                <optgroup label="{{$ph['name']}}">
                    @foreach ($ph['hitos'] as $ht)
                        <option value="{{$ht['ref_id']}}"
                        @if($ht['ref_id']==30002) selected @endif
                        @if($ht['ref_id']==30034) disabled @endif
                        >{{$ht['ref_id']}} - {{$ht['name']}}
                        @if($ht['ref_id']==30034) - No seleccionable (seleccionar hito que finaliza la reclamación) @endif
                    </option>
                    @endforeach
                </optgroup>
			@else
				<option value="{{$ph['ref_id']}}">{{$ph['ref_id']}} - <b>{{$ph['name']}}</b></option>
			@endif
		@endif
	@endforeach

</x-adminlte-select2>
