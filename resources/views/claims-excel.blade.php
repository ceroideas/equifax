<table>
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Cliente</th>
			<th>Deudor</th>
			<th>Importe total</th>
			<th>Importe reclamado</th>
			<th>Importe Pendiente</th>
			<th>Tipo de Reclamación</th>
			<th>Status</th>

			<th>Deudor</th>
			<th>DNI/CIF del deudor</th>
			<th>Corre del deudor</th>

			<th>Deudor deudor</th>
			<th>Deudor localidad</th>
			<th>Deudor código postal</th>
			<th>Deudor teléfono</th>
			<th>Factura</th>
			<th>Albarán</th>
			<th>Contrato de Prestación de Servicios</th>
			<th>Documentación del Pedido</th>
			<th>Extracto Bancario</th>
			<th>Reconocimiento de Deuda</th>
			<th>Escritura Notarial</th>
			<th>Reclamación Previa</th>
			<th>Documentos Extra</th>
		</tr>
	</thead>

	<tbody>

		@foreach (App\Models\Claim::all() as $claim)
			<tr>
	            <td>{{ $claim->id }}</td>
	            <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
	            <td>{{ $claim->debtor->name }}</td>
	            <td>{{ $claim->debt->pending_amount }}€</td>
	            <td>{{ $claim->amountClaimed() + $claim->debt->partials_amount }}€</td>
	            <td>{{ $claim->debt->pending_amount - ($claim->amountClaimed() + $claim->debt->partials_amount) }}€</td>
	            <td>{{ $claim->getType() }}</td>
	            <td>{{ $claim->getStatus() }}</td>

	            <td>{{ $claim->debtor->name }}</td>
	            <td>{{ $claim->debtor->dni }}</td>
	            <td>{{ $claim->debtor->email }}</td>

	            <td>{{ $claim->debtor->address }}</td>
	            <td>{{ $claim->debtor->location }}</td>
	            <td>{{ $claim->debtor->cop }}</td>
	            <td>{{ $claim->debtor->phone }}</td>
	            <td>
	            	@if($claim->debt->factura)
	            		{{-- Factura Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->factura)}}
	            	@else
	            	N\A
	            	@endif
	            </td>
	            <td>
					@if($claim->debt->albaran)
						{{-- Albarán Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->albaran)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->contrato)
						{{-- Contrato de Prestación de Servicios Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->contrato)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->documentacion_pedido)
						{{-- Documentación del Pedido Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->documentacion_pedido)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->extracto)
						{{-- Extracto Bancario Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->extracto)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->reconocimiento_deuda)
						{{-- Reconocimiento de Deuda Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->reconocimiento_deuda)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->escritura_notarial)
						{{-- Escritura Notarial Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->escritura_notarial)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->reclamacion_previa)
						{{-- Reclamación Previa Reclamo #{{ $claim->id }}:  --}}{{asset($claim->debt->reclamacion_previa)}}
					@else
					N\A
					@endif
				</td>
				<td>
					@if($claim->debt->others)
						@foreach (explode(',', $claim->debt->others) as $doc)
							{{ asset($doc) }} |
						@endforeach
					@else
					N\A
					@endif
	            </td>
	        </tr>
		@endforeach

	</tbody>

</table>