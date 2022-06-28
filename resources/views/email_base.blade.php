<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Eliteadmin Responsive web app kit</title>
</head>
<style>
	li a {
		color: transparent;
	}
</style>
<body style="margin:0px; background: #f8f8f8;">
	<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
	  	<div style="max-width: 480px; padding:50px 0;  margin: 0px auto; font-size: 14px;">
	  		<div style="">
	  			<img src="{{url('addCountEmail')}}/{{$se->id}}" alt="">
			    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
			      	<tbody>
			        	<tr>
			          		<td style="background:#fff; padding:5px; color:#fff; text-align:left;width: 160px; position: relative; text-align: center;">
			          			<img src="{{ url($se->template->top_logo) }}" style="border:none;width: 150px;margin-left: 10px;">

			          			<br>

			          			{!! $se->template->top_content !!}

			          			<div style="width: auto; height: 250px; background-size: cover; background-position: center; background-image: url(' {{url($se->template->header_image)}} '); padding: 16px;">
			          				<div style="background-color: rgba(255, 255, 255, .9); color: #fd7e14; padding: 16px; width: fit-content;">
			          					{!! $se->template->header_content !!}
			          				</div>
			          			</div>
			          		</td>
			          	</tr>
			        	<tr>
			          		<td style="background:#fd7e14; padding:5px; color:#fff; text-align:left;">
			          			<div style="padding: 10px; background-color: #fd7e14; color: #fff !important;">
			          				{!! $se->template->body_content !!}
			          				<br>
			          				{!! $se->template->footer_content !!}
			          			</div>
			          		</td>
			          	</tr>
			        	<tr>
			          		<td style="text-align: center;">
			          			<br>
			          			@if ($se->template->cta_button)
			          				<a href="{{$se->template->cta_button_link}}">
			          				<button style="width: 80%; background-color: #fd7e14; color: #fff !important; padding: 8px; border-radius: 4px;">
			          					{{$se->template->cta_button}}
			          				</button>
			          				</a>
			          			@endif
			          		</td>
			        	</tr>
			          	<tr>
			          		<td>
			          			{!! $se->template->signature !!}
			          		</td>
			        	</tr>
			      	</tbody>
			    </table>
		    </div>
	  	</div>
	</div>
</body>
</html>