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
                return "Finalizada";
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
            case 11:
                return "Registro Apud Acta";
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
                return "Por definir";
                break;
        }
    }

    public function isViable(){

        if($this->status == 3
            || $this->status == 4
            || $this->status == 5
            || $this->status == 6
            || $this->status == 7
            || $this->status == 8
            || $this->status == 9
            || $this->status == 10
            || $this->status == 11
        ){
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

    public function isFinished(){
        if($this->status == -1){
            return true;
        }

        if ($this->getIdHito() && (
            $this->getIdHito() == 20 || $this->getIdHito() == 19 ||
            $this->getParentHito() == 20 || $this->getParentHito() == 19
        )
        ) {
            return true;
        }

        return false;
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function agreement(){
        return $this->belongsTo(Agreement::class, 'agreement_id');
    }

    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gestor(){
        return $this->belongsTo(User::class, 'gestor_id');
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

    public function getIdHito()
    {
        if ($this->actuations->count()) {
            return $this->actuations->last()->getRawOriginal('subject');
        }

        return false;
    }

    public function getParentHito()
    {
        if ($this->actuations->count()) {
            $id = $this->actuations->last()->getRawOriginal('subject');
            $ht = Hito::where('ref_id',$id)->first();
            if ($ht) {return $ht->parent_id;}
        }

        return false;
    }

    public function getHito()
    {
        if ($this->isFinished()) {
            return config('app.actuations')[20]['name'];
        }
        if ($this->actuations->count()) {

            if ($this->claim_type == 2 && $this->last_invoice) {
                return "A LA ESPERA DE ACEPTACIÓN Y ABONO HONORARIOS";
            }
            /*if ($this->last_invoice) {
                return "A LA ESPERA DE ACEPTACIÓN Y ABONO HONORARIOS";
            }*/
            return $this->actuations->last()->subject;
        }

        return false;
    }

    public function getPhase()
    {
        if ($this->last_invoice) {
            return [3,'FASE ACEPTACIÓN Y PAGO'];
        }
        if ($this->claim_type == 1) {
            return [1,'FASE JUDICIAL'];
        }
        return [2,'FASE EXTRAJUDICIAL'];
    }

    public function saldo()
    {
        $total = 0;
        foreach ($this->invoices as $key => $value) {
            $total += $value->amount;
        }

        return number_format($total,2);
    }

    public function discounts()
    {
        $total = 0;
        foreach (Discount::where('claim_id',$this->id)->get() as $key => $value) {
            $total += str_replace(',', '.', $value->amount);
        }

        return number_format($total,2);
    }

}
