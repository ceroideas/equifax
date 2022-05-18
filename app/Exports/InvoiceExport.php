<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\Configuration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class InvoiceExport implements FromView, WithTitle
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View{
        $i = Invoice::find($this->id);
        $c = Configuration::first();
        return view('excel-invoice',compact('i','c'));
    }
    public function title():string {
        return 'Factura';
    }
}