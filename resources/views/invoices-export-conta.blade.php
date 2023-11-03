<table id="table1" style="width:100%" class="table table-bordered table-hover table-striped dataTable" compresed="compresed" responsive="responsive">


    <thead>
        <tr>
            <th>N. Fac</th>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>DNI/CIF</th>
            <th>Base</th>
            <th>% IVA</th>
            <th>&euro; IVA</th>
            <th>Total</th>
            <th>Tipo operación</th>
            <th>Subcuenta base imponible</th>
        </tr>
    </thead>

    <tbody>



@foreach($invoices as $invoice)
    <tr>
        @foreach($invoice as $value)
            <td>{{$value}}</td>
        @endforeach
    </tr>
@endforeach

    </tbody>

</table>
