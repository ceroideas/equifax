<table id="table1" style="width:100%" class="table table-bordered table-hover table-striped dataTable" compresed="compresed" responsive="responsive">


    <thead>
        <tr>
            <th>Fecha</th>
            <th>Subcuenta banco</th>
            <th>Contrapartida o NIF</th>
            <th>No. Factura</th>
            <th>Concepto</th>
            <th>Importe</th>
        </tr>
    </thead>

    <tbody>

    @foreach($collects as $collect)
        <tr>
            <td>{{ Carbon\Carbon::parse($collect->feccob)->format('d/m/Y') }}</td>
            <td>57200000</td>
            <td>{{ $collect->factura->cnifac }}</td>
            <td>{{ $collect->invoice_id }}</td>
            <td>{{ $collect->cptcob }}</td>
            <td>{{number_format($collect->factura->totfac,2,',','.')}}</td>
        </tr>
    @endforeach


    </tbody>

</table>
