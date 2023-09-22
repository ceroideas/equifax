<table id="table1" style="width:100%" class="table table-bordered table-hover table-striped dataTable" compresed="compresed" responsive="responsive">


    <thead>
        <tr>
                            <th>
                    ID
                </th>
                            <th>
                    Cliente
                </th>
                            <th>
                    Reclamación
                </th>
                            <th>
                    Concepto
                </th>
                            <th>
                    Importe
                </th>
                            <th>
                    Fecha del pago
                </th>
                            <th>
                    Tipo de cobro
                </th>
                            <th>
                    Status
                </th>
                    </tr>
    </thead>


    <tbody>

    	{{--@foreach(App\Models\Order::where('status',1)->get() as $order)--}}
        @foreach(App\Models\Order::all() as $order)
            <tr>
                <td>{{ $order->id }}</td>
                @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                    <td>{{ $order->claim->client ? $order->claim->client->name : ($order->claim->representant ? $order->claim->representant->name : '') }}</td>
                @endif
                <td>#{{ $order->claim->id }}</td>
                <td>{{ $order->description }}</td>
                <td>{{ $order->amount }}&euro;</td>
                <td>{{ Carbon\Carbon::parse($order->payment_date)->format('d-m-Y H:i') }}</td>
                <td>{{ $order->type }}</td>
                <td>{{ $order->facord == 1 ? 'Facturado' : 'Pendiente' }}</td>
            </tr>
        @endforeach

    </tbody>



</table>
