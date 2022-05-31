<div class="row">
	<div class="col-sm-3">
		
		<x-adminlte-input name="burofax" required label="Burofax" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">
		
		<x-adminlte-input name="fecha_burofax" value="{{ isset($_i) ? $_i['fecha_burofax'] : '' }}" required label="Fecha" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>