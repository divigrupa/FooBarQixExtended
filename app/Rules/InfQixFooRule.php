<?php declare(strict_types=1);

namespace App\Rules;

class InfQixFooRule extends NumberTransformationRule
{
    public function __construct()
    {
        $rules = [
            8 => 'Inf',
            7 => 'Qix',
            3 => 'Foo',
        ];
        $separator = '; ';
        parent::__construct($rules, $separator);
    }
}

