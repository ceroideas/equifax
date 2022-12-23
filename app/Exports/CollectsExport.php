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


    public function view(): View{

    $collects = Collect::all();


        return view('collects-export', compact('collects'));

    }

    public function title():string {

        return 'Cobros';

    }
}
