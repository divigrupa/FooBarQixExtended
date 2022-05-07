<?php

namespace App;

class InfQixFoo extends FooBarQix
{
    protected array $set = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo'
    ];

    protected string $separator = '; ';

    public function answerInf($number)
    {
        if ($number % 168 === 0) {
            return "Inf; Qix; Foo";
        }
        if ($number % 8 === 0) {
            return "Inf";
        }
        if ($number % 7 === 0) {
            return "Qix";
        }
        if ($number % 3 === 0) {
            return "Foo";
        }

        return $number;
    }

}