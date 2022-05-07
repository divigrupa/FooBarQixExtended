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

    public function answerInf($number): string
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

    public function sumAllDigits($number): string
    {
        return (array_sum((array)str_split($number)) % 8 === 0) ? 'Inf' : '';
    }

    public function addSumAllDigitsEnd($number): string
    {
        return $this->occurrences($number) . $this->sumAllDigits($number);
    }

}