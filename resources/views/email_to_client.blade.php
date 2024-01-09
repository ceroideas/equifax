<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Eliteadmin Responsive web app kit</title>
</head>
<body style="margin:0px; background: #f8f8f8;">
	<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
	  	<div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px;">
	  		<div style="border: solid 1px #999;border-top: solid 1px transparent">
			    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
			      	<tbody>
			        	<tr>
			        		{{-- <td style="background:#4585f2; padding:10px; color:#fff; text-align:left;width: 120px;">
			        			<div style="width: 100px;height: 100px;background-image:url('{{ $u->avatar ? asset('/uploads/images/users/'.$u->id.'/'.$u->getAvatar($u->avatar)) : '' }}');background-color:#f2f2f2;border-radius: 100%;background-size: cover;background-position: center center;"></div>
			        		</td> --}}
			          		<td style="background:#333; padding:5px; color:#fff; text-align:left;width: 160px">
			          			<img src="{{ asset('/landing/assets/grafico-logo-positivo.png') }}" style="border:none;width: 150px" alt="Logo dividae">
			          		</td>
			          		<td style="background:#333; padding:5px; color:#fff; text-align:left;">
			          			<h1>
			          				Nueva actualización de su reclamación
			          			</h1>
			          		</td>
			        	</tr>
			      	</tbody>
			    </table>
			    <div style="padding-right: 40px;padding-left: 40px; background: #fff;">
			      	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
				        <tbody>
				          	<tr>
				            	<td>
				            		<p style="margin-bottom: 0px">
				            			<b>Tipo actuación:</b> {{ $a->type == 1 ? 'Exitoso' : 'No exitoso' }}
				            		</p>
				            		<p style="margin-top: 0px;margin-bottom: 0px">
				            			<b>Fecha:</b> {{ $a->actuation_date }}
				            		</p>
				            		<p style="margin-top: 0px;margin-bottom: 0px">
				            			<b>¿Se ha recuperado algún importe?:</b> {{ isset($a->amount) ? $a->amount.'€' : 'No' }}
				            		</p>
				            		<p style="margin-top: 0px;">
				            			<b>Asunto:</b> {{ $a->subject }}
				            		</p>
				            		<p style="text-align: justify;">
				            			<b>Adicional:</b> <br>
				            			{{ $a->description }}
				            		</p>
				              	</td>
				          	</tr>
				        </tbody>
			      	</table>
			    </div>
		    </div>
	  	</div>
	</div>
</body>
</html>
