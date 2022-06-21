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

	@if ($tmp)
    <form action="{{ url('/configurations/templates/' . $tmp->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
    <form action="{{ url('/configurations/templates/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">
        	<div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="title" label="Título *" placeholder="Título" type="text"
	                igroup-size="sm" enable-old-support="true" value="{{ isset($tmp) ? $tmp->title : ''}}">
	                    {{-- <x-slot name="appendSlot">
	                        <div class="input-group-text bg-dark">
	                            <i class="fas fa-eur"></i>
	                        </div>
	                    </x-slot> --}}
	                </x-adminlte-input>
                    {{-- @error('tipo_viabilidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror --}}
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="top_logo" label="Logo superior *" placeholder="Logo" type="file"
	                igroup-size="sm" enable-old-support="true">
	                </x-adminlte-input>

                    {{-- {{isset($tmp) ? $tmp->top_logo : ''}} --}}
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="header_image" label="Imagen cabecera *" placeholder="Imagen" type="file"
	                igroup-size="sm" enable-old-support="true">
	                </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-6">
            	@php
            		$config = ["height" => "100"];
            	@endphp		
                <div class="form-group">
                    <x-adminlte-text-editor row label="Contenido superior" enable-old-support="true" name="top_content" :config="$config">{{ isset($tmp) ? $tmp->top_content : ''}}</x-adminlte-text-editor>
                    @error('top_content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
            	@php
            		$config = ["height" => "100"];
            	@endphp		
                <div class="form-group">
                    <x-adminlte-text-editor row label="Contenido cabecera" enable-old-support="true" name="header_content" :config="$config">{{ isset($tmp) ? $tmp->header_content : ''}}</x-adminlte-text-editor>
                    @error('header_content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-12">
            	@php
            		$config = ["height" => "100"];
            	@endphp		
                <div class="form-group">
                    <x-adminlte-text-editor row label="Contenido principal" enable-old-support="true" name="body_content" :config="$config">{{ isset($tmp) ? $tmp->body_content : ''}}</x-adminlte-text-editor>
                    @error('body_content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-12">
            	@php
            		$config = ["height" => "60"];
            	@endphp		
                <div class="form-group">
                    <x-adminlte-text-editor row label="Contenido pie de página" enable-old-support="true" name="footer_content" :config="$config">{{ isset($tmp) ? $tmp->footer_content : ''}}</x-adminlte-text-editor>
                    @error('footer_content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="cta_button" label="Botón inferior *" placeholder="Botón" type="text" value="{{ isset($tmp) ? $tmp->cta_button : ''}}"
	                igroup-size="sm" enable-old-support="true">
	                </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="cta_button_link" label="Enlace Botón inferior *" placeholder="Enlace Botón" type="text" value="{{ isset($tmp) ? $tmp->cta_button_link : ''}}"
	                igroup-size="sm" enable-old-support="true">
	                </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
            	@php
            		$config = ["height" => "60"];
            	@endphp		
                <div class="form-group">
                    <x-adminlte-text-editor row label="Firma" enable-old-support="true" name="signature" :config="$config">{{ isset($tmp) ? $tmp->signature : ''}}</x-adminlte-text-editor>
                    @error('signature')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="card-footer">

             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/configurations/templates') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

        </div>
    </form>
</x-adminlte-card>


