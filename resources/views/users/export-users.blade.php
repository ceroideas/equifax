<table>

	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Newsletter</th>
			<th>Status</th>
            <th>Teléfono</th>
            <th>DNI</th>
            <th>Dirección</th>
            <th>Código postal</th>
            <th>Población</th>
            <th>Provincia</th>


		</tr>
	</thead>

	<tbody>
		@foreach(App\Models\User::all() as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->newsletter ? 'Si' : 'No' }}</td>
                <td>{{ $user->getStatus() }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->cop }}</td>
                <td>{{ $user->location }}</td>
                <td>{{ $user->province }}</td>
            </tr>
        @endforeach
	</tbody>

</table>
