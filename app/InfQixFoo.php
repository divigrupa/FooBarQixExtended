<?php

namespace App;

class InfQixFoo extends FooBarQixInf
{
    protected array $multiplesAndOccurrences = [
        "Inf" => 8,
        "Qix" => 7,
        "Foo" => 3,
    ];

    protected string $separator = '; ';

    public function sumOfAllDigitsMultiple(int $number): string
    {
        $multiple = 8;
        $sumOfDigits = array_sum(str_split($number));

        return $sumOfDigits % $multiple === 0 ?
            $this->multipleOrAndOccurrence($number) . array_search($multiple, $this->multiplesAndOccurrences) :
            $this->multipleOrAndOccurrence($number);
    }
}