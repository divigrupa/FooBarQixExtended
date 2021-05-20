<?php
namespace App\Validations;

class InputNumberValidator
{
    public function validate(string $input): bool
    {
        $valueInteger = (int)$input;
        $valueFloat = (float)$input;
        return is_numeric($input) &&
            $valueInteger == $valueFloat &&
            $input > 0;
    }
}