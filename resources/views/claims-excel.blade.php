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
		</tr>
	</thead>

	<tbody>

		@foreach (App\Models\Claim::all() as $claim)
			<tr>
	            <td>{{ $claim->id }}</td>
	            <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
	            <td>{{ $claim->debtor->name }}</td>
	            <td>{{ $claim->debt->total_amount }}€</td>
	            <td>{{ $claim->amountClaimed() + $claim->debt->partials_amount }}€</td>
	            <td>{{ $claim->debt->total_amount - ($claim->amountClaimed() + $claim->debt->partials_amount) }}€</td>
	            <td>{{ $claim->getType() }}</td>
	            <td>{{ $claim->getStatus() }}</td>

	            <td>{{ $claim->debtor->name }}</td>
	            <td>{{ $claim->debtor->dni }}</td>
	            <td>{{ $claim->debtor->email }}</td>

	            <td>{{ $claim->debtor->address }}</td>
	            <td>{{ $claim->debtor->location }}</td>
	            <td>{{ $claim->debtor->cop }}</td>
	            <td>{{ $claim->debtor->phone }}</td>
	        </tr>
		@endforeach

	</tbody>

</table>