	  <table>
	  	<tr>
	    <th colspan="4" style="font-size: 18px;">
	      DIVIDAE
	    </th>
	    <th style="text-align: right;">
	      <h4>Factura</h4>
	    </th>
	  	</tr>
	  </table>

	  <table>
    	  <tr>
	        <th style="width: 170px;"> <strong>Fecha:</strong></th>
	        <th style="width: 170px;"> <strong>Reclamación Nº:</strong></th>
            <th style="width: 170px;"></th>
	        <th style="width: 170px;"> <strong></strong></th>
	        <th style="width: 170px;"> <strong>Factura Nº:</strong></th>
	      </tr>
          <tr>
	        <th>{{ $i->created_at->format('d/m/Y') }}</th>
	        <th>{{$i->claim->id}}</th>
            <th></th>
	        <th></th>
	        <th>{{$i->id}}</th>
	      </tr>
	  </table>

	  <table>
	      <tr>
            <td colspan="2"><strong>Pagado a:</strong></td>
            <td colspan="3" style="text-align: right;"><strong>Facturado a:</strong></td>
          </tr>
		  <tr>
            <td colspan="2">{{ $c->invoice_name }}</td>
            <td colspan="3" style="text-align: right;">{{$i->cnofac}} </td>
        </tr>
		  <tr>
            <td colspan="2">{{ $c->invoice_address_line_1 }}</td>
            <td colspan="3" style="text-align: right;">{{$i->cdofac}}, {{$i->cpofac}}, {{$i->cprfac}} </td>
        </tr>
		  <tr>
            <td colspan="2">{{ $c->invoice_address_line_2 }}</td>
            <td colspan="3" style="text-align: right;">{{$i->cnifac}} </td>
        </tr>
		  <tr>
            <td colspan="2">{{ $c->invoice_email }}</td>
            <td colspan="3" style="text-align: right;">{{$i->claim->owner->email}}</td>
        </tr>

	  </table>

    <table class="table mb-0">
		<thead class="card-header">
          <tr>
            <td class="col-5 w-auto border-0"><strong>Descripción</strong></td>
            <td class="col-1 w-auto text-center border-0" style="width: 100px !important"><strong>Cantidad</strong></td>
            <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Precio</strong></td>
            <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>IVA</strong></td>
            <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Total</strong></td>
          </tr>
        </thead>
          <tbody>
            @foreach ($lines as $value)
			<tr>
              <td>
                {{$value['deslin']}}
              </td>
              <td style="text-align: right;">{{$value['canlin']}}</td>
              <td style="text-align: right;">{{number_format($value['prelin'],2,',','.')}}</td>
              {{--  IVA --}}
              @if ($value['ivalin']=='IVA0')
                <td style="text-align: right;">0%</td>
              @elseif($value['ivalin']=='IVA10')
                <td style="text-align: right;">10%</td>
              @elseif($value['ivalin']=='IVA4')
                <td style="text-align: right;">4%</td>
              @else
                <td style="text-align: right;">21%</td>
              @endif
              <td style="text-align: right;">{{number_format($value['totlin'],2,',','.')}}</td>
            </tr>
            @endforeach
          </tbody>


		  <tfoot class="card-footer">
<tr></tr>
			<tr>
              <td colspan="4" style="text-align: right;"><strong>Sub Total:</strong></td>
              <td style="text-align: right;">{{number_format($i->bas1fac+$i->bas2fac+$i->bas3fac+$i->bas4fac,2,',','.')}} €</td>
            </tr>
            <tr>
              <td colspan="4" style="text-align: right;"><strong>IVA:</strong></td>
              <td style="text-align: right;">{{number_format($i->iiva1fac+$i->iiva2fac+$i->iiva3fac,2,',','.')}} €</td>
            </tr>
			<tr>
              <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
              <td style="text-align: right;">{{number_format($i->totfac,2,',','.')}} €</td>
            </tr>
		  </tfoot>
    </table>
