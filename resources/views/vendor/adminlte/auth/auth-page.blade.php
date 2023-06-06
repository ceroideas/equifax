@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
    @yield('css-login')
@stop

{{-- @section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop --}}
@section('classes_body') {{'container'}} @stop
<style>
.loginbox {
    color: rgb(250, 192, 2);
    padding-right: 50px !important;
}
</style>
@section('body')
<div class="row" style="margin: auto; margin-top: 10vh; border-radius: 20px; width: 800px; box-shadow: 0 0 15px rgba(0, 0, 0, .3); overflow: hidden;">
    <div class="col-sm-6">
        {{-- <div class="{{ $auth_type ?? 'login' }}-box"> --}}
        <div class="container loginbox">
            {{-- Logo --}}
            <br>
            <br>
            <br>
            <div class="{{ $auth_type ?? 'login' }}-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                    {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                </a>
            </div>

            {{-- Card Box --}}
            <div class="card- {{ "config('adminlte.classes_auth_card', 'card-outline card-primary')" }}">

                {{-- Card Header --}}
                {{-- @hasSection('auth_header')
                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none text-center">
                            @yield('auth_header')
                        </h3>
                    </div>
                @endif --}}

                {{-- Card Body --}}
                <div class="card-body- {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                    @yield('auth_body')
                </div>

                {{-- Card Footer --}}
                @hasSection('auth_footer')
                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                        @yield('auth_footer')
                    </div>
                @endif

            </div>

        </div>
    </div>
    <!-- background sorteo
    <div class="col-sm-6" style="background-image: url('@yield('bg-auth')'); background-size: 600px; background-position: center;background-repeat: no-repeat;">
    -->
    <div class="col-sm-6" style="background-image: url('@yield('bg-auth')'); background-position: center;background-repeat: no-repeat;">

    </div>
</div>

<br>
<br>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
