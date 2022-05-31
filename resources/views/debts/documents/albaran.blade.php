<div class="row">
	<div class="col-sm-3">
		
		<x-adminlte-input name="albaran" required label="Albarán" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">
		
		<x-adminlte-input name="ndoc_albaran" value="{{ isset($_i) ? $_i['ndoc_albaran'] : '' }}" required label="Nº Documento" type="text"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">
		
		<x-adminlte-input name="fecha_albaran" value="{{ isset($_i) ? $_i['fecha_albaran'] : '' }}" required label="Fecha" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>