<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuation extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function documents()
    {
        return $this->hasMany(ActuationDocument::class);
    }
}
