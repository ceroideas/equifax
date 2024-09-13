<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="">
    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif
    @if(session()->has('alert'))
        <x-adminlte-alert theme="warning" dismissable>
            {{ session('alert') }}
        </x-adminlte-alert>
    @endif
    @php
        $decryptedName = isset($user->name) ? Crypt::decryptString($user->name) : NULL;
    @endphp
    <form action="@if(isset($user)){{ url('/users/update/' . $user->id) }}@else{{ url('/users') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @else
            @method('POST')
        @endif
        @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())

            <div class="row ">
                <div class="col-sm-6">
                    <x-adminlte-input name="name" label="Nombre Completo / Razón Social" placeholder="Nombre Completo / Razón Social" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $decryptedName   :  ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-sm-6">
                    <x-adminlte-input name="email" label="Correo" placeholder="Ingresa el Correo" type="email"
                        igroup-size="sm"  enable-old-support="true" value="{{  isset($user) ?  $user->email   :  ''}}">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
        @endif

        @if (Auth::user()->isSuperAdmin())
            <div class="row">
                <div class="col-sm-4">
                    <x-adminlte-select name="role" label="Rol" placeholder="Selecciona El Rol">
                        <option {{ !isset($user) ? 'selected' : ''}} disabled>Selecciona un Rol</option>
                        <option value="1" @if(isset($user) && $user->isAdmin()) selected @endif>Administrador</option>
                        <option value="2" @if(isset($user) && $user->isClient()) selected @endif>Cliente</option>
                        <option value="3" @if(isset($user) && $user->isGestor()) selected @endif>Gestoría</option>
                        <option value="4" @if(isset($user) && $user->isAssociate()) selected @endif>Asociado</option>
                        <option value="5" @if(isset($user) && $user->isFinance()) selected @endif>Financiero</option>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-select>
                </div>
                <div class="col-sm-4">
                    <x-adminlte-input name="discount" label="Porcentaje de descuento" placeholder="Porcentaje de descuento" min="0" max="100" step="0.01" type="number"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->discount   :  ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-sm-4">
                    <x-adminlte-input name="referenced" label="Código descuento" placeholder="Código de descuento" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->referenced   :  ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

            </div>
        @endif


        <div class="card-footer">
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</x-adminlte-card>

@section('js')

@stop
