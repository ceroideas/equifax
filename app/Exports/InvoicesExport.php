<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\Configuration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class InvoicesExport implements FromView, WithTitle
{
    public function view(): View{
        return view('invoices-export');
    }
    
    public function title():string {
        return 'Facturas Pagadas';
    }
}