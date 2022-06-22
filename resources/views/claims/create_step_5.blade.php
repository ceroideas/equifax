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


   @include('progressbar', ['step' => 4])

   @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h1>En el supuesto caso de que la parte contraria esté interesada en llegar a un acuerdo ¿lo aceptarías?</h1></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <button class="btn btn-flat btn-success question-button" href="{{ url('agreements/create') }}">SI</button></span>
            <span> <button class="btn btn-flat btn-danger " id="open-swal">NO</button></span>
            <span> <button class="btn btn-flat btn-default  question-button" href="{{ url('debts/create/step-one') }}">Volver</button></span>
        </div>
      </div>
   </x-adminlte-card>
@stop

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });

   $('#open-swal').click(function (e) {
       e.preventDefault();

       Swal.fire({
          title: '<span style="color:#285ba3">Recuerda que la posibilidad de acuerdo facilitará a nuestros letrados la recuperación de tus facturas impagadas</span>',
          // showDenyButton: true,
          showCancelButton: true,
          confirmButtonColor: '#e65927',
          confirmButtonText: 'Continuar',
          cancelButtonText: `Cancelar`,
          icon: 'warning',
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            location.href = '{{url('claims/refuse-agreement')}}';
          } else if (result.isDenied) {
            // Swal.fire('Changes are not saved', '', 'info')
          }
        })
   });

</script>
@stop
