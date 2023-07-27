<?php

namespace App\Validators;

use App\Exceptions\PositiveNumberException;
use App\Models\ValidatedInput;

class InputValidator
{
    public function validate(string $number): ValidatedInput
    {
        if (!is_numeric($number) || $number <= 0) {
            throw new PositiveNumberException('Only Positive Integer Numbers are Accepted!');
        }
        return new ValidatedInput($number);
    }
}