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
            <h4>Reclamación Extrajudicial</h4>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="extra_code" label="Código Reclamación Extrajudicial" placeholder="Código Reclamación Extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->extra_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="extra_concept" label="Concepto Reclamación Extrajudicial" placeholder="Concepto Reclamación Extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->extra_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="fixed_fees" label="Importe Reclamación Extrajudicial" placeholder="Reclamación Extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-select2 id="fixed_fees_tax" name="fixed_fees_tax" label="% IVA reclamación extrajudicial" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Procedimiento monitorio</h4>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_amount_code" label="Código Procedimiento monitorio" placeholder="Código Procedimiento monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_amount_concept" label="Concepto Procedimiento monitorio" placeholder="Concepto Procedimiento monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_fees_code" label="Código tasas Procedimiento monitorio" placeholder="Código tasas Procedimiento monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_fees_concept" label="Concepto tasas Procedimiento monitorio" placeholder="Concepto tasas Procedimiento monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Jucios verbales</h4>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="verbal_amount_code" label="Código Jucios verbales" placeholder="Código Jucios verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="verbal_amount_concept" label="Concepto Jucios verbales" placeholder="Concepto Jucios verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="verbal_fees_code" label="Código tasas Jucios verbales" placeholder="Código tasas Jucios verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="verbal_fees_concept" label="Concepto tasas Jucios verbales" placeholder="Concepto tasas Jucios verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Jucios ordinarios</h4>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="ordinary_amount_code" label="Código Jucios ordinarios" placeholder="Código Jucios ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="ordinary_amount_concept" label="Concepto Jucios ordinarios" placeholder="Concepto Jucios ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="ordinay_fees_code" label="Código tasas Jucios ordinarios" placeholder="Código tasas Jucios ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinay_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="ordinary_fees_concept" label="Concepto tasas Jucios ordinarios" placeholder="Concepto tasas Jucios ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Ejecución</h4>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="execution_code" label="Código Ejecución" placeholder="Código Ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="excecution_concept" label="Concepto Ejecución" placeholder="Concepto Ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->excecution_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="resource_code" label="Código Recurso" placeholder="Código Recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="resource_concept" label="Concepto Recurso" placeholder="Concepto Recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->execution_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->execution_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->execution_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->execution_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
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
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->resource_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->resource_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->resource_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->resource_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>

        </div>
        <hr>
        <div class="row">
            <h4>Configuración facturas</h4>
        </div>
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
