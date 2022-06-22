<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CifNie implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $cif)
    {
        //Returns: 1 = NIF ok, 2 = CIF ok, 3 = NIE ok, -1 = NIF bad, -2 = CIF bad, -3 = NIE bad, 0 = ??? bad
        $cif = strtoupper($cif);
        for ($i = 0; $i < 9; $i ++)
        {
            $num[$i] = substr($cif, $i, 1);
        }
        //si no tiene un formato valido devuelve error
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
        {
            return false;
        }
        //comprobacion de NIFs estandar
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
        {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
            {
                // return 1;
                return true;
            }
            else
            {
                // return -1;
                return false;
            }
        }
        //algoritmo para comprobacion de codigos tipo CIF
        $suma = $num[2] + $num[4] + $num[6];



        for ($i = 1; $i < 8; $i += 2)
        {
            $suma += intval(substr((2 * $num[$i]),0,1)) + intval(substr((2 * $num[$i]), 1, 1));
        }

        $n = 10 - substr($suma, strlen($suma) - 1, 1);
        //comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
        if (preg_match('/^[KLM]{1}/', $cif))
        {
            if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
            {
                // return 1;
                return true;
            }
            else
            {
                // return -1;
                return false;
            }
        }
        //comprobacion de CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
        {
            if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
            {
                // return 2;
                return true;
            }
            else
            {
                // return -2;
                return false;
            }
        }
        //comprobacion de NIEs
        if (preg_match('/^[XYZ]{1}/', $cif))
        {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1))
            {
                // return 3;
                return true;
            }
            else
            {
                // return -3;
                return false;
            }
        }
        //si todavia no se ha verificado devuelve error
        return false;

        /*$value = trim($value);
        $value=strtoupper($value);
        $value=str_replace(array(" ",""),"",$value);

        if(strlen($value)==20 || strlen($value)==24){
            # obtenemos los codigos de las dos letras
            $letra1 = $value[0];
            $letra2 = $value[1];

            if($letra1 === 'E' && $letra2 === 'S'){
                return true;
            }
        }else{
                return false;
        }*/
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.iban');
    }
}
