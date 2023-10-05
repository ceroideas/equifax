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
    h3{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 19px;
    }

    h4{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
    }
    p{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-align: center;
    }

</style>

<body style="margin:0px; background: #fff;">
    {{--  Solo para entorno test --}}
    @isset($test)
        @if($test==1)
            <p>Envio de pruebas template id: {{$tmp->id}} - {{ $tmp->title }}</p>
        @endif
    @endisset

    <div width="75%" style="background: #fff; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 50%; color: #514d6a;">
        <div style="width: 75%; padding:50px 0;  margin: 0px auto; font-size: 14px;">
            <div style="">
                <table border="0" cellpadding="0" cellspacing="0" style="max-width: 650px;">
                    <tbody>

                        {{-- Logo sin estilos a tamaño real --}}
                        <tr>
                            <td>
                                <img src="{{ url($tmp->top_logo) }}">
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
                        {{-- Imagen principal --}}
                        <tr>
                            <td>
                                <img src="{{url($tmp->header_image)}}">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <div style="padding: 10px; background-color: #e65927; color: #fff !important;">
                                    <h3>{!! $tmp->body_content !!}</h3>
                                    <br>
                                    @if($tmp->id==4)
                                        @if(isset($hitoDescription))
                                            <p>{{ $hitoDescription }}</p>
                                        @endif
                                    @endif
                                    <br>
                                    <h4>{!! $tmp->footer_content !!}</h4>
                                    <br>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>

                                @if(isset($test))
                                    @if ($test==1)
                                        <h3>{{$tmp->cta_button}}</h3><br>
                                        @if($tmp->id == 2 || $tmp->id == 6 || $tmp->id == 11)
                                            <a href="https://dividae.com" target="_blank">
                                                <img src="https://dividae.com/templates/btn_acceso_perfil.jpg">
                                            </a>
                                        @else
                                            <a href="https://dividae.com" target="_blank">
                                                <img src="https://dividae.com/templates/btn_acceso_reclamacion.jpg">
                                            </a>
                                        @endif
                                    @endif
                                @else
                                    @if($tmp->id == 2 || $tmp->id == 6 || $tmp->id == 11)
                                        <a href="{{$target}}" target="_blank">
                                            <img src="https://dividae.com/templates/btn_acceso_perfil.jpg">
                                        </a>
                                    @else
                                        <a href="{{$target}}" target="_blank">
                                            <img src="https://dividae.com/templates/btn_acceso_reclamacion.jpg">
                                        </a>
                                    @endif
                                @endif
                                <br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {!! $tmp->signature !!}
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
