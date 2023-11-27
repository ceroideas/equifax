<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use HasFactory;


    public function getType(){

        switch ($this->type) {
            case 1:
                return 'Persona Jurídica';
                break;
            case 2:
                return 'Persona Física';
                break;
            case 3:
                return 'Autónomo';
                break;
        }
    }

    public function issetClaim()
    {
       $this->id;
       $db = Claim::where('debtor_id',$this->id)->first();
       return $db;
    }


}
