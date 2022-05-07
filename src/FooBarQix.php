<?php

namespace App;

class FooBarQix
{
    protected array $set = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix'
    ];

    public function answer($number)
    {
        if ($number % 105 === 0) {
            return "Foo, Bar, Qix";
        }
        if ($number % 15 === 0) {
            return "Foo, Bar";
        }
        if ($number % 7 === 0) {
            return "Qix";
        }
        if ($number % 5 === 0) {
            return "Bar";
        }
        if ($number % 3 === 0) {
            return "Foo";
        }

        return $number;
    }

    public function occurrences($number): string
    {
        $out = [];

        foreach(str_split($number) as $v) {
            $out[] = array_key_exists($v, $this->set) ? $v . ", " . $this->set[$v] : $v;
        }

        return implode(', ', $out);
    }

    public function answerOrOccurrences($number)
    {
        return (count(str_split($number)) > 1) ? $this->occurrences($number) : $this->answer($number);
    }

}