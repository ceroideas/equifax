@extends('adminlte::page')

@section('title', 'Nueva Reclamación')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nueva Reclamación</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamación</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('progressbar', ['step' => 1])
   {{-- @include('users.partials._form') --}}
   @if(session()->has('claim_client') || session()->has('claim_third_party'))
   <x-adminlte-alert theme="primary">
       <span> Tu elección actual es: {{ (session('claim_client')) ? 'SI' : 'Reclamación a nombre de un tercero'}}</span>
   </x-adminlte-alert>
   @endif
   @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        @if (Auth::user()->isClient())
          <div class="row">
            <div class="col-sm-12 text-center">
                <span> <h1>¿Reclama en nombre del usuario registrado?</h1></span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
                <span> <button class="btn btn-flat btn-success question-button" href="{{ url('claims/save-option-one') }}">SI</button></span>
                <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('claims/clear-option-one') }}">NO</button></span>
            </div>
          </div>
        @elseif(Auth::user()->isGestor())
        <form action="{{url('claims/save-client')}}" method="POST">
            {{csrf_field()}}
          <div class="row">
            <div class="col-sm-12 text-center">
                <span> <h1>Seleccione un Cliente para empezar la reclamación</h1></span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 offset-sm-3 text-center">

                <br>

                <x-adminlte-select2 name="client_id" placeholder="Selecciona el Cliente" class="form-control-sm" enable-old-support="true">

                    @foreach (App\Models\User::where('role',2)->get() as $user)
                        <option> #{{$user->id}} - {{ $user->name }}, {{$user->dni}} </option>
                    @endforeach
                </x-adminlte-select2>


                <span> <button type="submit" class="btn btn-flat btn-success">ACEPTAR</button> </span>
            </div>
          </div>
        </form>
        @endif
   </x-adminlte-card>
@stop

@section('js')
<script>

   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });
</script>
@stop
