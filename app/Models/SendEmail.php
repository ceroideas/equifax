<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function actuation()
    {
        return $this->belongsTo(Actuation::class, 'actuation_id');
    }

    public function hito()
    {
        return Hito::where('ref_id',$this->actuation->getRawOriginal('subject'))->first();
    }
}
