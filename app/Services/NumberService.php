<?php


namespace App\Services;

use App\Validators\PositiveIntegerValidator as Validator;


class NumberService
{
    /*
     * Checks if input is of type integer and positive
     */
    protected function validate($input_number){

        if(Validator::is_valid_number($input_number)) return null;

        return [
            'success' => false,
            'input'=>$input_number,
            'error' => 'Input must be a positive integer'
        ];
    }
}
