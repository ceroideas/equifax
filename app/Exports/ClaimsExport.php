<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;

class ClaimsExport implements FromView
{
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function view(): View{

        if ($this->type == 0) {
            
            $claims = \App\Models\Claim::whereNotIn('status', [-1,0,1])->where(function($q){
                if (Auth::user()->isGestor()) {
                    $q->where('gestor_id',Auth::id());
                }
            })->get();
            $type = 0;

        }else{
            $claims = \App\Models\Claim::whereIn('status', [-1,0,1])->where(function($q){
                if (Auth::user()->isGestor()) {
                    $q->where('gestor_id',Auth::id());
                }
            })->get();
            $type = 1;
        }
        return view('claims-excel', compact('claims','type'));
    }
}