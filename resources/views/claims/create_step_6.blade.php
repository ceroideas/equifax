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
<style>
    .loading {
        z-index: 20;
        position: absolute;
        top: 0;
        left:-5px;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
    }
    .loading-content {
        position: absolute;
        border: 16px solid #f3f3f3;
        border-top: 16px solid #e65927;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        top: 50%;
        left:50%;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>

   @include('progressbar', ['step' => 5])

    {{-- <x-adminlte-alert theme="info">
        <span>¡Importante Si elige NO se eliminará toda la información recopilada hasta ahora del proceso y deberá empezar uno nuevo!</span>
    </x-adminlte-alert> --}}

   {{-- @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif --}}
    @if ($prescribe)
    <x-adminlte-alert theme="success" dismissable>
       <span> {{ $message }}</span> <br>

            Est&aacute;s a un paso de decir adi&oacute;s a tus facturas impagadas.
    </x-adminlte-alert>
    @else
    <x-adminlte-alert theme="warning" dismissable>
       <span> {{ $message }}</span> <br>

            Esta deuda solo es reclamable extrajudicialmente. Si deseas iniciar con la reclamaci&oacute;n proceda al pago.
    </x-adminlte-alert>
    @endif

    {{-- @dd(session('claim_debt')) --}}

    <x-adminlte-card header-class="d-none text-center" theme="orange" theme-mode="outline">
        <div class="col-sm-12 text-center">
            <span><h3>Confirmo que todos los datos e información aportada es veraz.<br>
                <small><i>La informaci&oacute;n que aporte el/la Cliente se dar&aacute; por buena, siendo responsabilidad &uacute;nica y exclusiva de quien introduce esta informaci&oacute;n en el sistema.</i></small></h3>
            </span>
            <br>
            <span><h3>¿Acepta las Condiciones Generales de Contrataci&oacute;n?</h3></span>
        </div>

        <div class="custom-control custom-checkbox mb-3">
            <a data-toggle="modal" href="#condiciones" style="color: #666">
            <input onclick="return false" class="custom-control-input @error('tos') is-invalid @enderror" type="checkbox" id="customCheckbox1" value="1" name="tos">
            <label for="customCheckbox1" class="custom-control-label">Aceptar las Condiciones Generales de Contrataci&oacute;n *</label></a>
            @error('tos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <a href="{{ url('claims/check-agreement') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <div>
                    <form id="create-claim-form" action="{{ url('/claims') }}"method="POST" >
                        @csrf
                        @method('POST')
                    </form>

                    <div class="modal fade" id="terminos" style="max-width: 100%;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="color: #111"></div>
                                <div class="modal-body">
                                    <div style="height: 600px; overflow: auto;">
                                        @include('terminos-condiciones')
                                        <button data-dismiss="modal" id="accept-terms" class="btn btn-flat btn-success create-claim">Aceptar los t&eacute;rminos</button>
                                        <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="condiciones" style="max-width: 100%;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="color: #111"></div>
                                <div class="modal-body">
                                    <div style="height: 600px; overflow: auto;">
                                        @include('terminos-contratacion')
                                        <button data-dismiss="modal" id="accept-terms" class="btn btn-flat btn-success create-claim" onclick="showLoading()">Aceptar las condiciones</button>
                                        <button data-dismiss="modal" class="btn btn-flat btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-adminlte-card>

        <div class="row">
{{--             <div class="col-md-6">
                <a onclick="showLoading()">Show Loading</a>
            </div>
            <div class="col-md-6">
                <a onclick="hideLoading()">Hidden Loading</a>
            </div> --}}
            <section id="loading">
                <div id="loading-content"></div>
            </section>
        </div>



@stop

@section('js')
<script>

    $('.create-claim').on('click', function(){
       $('#create-claim-form').submit();
   });

   $('.question-button').on('click', function(){
       //console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });

   $('#accept-terms').click(function(event) {
            /* Act on the event */
            $('#customCheckbox1').prop('checked', true)
        });

/*        $('#btnsiguiente').click(function(event) {
            console.log("Boton aceptar");
            /* Act on the event */
  /*          $('#customCheckbox1').prop('checked', true)
        });*/
</script>
<script>
    function showLoading() {
        document.querySelector('#loading').classList.add('loading');
        document.querySelector('#loading-content').classList.add('loading-content');
        //setTimeout(hideLoading, 5000);
    }

    function hideLoading() {
        document.querySelector('#loading').classList.remove('loading');
        document.querySelector('#loading-content').classList.remove('loading-content');
    }
</script>
@stop
