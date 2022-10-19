<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ActuationsExport;

use Excel;
use Carbon\Carbon;


class ActuationsController extends Controller
{

    public function exportActuationsAll()
    {
        return Excel::download(new ActuationsExport(0), 'all_actuations-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
    }

    public function exportNewActuations()
    {
        return Excel::download(new ActuationsExport(1), 'new_actuations-'.Carbon::now()->format('d-m-Y_h_i').'.csv');
    }



}
