<?php

namespace App\Exports;

use App\Models\Collect;
use App\Models\Configuration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class CollectsExport implements FromView, WithTitle
{

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View{

    if($this->type == 0){

        $collects = Collect::where('tracob',0)
                            ->get();

        $this->setExport($collects);


    }else{
        $collects = Collect::all();

    }

        return view('collects-export', compact('collects'));

    }

    public function title():string {

        return 'Cobros';

    }

    public function setExport($collects){

        foreach($collects as $collect){
            $collect = Collect::find($collect['id']);
            $collect->tracob = 1;
            $collect->save();
        }
    }
}
