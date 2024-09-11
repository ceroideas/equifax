@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

<style>
    @font-face{
        font-family: "Roobert";
        src: url({{url('landing')}}/fonts/Roobert-Light.otf?d941cb2e666a7aa59bde258fee032353);
        font-weight: normal;
        font-style: normal;
    }

    .btn-light-descubre {

        color: #fff !important !important;
        margin-left: -10px !important;
        border: 1px solid #9E1B42 !important;
    }
</style>
@php $decryptedName = Crypt::decryptString(Auth::user()->name); @endphp
@if (!Auth::user()->isClient())
    @section('content_header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>&Aacute;rea personal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">&Aacute;rea personal</li>
                    </ol>
                </div>
            </div>
        </div>
    @stop
@endif


@if (Auth::user()->isClient())
    @section('extra_header')

    <div style="background-color: #9E1B42; color: #fff" class="text-center">

        <small>Área Clientes</small>

        <h3 style="padding-bottom: 10px !important">Inicio</h3>

    </div>

    @stop
@endif

@section('content')

    <style>
        .blockBackoffice {
            padding-top: 20px;
        }

        .btn-dividae {
            border-radius: 20px;
            border: 1px solid #9E1B42;
            color: #9E1B42 !important;
        }
    </style>

    @if(session()->has('alert'))
        <x-adminlte-alert theme="danger" dismissable>
            {{ session('alert') }}
        </x-adminlte-alert>
    @endif

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 d-none d-sm-block" style="position: relative;">
            <div style="position: absolute; width: calc(100% - 20px); bottom: 20px;">
                <h5>¿Podemos ayudarte?</h5>
                <div style="position: relative; height: 200px;">
                    <div style="position: absolute; height: 80%; width: 100%; background-color: #9E1B42; border-radius: 8px; bottom: 0;">
                    </div>
                    <img src="{{url('landing/assets/contacto.png')}}" alt="Imagen agente contacto" style="position: absolute; bottom: 0; right: 0; width: 100%" alt="Icono email">
                </div>
                <div class="text-center">
                    <br>
                    <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                        <a target="_blank" data-v-7b4478c1="" href="https://www.linkedin.com/company/86028193/admin/" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/linkedin.png" style="padding: 4px; width: 100%" alt="Icono Linkedin"></a>
                    </span>
                    <span style="background-color: #2c60aa; border-radius: 4px; display: inline-block; width: 32px; margin: auto 20px;">
                        <a target="_blank" data-v-7b4478c1="" href="mailto:info@dividae.com" aria-current="page" class="router-link-exact-active router-link-active"><img data-v-7b4478c1="" src="{{url('landing')}}/assets/mail.png" style="padding: 4px; width: 100%" alt="Icono email"></a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="card">
                <div class="card-body text-left">
                    <h3 style="margin-top: 0;">¡Bienvenido, {{ $decryptedName }}!</h3>
                    <div style="background-color: #f8fafc; padding: 8px 0;">
                        <div class="row">
                            <div class="col-4 text-center" style="border-right: 1px solid silver;">
                                <img src="{{url('landing/assets/grafico_reclamacion_viable.png')}}" alt="Ilustracion simulador viabilidad deuda" style="width: 60%;">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-7">
                                <div class="row">
                                    <div >
                                        <h4>Gracias por registrarte<h4> <h5>Antes de empezar, debes verificar tu dirección de email, pulsando en el enlace que te hemos enviado</h5>
                                            <h5>Sino recibiste el email, pulsa en el botón de volver a enviar</h5>
                                    </div>

                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div>
                                            <button style="border-radius: 20px !important; padding: 8px; margin: auto; background: #9E1B42; font-family: Roobert; color:#fff;">
                                                {{ __('VOLVER A ENVIAR EMAIL DE VERIFICACIÓN') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
