<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;

class ActuationsExport implements FromView
{
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function view(): View{

        if ($this->type == 0) {

            $actuations = \App\Models\Actuation::all()
                    ->sortByDesc(['claim_id','id']);

            /* TODO: Delete, only debug prop.
            foreach($actuations as $value){
                print_r($value['id']);print_r(" - ");
                print_r($value['claim_id']);print_r(" - ");
                print_r($value['subject']);echo "<br>";

            }
            dd($actuations);
            */
           $type = 0;

        }else{
            /*   Pendiente actuaciones no exportadas previamente
            $type = 1;*/
        }
        return view('actuations-excel', compact('actuations','type'));
    }
}
