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
        $leastCommonMultiple = array_product(array_flip($this->set));

        foreach ($this->set as $key => $value) {

            if ($number % $leastCommonMultiple == 0) {
                return implode($this->separator, $this->set);
            }
            if ($number % $key == 0) {
                return $value;
            }
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