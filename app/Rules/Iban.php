<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Iban implements Rule
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
    public function passes($attribute, $value)
    {
        $value = trim($value);
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
        }
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
