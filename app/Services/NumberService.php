<?php


namespace App\Services;


class NumberService
{
    /*
     * Checks if input is of type integer and positive
     */
    protected function is_input_valid($input_number){
        if(gettype($input_number) != 'integer') return false;
        if($input_number < 0) return false;
        return true;
    }
}
