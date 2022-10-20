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

            {{-- Reclamacion previa--}}
            <th>Reclamación Previa</th>
            <th>Fecha Reclamación Previa</th>
            <th>Motivo alegación</th>
            <th>Fichero reclamación previa</th>

            {{-- Datos deuda --}}
            <th>Concepto deuda</th>
            <th>Deuda original</th>
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

            <th>Numero Pagos parciales</th>
            <th>Numero documentos adjuntos</th>
		</tr>
	</thead>

	<tbody>

		@foreach ($claims as $claim)
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


                {{-- Reclamacion previa --}}
                <td>{{ $claim->debt->reclamacion_previa_indicar == 1? 'Si': 'No' }}</td>
                <td>{{ $claim->debt->fecha_reclamacion_previa }}</td>
                <td>{{ $claim->debt->motivo_reclamacion_previa }}</td>
                <td>{{ $claim->debt->reclamacion_previa }}</td>

                {{-- Datos de deuda --}}
                <td>{{ $claim->debt->concept }}</td>
                {{--  --}}
                <td>{{ ($claim->debt->total_amount + ($claim->debt->total_amount * ($claim->debt->tax/100)))}}€</td>
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

                <td>{{ $claim->debt->partials_amount }}</td>

                    @php $documents = App\Models\DebtDocument::where('debt_id',$claim->debt->id)->get() @endphp

                <td> {{ $documents->count('id')}} </td>

                @if( $claim->debt->partials_amount >= 1)

                    @php $partials = json_decode($claim->debt->partials_amount_details); @endphp

                    @if(count($partials))
                        @foreach($partials as $partial)
                            <td> {{ $partial->amount}} € </td>
                            <td> {{ date("d/m/Y",strtotime($partial->date))}} </td>
                        @endforeach
                    @endif
                @else
                    <td></td>
                @endif

                @foreach($documents as $doc)
                    @switch($doc->type)
                        @case('factura')
                            <td>FACTURA: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->factura as $key => $value)
                                    @if($key == 'fecha_factura' || $key =='vencimiento_factura')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('factura_rectificativa')
                            <td>FACTURA RECTIFICATIVA: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->factura_rectificativa as $key => $value)
                                    @if($key == 'fecha_factura' || $key =='vencimiento_factura')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('albaran')
                            <td>ALBARÁN: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->albaran as $key => $value)
                                    @if($key == 'fecha_albaran')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('recibo')
                            <td>RECIBO DE ENTREGA: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->recibo as $key => $value)
                                    @if($key == 'fecha_recibo')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('contrato')
                            <td>CONTRATO: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->contrato as $key => $value)
                                    @if($key == 'fecha_contrato')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('hoja_encargo')
                            <td>HOJA DE ENCARGO: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->hoja_encargo as $key => $value)
                                    @if($key == 'fecha_hoja_encargo')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('hoja_pedido')
                            <td>HOJA DE PEDIDO: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->hoja_pedido as $key => $value)
                                    @if($key == 'fecha_hoja_pedido')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('reconocimiento')
                            <td>RECONOCIMIENTO DE DEUDA: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->reconocimiento as $key => $value)
                                    @if($key == 'fecha_reconocimiento')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('extracto')
                            <td>EXTRACTO BANCARIO: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->extracto as $key => $value)
                                    @if($key == 'fecha_extracto')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('escritura')
                            <td>ESCRITURA NOTARIAL: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->escritura as $key => $value)
                                    @if($key == 'fecha_escritura')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('burofax')
                            <td>BUROFAX: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->burofax as $key => $value)
                                    @if($key == 'fecha_burofax')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('carta_certificada')
                            <td>CARTA CERTIFICADA: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->carta_certificada as $key => $value)
                                    @if($key == 'fecha_carta')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                        @case('email')
                            <td>E-MAILS: {{url($doc->document)}}</td>
                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->email as $key => $value)
                                    @if($key == 'fecha_email')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif
                        @break
                        @case('otros')
                            <td>OTROS: {{url($doc->document)}}</td>

                            @php $hitoDecode = json_decode($doc->hitos); @endphp
                            @if(is_object($hitoDecode))
                                @foreach($hitoDecode->otros as $key => $value)
                                    @if($key == 'fecha_otros')
                                        <td> {{$key}} :: {{date("d/m/Y",strtotime($value)) }} </td>
                                    @else
                                        <td> {{$key}} :: {{$value}} </td>
                                    @endif
                                @endforeach
                            @endif

                        @break
                    @endswitch


                @endforeach
            </tr>
		@endforeach
	</tbody>
</table>
