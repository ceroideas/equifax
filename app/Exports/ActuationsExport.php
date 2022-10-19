<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;

use App\Models\Actuation;

class ActuationsExport implements FromView
{
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function view(): View{

        if ($this->type == 0) {

            $actuations = Actuation::all()
                        ->sortByDesc(['claim_id','id']);
            $type = 0;

            $this->setExport($actuations);

        }else{

            $actuations = Actuation::where('traact',0)
                        ->get();
            $type = 1;

            $this->setExport($actuations);

        }
        return view('actuations-excel', compact('actuations','type'));
    }

    public function setExport($actuations){
        foreach($actuations as $actuation){
            $actuation = Actuation::find($actuation->id);
            $actuation->traact = 1;
            $actuation->save();
        }
    }
}
