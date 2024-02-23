<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Claim_tmp extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function debtTmp(){
        return $this->belongsTo(Debt_tmp::class, 'debt_tmp_id');
    }
    public function debtor(){
        return $this->belongsTo(Debtor::class);
    }

    public function representant(){
        return $this->belongsTo(ThirdParty::class, 'third_parties_id');
    }

    public function agreementTmp(){
        return $this->belongsTo(Agreement_tmp::class, 'agreement_tmp_id');
    }


}
