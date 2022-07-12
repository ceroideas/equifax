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
        font-size: 25px;

    }

    h4{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 17px;
    }

</style>

<body width="100%" style="margin:0px; background: #fff;">

    <table style="width:33%">
          <tr>
              <th><img src="{{ url($se->template->top_logo) }}" style="border:none;width: 150px;margin-left: 10px;"></th>
          </tr>
          <tr>
              <th>{!! $se->template->top_content !!}</th>
          </tr>
          <tr>
              <img src="{{url($se->template->header_image)}}" style="border:none;width: 150px;margin-left: 10px;">
          </tr>
          <tr>
              <th>
                  <div style="background-color: rgba(255, 255, 255, 0.9); color: #fd7e14; padding: 16px; width: fit-content;">
                      {!! $se->template->header_content !!}
                  </div>
              </th>

          </tr>
          <tr>
              <th>
                  <div style="padding: 10px; background-color: #e65927; color: #fff !important;">
                      <h3>{!! $se->template->body_content !!}</h3>
                      <br>
                      <h4>{!! $se->template->footer_content !!}</h4>
                  </div>
              </th>
          </tr>
          <tr>
              <th>
                  @if ($se->template->cta_button)
                      <a href="{{$se->template->cta_button_link}}">
                          <button style="width: 80%; background-color: #e65927; color: #fff !important; padding: 8px; border-radius: 4px;">
                              {{$se->template->cta_button}}
                          </button>
                      </a>
                  @endif
              </th>
          </tr>
          <tr>
              <th>
                  {!! $se->template->signature !!}
              </th>
          </tr>

          </table>
      </div>


</body>
</html>
