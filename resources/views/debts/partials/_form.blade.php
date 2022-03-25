<x-adminlte-alert theme="info">
    <span>¡Importante! recuerde que si el Deudor se encuentra en Concurso de Acreedores la reclamación es inviable.</span>
    <br>
    <span>¡Importante! Sólo se puede reclamar una (1) deuda por concepto al mismo deudor, en caso de poseer múltiples conceptos debe registrar una reclamación para cada concepto.</span>
    <br>
</x-adminlte-alert>


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="">
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


    <form action="@if(isset($debt)){{ url('/debts/' . $debt->id) }}@else{{ url('/debts') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($debt))
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="importe" label="Importe Principal *" placeholder="Importe Principal" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="iva" label="IVA *" placeholder="IVA" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Concepto O Justificación *" placeholder="Concepto O Justificación" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="N° De Documento *" placeholder="N° De Documento" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Fecha de la Deuda *" placeholder="Fecha de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Fecha de Vencimiento de la Deuda *" placeholder="Fecha de Vencimiento de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Importe Pendientes de Pago *" placeholder="Importe Pendientes de Pago" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Abonos Realizados por el Deudor *" placeholder="Abonos Realizados por el Deudor" type="text"
                igroup-size="sm" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <x-adminlte-textarea name="address" label="Observaciones / Explicaciones **" rows=4 enable-old-support="true" placehold="Observaciones / Explicaciones">
                    <x-slot name="appendSlot" >
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
                <span class="float-left">(**) Por favor Ingrese toda la información importante posible para la reclamación, esto nos ayudará a acelerar el proceso.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/debts/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>
