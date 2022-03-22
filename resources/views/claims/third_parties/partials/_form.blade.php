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
    <form action="@if(isset($third_party)){{ url('/claims/third-parties/' . $third_party->id) }}@else{{ url('/claims/third-parties') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($third_party))
            @method('PUT')
        @else
            @method('POST')
        @endif
        
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Nombre Completo / Razón Social *" placeholder="Nombre Completo / Razón Social" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($third_party) ?  $third_party->name   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="dni" label="DNI / CIF *" placeholder="DNI / CIF" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($third_party) ?  $third_party->dni   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-id-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-textarea name="address" label="Dirección / Domicilio Fiscal *" rows=1 enable-old-support="true">{{  isset($third_party) ?  $third_party->address   :  ''}}
                    <x-slot name="appendSlot" >
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot></x-adminlte-textarea>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="location" label="Población *" placeholder="Población" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($third_party) ?  $third_party->location   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="cop" label="Código Postal *" placeholder="Código Postal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($third_party) ?  $third_party->cop   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">

                <x-adminlte-input name="iban" label="N° De Cuenta Corriente" placeholder="N° De Cuenta Corriente" type="text"
                igroup-size="sm" value="{{  isset($third_party) ?  $third_party->iban   :  ''}}" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-university"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <x-adminlte-input name="poder_legal" label="Poder de Representación / Título de Acreditación *" placeholder="Poder de Representación / Título de Acreditación" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div> --}}
            <div class="col-sm-6 offset-6">
                <x-adminlte-input name="dni_img" label="Copia del DNI / CIF *" placeholder="Copia del DNI / CIF" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
        </div>

        <div class="card-footer">
            <span class="float-left">Los Campos marcado con (*) son requeridos.</span>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('claims/third-parties/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>