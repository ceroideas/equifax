<table id="table1" style="width:100%" class="table table-bordered table-hover table-striped dataTable" compresed="compresed" responsive="responsive">


    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Reclamación</th>
            <th>Concepto</th>
            <th>Importe</th>
            <th>Fecha del pago</th>
            <th>Tipo de cobro</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    	@foreach(App\Models\Invoice::where('status',1)->get() as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                    <td>{{ $invoice->claim->client ? $invoice->claim->client->name : ($invoice->claim->representant ? $invoice->claim->representant->name : '') }}</td>
                @endif
                <td>{{ $invoice->claim->id }}</td>
                <td>{{ $invoice->description }}</td>
                <td>{{ $invoice->amount }}€</td>
                <td>{{ Carbon\Carbon::parse($invoice->payment_date)->format('d-m-Y H:i') }}</td>
                <td>{{ $invoice->type }}</td>
                <td>{{ $invoice->status == 1 ? 'Pagado' : 'Pendiente' }}</td>

                <td>{{ $invoice->claim->owner }}</td>
            </tr>
        @endforeach

    </tbody>

</table>
