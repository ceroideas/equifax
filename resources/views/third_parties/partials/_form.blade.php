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
        $decryptedName = isset($third_party->name) ? Crypt::decryptString($third_party->name) : NULL;
        $decryptedDni = isset($third_party->dni) ? Crypt::decryptString($third_party->dni) : NULL;
        $decryptedLegalRepresentative = isset($third_party->legal_representative) ? Crypt::decryptString($third_party->legal_representative) : NULL;
        $decryptedRepresentativeDni = isset($third_party->representative_dni) ? Crypt::decryptString($third_party->representative_dni) : NULL;
        $decryptedAddress = isset($third_party->address) ? Crypt::decryptString($third_party->address) : NULL;
        $decryptedIban = isset($third_party->iban) ? Crypt::decryptString($third_party->iban) : NULL;
    @endphp

    <form action="@if(isset($third_party)){{ url('/third-parties/' . $third_party->id) }}@else{{ url('/third-parties') }}@endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($third_party))
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="row mb-4">
            <div class="col float-center">
                <h1>¿Qué tipo de Persona es?</h1>
                <div class="row">
                    <div class="col-sm-2">
                        <x-adminlte-input name="tipo" type="radio" igroup-size="xs" value="1">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Jurídica</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-sm-2">
                        <x-adminlte-input name="tipo" type="radio" igroup-size="xs" value="2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="">Persona Física</i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    {{-- <div class="col-sm-2">
                        <x-adminlte-input name="tipo" type="radio" igroup-size="xs" value="3">
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

        <div class="row ">
            <div class="col-sm-6">
                <x-adminlte-input name="name" label="Nombre Completo / Razón Social" placeholder="Información" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($third_party) ? $decryptedName :''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <label id="dni">
                @isset ($third_party)
                    @if ($third_party->type == 2)
                        DNI-NIE *
                    @else
                        CIF *
                    @endif
                @else
                    DNI *
                @endisset</label>
                <x-adminlte-input name="dni" placeholder="Información Fiscal" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($third_party) ? $decryptedDni :''}}">
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
                <label id="address">
                @isset ($third_party)
                    @if ($third_party->type == 2)
                        Dirección *
                    @else
                        Domicilio Fiscal *
                    @endif
                @else
                    Dirección *
                @endisset</label>
                <x-adminlte-textarea name="address" rows=1 enable-old-support="true">{{ isset($third_party) ? $decryptedAddress:''}}
                    <x-slot name="appendSlot" >
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot></x-adminlte-textarea>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="location" label="Población *" placeholder="Población" type="text"
                igroup-size="sm" enable-old-support="true" value="{{ isset($third_party) ? $third_party->location :''}}">
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
                igroup-size="sm" enable-old-support="true" value="{{ isset($third_party) ? $third_party->cop :''}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="province" label="Provincia *" placeholder="Provincia" type="text"
                igroup-size="sm" value="{{ isset($third_party) ? $third_party->province :''}}" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas map-marker"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="poder_legal" label="Título de Acreditación *" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>


                @isset ($third_party)
                    @if ($third_party->poa)
                        @php
                            $ext = array_reverse(explode('.', $third_party->poa))[0];
                        @endphp
                        <a href="{{url('storage/'.$third_party->poa)}}" download="Título de acreditación.{{$ext}}">
                            Descargar acreditación
                        </a>
                    @endif
                @endisset
            </div>


            <div class="col-sm-6">
                <x-adminlte-input name="iban" label="N° De Cuenta Corriente" placeholder="N° De Cuenta Corriente" type="text"
                igroup-size="sm" value="{{ isset($third_party) ? $decryptedIban : ''}}" enable-old-support="true">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-university"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

        </div>
        <hr>
        <div class="row">
            @if(isset($third_party))

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
            @if(isset($third_party))
                @if ($third_party->apud_acta)
                    <div class="col-sm-6">
                        @php
                            $ext = array_reverse(explode('.', $third_party->apud_acta))[0];
                        @endphp
                        <a href="{{url('storage/'.$third_party->apud_acta)}}" download="Apud Acta .{{$ext}}">
                            Descargar Apud Acta
                        </a>
                    </div>
                @endif
            @endif


        </div>
        <hr>

        <div class="row poa-div d-none">
            <div class="col-sm-6">
                <x-adminlte-input name="legal_representative" label="Nombre del representante legal *" placeholder="Nombre del representante legal" type="text"
                igroup-size="sm" value="{{ isset($third_party) && !old() ?  $decryptedLegalRepresentative  : (old() ? old('legal_representative') :'' )}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>
            <div class="col-sm-6">
                <x-adminlte-input name="representative_dni" label="DNI / CIF del representante legal *" placeholder="DNI / CIF del representante legal" type="text"
                igroup-size="sm" value="{{ isset($third_party) && !old() ?  $decryptedRepresentativeDni : (old() ? old('representative_dni') :'' )}}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            </div>

            <div class="col-sm-6">
                <x-adminlte-input name="representative_dni_img" label="Poder de representación de la empresa *" type="file"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>
            @isset ($third_party)
                @if ($third_party->representative_dni_img)
                    @php
                        $ext = array_reverse(explode('.', $third_party->representative_dni_img))[0];
                    @endphp
                    <a href="{{url('storage/'.$third_party->representative_dni_img)}}" download="Poder de representación de la empresa.{{$ext}}">
                        Descargar representación
                    </a>
                @endif

            @endisset
            </div>
        </div>

        <hr>



        <div class="card-footer">
            <span class="float-left">Los campos marcados con (*) son requeridos.</span> <br>

            <span class="float-left">** El adjunto de copia de DNI es del representante legal.</span><br>

            <span class="float-left">*** Los datos del representado, no se podrán editar una vez iniciada la reclamación.</span>


            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
            <a href="{{ url('/third-parties/') }}"><x-adminlte-button class="btn-flat btn-sm float-right" type="button" label="Volver" theme="default" icon="fas fa-lg fa-arrow"/></a>
        </div>
    </form>
</x-adminlte-card>

@section('js')

<script>
    @if (isset($third_party))

       $('[name="tipo"][value="{{$third_party->type}}"]').prop('checked', true);

    @endif
</script>

@if(isset($third_party) && !old())
    <script>
        $('input[name="tipo"][value="{{ $third_party->type }}"]').attr('checked', true);
        if({{  $third_party->type === "1" }}){
            $('.poa-div').removeClass('d-none');
            $('#dni').text('CIF *');
            $('#address').text('Domicilio Fiscal *');
        }else{
             $('.poa-div').addClass('d-none');
             $('#dni').text('DNI-NIE *');
            $('#address').text('Dirección *');
        }
    </script>
@elseif(old('tipo'))

    <script>
        $('input[name="tipo"][value="{{ old('tipo') }}"]').attr('checked', true);
        if({{ old('tipo') === "1" }}){
             $('.poa-div').removeClass('d-none');
             $('#dni').text('CIF *');
            $('#address').text('Domicilio Fiscal *');
        }else{
             $('.poa-div').addClass('d-none');
             $('#dni').text('DNI-NIE *');
            $('#address').text('Dirección *');
        }
    </script>
@endif

<script>
   $('input[name="tipo"]').change(function() {
        if(this.checked) {
            if(this.value === "1"){
                $('.poa-div').removeClass('d-none');
                $('#dni').text('CIF *');
                $('#address').text('Domicilio Fiscal *');
            }else{
                $('.poa-div').addClass('d-none');
                $('#dni').text('DNI-NIE *');
                $('#address').text('Dirección *');
            }

        }
    });

   $("#cop").change(function(event) {

        $.get('{{url('getPopulation')}}/'+($(this).val()), function(data, textStatus) {
            if (data) {
                $('#location').val(data.province);
            }
        });
    });
</script>

@stop
