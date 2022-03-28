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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="Registro de Deuda (Parte 1) - Datos de la Deuda">



    <form action="{{ url('/debts/step-one/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="importe" label="Importe Principal *" placeholder="Importe Principal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->total_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="iva" label="IVA *" placeholder="IVA" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->tax : ''}}">
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
                <x-adminlte-input name="concepto" label="Concepto O Justificación *" placeholder="Concepto O Justificación" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="numero_documento" label="N° De Documento *" placeholder="N° De Documento" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->document_number : ''}}">
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
                <x-adminlte-input name="fecha_deuda" label="Fecha de la Deuda *" placeholder="Fecha de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->debt_date : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="fecha_vencimiento_deuda" label="Fecha de Vencimiento de la Deuda" placeholder="Fecha de Vencimiento de la Deuda" type="date"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->debt_expiration_date : ''}}">
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
                <x-adminlte-input name="importe_pendiente" label="Importe Pendientes de Pago *" placeholder="Importe Pendientes de Pago" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->pending_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="abonos" label="Abonos Realizados por el Deudor" placeholder="Abonos Realizados por el Deudor (La suma de lo abonado)" type="tag"
                igroup-size="sm" enable-old-support="true" value="{{ session('claim_debt') ? session('claim_debt')->partials_amount : ''}}">
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
                <x-adminlte-textarea name="observaciones" label="Observaciones / Explicaciones **" rows=4 enable-old-support="true" placehold="Observaciones / Explicaciones">
                    {{ session('claim_debt') ? session('claim_debt')->additionals : ''}}
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
                <span class="float-left">(**) Por favor Ingrese toda la información importante posible para la reclamación, esto nos ayudará a acelerar el proceso.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Siguiente" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/claims/create-debt/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>
