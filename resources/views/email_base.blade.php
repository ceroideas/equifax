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

<body width="100%" style="margin:0px; background: #fff;">
    {{--  Solo para entorno test --}}
    @if($test==1)
        <p>Envio de pruebas template id: {{$tmp->id}} - {{ $tmp->title }}</p>
    @endif
    <table style="width:33%">
          <tr>
              <th><img src="{{ url($tmp->top_logo) }}" style="border:none;width: 150px;margin-left: 10px;"></th>
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
              <img src="{{url($tmp->header_image)}}" style="border:none;width: 150px;margin-left: 10px;">
          </tr>
          {{--
          <tr>
              <th>
                  <div style="background-color: rgba(255, 255, 255, 0.9); color: #fd7e14; padding: 16px; width: fit-content;">
                      <p>{!! $tmp->header_content !!}</p>
                  </div>
              </th>
          </tr>
          --}}

          <tr>
              <th>
                  <div style="padding: 10px; background-color: #e65927; color: #fff !important;">
                      <h3>{!! $tmp->body_content !!}</h3>
                      <br>
                      <h4>{!! $tmp->footer_content !!}</h4>
                      <br>
                  </div>
              </th>
          </tr>
          <tr>
                <th>
                    @if ($test=1)
                        <h3>Entorno de pruebas, en entorno real iria a: {{$tmp->cta_button}}</h3><br>
                        <a href="https://dividae.com" target="_blank">
                            <img src="https://dividae.com/templates/btn_acceso_perfil.jpg">
                        </a>
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
    </table>

</body>
</html>
