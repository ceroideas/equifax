<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ActuationsExport;

use Excel;
use Carbon\Carbon;
use Auth;


class ActuationsController extends Controller
{

    public function exportActuationsAll()
    {

        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            return Excel::download(new ActuationsExport(0), 'all_actuations-'.Carbon::now()->format('d-m-Y_h_i').'.csv');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }


    }

    public function exportNewActuations()
    {
        if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()){
            return Excel::download(new ActuationsExport(1), 'new_actuations-'.Carbon::now()->format('d-m-Y_h_i').'.csv');

        }else{
            return redirect('/')->with('msj', 'Acceso restringido');
        }

    }



}
