@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
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

    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin() )
        <div class="row">
            <div class="col-sm-4">
                <form action="{{url('importPostalCode')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <label for="importPostalCode" class="btn btn-info btn-sm">
                        Subir Excel para Códigos Postales
                    </label>
                    <input type="file" name="file" style="display: none;" id="importPostalCode" class="upload-excel">
                </form>
            </div>
            <div class="col-sm-4">
                <form action="{{url('importType')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <label for="importType" class="btn btn-info btn-sm">
                        Subir Excel para Tipos de Procedimiento
                    </label>
                    <input type="file" name="file" style="display: none;" id="importType" class="upload-excel">
                </form>
            </div>

            <div class="col-sm-4">
                <form action="{{url('importParty')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <label for="importParty" class="btn btn-info btn-sm">
                        Subir Excel para Partidos Judíciales
                    </label>
                    <input type="file" name="file" style="display: none;" id="importParty" class="upload-excel">
                </form>
            </div>
        </div>
    @endif
    <div class="row">

        @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin() )
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning ">
                    <div class="inner">
                        <h3 class="">{{ $clients }}</h3>
                        <p class="">Clientes Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="{{ url('/users/pending') }}" class="small-box-footer"><span class="">Ir a Clientes </span><i class="fas fa-arrow-circle-right text-white"></i></a>
                </div>
            </div>
        @endif
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
                    <h3>{{ $claims }}</h3>
                    @else   
                    <h3>{{ Auth::user()->claims()->where('status', 0)->count(); }}</h3>
                    @endif
                    <p>Reclamaciones Pendientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-circle-right"></i>
                </div>
                <a href="{{ url('/claims/pending') }}" class="small-box-footer">Ir a Reclamaciones <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- <div class="col-lg-3 col-6">
        
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}

        {{-- <div class="col-lg-3 col-6">
        
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
    </div>


@stop

@section('js')
<script>
    $('.upload-excel').on('change',function(e){
        e.preventDefault();
        $(this).parent().submit();
    })
</script>
@endsection