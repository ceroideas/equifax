{{-- <x-adminlte-alert theme="info">
    <span>¡Importante! Sólo se puede reclamar una (1) deuda por concepto al mismo deudor, en caso de poseer múltiples conceptos debe registrar una reclamación para cada concepto.</span>
    <br>
    <span>¡Importante! Recuerde que es responable de toda la información adjuntada en éste apartado así como la veracidad de la misma y entiende de las consecuencias en caso de no resolverse de forma positiva el litigio.</span>
    <br>
</x-adminlte-alert> --}}

@php
$config = [
    "height" => "100",
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    "dialog" => [
        ["picture" => ['url']]
    ],
    "lang" => "es-ES",
]
@endphp

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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="">

    <form action="{{ url('/claims/viable/' . $claim->id . '/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="text-center">
            <h3>Elige el Tipo de Viabilidad *</h3>
        </div>

        <div class="row">
            
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="tipo_viabilidad">Reclamación Judicial</label>
                    <input id="tipo_viabilidad" type="radio" name="tipo_viabilidad" class="is-invalid " value="1" @if(old('tipo_viabilidad') == 1 ) checked="true" @endif>
                    @error('tipo_viabilidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="tipo_viabilidad2">Reclamación Extra Judicial</label>
                    <input id="tipo_viabilidad2" type="radio" name="tipo_viabilidad" class="is-invalid " value="2" @if(old('tipo_viabilidad') ==  2) checked="true" @endif>
                    @error('tipo_viabilidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="tipo_viabilidad3">Proceso Monitoriol</label>
                    <input id="tipo_viabilidad3" type="radio" name="tipo_viabilidad" class="is-invalid " value="3" @if(old('tipo_viabilidad') == 3) checked="true" @endif>
                    @error('tipo_viabilidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row my-3">
            <div class="col-sm-12">
                <x-adminlte-textarea name="observaciones" label="Observaciones / Explicaciones **" rows=4 enable-old-support="true" placeholder="Observaciones / Explicaciones">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>
        </div>
        

        <div class="card-footer">
           
             <div class="row">
                <span class="float-left">(*) Los Campos marcados son requeridos.</span>
            </div>
            <div class="row">
                <span class="float-left">(**) Por favor Ingrese toda la información / observaciones importantes sobre para la reclamación .</span>
            </div> 
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/' . $claim->id ) }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>


