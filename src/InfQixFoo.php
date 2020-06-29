<?php

/**
 * Homework
 * @link https://github.com/divigrupa/FooBarQixExtended
 */

namespace InfQixFoo;

class InfQixFoo
{
    private $filterOptions = [
        'options' => ['min_range' => 1]
    ];

    public function run($number = 1): string
    {
        if (filter_var($number, FILTER_VALIDATE_INT, $this->filterOptions) == false) {
            throw new \Exception('Not positive integer');
        }

        $result = '';
        $resultArray = [];

        $multipliers = [
            8 => 'Inf',
            7 => 'Qix',
            3 => 'Foo',
        ];

        foreach ($multipliers as $key => $name) {
            if ($number % $key == 0) {
                $resultArray[] = $name;
            }
        }

        $resultArray = implode('; ', $resultArray);

        $result = strlen($resultArray) < 1 ? $number : $resultArray;

        return $result;
    }

    public function newRules($number = 1): string
    {
        if (filter_var($number, FILTER_VALIDATE_INT, $this->filterOptions) == false) {
            throw new \Exception('Not positive integer');
        }

        $result = '';
        $resultArray = [];

        $multipliers = [
            3 => 'Foo',
            8 => 'Inf',
            7 => 'Qix',
        ];

        $cleanedNumber = preg_replace("/[^378]/", '', $number);
        $cleanedNumberArray = str_split($cleanedNumber);

        foreach ($cleanedNumberArray as $splittedNumber) {
            foreach ($multipliers as $key => $name) {
                if ($splittedNumber == $key) {
                    $resultArray[] = $name;
                }
            }
        }

        $result = implode('; ', $resultArray);

        $splittedNumbers = str_split($number);
        if (array_sum($splittedNumbers) % 8 == 0) {
            $result .= 'Inf';
        }

        $result = strlen($result) < 1 ? $number : $result;

        return $result;
    }
}
