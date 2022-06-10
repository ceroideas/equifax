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
                <x-adminlte-input name="fixed_fees" label="Reclamación Amistosa" placeholder="Reclamación Amistosa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->fixed_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="percentage_fees" label="Porcentaje de las Deudas" placeholder="Porcentaje de las Deudas" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->percentage_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_amount" label="Procedimiento Montorio " placeholder="Procedimiento Montorio" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="judicial_fees" label="Tasa " placeholder="Tasa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->judicial_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="verbal_amount" label="Juicios Verbales " placeholder="Juicios Verbales" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="verbal_fees" label="Tasa " placeholder="Tasa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->verbal_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="ordinary_amount" label="Juicios Ordinarios " placeholder="Juicios Ordinarios" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_amount : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="ordinary_fees" label="Tasa " placeholder="Tasa" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->ordinary_fees : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="execution" label="Ejecución " placeholder="Ejecución" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->execution : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="resource" label="Recurso " placeholder="Recurso" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->resource : ''}}">
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
            <div class="col-sm-6">
                <x-adminlte-input name="tax" label="IVA%" placeholder="IVA" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($configuration) ? $configuration->tax : ''}}">
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
