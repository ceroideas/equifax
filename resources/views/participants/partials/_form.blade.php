@if(session()->has('msj'))
    <x-adminlte-alert theme="success" dismissable>
        {{ session('msj') }}
    </x-adminlte-alert>
@endif
@if(session()->has('alert'))
    <x-adminlte-alert theme="warning" dismissable>
        {{ session('alert') }}
    </x-adminlte-alert>
@endif

<style>
	.hide {
		display: none;
	}
</style>

<x-adminlte-card header-class="hide" theme="orange" theme-mode="outline">

	@if ($participant)
    <form action="{{ url('/configurations/participants/' . $participant->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
    <form action="{{ url('/configurations/participants/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="id" label="Id" placeholder="id" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($participant) ? $participant->id : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="fecha_alta" label="Fecha alta" placeholder="Fecha alta" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($participant) ? Carbon\Carbon::parse($participant->created_at)->format('d/m/Y') : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="available" label="Participación habilitada" placeholder="Participacion habilitada" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($participant) ? ($participant->available==0?'Si':'No') : ''}}" disabled>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">

                    <x-adminlte-select2 name="campaign_id" igroup-size="sm" enable-old-support="true" label="id de campaña">
                        <option>Id de campaña</option>
                        @foreach (App\Models\Campaign::all() as $c)
                            <option {{$participant ? ($participant->campaign_id == $c->id ? 'selected' : '') : ''}} value="{{$c->id}}">{{ $c->id }} - {{$c->name}}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="email" label="Email *" placeholder="Email" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($participant) ? $participant->email : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($participant) ? $participant->nombre : ''}}">
                    </x-adminlte-input>
                </div>
            </div>



        </div>

{{--         <div class="card-footer">

             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-rigparticipant" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/configurations/participants') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

        </div> --}}



        <div class="card-footer">

            <div class="row">
               <span class="float-left">(*) Los campos marcados son requeridos.</span>
           </div>
           <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
           <a href="{{ url('/configurations/participants') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

       </div>

    </form>
</x-adminlte-card>
