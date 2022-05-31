@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
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

@section('auth_header', __('adminlte::adminlte.login_message'))

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
</style>
@stop

@section('auth_body')
    <form action="{{ $login_url }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye change-type" style="cursor: pointer;"></span>
                </div>
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Login field --}}
        <br>
        <div class="row" style="color: gray !important; font-size: 12px">
            <div class="col-5">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('adminlte::adminlte.remember_me') }}
                    </label>
                </div>
            </div>

            <div class="col-7 text-right">
                {{-- <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button> --}}
                <a href="{{ $password_reset_url }}">Olvidé mi contraseña</a>
            </div>

            <div class="col-12 text-center">

                <br>

                <button type=submit class="btn btn-block btn-acceder {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    {{-- <span class="fas fa-sign-in-alt"></span> --}}
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>

                <br>

                <label style="color: gray; font-size: 12px">¿No tienes una cuenta? <a href="{{ $register_url }}">Crear Cuenta</a></label>

                <br>
                <br>

                <div class="text-center">
                    <img src="{{url('landing/300221.png')}}" alt="" style="width: 28px; margin: 8px">
                    <img src="{{url('landing/1377213.png')}}" alt="" style="width: 28px; margin: 8px">
                </div>
                <br>
            </div>

            {{-- <div class="col-12">
                <button type=button class="btn btn-block btn-primary"
                  scope="public_profile,email"
                  onclick="initLogin();">
                  Iniciar sesión con facebook
                </button>
            </div> --}}
        </div>

    </form>
@stop

@section('bg-auth',url('landing/images/HP/Tienes dudas/edificio.jpg'))

{{-- @section('auth_footer')
    @if($password_reset_url)
        <p class="my-0">
            <a href="{{ $password_reset_url }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

    @if($register_url)
        <p class="my-0">
            <a href="{{ $register_url }}">
                {{ __('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
    @endif
@stop --}}

@section('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v13.0&appId=3075857299334927&autoLogAppEvents=1" nonce="mCZWGoDY"></script>
    <script>
        $('.change-type').click(function(event) {
            if ($('[name="password"]').attr('type') == 'password') {
                $('[name="password"]').attr('type', 'text');
            }else{
                $('[name="password"]').attr('type', 'password');
            }
        });

        window.fbAsyncInit = function() {
            FB.init({
              appId      : '3075857299334927',
              cookie     : true,                     // Enable cookies to allow the server to access the session.
              xfbml      : true,                     // Parse social plugins on this webpage.
              version    : 'v13.0'           // Use this Graph API version for this call.
            });
        }

        function initLogin()
        {
            FB.login(function(response) {
              checkLoginState(response);
            },{scope: 'public_profile,email'});
        }



        function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response);                   // The current login status of the person.
            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
              testAPI();  
            } else {                                 // Not logged into your webpage or we are unable to tell.
              document.getElementById('status').innerHTML = 'Please log ' +
                'into this webpage.';
            }
        }


        function checkLoginState() {               // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function(response) {   // See the onlogin handler
              statusChangeCallback(response);
            });
        }

        function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email', function(response) {
              console.log(response);

              $.post('{{url('registerSocial')}}', {_token: '{{csrf_token()}}', name: response.name, email: response.email}, function(data, textStatus, xhr) {
                  window.open('{{url('panel')}}','_self');
              });
              console.log('Successful login for: ' + response.name);
              /*document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';*/
            });
          }
    </script>

<div id="fb-root"></div>
@stop