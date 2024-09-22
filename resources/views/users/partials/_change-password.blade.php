<x-adminlte-card header-class="text-center d-none" theme="orange" theme-mode="outline" body-class="">
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
@if(session()->has('error'))
        <x-adminlte-alert theme="danger" dismissable>
            {{ session('error') }}
        </x-adminlte-alert>
    @endif
<style>
    .fa-times {
      color: red;
    }

    .fa-check {
      color: green;
    }
    .db {
        display: block;
    }
</style>
    <form action="{{ url('/change-password/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-sm-6">
                <x-adminlte-input name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&-_#])[A-Za-z\d@$!%*?&-_#]{8,}$" label="Contraseña" placeholder="Ingresa la Contraseña" type="password"
                igroup-size="sm">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-key"></i>
                        </div>
                    </x-slot>
            </x-adminlte-input>

            <span>

                <div id="Length" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Mínimo 8 caracteres</label></div>
                <div id="UpperCase" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 letra en mayus.</label></div>
                <div id="LowerCase" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 letra en minus.</label></div>
                <div id="Numbers" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 número.</label></div>
                <div id="Symbols" class="db fas fa-times"> <label style="font-family: arial; font-size: 12px; font-weight: 100 !important;">Al menos 1 caracter especial.</label></div>

            </span>

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

        <div class="card-footer">
            <x-adminlte-button class="btn-sm float-right" type="reset" label="Limpiar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
            <x-adminlte-button class="btn-flat btn-sm float-right" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</x-adminlte-card>

@section('js')

<script>
    function ValidatePassword() {
  /*Array of rules and the information target*/
  var rules = [{
      Pattern: "[A-Z]",
      Target: "UpperCase"
    },
    {
      Pattern: "[a-z]",
      Target: "LowerCase"
    },
    {
      Pattern: "[0-9]",
      Target: "Numbers"
    },
    {
      Pattern: "[!@@#$%^&*-_]",
      Target: "Symbols"
    }
  ];

  //Just grab the password once
  var password = $(this).val();

  /*Length Check, add and remove class could be chained*/
  /*I've left them seperate here so you can see what is going on */
  /*Note the Ternary operators ? : to select the classes*/
  $("#Length").removeClass(password.length > 7 ? "fa-times" : "fa-check");
  $("#Length").addClass(password.length > 7 ? "fa-check" : "fa-times");

  /*Iterate our remaining rules. The logic is the same as for Length*/
  for (var i = 0; i < rules.length; i++) {

    $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "fa-times" : "fa-check");
    $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "fa-check" : "fa-times");
  }
}

    /*Bind our event to key up for the field. It doesn't matter if it's delete or not*/
    $(document).ready(function() {
      $("#password").on('keyup', ValidatePassword)
    });
</script>

@stop
