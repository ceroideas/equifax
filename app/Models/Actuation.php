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

    public function getSubjectAttribute($attr)
    {
        // return $attr;
        $val = null;
        foreach (config('app.actuations') as $key => $value) {
            
            if ($value['hitos']) {
                foreach ($value['hitos'] as $key1 => $value1) {
                    if ($value1['id'] === $attr) {
                        $val = $value1;
                    }
                }
            }else{
                if ($value['id'] === $attr) {
                    $val = $value;
                }
            }

        }

        if (!$val) {
            foreach (config('app.actuations') as $key => $value) {
                if ($value['id'] === $attr) {
                    $val = $value;
                }
            }
        }

        return $val['name'];
    }
}
