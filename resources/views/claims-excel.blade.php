<table>
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Número de documento</th>
			<th>Cliente</th>
			<th>Acreedor</th>
			<th>DNI Acreedor</th>
			<th>Importe reclamado</th>
			<th>Cobros recibidos</th>
			<th>Importe pendiente de pago</th>
			<th>Tipo de Reclamación</th>
			<th>Status</th>

			<th>Hito</th>
			<th>ID Hito</th>

			<th>Deudor</th>
			<th>DNI/CIF del deudor</th>
			<th>Corre del deudor</th>

			<th>Deudor dirección</th>
			<th>Deudor localidad</th>
			<th>Deudor código postal</th>
			<th>Deudor teléfono</th>

			<th>Documentación</th>
			
		</tr>
	</thead>

	<tbody>

		@foreach ($claims as $claim)
			<tr>
	            <td>{{ $claim->id }}</td>
	            <td>{{ $claim->debt->document_number }}</td>
	            <td>{{ $claim->owner->name }}</td>
	            <td>{{ ($claim->user_id) ? $claim->client->name : $claim->representant->name}}</td>
	            <td>{{ ($claim->user_id) ? $claim->client->dni : $claim->representant->dni}}</td>
	            {{-- <td>{{ $claim->debtor->name }}</td> --}}
	            <td>{{ $claim->debt->pending_amount }}€</td>
                <td>{{ $claim->amountClaimed() /* + $claim->debt->partialAmounts()*/ }}€</td>
                <td>{{ $claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/) }}€</td>
	            <td>{{ $claim->getType() }}</td>
	            <td>{{ $claim->getStatus() }}</td>

	            <td>{{ $claim->getHito() }}</td>
	            <td>{{ $claim->actuations()->count() ? $claim->actuations()->get()->last()->getRawOriginal('subject') : '' }}</td>

	            <td>{{ $claim->debtor->name }}</td>
	            <td>{{ $claim->debtor->dni }}</td>
	            <td>{{ $claim->debtor->email }}</td>

	            <td>{{ $claim->debtor->address }}</td>
	            <td>{{ $claim->debtor->location }}</td>
	            <td>{{ $claim->debtor->cop }}</td>
	            <td>{{ $claim->debtor->phone }}</td>

            	@foreach (App\Models\DebtDocument::where('debt_id',$claim->debt->id)->get() as $key => $doc)
                    @switch($doc->type)
                        @case('factura')
                        	<td>FACTURA: {{url($doc->document)}}</td>
                        @break
						@case('albaran')
							<td>ALBARÁN: {{url($doc->document)}}</td>
						@break
						@case('recibo')
							<td>RECIBO DE ENTREGA: {{url($doc->document)}}</td>
						@break
						@case('contrato')
							<td>CONTRATO: {{url($doc->document)}}</td>
						@break
						@case('hoja_encargo')
							<td>HOJA DE ENCARGO: {{url($doc->document)}}</td>
						@break
						@case('hoja_pedido')
							<td>HOJA DE PEDIDO: {{url($doc->document)}}</td>
						@break
						@case('reconocimiento')
							<td>RECONOCIMIENTO DE DEUDA: {{url($doc->document)}}</td>
						@break
						@case('extracto')
							<td>EXTRACTO BANCARIO: {{url($doc->document)}}</td>
						@break
						@case('escritura')
							<td>ESCRITURA NOTARIAL: {{url($doc->document)}}</td>
						@break
						@case('burofax')
							<td>BUROFAX: {{url($doc->document)}}</td>
						@break
						@case('carta_certificada')
							<td>CARTA CERTIFICADA: {{url($doc->document)}}</td>
						@break
						@case('email')
							<td>E-MAILS: {{url($doc->document)}}</td>
						@break
						@case('otros')
							<td>OTROS: {{url($doc->document)}}</td>
						@break
                    @endswitch
                    
                @endforeach
	        </tr>
		@endforeach

	</tbody>

</table>