<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="">
    @if(session()->has('msj'))
        <x-adminlte-alert theme="success" dismissable>
            {{ session('msj') }}
        </x-adminlte-alert>
    @endif
    <form action="@if(isset($user)){{ url('/users/' . $user->id) }}@else{{ url('/users') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @else
            @method('POST')
        @endif
        
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Nombre Completo / Razón Social" placeholder="Nombre Completo / Razón Social" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->name   :  ''}}">
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
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="dni" label="DNI / CIF" placeholder="DNI / CIF" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->dni   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-id-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="tlf" label="N° de Teléfono" placeholder="N° de Teléfono" type="phone"
                    igroup-size="sm"  enable-old-support="true" value="{{  isset($user) ?  $user->phone   :  ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-phone"></i>
                            </div>
                        </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-textarea name="address" label="Dirección / Domicilio Fiscal" rows=4 enable-old-support="true">{{  isset($user) ?  $user->address   :  ''}}
                    <x-slot name="appendSlot" >
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot></x-adminlte-textarea>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="location" label="Población" placeholder="Población" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->location   :  ''}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="cop" label="Código Postal" placeholder="Código Postal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->cop   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="iban" label="N° De Cuenta Corriente" placeholder="N° De Cuenta Corriente" type="text"
                igroup-size="sm" value="{{  isset($user) ?  $user->iban   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="dni_img" label="Copia del DNI / CIF" placeholder="Copia del DNI / CIF" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="password" label="Contraseña" placeholder="Ingresa la Contraseña" type="password"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="password_confirmation" label="Confirma la Contraseña" placeholder="Confirma la Contraseña" type="password"
                    igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        @can('create', 'user')
            <div class="row">
                <div class="col-sm-6">
                    <x-adminlte-select name="role" label="Rol" placeholder="Selecciona El Rol">
                        <option {{ !isset($user) ? 'selected' : ''}} disabled>Selecciona un Rol</option>
                        <option value="1" @if(isset($user) && $user->isAdmin()) selected @endif>Administrador</option>
                        <option value="2"  @if(isset($user) && $user->isClient()) selected @endif>Cliente</option>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-select>
                </div>
            </div>
        @endcan
        <div class="card-footer">
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</x-adminlte-card>