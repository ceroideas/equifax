<table>
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Newsletter</th>
			<th>Status</th>
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
            </tr>
        @endforeach
	</tbody>

</table>