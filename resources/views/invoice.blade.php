<link rel="stylesheet" href="{{asset('invoice.css')}}">
<link href="{{url('landing')}}/app.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
<title>Factura {{$i->tipfac}}/{{$i->id}}</title>

@php
    $decryptedName = isset($i->cnofac) ? Crypt::decryptString(trim($i->cnofac)) : 'No existe';
    $decryptedAddress = isset($i->cdofac) ? Crypt::decryptString(trim($i->cdofac)) : 'No existe';
    $decryptedDni = isset($i->cnifac) ? Crypt::decryptString(trim($i->cnifac)) : 'No existe';
@endphp

<div class="container-fluid">
	<div class="container invoice-container">
	  <!-- Header -->
	  <header>
        <div class="row align-items-center">
            <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                <img src="{{ url('landing/assets/grafico-logo-positivo.png') }}" alt="Logotipo Dividae" style="width: 150px">
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
            <div class="col-sm-3"><strong>Fecha: <br></strong> {{ $i->created_at->format('d/m/Y') }}</div>
            <div class="col-sm-3"> <strong>Reclamación Nº: <br></strong>
                @if(isset($i->claim->id))
                    {{$i->claim->id}}
                @else
                    Varias
                @endif
            </div>
            <div class="col-sm-3"> </div>
            <div class="col-sm-3 text-sm-right"> <strong>Factura Nº: <br></strong>{{$i->tipfac}} / {{$i->id}}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Pagado a: </strong>
                <address>
                    {{ $c->invoice_name }}<br>
                    {{ $c->invoice_cif}}<br>
                    {{ $c->invoice_address_line_1 }}<br>
                    {{ $c->invoice_address_line_2 }}<br>
                    {{ $c->invoice_email }}
                </address>
            </div>
            <div class="col-sm-6 order-sm-0"> <strong>Facturado a:</strong>
                <address>
                    {{ $decryptedName }} <br>
                    {{ $decryptedDni }} <br>
                    {{ $decryptedAddress }}, <br>
                    {{$i->ccpfac}}, {{$i->cpofac}}, {{$i->cprfac}} <br>
                    @if(isset($i->claim->owner->email))
                        {{$i->claim->owner->email}} <br>
                    @endif
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
                        <td colspan="2" class="col-3 w-auto border-0"><strong>Descripción</strong></td>
                        <td class="col-1 w-auto text-center border-0" style="width: 100px !important"><strong>Cantidad</strong></td>
                        <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Precio</strong></td>
                        <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Descuento</strong></td>
                        <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>IVA</strong></td>
                        <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Total</strong></td>
                    </tr>
                    </thead>
                        <tbody>

                            @foreach ($lines as $value)
                                <tr>
                                    <td colspan="2" class="col-5 w-auto text-1 border-0">
                                        @if($value['artlin']=='REC-001')
                                            <strong>{{$value['deslin']}}</strong>
                                        @else
                                            {{$value['deslin']}}
                                        @endif
                                    </td>

                                    <td class="col-1 w-auto text-center border-0">{{$value['canlin']==0?'':$value['canlin']}}</td>
                                    <td class="col-2 w-auto text-center border-0">
                                        @if($value['prelin']<>0 ||$value['prelin']<>null)
                                            {{number_format($value['prelin'],2,',','.')}} &euro;</td>
                                        @else
                                            </td>
                                        @endif

                                    <td class="col-2 w-auto text-center border-0">
                                        {{ $value['dtolin']==0 ? '' : $value['dtolin'].' %' }}
                                    </td>
                                    @if ($value['ivalin']=='IVA0')
                                        <td class="col-2 w-auto text-center border-0">0 %</td>
                                    @elseif($value['ivalin']=='IVA10')
                                        <td class="col-2 w-auto text-center border-0">10 %</td>
                                    @elseif($value['ivalin']=='IVA4')
                                        <td class="col-2 w-auto text-center border-0">4 %</td>
                                    @elseif($value['ivalin']==null)
                                        <td class="col-2 w-auto text-center border-0"></td>
                                    @else
                                        <td class="col-2 w-auto text-center border-0">21 %</td>
                                    @endif
                                    <td class="col-2 w-auto text-center border-0">
                                        @if($value['prelin']<>0 ||$value['prelin']<>null)
                                            {{number_format($value['totlin'],2,',','.')}} &euro;</td>
                                        @else
                                            </td>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot class="card-footer">

                            <tr>
                                <td colspan="2" class="col-5 w-auto border-0"><strong></strong></td>
                                <td class="col-1 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Subtotal:</strong></td>
                                {{-- Sumatorio de Bases --}}
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>
                                    {{number_format($i->bas1fac+$i->bas2fac+$i->bas3fac+$i->bas4fac,2,',','.')}} &euro;
                                </strong></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="col-5 w-auto border-0"><strong></strong></td>
                                <td class="col-1 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>IVA:</strong></td>{{-- Sumatoria de ivas --}}
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>
                                    {{number_format($i->iiva1fac+$i->iiva2fac+$i->iiva3fac,2,',','.')}} &euro;
                                </strong></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="col-5 w-auto border-0"><strong></strong></td>
                                <td class="col-1 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong></strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>Total:</strong></td>
                                <td class="col-2 w-auto text-center border-0" style="width: 100px !important"><strong>{{number_format($i->totfac,2,',','.')}} &euro;</strong></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
	  </main>
	  <!-- Footer -->
	  <footer class="text-center mt-4">
        <p style="text-align:left"><strong>Número de cuenta de pago: </strong>{{ $c->invoice_account }}</p>
        <p style="text-align:left"><strong>Fecha de vencimiento: </strong>30 días desde fecha factura.</p>
	  <p class="text-1"><strong>NOTA:</strong> Este es un documento generado por electrónicamente y no requiere firma física.</p>
	  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Imprimir</a></div>

	  <div class="btn-group btn-group-sm d-print-none"> <a href="{{url('excel-invoice/'.$i->tipfac.'/'.$i->id)}}" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-file-excel"></i> Descargar factura en XLSX </a></div>
	  </footer>
	</div>
</div>
