<?php

/**
 * @link https://github.com/divigrupa/FooBarQixExtended
 */

namespace FooBar;

class FooBar
{
    public function run($number = 1): string
    {
        if ((is_int($number) || ctype_digit($number))
            && (int) $number < 1
        ) {
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

    public function newRules($number = 1): string
    {
        if ((is_int($number) || ctype_digit($number))
            && (int) $number < 1
        ) {
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
