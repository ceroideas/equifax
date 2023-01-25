<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function claim(){
        return $this->belongsTo(Claim::class);
    }

    public function collects(){
        $total = 0;
        $total = $this->payments->sum('impcob');

        return number_format($total,2);
    }

    public function payments(){
        return $this->hasMany(Collect::class);
    }
}
