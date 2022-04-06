<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    public function hasAgreement(){

        if($this->agreement == true){
            return true;
        }

        return false;

    }

    public function agreements()
    {
        return $this->hasOne(Agreement::class, 'debt_id');
    }
}
