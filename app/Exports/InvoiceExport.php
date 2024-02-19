<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\Configuration;
use App\Models\Linvoice;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;


class InvoiceExport implements FromView, WithTitle
{
    public function __construct($serie,$id)
    {
        $this->id = $id;
        $this->serie = $serie;
    }
    public function view(): View{

        $i = Invoice::where('tipfac',$this->serie)
                    ->where('id', $this->id)
                    ->get();

        $c = Configuration::first();
        $lines = Linvoice::where('tiplin',$this->serie)
                        ->where('invoice_id',$this->id)
                        ->get();

        if($i[0]->claim_id == 0){
             $owner = User::find($i[0]->user_id);
             $ownerEmail = $owner->email;
        }else{
            $ownerEmail = NULL;
        }


        return view('excel-invoice',compact('i','c','lines','ownerEmail'));
    }
    public function title():string {
        return 'Factura';
    }
}
