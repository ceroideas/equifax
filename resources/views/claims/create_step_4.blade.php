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
                    <li class="breadcrumb-item"><a href="{{url('/')}}/panel">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/claims">Reclamaciones</a></li>
                    <li class="breadcrumb-item active">Nueva Reclamación</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    
   
   @include('progressbar', ['step' => 2])

   @if(session()->has('msj'))
   <x-adminlte-alert theme="success" dismissable>
       <span> {{ session('msj') }}</span>
   </x-adminlte-alert>
   @endif
   <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
    <form action="{{url('claims/check_debtor')}}" method="POST">
        {{csrf_field()}}
      <div class="row">
          <div class="col-sm-12">
              
              <span> <h1>¿Tu deuda pertenece a alguno de estos tipos?</h1></span>

              @foreach (config('app.no_viables') as $no_viable)
                  
                <li>
                    {{$no_viable['deuda']}}
                </li>

              @endforeach

            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-top: 8px;">
              <label class="btn btn-outline-info">
                <input type="radio" name="options" value="1"> Si
              </label>
              <label class="btn btn-outline-info">
                <input type="radio" name="options" value="0"> No
              </label>
            </div>

          </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">
            <span> <h1>¿El deudor está en concurso de acreedores?</h1></span>    
        </div>          
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-info">
                <input type="radio" name="concurso" value="1"> Si
              </label>
              <label class="btn btn-outline-info">
                <input type="radio" name="concurso" value="0"> No
              </label>
            </div>

            <br>
            <br>

            {{-- <span> <button class="btn btn-flat btn-success question-button" href="{{ url('claims/invalid-debtor') }}">SI</button></span>     --}}
            {{-- <span> <button class="btn btn-flat btn-danger  question-button" href="{{ url('claims/select-debtor') }}">NO</button></span>  --}}
            <span> <button class="btn btn-flat btn-success  question-button" type="submit" disabled {{-- href="{{ url('claims/check_debtor') }}" --}}>CONTINUAR</button></span> 
            <span> <button class="btn btn-flat btn-default  question-button" type="button" href="{{ url('claims/select-client') }}">VOLVER</button></span> 
        </div>          
      </div>
     </form>
   </x-adminlte-card>
@stop

@section('js')
<script>
    
   $('.question-button').on('click', function(){
       console.log($(this).attr('href'));
        location.href = $(this).attr('href');
   });

   $('[name="options"],[name="concurso"]').on('change',function(){

        if ($('[name="options"]:checked').length && $('[name="concurso"]:checked').length) {
            $('.question-button').removeAttr('disabled');
        }
   })
</script>
@stop