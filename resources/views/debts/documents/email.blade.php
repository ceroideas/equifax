<div class="row">
	<div class="col-sm-3">

		<x-adminlte-input name="email" required label="Email *" type="file"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>

	<div class="col-sm-3">

		<x-adminlte-input name="fecha_email" value="{{ isset($_i) ? $_i['fecha_email'] : '' }}" required label="Fecha *" type="date"
        igroup-size="sm" enable-old-support="true">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-eur"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

	</div>
</div>
