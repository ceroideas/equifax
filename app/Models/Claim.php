<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    public function getStatus(){

        switch ($this->status) {
            case 0:
                return "Pendiente";
                break;

            case 1:
                return "Inviable";
                break;
            case 2:
                return "Falta Documentación";
                break;
            case 3:
                return "Viable";
                break;
            case 4:
                return "Viable - Judicial";
                break;
            case 5:
                return "Viable - Extrajudicial";
                break;
            default:
                return "Pendiente";
                break;
        }
    }

    public function isViable(){

        if($this->status == 3 |  $this->status == 4 | $this->status == 5 ){
            return true;
        }

        return false;
    }

    public function isPending(){
        if($this->status == 0 ||  $this->status == 2  ){
            return true;
        }

        return false;
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
