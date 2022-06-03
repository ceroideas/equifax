@extends('adminlte::page')

@section('title', 'Informe de Inviabilidad')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @isset ($id)
                <h1>Reclamación Judicial Viable para N#{{ $claim->id }}</h1>
                @else
                <h1>Seleccione la Viabilidad para la Reclamación N#{{ $claim->id }}</h1>
                @endisset
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item"><a href="/claims">Reclamaciones</a></li>
                    @isset ($id)
                    <li class="breadcrumb-item active">Viabilidad Judicial para la Reclamación N#{{ $claim->id }}</li>
                    @else
                    <li class="breadcrumb-item active">Seleccione la Viabilidad para la Reclamación N#{{ $claim->id }}</li>
                    @endisset
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Summernote', true)

@section('content')
   {{-- @include('users.partials._form') --}}
   @if(session()->has('msj'))
   <x-adminlte-alert theme="info" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif


   @include('claims.partials._form_viable')
@stop


@section('js')
<script>
    $(document).ready(function(){
        $('div.note-group-select-from-files').remove();
    });
</script>
@stop
