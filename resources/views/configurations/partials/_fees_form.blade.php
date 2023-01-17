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
            <div class="col-sm-2">
                <x-adminlte-input name="extra_code" label="Código extrajudicial" placeholder="Código extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->extra_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="extra_concept" label="Concepto extrajudicial" placeholder="Concepto extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->extra_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-2">
                <x-adminlte-select2 id="fixed_fees_tax" name="fixed_fees_tax" label="% IVA extrajudicial" placeholder="% IVA extrajudicial" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->fixed_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="fixed_fees" label="Importe extrajudicial" placeholder="Importe extrajudicial" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="fixed_fees_dto" label="Importe extrajudicial dto" placeholder="Importe extrajudicial dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        </div>

        <hr>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <h4>Procedimiento monitorio</h4>
        </div>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-2">
                <x-adminlte-input name="judicial_amount_code" label="Código monitorio" placeholder="Código monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="judicial_amount_concept" label="Concepto monitorio" placeholder="Concepto monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="judicial_amount_tax" name="judicial_amount_tax" label="% IVA monitorio" placeholder="% IVA monitorio" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->judicial_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="judicial_amount" label="Importe montorio " placeholder="Importe montorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="judicial_amount_dto" label="Importe montorio dto" placeholder="Importe montorio dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-2">
                <x-adminlte-input name="judicial_fees_code" label="Código tasa monitorio" placeholder="Código tasas" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="judicial_fees_concept" label="Concepto tasa monitorio" placeholder="Concepto tasas" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="judicial_fees_tax" name="judicial_fees_tax" label="% IVA tasa monitorio" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->judicial_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="judicial_fees" label="Importe tasa monitorio" placeholder="Tasa monitorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <hr>
        <div class="row">
            <h4>Jucios verbales</h4>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <x-adminlte-input name="verbal_amount_code" label="Código verbal" placeholder="Código verbal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="verbal_amount_concept" label="Concepto verbal" placeholder="Concepto verbal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="verbal_amount_tax" name="verbal_amount_tax" label="% IVA verbal" placeholder="% IVA verbal" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->verbal_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="verbal_amount" label="Importe verbal " placeholder="Importe verbal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="verbal_amount_dto" label="Importe verbal dto" placeholder="Importe verbal dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-2">
                <x-adminlte-input name="verbal_fees_code" label="Código tasa verbal" placeholder="Código tasa verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="verbal_fees_concept" label="Concepto tasa verbal" placeholder="Concepto tasa verbal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="verbal_fees_tax" name="verbal_fees_tax" label="% IVA tasa verbal" placeholder="% de IVA" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->verbal_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="verbal_fees" label="Importe tasa verbal" placeholder="Importe tasa verbal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <!--  *********************************  Ordinarios **************************  -->
        <hr>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <h4>Jucios ordinarios</h4>
        </div>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-2">
                <x-adminlte-input name="ordinary_amount_code" label="Código ordinario" placeholder="Código ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="ordinary_amount_concept" label="Concepto ordinario" placeholder="Concepto ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-2">
                <x-adminlte-select2 id="ordinary_amount_tax" name="ordinary_amount_tax" label="% IVA ordinario" placeholder="% IVA ordinario" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->ordinary_amount_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="ordinary_amount" label="Importe ordinario" placeholder="Importe ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="ordinary_amount_dto" label="Importe ordinario dto" placeholder="Importe ordinario dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        </div>

        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-2">
                <x-adminlte-input name="ordinay_fees_code" label="Código tasa ordinario" placeholder="Código tasas ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinay_fees_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="ordinary_fees_concept" label="Concepto tasa ordinario" placeholder="Concepto tasa ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_fees_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="ordinary_fees_tax" name="ordinary_fees_tax" label="% IVA tasa ordinario" placeholder="% IVA tasa ordinario" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->ordinary_fees_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="ordinary_fees" label="Importe tasa ordinario " placeholder="Importe tasa ordinario" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        </div>

        <hr>
        <div class="row">
            <h4>Ejecución</h4>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <x-adminlte-input name="execution_code" label="Código ejecución" placeholder="Código ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="execution_concept" label="Concepto ejecución" placeholder="Concepto ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-select2 id="execution_tax" name="execution_tax" label="% IVA ejecución" placeholder="% IVA ejecución" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->execution_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->execution_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->execution_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->execution_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="execution" label="Importe ejecución" placeholder="Importe ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="execution_dto" label="Importe ejecución dto" placeholder="Importe ejecución dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <hr>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <h4>Recurso de apelación</h4>
        </div>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-2">
                <x-adminlte-input name="resource_code" label="Código recurso" placeholder="Código recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="resource_concept" label="Concepto recurso" placeholder="Concepto recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-2">
                <x-adminlte-select2 id="resource_tax" name="resource_tax" label="% IVA recurso" placeholder="% IVA recurso" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->resource_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->resource_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->resource_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->resource_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="resource" label="Importe recurso " placeholder="Importe recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-2">
                <x-adminlte-input name="resource_dto" label="Importe recurso dto" placeholder="Importe recurso dto" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource_dto : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>


        {{-- Deposito --}}

        <hr>
        <div class="row">
            <h4>Deposito</h4>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <x-adminlte-input name="deposit_code" label="Código deposito" placeholder="Código deposito" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->deposit_code : ''}}" disabled>
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="deposit_concept" label="Concepto deposito" placeholder="Concepto deposito" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->deposit_concept : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-2">
                <x-adminlte-select2 id="deposit_tax" name="deposit_tax" label="% IVA deposito" placeholder="% IVA deposito" class="form-control-sm" enable-old-support="true">
                    <option value="IVA21" {{ isset($configuration) ? ($configuration->deposit_tax == "IVA21"?'selected': '') : ''}}>21%</option>
                    <option value="IVA10" {{ isset($configuration) ? ($configuration->deposit_tax == "IVA10"?'selected': '') : ''}}>10%</option>
                    <option value="IVA4" {{ isset($configuration) ? ($configuration->deposit_tax == "IVA4"?'selected': '') : ''}}>4%</option>
                    <option value="IVA0" {{ isset($configuration) ? ($configuration->deposit_tax == "IVA0"?'selected': '') : ''}}>Excento</option>
                </x-adminlte-select2>
            </div>
            <div class="col-sm-2">
                <x-adminlte-input name="deposit_amount" label="Importe deposito" placeholder="Importe deposito" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->deposit_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <hr>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <h4>Datos de facturas emitidas</h4>
        </div>
        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-4">
                <x-adminlte-input name="invoice_name" label="Nombre de la empresa" placeholder="Nombre de la empresa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_name : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="invoice_email" label="Email de factura " placeholder="Email" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_email : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="tax" label="Porcentaje general de IVA" placeholder="% IVA" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->tax : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>

        <div class="row" style="background-color: rgb(239, 243, 241)">
            <div class="col-sm-4">
                <x-adminlte-input name="invoice_address_line_1" label="Dirección de facturación" placeholder="Dirección de facturación" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_address_line_1 : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="invoice_address_line_2" label="C.P., Provincia, País" placeholder="C.P., Provincia, País" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->invoice_address_line_2 : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-4">
                <x-adminlte-input name="percentage_fees" label="Porcentaje de comisión en recuperación deudas" placeholder="Porcentaje comisión" type="number" min="0" max="100"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->percentage_fees : ''}}">
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
