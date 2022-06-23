<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hito extends Model
{
    protected $casts = [
        "phase" => "array",
        "type" => "array",
    ];

    public function getPhases()
    {
        if (!$this->phase) {
            return null;
        }

        $phase = [];

        foreach ($this->phase as $key => $ph) {
            if ($ph == 1) {
                $phase[] = "Judicial";
            }

            if ($ph == 2) {
                $phase[] = "Extrajudicial";
            }
        }

        return implode(', ', $phase);
    }

    public function template()
    {
        return $this->belongsTo('App\Models\Template');
    }

    public function hitos()
    {
        return $this->hasMany('App\Models\Hito','parent_id','ref_id');
    }

    use HasFactory;
}
