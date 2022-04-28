<?php

namespace App;

class InfQixFoo
{
    public string $separator = "; ";

    public array $infQixFoo = [
        'Inf' => 8,
        'Qix' => 7,
        'Foo' => 3
    ];

    // Takes a number and returns "Inf" if multiple of 8,
    // "Qix" if multiple of 7,
    // "Foo" if multiple of 3,
    // and "Inf, Qix, Foo" if multiple of 8, 7 and 3.
    // return the number if is not multiple of 8, 7 and/or 3.
    public function isMultiple(int $number): string
    {
        $output = '';

        foreach ($this->infQixFoo as $item => $value) {
            if ($number > 0) {
                if ($number % $value == 0) {
                    $output .= $item . $this->separator;
                }
            }
        }

        if (empty($output)) {
            return $number;
        } else {
            return chop($output, $this->separator);
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
            if (in_array($integer, $this->infQixFoo)) {
                $item = array_search($integer, $this->infQixFoo);
                $output .= $item;
            }
        }

        return $output;
    }

    public function isMultipleAndContainsMultiple(int $number): string
    {
        return chop($this->isMultiple($number) . " " . $this->ifContainsMultiple($number));
    }

    public function sumAll8(int $number): string
    {
        $splitNumbers = str_split($number);
        if (array_sum($splitNumbers) == 8) {
            return $this->isMultipleAndContainsMultiple($number) . "Inf";
        } else {
            return $this->isMultipleAndContainsMultiple($number);
        }
    }
}