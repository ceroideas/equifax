<div class="row">
	<div class="col-sm-3">

		<x-adminlte-input name="escritura[file][]" required label="Escritura Notarial *" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="escritura[nprot_escritura][]" required label="Nº Protocolo *" type="text"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="escritura[fecha_escritura][]" required label="Fecha *" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="escritura[nombre_escritura][]" required label="Nombre de Notario *" type="text"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>
