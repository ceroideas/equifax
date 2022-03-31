<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    public function getStatus(){

        switch ($this->status) {
            case 'value':
                # code...
                break;
            
            default:
                return "Pendiente";
                break;
        }
    }

    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function representant(){
        return $this->belongsTo(ThirdParty::class, 'third_parties_id');
    }

    public function debtor(){
        return $this->belongsTo(Debtor::class);
    }

    public function debt(){
        return $this->hasOne(Debt::class);
    }

}
