<?php

/**
 * @link https://github.com/divigrupa/FooBarQixExtended
 */

namespace FooBar;

class FooBar
{
    private $filterOptions = [
        'options' => ['min_range' => 1]
    ];

    public function showMultiples($number = 1): string
    {
        if (filter_var($number, FILTER_VALIDATE_INT, $this->filterOptions) == false) {
            throw new \Exception('Not positive integer');
        }

        $result = '';

        $multipliers = [
            3 => 'Foo',
            5 => 'Bar',
            7 => 'Qix',
        ];

        foreach ($multipliers as $key => $name) {
            if ($number % $key == 0) {
                $result .= $name;
            }
        }

        if (strlen($result) < 1) {
            $result = $number;
        }

        return $result;
    }

    public function showOccurrences($number = 1): string
    {
        if (filter_var($number, FILTER_VALIDATE_INT, $this->filterOptions) == false) {
            throw new \Exception('Not positive integer');
        }

        $result = '';

        $multipliers = [
            3 => 'Foo',
            5 => 'Bar',
            7 => 'Qix',
        ];

        $cleanedNumber = preg_replace("/[^357]/", '', $number);

        foreach ($multipliers as $key => $name) {
            $cleanedNumber = preg_replace("/$key/", $name, $cleanedNumber);
        }

        $result = strlen($cleanedNumber) < 1 ? $number : $cleanedNumber;

        return $result;
    }
}
