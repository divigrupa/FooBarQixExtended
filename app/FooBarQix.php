<?php

namespace App;

class FooBarQix
{
    private string $divider = ', ';

    private array $fooBarQix = [
        'Foo' => 3,
        'Bar' => 5,
        'Qix' => 7
    ];

    // Takes a number and returns "Foo" if multiple of 3,
    // "Bar" if multiple of 5,
    // "Qix" if multiple of 7,
    // and "Foo, Bar, Qix" if multiple of 3, 5 and 7.
    // return the number if is not multiple of 3, 5 and/or 7.
    public function isMultiple(int $number): string
    {
        $output = '';

        foreach ($this->fooBarQix as $item => $value) {
            if ($number > 0) {
                if ($number % $value == 0) {
                    $output .= $item . $this->divider;
                }
            }
        }

        if (empty($output)) {
            return $number;
        } else {
            return chop($output, $this->divider);
        }
    }

    // Takes a number and appends "Foo" in the end if it contains 3,
    // "Bar" if it contains 5,
    // "Qix" if it contains 7
    // and "Foo" "Bar" or "Qix" as many times as the corresponding number.
    public function ifContainsMultiple(int $number): string
    {
        $output = '';
        $splitNumbers = str_split($number);

        foreach ($splitNumbers as $integer) {
            if (in_array($integer, $this->fooBarQix)) {
                $item = array_search($integer, $this->fooBarQix);
                $output .= $item;
            }
        }

        return $output;
    }

    public function isMultipleAndContainsMultiple(int $number): string
    {
        return chop($this->isMultiple($number) . " " . $this->ifContainsMultiple($number));
    }
}