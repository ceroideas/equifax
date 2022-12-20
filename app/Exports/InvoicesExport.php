<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\Configuration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class InvoicesExport implements FromView, WithTitle
{

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View{

        if($this->type == 0 || $this->type == 3){
            $invoices = Invoice::where('status', 1)->get();
        }else{
            $invoices = Invoice::all();
        }

        if($this->type == 3||$this->type == 4){
            $allinvoices = $invoices;
            $invoices = array();
            $invoicetmp = array();
            foreach($allinvoices as $key=>$invoice){

                $claim_id = $invoice->claim_id <> 0 ? $invoice->claim_id : 'varias';

                if(!$invoice->bas1fac==0){
                    $invoicetmp = array('id'=>$invoice->id,
                    'created_at'=>Carbon::parse($invoice->created_at)->format('d/m/Y'),
                    'cnofac'=>$invoice->cnofac,
                    'cnifac'=>$invoice->cnifac,
                    'base'=>number_format(($invoice->bas1fac) ,2,',','.'),
                    'piva'=>'21,00',
                    'iiva'=>number_format(($invoice->iiva1fac) ,2,',','.'),
                    'total'=>number_format(($invoice->bas1fac+$invoice->iiva1fac) ,2,',','.'),
                    'tipo'=>'interior',
                    'subcuenta'=> '70000000',
                    );

                    array_push($invoices, $invoicetmp);
                }
                if(!$invoice->bas4fac==0){
                    $invoicetmp = array('id'=>$invoice->id,
                    'created_at'=>Carbon::parse($invoice->created_at)->format('d/m/Y'),
                    'cnofac'=>$invoice->cnofac,
                    'cnifac'=>$invoice->cnifac,
                    'base'=>number_format(($invoice->bas4fac) ,2,',','.'),
                    'piva'=>number_format((0.00) ,2,',','.'),
                    'iiva'=>number_format((0.00) ,2,',','.'),
                    'total'=>number_format(($invoice->bas4fac) ,2,',','.'),
                    'tipo'=>'interior',
                    'subcuenta'=> '70000000',
                    );

                    array_push($invoices, $invoicetmp);
                }
            }

            return view('invoices-export-conta', compact('invoices'));


        }else{
            return view('invoices-export', compact('invoices'));
        }



    }

    public function title():string {
        if ($this->type == 0) {
            return 'Facturas Pagadas';
        }else{
            return 'Facturas';
        }
    }
}
