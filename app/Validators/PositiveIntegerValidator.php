<?php


namespace App\Validators;


class PositiveIntegerValidator
{
    /*
     * Checks if input is of type integer and positive
     */
    static function is_valid_number($input_number){
        if(gettype($input_number) != 'integer') return false;
        if($input_number < 0) return false;
        return true;
    }
}
