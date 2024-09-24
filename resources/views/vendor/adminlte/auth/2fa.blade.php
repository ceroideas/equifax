@extends('adminlte::auth.2fa-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')

	@php

		if (!isset($qrCode)) {
			$user = Auth::user();

			$google2fa = new PragmaRX\Google2FAQRCode\Google2FA();

			if (!$user->google2fa_secret) {
		        $user->google2fa_secret = $google2fa->generateSecretKey(64);
		        // $user->google2fa_enabled = 1;
		        $user->save();
		    }

		    // Generar el código QR en formato SVG
		    $qrCode = $google2fa->getQRCodeInline(
		        config('app.name'),
		        $user->email,
		        $user->google2fa_secret
		    );

		    $secret = $user->google2fa_secret;
		}

	@endphp

    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', 'Enable Two-Factor Authentication')

@section('css-login')
<style>
    .form-control {
        border-radius: unset !important;
        border: none !important;
        border-bottom: 1px solid silver !important;
    }
    .input-group-text {
        border: none !important;
        border-bottom: 1px solid silver !important;
    }

    .btn-acceder {
        background-color: #d95c37 !important;
        color: #fff !important;
        border-radius: 8px !important;
        padding: 10px;
    }

    @media (max-width: 600px) {
        .container {
            padding:0px;
            margin: 0px;
        }
    }

</style>


@stop

@section('auth_body')

    <div class="row justify-content-center">
    	@if (!$user->google2fa_enabled)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Scan the QR Code</h3>
                </div>
                <div class="card-body">
                    <p>Scan this QR code with your Google Authenticator app:</p>
                    <div class="text-center">
                        {!! $qrCode !!}
                    </div>
                    <p>Or enter this code manually: <strong>{{ $secret }}</strong></p>
                </div>
            </div>
        </div>
    	@endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Verify Your Code</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('2fa.verify')}}" id="2faVerify" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="one_time_password">Enter 2FA Code</label>
                            <input type="text" name="one_time_password" id="one_time_password" class="form-control" required>
                        </div>
                        <div class="alert alert-danger d-none" id="error2fa">
                        	error
                        </div>
                        <div class="alert alert-success d-none" id="success2fa">
                        	Verified, reloading
                        </div>
                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

{{-- @section('bg-auth',url('landing/images/HP/Tienes dudas/edificio.jpg')) --}}

@section('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v13.0&appId=3075857299334927&autoLogAppEvents=1" nonce="mCZWGoDY"></script>
    <script>
    	$('#2faVerify').on('submit', function(event){
    		
    		event.preventDefault();

    		$('#error2fa').addClass('d-none');
    		$('#success2fa').addClass('d-none');

	        $.post($(this).attr('action'), $(this).serializeArray(), function(data, textStatus, xhr) {
	        	$('#success2fa').removeClass('d-none');
	        	setTimeout(()=>{
	        		window.open('{{url('/panel')}}','_self');
	        	},1000)
	        }).fail((err)=>{
	        	console.log(err)
	        	$('#error2fa').removeClass('d-none').text(err.responseJSON);
	        });
    	})
    </script>

<div id="fb-root"></div>
@stop
