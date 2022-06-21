<link rel="stylesheet" href="{{asset('invoice.css')}}">
<link href="{{url('landing')}}/app.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
<title>Factura #{{$i->claim->id.'/'.$i->id}}</title>
<div class="container-fluid">
	
	<div class="container invoice-container">
	  <!-- Header -->
	  <header>
	  <div class="row align-items-center">
	    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
	      <img src="{{ url('landing/assets/grafico-logo-positivo.png') }}" alt="" style="width: 150px">
	      {{-- <h2 style="margin: 0; color: #333; font-size: 32px;">Vamox</h2> --}}
	    </div>
	    <div class="col-sm-5 text-center text-sm-right">
	      <h4 class="text-7 mb-0">Factura</h4>
	    </div>
	  </div>
	  <hr>
	  </header>
	  
	  <!-- Main Content -->
	  <main>
	  <div class="row">
	    <div class="col-sm-3"><strong>Fecha: <br></strong> {{ $i->created_at->format('d-m-Y') }}</div>
	    <div class="col-sm-3"> <strong>Reclamación Nº: <br></strong> {{$i->claim->id}}</div>
	    <div class="col-sm-3"> <strong>Referencia Nº: <br></strong> {{$i->id}}</div>
	    <div class="col-sm-3 text-sm-right"> <strong>Factura Nº: <br></strong> DV{{$i->id}}</div>
		  
	  </div>
	  <hr>
	  <div class="row">
	    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Pagado a:</strong>
	      <address>
	      {{ $c->invoice_name }}<br>
	      {{ $c->invoice_address_line_1 }}<br>
	      {{ $c->invoice_address_line_2 }}<br>
		  {{ $c->invoice_email }}
	      </address>
	    </div>
	    <div class="col-sm-6 order-sm-0"> <strong>Facturado a:</strong>
	      <address>
		  {{$i->claim->owner->name}} <br>
		  {{$i->claim->owner->address}}, {{$i->claim->owner->location}} <br>
		  {{$i->claim->owner->dni}} <br>
		  {{$i->claim->owner->email}} <br>

	      {{-- Smith Rhodes<br>
	      15 Hodges Mews, High Wycombe<br>
	      HP12 3JL<br>
	      United Kingdom --}}
	      </address>
	    </div>
	  </div>
		
	  <div class="card">
	    <div class="card-body p-0">
	      <div class="table-responsive">
	        <table class="table mb-0">
			<thead class="card-header">
	          <tr>
	            {{-- <td class="col-3 w-auto border-0" style="width: 100px !important"><strong>Servicio</strong></td> --}}
				<td colspan="2" class="col-10 w-auto border-0"><strong>Descripción</strong></td>
				<td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Cantidad</strong></td>
	          </tr>
	        </thead>
	          <tbody>
				<tr>
	              {{-- <td class="col-3 w-auto border-0">Camión completo</td> --}}
	              <td colspan="2" class="col-10 w-auto text-1 border-0">
	              	{{$i->description}}
	              </td>
	              <td class="col-2 w-auto text-center border-0">1</td>
	            </tr>
	          </tbody>
			  <tfoot class="card-footer">
			  	@php
			  		$tax = ($i->amount * 100)/(100 + $c->tax);
			  	@endphp
				<tr>
	              <td colspan="2" class="text-right"><strong>Sub Total:</strong></td>
	              <td class="text-right">{{ number_format($tax ,2)}}€</td>
	            </tr>
	            <tr>
	              <td colspan="2" class="text-right"><strong>IVA ({{$c->tax}}%):</strong></td>
	              <td class="text-right">{{number_format(($i->amount - $tax) ,2)}}€</td>
	            </tr>
				<tr>
	              <td colspan="2" class="text-right"><strong>Total:</strong></td>
	              <td class="text-right">{{ number_format($i->amount ,2) }}€</td>
	            </tr>
			  </tfoot>
	        </table>
	      </div>
	    </div>
	  </div>
	  </main>
	  <!-- Footer -->
	  <footer class="text-center mt-4">
	  <p class="text-1"><strong>NOTA:</strong> Este es un recibo generado por computadora y no requiere firma física.</p>
	  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Imprimir</a></div>

	  <div class="btn-group btn-group-sm d-print-none"> <a href="{{url('excel-invoice',$i->id)}}" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-file-excel"></i> Descargar XLSX</a></div>
	  </footer>
	</div>
</div>