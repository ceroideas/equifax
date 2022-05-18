@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        @csrf

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre') }}" placeholder="{{ __('adminlte::adminlte.full_name') . ' / Razón Social'}}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">

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

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye change-type" style="cursor: pointer;"></span>
                </div>
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Agreements --}}

        <div class="custom-control custom-checkbox mb-3">
            <input onclick="return false" class="custom-control-input @error('tos') is-invalid @enderror" type="checkbox" id="customCheckbox1" value="1" name="tos">
            <label for="customCheckbox1" class="custom-control-label">Aceptar los <a data-toggle="modal" href="#terminos">Términos Y Condiciones de uso General Y Protección de Datos</a></label>
            @error('tos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- Register button --}}
        <button type="submit" class=" btn btn-block bg-orange {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

        <div class="col-12" style="padding: 0">

            <div style="text-align: center; padding: 6px 0">
                <b>- O -</b> 
            </div>

            {{-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button> --}}
            <button type=button class="btn btn-block btn-primary"
              scope="public_profile,email"
              onclick="initLogin();">
              Iniciar sesión con facebook
            </button>
        </div>

    </form>

    <div class="modal fade" id="terminos" style="max-width: 100%;">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    
    <div class="modal-header" style="color: #111">Términos y Condiciones</div>
    <div class="modal-body">

        <div style="height: 600px; overflow: auto;">  
          @include('terminos-condiciones')

          <br>

          @include('terminos-contratacion')

          <button data-dismiss="modal" id="accept-terms" class="btn btn-sm btn-success">Aceptar los términos</button>
          <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
        </div>
    </div>
    {{-- <div class="modal-footer"></div> --}}
  </div>
</div>
</div>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop

@section('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v13.0&appId=3075857299334927&autoLogAppEvents=1" nonce="mCZWGoDY"></script>
    <script>
        $('.change-type').click(function(event) {
            if ($('[name="password"]').attr('type') == 'password') {
                $('[name="password"]').attr('type', 'text');
                $('[name="password_confirmation"]').attr('type', 'text');
            }else{
                $('[name="password"]').attr('type', 'password');
                $('[name="password_confirmation"]').attr('type', 'password');
            }
        });

        $('#accept-terms').click(function(event) {
            /* Act on the event */
            $('#customCheckbox1').prop('checked', true)
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
@stop