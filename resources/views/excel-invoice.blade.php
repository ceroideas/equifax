	  <table>
	  	<tr>
	    <th colspan="3" style="font-size: 18px;">
	      DIVIDAE
	    </th>
	    <th style="text-align: right;">
	      <h4>Factura</h4>
	    </th>
	  	</tr>
	  </table>

	  <table>
	  <tr>
	    <th style="width: 170px;"> <strong>Fecha: <br></strong> {{ $i->created_at->format('d/m/Y') }}</th>
	    <th style="width: 170px;"> <strong>Reclamación Nº: <br></strong> {{$i->claim->id}}</th>
	    <th style="width: 170px;"> <strong>Referencia Nº: <br></strong> {{$i->id}}</th>
	    <th style="width: 170px;"> <strong>Factura Nº: <br></strong> DV{{$i->id}}</th>

	  </tr>
	  </table>

	  <table>
	    <tr>
	      <td style="height: 120px;" colspan="2">
	    	<strong>Pagado a:</strong> <br>
		      {{ $c->invoice_name }}<br>
		      {{ $c->invoice_address_line_1 }}<br>
		      {{ $c->invoice_address_line_2 }}<br>
			  {{ $c->invoice_email }}
	      </td>

	      <td colspan="2" style="text-align: right; height: 120px;">
	    	<strong>Facturado a:</strong> <br>
			  {{$i->claim->owner->name}} <br>
			  {{$i->claim->owner->address}}, {{$i->claim->owner->location}} <br>
			  {{$i->claim->owner->dni}} <br>
			  {{$i->claim->owner->email}}
	      </td>
	    </tr>
	  </table>

    <table class="table mb-0">
		<thead class="card-header">
          <tr>
			<th colspan="3" class="col-10 w-auto border-0"><strong>Descripción</strong></th>
			<th class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Cantidad</strong></th>
          </tr>
        </thead>
          <tbody>
			<tr>
              <td colspan="3">
              	{{$i->description}}
              </td>
              <td style="text-align: right;">1</td>
            </tr>
          </tbody>
		  <tfoot class="card-footer">
		  	@php
		  		/*$tax = ($i->amount*$c->tax)/100;*/
                $subtotal = ($i->amount / (($c->tax/100)+1));
                $tax = ($i->amount - $subtotal);
		  	@endphp
			<tr>
              <td colspan="3" style="text-align: right;"><strong>Sub Total:</strong></td>
              <!--<td style="text-align: right;">{{number_format(($i->amount - $tax) ,2,',','.')}} €</td>-->
              <td style="text-align: right;">{{number_format(($subtotal) ,2,',','.')}} €</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: right;"><strong>IVA ({{$c->tax}}%):</strong></td>
              <td style="text-align: right;">{{ number_format($tax ,2,',','.')}} €</td>
            </tr>
			<tr>
              <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
              <td style="text-align: right;">{{ number_format($i->amount ,2,',','.') }} €</td>
            </tr>
		  </tfoot>
    </table>
