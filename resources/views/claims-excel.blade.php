<table>

	<thead>
		<tr>
            {{-- Solo para debug
            <th>TYPE</th>
            <th>ACTUACIONES</th>
            <th>LAST ACTUATION</th>--}}


			<th>Número de reclamación</th>
			<th>Reclamación propia</th>
            <th>Cliente ID</th>

            <th>Cliente Nombre</th>
            <th>Cliente Email</th>
            <th>Cliente Teléfono</th>
            <th>Cliente DNI</th>
            <th>Cliente Dirección</th>
            <th>Cliente CP</th>
            <th>Cliente Población</th>
            <th>Cliente Provincia</th>
            <th>Cliente Iban</th>

			<th>Acreedor Nombre</th>
            <th>Acreedor Email</th>
            <th>Acreedor Teléfono</th>
			<th>Acreedor DNI</th>
            <th>Acreedor Dirección</th>
            <th>Acreedor CP</th>
            <th>Acreedor Población</th>
            <th>Acreedor Provincia</th>

            <th>Concepto deuda</th>
            <th>Importe reclamado</th>
			<th>Cobros recibidos</th>
			<th>Importe pendiente de pago</th>
			<th>Tipo de Reclamación</th>
			<th>Status</th>
			<th>ID Hito</th>
			<th>Hito</th>

            {{-- Campos Agreements  --}}
            <th>Quitas y esperas</th>
            <th>Mínimo aceptado</th>
            <th>Plazo máximo</th>
            <th>Observaciones acuerdo</th>


			<th>Deudor Nombre</th>
            <th>Deudor Email</th>
			<th>Deudor Teléfono</th>
			<th>Deudir DNI/CIF</th>
			<th>Deudor Dirección</th>
			<th>Deudor CP</th>
			<th>Deudor Población</th>
            <th>Deudor Provincia</th>

			<th>Documentación</th>

		</tr>
	</thead>

	<tbody>

		@foreach ($claims as $claim)
        {{--  Desenredamos lo anidado --}}

        {{--
            IF(tiene actuaciones)  {
                de la reclamacion, obten el ultim subject que sea igual a 21 o 2101
            }ELSE{
                false
            }
            --}}

{{--			@if ($type == 0 &&
				($claim->actuations()->count() ?

					($claim->actuations()->get()->last()->getRawOriginal('subject') == 21 ||
					 $claim->actuations()->get()->last()->getRawOriginal('subject') == 2101)

				 : false)

				|| $type == 1)--}}
				<tr>
                    {{-- Solo para debug
                    <td>{{$type}}</td>
                    <td>{{$claim->actuations()->count() ? $claim->actuations()->count() : "Sin actuaciones"}} </td>
                    <td>{{$claim->actuations()->count() ? $claim->actuations()->get()->last()->getRawOriginal('subject') : "Sin subject"}} </td>
                    --}}

		            <td>{{ $claim->debt->document_number }}</td>
		            <td>{{ $claim->user_id == NULL ? 'Tercero':'Propia' }}</td>
                    <td>{{ $claim->owner == NULL ? 'No existe': $claim->owner->id }}</td>
                    {{-- Datos del cliente que hizo la reclamacion --}}
                    <td>{{ $claim->owner->name }}</td>
                    <td>{{ $claim->owner->email }}</td>
                    <td>{{ $claim->owner->phone }}</td>
                    <td>{{ $claim->owner->dni }}</td>
                    <td>{{ $claim->owner->address }}</td>
                    <td>{{ $claim->owner->cop }}</td>
                    <td>{{ $claim->owner->location }}</td>
                    <td>{{ $claim->owner->province }}</td>
                    <td>{{ $claim->owner->iban }}</td>

                    {{-- Datos Acreedor Owner = user si es en nombre propio --}}
		            <td>{{ $claim->user_id ? $claim->client->name : $claim->representant->name}}</td>
                    <td>{{ $claim->user_id ? $claim->client->email : $claim->representant->email}}</td>
                    <td>{{ $claim->user_id ? $claim->client->phone : $claim->representant->phone}}</td>
		            <td>{{ $claim->user_id ? $claim->client->dni : $claim->representant->dni}}</td>
                    <td>{{ $claim->user_id ? $claim->client->address : $claim->representant->address}}</td>
                    <td>{{ $claim->user_id ? $claim->client->cop : $claim->representant->cop}}</td>
                    <td>{{ $claim->user_id ? $claim->client->location : $claim->representant->location}}</td>
                    <td>{{ $claim->user_id ? $claim->client->province : $claim->representant->province}}</td>

                    {{-- Datos de deuda --}}
                    <td>{{ $claim->debt->concept }}</td>
		            <td>{{ $claim->debt->pending_amount }}€</td>
	                <td>{{ $claim->amountClaimed() /* + $claim->debt->partialAmounts()*/ }}€</td>
	                <td>{{ $claim->debt->pending_amount - ($claim->amountClaimed()/* + $claim->debt->partialAmounts()*/) }}€</td>
		            <td>{{ $claim->getType() }}</td>
		            <td>{{ $claim->getStatus() }}</td>

		            <td>{{ $claim->actuations()->count() ? $claim->actuations()->get()->last()->getRawOriginal('subject') : '' }}</td>
		            <td>{{ $claim->getHito() }}</td>

                    {{-- Datos agreement --}}
                    <td>{{$claim->agreement == Null ? 'No acepta quitas y espera':'Acepta quitas y espera'}}</td>
                    <td>{{$claim->agreement == Null ? '':$claim->agreement->take}}</td>
                    <td>{{$claim->agreement == Null ? '':$claim->agreement->wait}}</td>
                    <td>{{$claim->agreement == Null ? '':$claim->agreement->observation}}</td>

                    {{-- Datos Deudor --}}
		            <td>{{ $claim->debtor->name }}</td>
		            <td>{{ $claim->debtor->email }}</td>
		            <td>{{ $claim->debtor->phone }}</td>
		            <td>{{ $claim->debtor->dni }}</td>
		            <td>{{ $claim->debtor->address }}</td>
		            <td>{{ $claim->debtor->cop }}</td>
		            <td>{{ $claim->debtor->location }}</td>
                    <td>{{ $claim->debtor->province }}</td>

	            	@foreach (App\Models\DebtDocument::where('debt_id',$claim->debt->id)->get() as $key => $doc)
	                    @switch($doc->type)
	                        @case('factura')
	                        	<td>FACTURA: {{url($doc->document)}}</td>
                                <td>HITOS: {{ $doc->hitos }}</td>
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
                                <td>HITOS: {{ $doc->hitos }}</td>

							@break
							@case('otros')
								<td>OTROS: {{url($doc->document)}}</td>
							@break
	                    @endswitch

	                @endforeach
		        </tr>
			{{--@endif--}}
		@endforeach

	</tbody>

</table>
