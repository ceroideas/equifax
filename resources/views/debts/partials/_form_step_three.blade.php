<x-adminlte-alert theme="info">
    <span>¡Importante! Sólo se puede reclamar una (1) deuda por concepto al mismo deudor, en caso de poseer múltiples conceptos debe registrar una reclamación para cada concepto.</span>
    <br>
    <span>¡Importante! Recuerde que es responable de toda la información adjuntada en éste apartado así como la veracidad de la misma y entiende de las consecuencias en caso de no resolverse de forma positiva el litigio.</span>
    <br>
</x-adminlte-alert>

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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Deuda - Documentación">



    <form action="{{ url('/debts/step-three/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <div class="row">
            <div class="col-sm-4">
                <x-adminlte-input name="factura" label="Factura *" placeholder="Factura *" type="file"
                igroup-size="sm" >
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="albaran" label="Albarán" placeholder="Albarán" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="contrato" label="Contrato de Prestación de Servicios" placeholder="Contrato de Prestación de Servicios" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <x-adminlte-input name="documentacion_pedido" label="Documentación del Pedido" placeholder="Documentación del Pedido" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="extracto" label="Extracto Bancario" placeholder="Extracto Bancario" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="reconocimiento_deuda" label="Documento de Reconocimiento de Deuda" placeholder="Documento de Reconocimiento de Deuda" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <x-adminlte-input name="escritura_notarial" label="Escritura Notarial" placeholder="Escritura Notarial" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="reclamacion_previa" label="Reclamación Previa (Si la hubiera)" placeholder="Reclamación Previa (Si la hubiera)" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="motivo_reclamacion_previa" label="Motivo de Oposición Al Pago Por parte del Deudor (Reclamación Previa)" placeholder="Motivo de Oposición Al Pago Por parte del Deudor (Reclamación Previa)" type="text"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-document"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <x-adminlte-input name="documentos_extras[]" label="Otros **" placeholder="Otro" type="file" class=""
                igroup-size="sm" enable-old-support="true" multiple>
                </x-adminlte-input>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los Campos marcados son requeridos.</span>
            </div>
            <div class="row">
                <span class="float-left">(**) Documentación adicional que sea necesaria e importantes para el caso únicamente.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/debts/create/step-one') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>


@section('js')

@stop