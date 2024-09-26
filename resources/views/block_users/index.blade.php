@extends('adminlte::page')

@section('title', 'Usuarios bloqueados')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuarios bloqueados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/panel">&Aacute;rea personal</a></li>
                    <li class="breadcrumb-item active">Usuarios bloqueados</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

    @php
    $heads = [
        'Id',
        'Nombre',
        'Correo',
        'Fecha de bloqueo',
      
        'Creado',
       
        ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
    ];

    $config = [

        'columns' => [null,null, null, null,null, null,null,['orderable' => false]],
        'order'=>[[5,'asc']],
        'pageLength' => 25,
        'language' => ['url' => '/js/datatables/dataTables.spanish.json']
    ];
    @endphp

    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif
    @if(session()->has('error'))
        <x-adminlte-alert theme="danger" dismissable>
            {{ session('error') }}
        </x-adminlte-alert>
    @endif
    


  
    <x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compresed responsive :config="$config">
            @if(isset($block_users))
                @foreach($block_users as $user)

                        <tr>
                            <td>{{$user->id}}</td>
                            @php $decryptedName = Crypt::decryptString($user->name); @endphp
                            <td>{{$decryptedName }}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($user->account_locked_at)->format('d/m/Y H:i') }}</td>
                       
                            <td>{{$user->created_at->format('d/m/Y h:i')}}</td>
                            <td>
                        <nobr>
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow unlock-button" data-user-id="{{ $user->id }}" title="Desbloquear">
                                <i class="fa fa-lg fa-fw fa-unlock"></i>
                            </button>
                        </nobr>
                    </td>
                        </tr>
                    
                @endforeach
            @else
            <tr>
                <td>No existen notificaciones</td>
            </tr>
            @endif
        </x-adminlte-datatable>
    </x-adminlte-card>
    <div class="card-footer">
        <div class="row">
            <span class="float-left">(*) Selecciona la notificacion que quieras abrir</span>
        </div>
        <a href="{{ url('claims/select-client') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
    </div>

    <div class="modal fade" id="unlockModal" tabindex="-1" role="dialog" aria-labelledby="unlockModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unlockModalLabel">Desbloquear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea desbloquear a este usuario?
            </div>
            <div class="modal-footer">
                <button id="close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmUnlock">Desbloquear</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables
        let userId;

        // Captura el evento de clic en el botón de desbloquear
        document.querySelectorAll('.unlock-button').forEach(button => {
            button.addEventListener('click', function() {
                userId = this.getAttribute('data-user-id');
                console.log(userId)
                // Abre el modal
                const modal = new bootstrap.Modal(document.getElementById('unlockModal'));
                modal.show();
            });
        });

        // Captura el evento de clic en el botón de confirmación en el modal
        document.getElementById('confirmUnlock').addEventListener('click', function() {
            // Lógica para el desbloqueo
            fetch(`/block-users/unlock/${userId}`, { // Cambia esto por tu ruta de desbloqueo
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                 // Mostrar un mensaje de éxito
                
                var modalElement = document.getElementById('close-modal');
                modalElement.click();
                location.reload();
                
            })
            .catch(error => {
                alert('Error: ' + error.message); // Manejar el error
            });
        });
    });
</script>

@stop
