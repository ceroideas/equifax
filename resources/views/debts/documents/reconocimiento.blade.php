<div class="row">
	<div class="col-sm-3">

		<x-adminlte-input name="reconocimiento[file][]" required label="Reconocimiento de Deuda * (Máximo 16 Mb.)" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="reconocimiento[fecha_reconocimiento][]" required label="Fecha *" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="reconocimiento[importe_reconocimiento][]" required label="Importe principal *" type="number" step="0.01" min="0"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="reconocimiento[iva_reconocimiento][]" required label="Porcentaje de IVA *" type="number" step="0.01" min="0"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>
