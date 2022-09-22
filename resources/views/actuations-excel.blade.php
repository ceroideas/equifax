<table>

	<thead>
		<tr>
			<th>Número de reclamación</th>
			<th>Id Hito</th>
            <th>Descripción del hito</th>
            <th>Descripcion de la actuación</th>
            <th>Importe de la actuación</th>
            <th>Fecha de actuación</th>

		</tr>
	</thead>

	<tbody>
		@foreach ($actuations as $actuation)
            {{-- Añadir @ifif de $type == 0 || $type == 1)--}}
				<tr>

		            <td>{{ $actuation->claim_id }}</td>
		            <td>{{ $actuation->getRawOriginal('subject')}}</td>
                    <td>{{ $actuation->subject }}</td>
		            <td>{{ $actuation->description }}</td>
		            <td>{{ $actuation->amount ? $actuation->amount.'€' : '0€'}}</td>
		            <td>{{ $actuation->actuation_date }}</td>
		        </tr>
			{{--@endif--}}
		@endforeach
	</tbody>
</table>
