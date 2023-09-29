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
    <form action="@if(isset($user)){{ url('/users/' . $user->id) }}@else{{ url('/users') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row mb-4">
            <div class="col float-center">
                <h1>¿Qué tipo de Persona eres?</h1>
                <div class="row">
                    <div class="col-sm-2">
                        <x-adminlte-input name="type" type="radio" igroup-size="xs" value="1" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Jurídica</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-sm-2">
                        <x-adminlte-input name="type" type="radio" igroup-size="xs" value="2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Física</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
               </div>
            </div>
        </div>

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
                <label id="dnilbl">
                @isset ($user)
                    @if ($user->type == 2)
                        DNI-NIE
                    @else
                        CIF
                    @endif
                @else
                    DNI
                @endisset</label>
                <x-adminlte-input name="dni" placeholder="Información Fiscal" type="text"
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
                <label id="address">
                @isset ($user)
                    @if ($user->type == 2)
                        Dirección
                    @else
                        Domicilio Fiscal
                    @endif
                @else
                    Dirección
                @endisset</label>
                <x-adminlte-textarea name="address" rows=4 enable-old-support="true">{{  isset($user) ?  $user->address   :  ''}}
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
                <x-adminlte-input name="province" label="Provincia" placeholder="Provincia" type="text"
                igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->province   :  ''}}">
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
            <!--<x-adminlte-input name="dni_img" label="Copia del DNI / CIF" placeholder="Copia del DNI / CIF" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input> -->
            <x-adminlte-input name="cop" label="Código Postal" placeholder="Código Postal" type="text"
            igroup-size="sm" enable-old-support="true" value="{{  isset($user) ?  $user->cop : ''}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-map-marker"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            </div>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>
        <div class="row">
            @if(isset($user))

            @else
                <div class="col-sm-6">
                    <p style="text-align: left;">El Apud acta es necesario para actuar en representación del cliente, puedes descargar las instrucciones de como generar el apud acta en el siguiente enlace
                        <a href="/docs/Instrucciones_apud_acta_electronico.pdf" target="_blank">Instrucciones para generar el apud acta.</a>
                    </p>
                </div>
            @endif

            <div class="col-sm-6">
                <x-adminlte-input name="apud_acta" label="Apud Acta" type="file" igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>


            @if(isset($user))
                @if(isset($user->apud_acta))
                    <div class="col-sm-6">
                        @php
                            $ext = array_reverse(explode('.', $user->apud_acta))[0];
                        @endphp
                        <a href="{{url('storage/'.$user->apud_acta)}}" download="Apud Acta usuario.{{$ext}}">
                            Descargar Apud Acta
                        </a>
                    </div>
                @endif
            @endif

        </div>
        <div class="row hide-natural d-none">
            <div class="col-sm-12">
                <hr>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="legal_representative" label="Nombre del representante legal *" placeholder="Nombre del representante legal" type="text"
                igroup-size="sm" value="{{  isset($user) ?  $user->legal_representative   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="representative_dni" label="DNI / CIF del representante legal *" placeholder="DNI / CIF del representante legal" type="text"
                igroup-size="sm" value="{{  isset($user) ?  $user->representative_dni   :  ''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
            {{-- <div class="col-sm-6">
                <x-adminlte-input name="representative_dni_img" label="Poder de representación de la empresa *" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
            <div class="col-sm-6">
                @if(isset($user->msgusr) && $user->msgusr==1)
                    <input type="checkbox" name="msgusr" checked>
                @else
                    <input type="checkbox" name="msgusr">
                @endif

                <label for="msgusr">Recibir emails con las actualizaciones de cada uno de mis expedientes</label>
            </div>
        </div>
        @if (!Auth::user()->isClient())
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                </div>
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

@if(isset($user) && !old())
    <script>
        $('input[value="{{ $user->type }}"]').attr('checked', true);
    </script>
@elseif(old('type'))
    <script>
        $('input[value="{{ old('type') }}"]').attr('checked', true);
    </script>
@endif
<script>

    $('[name="type"]').on('change',function(){
        if ($(this).val() == 1) {
            $('.hide-natural').removeClass('d-none');
            $('#dnilbl').text('CIF');
            $('#address').text('Domicilio Fiscal');
        }else{
            $('.hide-natural').addClass('d-none');
            $('#dnilbl').text('DNI-NIE');
            $('#address').text('Dirección');
        }
    });

    let sel = $('[name="type"]:checked').val();
    if (sel == 1) {
        $('.hide-natural').removeClass('d-none');
        $('#dnilbl').text('CIF');
        $('#address').text('Domicilio Fiscal');
    }else{
        $('.hide-natural').addClass('d-none');
        $('#dnilbl').text('DNI-NIE');
        $('#address').text('Dirección');
    }


    $('[name="dni"]').on('change',function(){
        let leftdni = document.getElementById('dni').value.substr(0,1);
        //console.log("LeftDNI",typeof(leftdni), leftdni);

        switch(leftdni){
            case 'x':
            case 'X':
            case 't':
            case 'T':
            case 'z':
            case 'Z':
            case '0':
            case '1':
            case '2':
            case '3':
            case '4':
            case '5':
            case '6':
            case '7':
            case '8':
            case '9':
                console.log("Persona fisica");
                /*document.getElementById('type').value = 1;
                $('input[value="{{ old('type') }}"]').attr('checked', true);*/
                break;

            default:
                console.log("Persona Juridica");
                /*document.getElementById('type').value = 2;*/
                break;
        }

    });
</script>
@stop
