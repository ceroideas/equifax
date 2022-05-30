<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    public function hasAgreement(){

        if($this->agreement == true){
            return true;
        }

        return false;

    }

    public function partialAmounts()
    {
        $total = 0;
        if ($this->partials_amount_details) {
            foreach (json_decode($this->partials_amount_details,true) as $key => $partial) {
                $total+=$partial['amount'];
            }
        }

        return $total;
    }

    public function getType()
    {
        switch ($this->type) {
            case 1 : 
                return "Letras de cambio, cheques, talones o pagarés";
                break;
            case 2 : 
                return "Abono por parte del deudor consumidor a los comerciantes el precio de los productos vendidos";
                break;
            case 3 : 
                return "Honorarios, derechos, gastos y desembolsos por el desempeño de sus cargos a jueces, abogados, procuradores, registradores, notarios, peritos y otros profesionale";
                break;
            case 4 : 
                return "Deudas que tengan los Farmacéuticos por las medicinas que suministraron y no le pagaron ";
                break;
            case 5 : 
                return "A los Profesores, Maestros y profesionales liberales en general (médicos, arquitectos y aparejadores) sus honorarios";
                break;
            case 6 : 
                return "Abono de comida y habitación (hoteles)";
                break;
            case 7 : 
                return "Deudas con empresas de suministros (luz, agua, gas, teléfono)";
                break;
            case 8 : 
                return "Por prestación de servicios [una persona se obligar a realizar  un servicio a cambio de un precio]";
                break;
            case 9 : 
                return "Abono por parte del deudor comerciante (si compra cosas muebles para revenderlas) a los comerciantes el precio de los productos vendidos";
                break;
            case 10 : 
                return "Pagos que se hagan por años o plazos más breves";
                break;
            case 11 : 
                return "En General";
                break;
            case 12 : 
                return "Actuación Dudosa o Consciente y Voluntaria";
                break;
            case 13 : 
                return "Transportes Internacionales";
                break;
            case 14 : 
                return "Deudas no contempladas especificadamente";
                break;
            case 15 : 
                return "Reclamación de deudas derivadas de un contrato de ejecución de obras o prestación de servicios ";
                break;
            case 16 : 
                return "Pagos que se hagan por años o plazos más breves";
                break;
            case 17 : 
                return "Reparación de daños por responsabilidad extracontractual por culpa o negligencia";
                break;
            case 18 : 
                return "Otro:";
                break;
        }
    }

    public function agreements()
    {
        return $this->hasOne(Agreement::class, 'debt_id');
    }
}
