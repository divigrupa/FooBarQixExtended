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
}
