<div class="row">
	<div class="col-sm-3">
		
		<x-adminlte-input name="hoja_pedido" required label="Hoja de Pedido" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">
		
		<x-adminlte-input name="fecha_hoja_pedido" value="{{ isset($_i) ? $_i['fecha_hoja_pedido'] : '' }}" required label="Fecha" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>