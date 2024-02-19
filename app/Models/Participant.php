<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

/*     public function getCampaign()
    {
        if (!$this->campaign) {
            return null;
        }

        $campaign = [];

        foreach ($this->campaign as $key => $cam) {
            if ($cam == 1) {
                $campaign[] = "Judicial";
            }

            if ($cam == 2) {
                $campaign[] = "Extrajudicial";
            }
        }

        return implode(', ', $campaign);
    } */

    public function getCampaign($id)
    {
        /* return $this->belongsTo('App\Models\Campaign'); */
        //dd($this->belongsTo(Campaign::class, 'id'));

        $campaign = Campaign::find($id)->name;

        return $campaign;
    }

    /* public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function agreement(){
        return $this->belongsTo(Agreement::class, 'agreement_id');
    } */
}
