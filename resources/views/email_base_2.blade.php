<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Dividae</title>
</head>
<style>
	li a {
		color: transparent;
	}
</style>
<body style="margin:0px; background: #fff;">
    {{--  Solo para entorno test --}}
    @isset($test)
        @if($test==1)
            <p>Envio de pruebas Bienvenida: {{$tmp->id}} - {{ $tmp->title }}</p>
        @endif
    @endisset
	<div width="100%" style="background: #fff; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 50%; color: #514d6a;">
	  	<div style="max-width: 100%; padding:50px 0;  margin: 0px auto; font-size: 14px;">
	  		<div style="">
			    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
			      	<tbody>
			        	<tr>
			          		<td style="background:#fff; padding:5px; color:#fff; text-align:left;width: 160px;  position: relative; text-align: center;">
			          			<img src="{{ url($tmp->top_logo) }}" style="border:none;width: 100%">

			          			{{--{!! $tmp->top_content !!}--}}
                                  {{--<img src="{{url($tmp->header_image)}}" style="border:none;width: 150px;margin-left: 10px;">--}}

			          			{{--<div style="width: auto; height: 250px; background-size: cover; background-position: center; background-image: url(' {{url($tmp->header_image)}} '); padding: 16px;">

									<div style="background-color: transparent; color: #fd7e14; padding: 16px; width: fit-content;">
			          					{!! $tmp->header_content !!}
			          				</div>
			          			</div>
                                --}}

			          		</td>
			          	</tr>
                        <tr>
                            <td style="background:#fff; padding:5px; color:#fff; text-align:left;width: 160px;  position: relative; text-align: center;">
                                <div style="text-align: right;">
                                    <a href="https://www.linkedin.com/company/asemar-concursal" target="_blank">
                                        <img src="https://dividae.com/landing/assets/icono_mail_linkedin.png">
                                    </a>

                                    <a href="https://www.dividae.com" target="_blank">
                                        <img src="https://dividae.com/landing/assets/icono_mail_link.png">
                                    </a>

                                    <a href="mailto:info@dividae.com" target="_blank">
                                        <img src="https://dividae.com/landing/assets/icono_mail_email.png">
                                    </a>
                                </div>
                            <td>
                        </tr>
			        	<tr>
			          		<td style="background:#e65927; padding:5px; color:#fff; text-align:left;">
			          			<div style="padding: 10px; background-color: #e65927; color: #fff !important;">
			          				{!! $tmp->body_content !!}
			          				<br>
			          				{!! $tmp->footer_content !!}
			          			</div>
			          		</td>
			          	</tr>
			        	<tr>
			          		<td style="text-align: center;">
			          			<br>
                                @if ($test=1)
                                    <h3>Entorno de pruebas, en entorno real iria a: {{$tmp->cta_button}}</h3><br>
                                    <a href="https://dividae.com" target="_blank">
                                        <img src="https://dividae.com/templates/btn_acceso_perfil.jpg">
                                    </a>
                                @else
                                    <a href="{{$target}}" target="_blank">
                                        <img src="https://dividae.com/templates/btn_acceso_perfil.jpg">
                                    </a>
                                @endif

			          			{{--
                                @if ($tmp->cta_button)
			          				<a href="{{$tmp->cta_button_link}}">
			          				<button style="width: 80%; background-color: #e65927; color: #fff !important; padding: 8px; border-radius: 4px;">
			          					{{$tmp->cta_button}}
			          				</button>
			          				</a>
			          			@endif
                                --}}
			          		</td>
			        	</tr>
			          	<tr>
			          		<td>
			          			{!! $tmp->signature !!}
			          		</td>
                            {{--
                            <td>
                                <div style="text-align: center; "><img style="width: 152px;" src="https://dividae.com/landing/assets/dividae_isotipo_color_90x111.png"></div>
                            </td>
                            --}}
			        	</tr>
			      	</tbody>
			    </table>
		    </div>
	  	</div>
	</div>
</body>
</html>
