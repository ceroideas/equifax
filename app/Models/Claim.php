<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    public function getStatus(){

        switch ($this->status) {
            case -1:
                return "Finalizado";
                break;
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
            case 6:
                return "Viable - Proceso Monitorio";
                break;
            case 7:
                return "A la espera de Pago";
                break;
            case 8:
                return "Gestión Reclamación Extrajudicial";
                break;
            case 9:
                return "Proceso Cobros Deudor";
                break;
            case 10:
                return "Gestión Reclamación Judicial";
                break;
            default:
                return "Pendiente";
                break;
        }
    }

    public function amountClaimed()
    {
        $a = $this->actuations->whereNotNull('amount')->sum('amount');

        return $a;
    }

    public function getType(){

        switch ($this->claim_type) {
            case 1:
                return "Reclamación Judicial";
                break;
            case 2:
                return "Reclamación Extrajudicial";
                break;
            case 3:
                return "Reclamación Proceso Monitorio";
                break;
            default:
                return "Reclamación Judicial";
                break;
        }
    }

    public function isViable(){

        if($this->status == 3
            || $this->status == 4
            || $this->status == 5
            || $this->status == 6
            || $this->status == 7
            || $this->status == 8){
            return true;
        }

        return false;
    }

    public function isPending(){
        if($this->status == 0 || $this->status == 2){
            return true;
        }

        return false;
    }
    
    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
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

    public function last_invoice(){
        return $this->hasOne(Invoice::class)->whereNull('status');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
    public function actuations(){
        return $this->hasMany(Actuation::class);
    }

}
