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

	@if ($blog)
    <form action="{{ url('/blogs/' . $blog->id . '/update') }}" method="POST" enctype="multipart/form-data">
	@else
    <form action="{{ url('/blogs/save') }}" method="POST" enctype="multipart/form-data">
	@endif
        @csrf
        @method('POST')

        <div class="row">


            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="title" label="Título del post *" placeholder="Título del post" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($blog) ? $blog->title : ''}} " maxlength="27">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <x-adminlte-input name="slug" label="Slug *" placeholder="Slug" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($blog) ? $blog->slug : ''}}">
                    </x-adminlte-input>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                <!--<x-adminlte-input name="image_post" label="Imagen del post *" placeholder="Imagen post" type="file"
	                igroup-size="sm" enable-old-support="true">
	                </x-adminlte-input>-->

                    <x-adminlte-input name="image_post" label="Imagen del post *" type="file"
                    igroup-size="sm">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-file"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                </div>

                @isset ($blog)
                    @if ($blog->image_post)
                        @php
                            $ext = array_reverse(explode('.', $blog->image_post))[0];
                        @endphp
                        <a href="{{url('storage/'. $blog->image_post)}}" download="Image_post.{{$ext}}">
                            Descargar Imagen
                        </a>
                    @endif
                @endisset
            </div>
            {{--
            <div class="col-sm-12">
                <div class="form-group">
                    <x-adminlte-input name="extract" label="Resumen *" placeholder="Resumen" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{ isset($blog) ? $blog->extract : ''}}">
                    </x-adminlte-input>
                </div>
            </div>
            --}}
            {{-- Funciona pero las imagenes las pone en base64 --}}
            {{--<div class="col-sm-12">
                <x-adminlte-text-editor row name="body" label="Post *" rows=4 enable-old-support="true">{{ isset($blog) ? $blog->body : ''}}
                    <x-slot name="appendSlot" >
                    </x-slot>
                </x-adminlte-text-editor>
            </div>--}}

            <div class="col-sm-12">
            	@php
            		$config = ["height" => "100"];
            	@endphp
                <div class="form-group">
                    <x-adminlte-text-editor row label="Resumen *" enable-old-support="true" name="extract" :config="$config">{{ isset($blog) ? $blog->extract : ''}}</x-adminlte-text-editor>
                    @error('body_content')
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
                    <x-adminlte-text-editor row label="Contenido principal" enable-old-support="true" name="body" :config="$config">{{ isset($blog) ? $blog->body : ''}}</x-adminlte-text-editor>
                    @error('body_content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>



            <div class="col-sm-3">
                <x-adminlte-select2 id="status" name="status" label="Estado" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="0" {{ isset($blog) ? ($blog->status == "0"?'selected': '') : ''}}>Borrador</option>
                    <option value="1" {{ isset($blog) ? ($blog->status == "1"?'selected': '') : ''}}>Publicado</option>
                </x-adminlte-select2>
            </div>

        </div>

        <div class="card-footer">

             <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <div class="row">
                <span class="float-left">(1) Título limitado a 30 caracteres</span>
            </div>
            <div class="row">
                <span class="float-left">(2) Resumen limitado a 150 caracteres (Incluido HTML)</span>
            </div>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/blogs') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>

        </div>
    </form>
</x-adminlte-card>
