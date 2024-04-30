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


    <form action="{{ url('/collects') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row mt-2">

            <div class="col-sm-3">
                <x-adminlte-input name="serie" label="Serie Factura *" placeholder="Serie de factura" type="text"
                    igroup-size="sm"  enable-old-support="true" required value="{{ isset($invoice) ? $invoice->tipfac : ''}}">
                </x-adminlte-input>
            </div>

            <div class="col-sm-3">
                <x-adminlte-input name="factura" label="No. Factura *" placeholder="Número de factura" type="text"
                    igroup-size="sm"  enable-old-support="true" required value="{{ isset($invoice) ? $invoice->id : ''}}">
                </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="importe" label="Importe *" placeholder="Importe" type="number" step="0.01" min="0"
                igroup-size="sm" enable-old-support="true" value="{{ isset($invoice) ? (number_format($invoice->totfac - $invoice->collects() ,2))  : ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        </div>
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="fecha" required label="Fecha *" type="date"
                igroup-size="sm" enable-old-support="true" value="{{ now()->format('Y-m-d') }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-eur"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="concepto" label="Concepto contable *" placeholder="Concepto" type="text"
                    igroup-size="sm" enable-old-support="true"
                    value="COBRO FRA. {{ isset($invoice) ? Carbon\Carbon::parse($invoice->fecfac)->format('y').'/'.$invoice->id : ''}} {{ isset($invoice) ? Crypt::decryptString($invoice->cnofac) : ''}} " required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6">

                <x-adminlte-input name="observaciones" label="Observaciones" placeholder="Observaciones" type="text"
                    igroup-size="sm" enable-old-support="true" value="PAGO FACTURA {{ isset($invoice) ? Carbon\Carbon::parse($invoice->fecfac)->format('y') : ''}}/{{ isset($invoice) ? $invoice->id : ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                </x-adminlte-input>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            @if(isset($invoice))
                <div>
                    <p>Información adicional de la factura:</p>
                    <p>Total factura: {{number_format($invoice->totfac ,2,',','.')}}</p>
                    <p>Cobros recibidos: {{ number_format($invoice->collects() ,2,',','.') }}</p>
                    <p>Pendiente por pagar: {{ number_format($invoice->totfac - $invoice->collects() ,2,',','.') }}</p>


                </div>
            @endif
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/collects/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>
