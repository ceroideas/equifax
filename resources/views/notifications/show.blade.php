@extends('adminlte::page')

@section('title', 'Notificacion' )

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalle de notificaci&oacute;n</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Notificaci&oacute;n</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif

    <!--
    <div class="card">
        <div class="card-header card-orange card-outline">
            <h3 class="card-title"  style="color:#e65927;" >Detalles de la Reclamaci&oacute;n - </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
    </div>-->

    <!--<div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Messages</span>
          <span class="info-box-number">1,410</span>
        </div>
    </div>

    <div class="overlay">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div>-->

    <!-- Main node for this component -->
    <div class="timeline">
        <!-- Element 1 Timeline time label -->
        <!--<div class="time-label">
            <span class="bg-green">23 Aug. 2019</span>
        </div>-->
        <div>
            <!-- Before each timeline item corresponds to one icon on the left scale -->
            <i class="fas fa-envelope bg-blue"></i>
            <!-- Timeline item -->
            <div class="timeline-item">
                <!-- Time -->
                <span class="time"><i class="fas fa-clock"></i>&nbsp;{{$notification->created_at->format('d/m/Y h:i')}}</span>
                    <!-- Header. Optional -->
                <h3 class="timeline-header">Notificación del sistema {{$notification->id}}</h3>
                        <!-- Body -->
                <div class="timeline-body">
                    {{--json_encode($notification->data)--}}
                    Titulo: {{$notification->data['titulo']}}
                    <br>
                    Contenido: {{$notification->data['contenido']}}
                    <br>
                    @if($notification->data['reclamacion']!=0)
                        Reclamación: {{$notification->data['reclamacion']}}
                        <br>
                        <a href="{{url('claims/'.$notification->data['reclamacion'])}}">Ir a la reclamaci&oacute;n {{$notification->data['reclamacion']}}</a>
                    @else
                        Usuario: {{$notification->data['usuario']}}
                        <br>
                        <a href="{{url('users/'.$notification->data['usuario']).'/edit'}}">Ir a la ficha del usuario {{$notification->data['usuario']}}</a>
                    @endif
                </div>
                    <!-- Placement of additional controls. Optional -->
                <div class="timeline-footer">
                    <a href="{{ url('notifications/read/'.$notification->id)}}" class="btn btn-primary btn-sm">Marcar como leido</a>
                    <a href="{{ url('notifications/unread/'.$notification->id)}}" class="btn btn-danger btn-sm">Marcar como no leido</a>
                </div>
            </div>
        </div>
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <nobr>
                <a href="{{ url('/notifications') }}" class="btn btn-default btn-block my-4"><b>Regresar al listado de notificaciones</b></a>
            </nobr>
        </div>
     </div>

@stop
