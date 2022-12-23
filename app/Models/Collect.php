<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    use HasFactory;

    public function factura(){
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
