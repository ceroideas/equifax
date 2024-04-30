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

    <x-adminlte-alert theme="primary" dismissable>
        <span>¡Importante! Recuerda que si el deudor se encuentra en concurso de acreedores la reclamación es inviable</span>
    </x-adminlte-alert>

    @php
        $decryptedName = isset($debtor->name) ? Crypt::decryptString($debtor->name) : NULL;
        $decryptedEmail = isset($debtor->email) ? Crypt::decryptString($debtor->email) : NULL;
        $decryptedDni = isset($debtor->dni) ? Crypt::decryptString($debtor->dni) : NULL;
        $decryptedPhone = isset($debtor->phone) ? Crypt::decryptString($debtor->phone) : NULL;
        $decryptedAddress = isset($debtor->address) ? Crypt::decryptString($debtor->address) : NULL;
    @endphp

    <form action="@if(isset($debtor)){{ url('/debtors/' . $debtor->id) }}@else{{ url('/debtors') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($debtor))
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row mb-4">
            <div class="col float-center">
                <h1>¿Qué tipo de Deudor es?</h1>
                <div class="row">
                    <div class="col-sm-2">
                        <x-adminlte-input name="type" type="radio"
                        igroup-size="xs" value="1" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Jurídica</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-sm-2">
                        <x-adminlte-input name="type" type="radio"
                        igroup-size="xs" value="2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Física</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    {{-- <div class="col-sm-2">
                        <x-adminlte-input name="type" type="radio"
                        igroup-size="xs" value="3" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Autónomo</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div> --}}
               </div>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Nombre Completo / Razón Social *" placeholder="Nombre Completo / Razón Social" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($debtor) ? $decryptedName :NULL}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="email" label="Correo" placeholder="Ingresa el Correo" type="email"
                    igroup-size="sm"  enable-old-support="true" value="{{ isset($debtor) ? $decryptedEmail : NULL}}">
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
                <x-adminlte-input name="dni" label="DNI / CIF *" placeholder="DNI / CIF" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($debtor) ? $decryptedDni : NULL}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-id-card"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="tlf" label="N° de Teléfono *" placeholder="N° de Teléfono" type="phone"
                    igroup-size="sm"  enable-old-support="true" value="{{  isset($debtor) ? $decryptedPhone : NULL}}">
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
                <x-adminlte-textarea name="address" label="Dirección / Domicilio Fiscal *" rows=4 enable-old-support="true">{{ isset($debtor) ? $decryptedAddress :NULL}}
                    <x-slot name="appendSlot" >
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot></x-adminlte-textarea>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="cop" label="Código Postal *" placeholder="Código Postal" type="number" min="0"
                igroup-size="sm" enable-old-support="true" value="{{  isset($debtor) ?  $debtor->cop : NULL}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="location" label="Población *" placeholder="Población" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($debtor) ?  $debtor->location : NULL}}">
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
                <x-adminlte-input name="province" label="Provincia *" placeholder="Provincia" type="text"
                    igroup-size="sm" enable-old-support="true" value="{{  isset($debtor) ?  $debtor->province : NULL}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker"></i>
                            </div>
                        </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <x-adminlte-textarea name="additional" label="Datos adicionales del deudor / Observaciones " rows=4 enable-old-support="true" placeholder="Introduce datos adicionales que puedan ser de inter&eacute;s para la localizaci&oacute;n del deudor, esto nos ayudar&aacute; a acelerar el proceso.">{{  isset($debtor) ? $debtor->additional :NULL}}
                        <x-slot name="appendSlot" >
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </x-slot></x-adminlte-textarea>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <span class="float-left">(*) Los campos marcados son requeridos.</span>
            </div>
            <div class="row">
                {{--<span class="float-left">(**) Por favor ingresa toda la información importante posible para la reclamación, esto nos ayudará a acelerar el proceso.</span>--}}
                <span class="float-left">*** Los datos del deudor, no se podrán editar una vez iniciada la reclamación.</span>
            </div>
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/debtors/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>


        </div>
    </form>
</x-adminlte-card>

@section('js')
@if(isset($debtor))
    <script>
        $('input[value="{{ $debtor->type }}"]').attr('checked', true);
    </script>
@elseif(old('type'))

    <script>
        $('input[value="{{ old('type') }}"]').attr('checked', true);
    </script>
@endif

<script>
    $("#cop").change(function(event) {

        $.get('{{url('getPopulation')}}/'+($(this).val()), function(data, textStatus) {
            if (data) {
                $('#province').val(data.province);
            }
        });
    });
</script>
@stop
