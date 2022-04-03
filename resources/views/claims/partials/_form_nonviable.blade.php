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
        ['insert', ['link', 'video']],
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

    <form action="{{ url('/claims/non-viable/' . $claim->id . '/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <x-adminlte-text-editor name="informe_inviabilidad" label="Redactar el Informe de Inviabilidad" label-class="text-danger" igroup-size="sm" placeholder="Escribe algún texto.." :config="$config"/>

        <div class="card-footer">
           
            {{-- <div class="row">
                <span class="float-left">(*) Los Campos marcados son requeridos.</span>
            </div>
            <div class="row">
                <span class="float-left">(**) Por favor Ingrese toda la información importante posible para la reclamación, esto nos ayudará a acelerar el proceso.</span>
            </div> --}}
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/' . $claim->id ) }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>


