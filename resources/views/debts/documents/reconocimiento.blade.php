<div class="row">
	<div class="col-sm-3">

		<x-adminlte-input name="reconocimiento" required label="Reconocimiento de Deuda" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="fecha_reconocimiento" value="{{ isset($_i) ? $_i['fecha_reconocimiento'] : '' }}" required label="Fecha" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="importe_reconocimiento" value="{{ isset($_i) ? $_i['importe_reconocimiento'] : '' }}" required label="Importe Principal" type="number" step="0.01" min="0"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="iva_reconocimiento" value="{{ isset($_i) ? $_i['iva_reconocimiento'] : '' }}" required label="IVA" type="number" step="0.01" min="0"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>
