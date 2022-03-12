<x-adminlte-card header-class="text-center" theme="orange" theme-mode="outline" body-class="">
    <x-slot name="toolsSlot">
        <select class="">
            <option>Skin 1</option>
            <option>Skin 2</option>
            <option>Skin 3</option>
        </select>
    </x-slot>
        <form action="@if(isset($user)){{ url('/panel/users/' . $user->id) }}@else{{ url('/panel/users') }}@endif" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @else
                @method('POST')
            @endif
            
            <div class="row ">
                <div class="col-sm-6">
                    <x-adminlte-input name="name" label="Nombre" placeholder="Ingresa el Nombre" type="text"
                    igroup-size="sm" min=1 max=10 enable-old-support="true" value="{{  isset($user) ?  $user->name   :  ''}}">
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-sm-6">
                    <x-adminlte-input name="email" label="Correo" placeholder="Ingresa el Correo" type="email"
                        igroup-size="sm" min=1 max=10  enable-old-support="true" value="{{  isset($user) ?  $user->email   :  ''}}">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <x-adminlte-input name="password" label="Contraseña" placeholder="Ingresa la Contraseña" type="password"
                    igroup-size="sm" min=1 max=10>
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </x-slot>
                </x-adminlte-input>
                </div>
                <div class="col-sm-6">
                    <x-adminlte-input name="password_confirmation" label="Confirma la Contraseña" placeholder="Confirma la Contraseña" type="password"
                        igroup-size="sm" min=1 max=10>
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="card-footer">
                <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
                <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            </div>
   

        </form>
    </div>
</x-adminlte-card>