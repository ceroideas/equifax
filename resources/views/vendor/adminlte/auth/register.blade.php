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

    <style>
.fa-times {
  color: red;
}

.fa-check {
  color: green;
}
.db {
    display: block;
}
    </style>
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
            <input type="password" id="NewPassword" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&-_#])[A-Za-z\d@$!%*?&-_#]{8,}$" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye change-type" style="cursor: pointer;"></span>
                </div>
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            {{-- <span role="alert">
                <strong>La contraseña debe tener mínimo 8 caracteres, 1 letra mayúscula, 1 letra minúscula, 1 número y 1 caracter especial.</strong>
            </span> --}}

            {{-- <div class="form-group has-feedback">
              <input class="form-control" id="NewPassword" placeholder="New Password" type="password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div> --}}
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <span>

                <div id="Length" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Mínimo 8 caracteres</label></div>
                <div id="UpperCase" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 letra en mayus.</label></div>
                <div id="LowerCase" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 letra en minus.</label></div>
                <div id="Numbers" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 número.</label></div>
                <div id="Symbols" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 caracter especial.</label></div>

            </span>

            <br>

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

        {{-- referenced --}}
        <div class="input-group mb-3">
            <input type="text" name="referenced" class="form-control @error('referenced') is-invalid @enderror"
                    value="{{ old('referenced') }}" placeholder="Código de descuento/invitado">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-angle-double-down "></span>
                </div>
            </div>

            @error('referenced')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        {{-- Agreements --}}

        <div class="custom-control custom-checkbox mb-3">
            <input class="custom-control-input" type="checkbox" id="customCheckbox0" value="1" name="newsletter">
            <label for="customCheckbox0" class="custom-control-label"> Acepto recibir ofertas y novedades de Dividae</a></label>
        </div>



        <div class="custom-control custom-checkbox mb-3">
            <a data-toggle="modal" href="#terminos" style="color: #666">
            <input onclick="return false" class="custom-control-input @error('tos') is-invalid @enderror" type="checkbox" id="customCheckbox1" value="1" name="tos">
            <label for="customCheckbox1" class="custom-control-label"> Aceptar las condiciones generales de contratación</label></a>
            @error('tos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="custom-control custom-checkbox mb-3">
            <input class="custom-control-input @error('lopd') is-invalid @enderror"" type="checkbox" id="customCheckbox2" value="1" name="lopd">
            <label for="customCheckbox2" class="custom-control-label">Autorizo que mis datos sean guardados durante 4 años, desde que finalice la reclamación, para posibles reclamaciones.</a></label>
            @error('lopd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>



        {{-- Register button --}}
        <div class="col-12 text-center">

            <button type=submit class="btn btn-block btn-acceder {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                {{-- <span class="fas fa-sign-in-alt"></span> --}}
                {{ __('adminlte::adminlte.register') }}
            </button>

            <br>

            <label style="color: gray; font-size: 12px">¿Ya tienes una cuenta? <a href="{{ $login_url }}">Iniciar Sesión</a></label>

            <br>
            <br>

            {{-- Iconos Google y Linkedin hasta que se tenga el api
            <div class="text-center">
                <img src="{{url('landing/300221.png')}}" alt="" style="width: 28px; margin: 8px">
                <img src="{{url('landing/1377213.png')}}" alt="" style="width: 28px; margin: 8px">
            </div>
            --}}
            <br>

        </div>
        {{-- <button type="submit" class=" btn btn-block bg-orange {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

        <div class="col-12" style="padding: 0">

            <div style="text-align: center; padding: 6px 0">
                <b>- O -</b>
            </div>

            <button type=button class="btn btn-block btn-primary"
              scope="public_profile,email"
              onclick="initLogin();">
              Iniciar sesión con facebook
            </button>
        </div> --}}

        {{--<input type="text" name="referenced" id="referencedid" >--}}

    </form>

    <div class="modal fade" id="terminos" style="max-width: 100%;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="color: #111"></div>
                <div class="modal-body">

                    <div style="height: 600px; overflow: auto;">
                        @include('terminos-contratacion')

                        {{-- <br>

                        @include('terminos-contratacion') --}}

                        <button data-dismiss="modal" id="accept-terms" class="btn btn-sm btn-success">Aceptar las condiciones</button>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
                    </div>
                </div>
                {{-- <div class="modal-footer"></div> --}}
            </div>
        </div>
    </div>
@stop

@section('bg-auth',url('landing/images/HP/bg_register.png'))

{{-- @section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop --}}

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

            $('#accept-lopd').click(function(event) {
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

            function ValidatePassword() {
                /*Array of rules and the information target*/
                var rules = [{
                    Pattern: "[A-Z]",
                    Target: "UpperCase"
                    },
                    {
                    Pattern: "[a-z]",
                    Target: "LowerCase"
                    },
                    {
                    Pattern: "[0-9]",
                    Target: "Numbers"
                    },
                    {
                    Pattern: "[!@@#$%^&*_-]",
                    Target: "Symbols"
                    }
                ];

                //Just grab the password once
                var password = $(this).val();

                /*Length Check, add and remove class could be chained*/
                /*I've left them seperate here so you can see what is going on */
                /*Note the Ternary operators ? : to select the classes*/
                $("#Length").removeClass(password.length > 7 ? "fa-times" : "fa-check");
                $("#Length").addClass(password.length > 7 ? "fa-check" : "fa-times");

                /*Iterate our remaining rules. The logic is the same as for Length*/
                for (var i = 0; i < rules.length; i++) {

                    $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "fa-times" : "fa-check");
                    $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "fa-check" : "fa-times");
                }
            }

            /*Bind our event to key up for the field. It doesn't matter if it's delete or not*/
            $(document).ready(function() {
            $("#NewPassword").on('keyup', ValidatePassword)

                let cadena = window.location.href;
                if(cadena.indexOf('?')>0){
                    $('[name="referenced"]').val(cadena.slice(cadena.indexOf('?')+1));
                }

            });

    </script>
@stop
