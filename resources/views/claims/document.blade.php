@switch($doc->type)
    @case('factura')
        <div>
        	<a href="#modal-factura-{{$idx}}" data-toggle="modal">FACTURA</a>

        	<hr>
        	<div class="modal fade" id="modal-factura-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE FACTURA</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        								@php
        									$ext = array_reverse(explode('.', $doc->document))[0];
        								@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - FACTURA.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Nº Documento:</b> <br>
        							{{$h[key($h)]['ndoc_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha de Vencimiento:</b> <br>
        							{{$h[key($h)]['vencimiento_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Importe Principal:</b> <br>
        							{{$h[key($h)]['importe_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Porcentaje de IVA:</b> <br>
        							{{$h[key($h)]['iva_factura']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break

        @case('factura_rectificativa')
        <div>
        	<a href="#modal-factura_rectificativa-{{$idx}}" data-toggle="modal">FACTURA RECTIFICATIVA</a>

        	<hr>
        	<div class="modal fade" id="modal-factura_rectificativa-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE FACTURA RECTIFICATIVA</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        								@php
        									$ext = array_reverse(explode('.', $doc->document))[0];
        								@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - FACTURA.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Nº Documento:</b> <br>
        							{{$h[key($h)]['ndoc_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha de Vencimiento:</b> <br>
        							{{$h[key($h)]['vencimiento_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Importe Principal:</b> <br>
        							{{$h[key($h)]['importe_factura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Porcentaje de IVA:</b> <br>
        							{{$h[key($h)]['iva_factura']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break

    @case('albaran')
        <div>
        	<a href="#modal-albaran-{{$idx}}" data-toggle="modal">ALBARÁN</a>

        	<hr>
        	<div class="modal fade" id="modal-albaran-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE ALBARÁN</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - ALBARÁN.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Nº Documento:</b> <br>
        							{{$h[key($h)]['ndoc_albaran']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_albaran']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('recibo')
        <div>
        	<a href="#modal-recibo-{{$idx}}" data-toggle="modal">RECIBO DE ENTREGA</a>

        	<hr>
        	<div class="modal fade" id="modal-recibo-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE RECIBO DE ENTREGA</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - RECIBO DE ENTREGA.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_recibo']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('contrato')
        <div>
        	<a href="#modal-contrato-{{$idx}}" data-toggle="modal">CONTRATO</a>

        	<hr>
        	<div class="modal fade" id="modal-contrato-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE CONTRATO</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - CONTRATO.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_contrato']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('hoja_encargo')
        <div>
        	<a href="#modal-hoja_encargo-{{$idx}}" data-toggle="modal">HOJA DE ENCARGO</a>

        	<hr>
        	<div class="modal fade" id="modal-hoja_encargo-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE HOJA DE ENCARGO</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - HOJA DE ENCARGO.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_hoja_encargo']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('hoja_pedido')
        <div>
        	<a href="#modal-hoja_pedido-{{$idx}}" data-toggle="modal">HOJA DE PEDIDO</a>

        	<hr>
        	<div class="modal fade" id="modal-hoja_pedido-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE HOJA DE PEDIDO</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - HOJA DE PEDIDO.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_hoja_pedido']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('reconocimiento')
        <div>
        	<a href="#modal-reconocimiento-{{$idx}}" data-toggle="modal">RECONOCIMIENTO DE DEUDA</a>

        	<hr>
        	<div class="modal fade" id="modal-reconocimiento-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE RECONOCIMIENTO DE DEUDA</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - RECONOCIMIENTO DE DEUDA.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_reconocimiento']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Importe Principal:</b> <br>
        							{{$h[key($h)]['importe_reconocimiento']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Porcentaje de IVA:</b> <br>
        							{{$h[key($h)]['iva_reconocimiento']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('extracto')
        <div>
        	<a href="#modal-extracto-{{$idx}}" data-toggle="modal">EXTRACTO BANCARIO</a>

        	<hr>
        	<div class="modal fade" id="modal-extracto-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE EXTRACTO BANCARIO</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - EXTRACTO BANCARIO.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_extracto']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('escritura')
        <div>
        	<a href="#modal-escritura-{{$idx}}" data-toggle="modal">ESCRITURA NOTARIAL</a>

        	<hr>
        	<div class="modal fade" id="modal-escritura-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE ESCRITURA NOTARIAL</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - ESCRITURA NOTARIAL.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Nº Protocolo:</b> <br>
        							{{$h[key($h)]['nprot_escritura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_escritura']}} </div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Nombre de Notario:</b> <br>
        							{{$h[key($h)]['nombre_escritura']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('burofax')
        <div>
        	<a href="#modal-burofax-{{$idx}}" data-toggle="modal">BUROFAX</a>

        	<hr>
        	<div class="modal fade" id="modal-burofax-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE BUROFAX</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - BUROFAX.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_burofax']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('carta_certificada')
        <div>
        	<a href="#modal-carta_certificada-{{$idx}}" data-toggle="modal">CARTA CERTIFICADA</a>

        	<hr>
        	<div class="modal fade" id="modal-carta_certificada-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE CARTA CERTIFICADA</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - CARTA CERTIFICADA.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_carta']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('email')
        <div>
        	<a href="#modal-email-{{$idx}}" data-toggle="modal">E-MAILS</a>

        	<hr>
        	<div class="modal fade" id="modal-email-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE E-MAILS</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - E-MAILS.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_email']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break
    @case('otros')
        <div>
        	<a href="#modal-otros-{{$idx}}" data-toggle="modal">OTROS</a>

        	<hr>
        	<div class="modal fade" id="modal-otros-{{$idx}}">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-header">DETALLES DE OTROS</div>
        				<div class="modal-body">
        					<div class="row text-left">
        						<div class="col-sm-12">
        							<div class="form-group">
        							@php
        								$ext = array_reverse(explode('.', $doc->document))[0];
        							@endphp
        								<i class="fas fa-file"></i> <a download="Descarga - OTROS.{{$ext}}" href="{{url($doc->document)}}">Descargar Documento</a>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group"><b>Fecha:</b> <br>
        							{{$h[key($h)]['fecha_otros']}} </div>
        						</div>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @break

@endswitch
