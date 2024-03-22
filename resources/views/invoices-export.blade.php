<table id="table1" style="width:100%" class="table table-bordered table-hover table-striped dataTable" compresed="compresed" responsive="responsive">


    <thead>
        <tr>
            <th>Serie</th>
            <th>ID</th>
            @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
                <th>Cliente</th>
            @endif
            <th>Reclamación</th>
            <th>Concepto</th>
            <th>Importe</th>
            <th>Fecha de la factura</th>
            <th>Fecha del pago</th>
            @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
                <th>Tipo de cobro</th>
            @endif
            <th>Status</th>
            @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
                <th>Owner</th>
            @endif
        </tr>
    </thead>

    <tbody>
@foreach($invoices as $invoice)
    <tr>
        @php
            $decryptName = isset($invoice->cnofac) ? Crypt::decryptString(trim($invoice->cnofac)) : 'No existe name';
            $decryptClientName = isset($invoice->claim->client) ? Crypt::decryptString(trim($invoice->claim->client->name)) : 'No existe client';
            $decryptRepresentantName = isset($invoice->claim->representant) ? Crypt::decryptString(trim($invoice->claim->representant->name)) : 'No existe represen';
        @endphp

        <td>{{ $invoice->tipfac }}</td>
        <td>{{ $invoice->id }}</td>
        @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
            @if(isset($invoice->claim->client))
                <td>{{ $invoice->claim->client ? $decryptClientName : ($invoice->claim->representant ? $decryptRepresentantName : '') }}</td>
            @else
                <td>{{ $decryptName }}</td>
            @endif
        @endif

        <td>@if(isset($invoice->claim->id))
                {{ $invoice->claim->id }}
            @else
                Varias
            @endif
        </td>
        <td>{{ $invoice->description }}</td>
        <td>{{ $invoice->amount }}&euro;</td>
        <td>{{ Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y') }}</td>
        <td>{{ $invoice->payment_date ? Carbon\Carbon::parse($invoice->payment_date)->format('d/m/Y'): '' }} </td>
        @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
            <td>{{ $invoice->type }}</td>
        @endif
        <td>{{ $invoice->status == 1 ? 'Pagado' : ($invoice->status == 2 ? 'Pendiente parcial':($invoice->status == 3 ? 'Rectificativa':'Pendiente')) }}</td>

        <td>
            @if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()|| Auth::user()->isFinance())
                @if(isset($invoice->claim->id))
                    {{ $invoice->claim->owner }}
                @endif
            @endif
        </td>
    </tr>
@endforeach

    </tbody>

</table>
