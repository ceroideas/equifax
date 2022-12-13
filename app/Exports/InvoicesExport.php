<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\Configuration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class InvoicesExport implements FromView, WithTitle
{

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View{
        if ($this->type == 0) {
            $invoices = Invoice::where('status', 1)->get();
        }else{
            $invoices = Invoice::all();
        }

        return view('invoices-export', compact('invoices'));
    }

    public function title():string {
        if ($this->type == 0) {
            return 'Facturas Pagadas';
        }else{
            return 'Facturas';
        }
    }
}
