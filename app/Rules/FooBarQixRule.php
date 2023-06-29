<?php declare(strict_types=1);

namespace App\Rules;

class FooBarQixRule extends NumberTransformationRule
{
    public function __construct()
    {
        $rules = [
            3 => 'Foo',
            5 => 'Bar',
            7 => 'Qix',
        ];
        $separator = ', ';
        parent::__construct($rules, $separator);
    }
}