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


<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="" title="">



    <form action="{{ isset($configuration) ?  url('/configurations/'. $configuration->id . '/fees') :  url('/configurations/fees') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($configuration))

            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="fixed_fees" label="Importe Reclamación Amistosa" placeholder="Reclamación Amistosa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-select2 id="fixed_fees_tax" name="fixed_fees_tax" label="% IVA reclamación amistosa" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <x-adminlte-input name="judicial_amount" label="Importe Procedimiento Montorio " placeholder="Procedimiento Montorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="judicial_amount_tax" name="judicial_amount_tax" label="% IVA Procedimiento monitorio" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-3">
                <x-adminlte-input name="judicial_fees" label="Importe Tasa monitorio" placeholder="Tasa monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="judicial_fees_tax" name="judicial_fees_tax" label="% IVA tasa monitorio" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21">21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0" selected>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <x-adminlte-input name="verbal_amount" label="Importe Juicios Verbales " placeholder="Juicios Verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="verbal_amount_tax" name="verbal_amount_tax" label="% IVA Juicios verbales" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-3">
                <x-adminlte-input name="verbal_fees" label="Importe Tasa juicios verbales" placeholder="Tasa juicios verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="verbal_fees_tax" name="verbal_fees_tax" label="% IVA tasa juicios verbales" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21">21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0" selected>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <x-adminlte-input name="ordinary_amount" label="Importe Juicios Ordinarios " placeholder="Juicios Ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="ordinary_amount_tax" name="ordinary_amount_tax" label="% IVA juicios ordinarios" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-3">
                <x-adminlte-input name="ordinary_fees" label="Importe Tasa juicios ordinarios " placeholder="Tasa juicios ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="ordinary_fees_tax" name="ordinary_fees_tax" label="% IVA tasa juicios ordinarios" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21">21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0" selected>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <x-adminlte-input name="execution" label="Importe Ejecución " placeholder="Importe Ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="execution_tax" name="execution_tax" label="% IVA Ejecución" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-3">
                <x-adminlte-input name="resource" label="Importe Recurso " placeholder="Importe Recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-3">
                <x-adminlte-select2 id="resource_tax" name="resource_tax" label="% IVA Recurso" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" selected>21%</option>
                    <option value="IVA10">10%</option>
                    <option value="IVA4">4%</option>
                    <option value="IVA0">Excento</option>
                </x-adminlte-select2>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="tax" label="Porcentaje general de IVA" placeholder="% IVA" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->tax : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">

                <x-adminlte-input name="percentage_fees" label="Porcentaje de comisión en recuperación Deudas" placeholder="Porcentaje comisión" type="number" min="0" max="100"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->percentage_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>



            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="invoice_address_line_1" label="Dirección de pago Linea 1" placeholder="Dirección" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_address_line_1 : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="invoice_address_line_2" label="Dirección de pago Linea 2 " placeholder="Dirección" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_address_line_2 : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="invoice_email" label="Email de factura " placeholder="Email" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_email : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="invoice_name" label="Pagado a nombre de..." placeholder="Nombre" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_name : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>


        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/panel') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>
