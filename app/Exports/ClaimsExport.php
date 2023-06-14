<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;
use App\Models\Claim;

class ClaimsExport implements FromView
{
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function view(): View{

        if ($this->type == 0) {

            $claims = Claim::whereNotIn('status', [-1,0,1])->where(function($q){
                if (Auth::user()->isGestor()) {
                    $q->where('gestor_id',Auth::id());
                }

                if (Auth::user()->isClient()) {
                    $q->where('owner_id',Auth::id());
                }

            })->get();
            $type = 0;

            $this->setExport($claims);

        }elseif($this->type == 1){
            $claims = Claim::whereIn('status', [-1,0,1])->where(function($q){
                if (Auth::user()->isGestor()) {
                    $q->where('gestor_id',Auth::id());
                }
            })->get();
            $type = 1;
        }else{

            $claims = Claim::where('tracla',0)->where(function($q){
                if (Auth::user()->isGestor()) {
                    $q->where('gestor_id',Auth::id());
                }
            })->get();
            $type = 2;

            $this->setExport($claims);
        }


        return view('claims-excel', compact('claims','type'));
    }

    public function setExport($claims){
        foreach($claims as $claim){
            $reclamacion = Claim::find($claim->id);
            $reclamacion->tracla = 1;
            $reclamacion->save();
        }
    }
}
