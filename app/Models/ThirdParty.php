<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pending(){

        $this->save();

        return true;
     }

     public function issetClaim()
     {
        $this->id;
        $tp = Claim::where('third_parties_id',$this->id)->first();
        //return $this->hasOne(claim::class);
        //return $this->belongsTo(ThirdParty::class, 'third_parties_id');
        return $tp;
     }

}
