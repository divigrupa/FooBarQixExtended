<?php

namespace App\Services;

class FooBarQixTransformer implements NumberTransformer
{
    protected const SEPARATOR = ',';
    protected const TRANSFORMATIONS = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];

    public function transformNumber(string $number): string
    {
        $result = '';
        foreach (self::TRANSFORMATIONS as $divisor => $text) {
            if ($number % $divisor === 0) {
                $result .= $text . self::SEPARATOR;
            }
        }
        return $result;
    }

    public function transformDigits(string $number): string
    {
        $result = '';
        $numberString = $number;

        for ($i = 0; $i < strlen($numberString); $i++) {
            $digit = $numberString[$i];
            if (isset(self::TRANSFORMATIONS[$digit])) {
                $result .= self::TRANSFORMATIONS[$digit];
            }
        }
        return $result;
    }

    public function transformSum(string $number):string
    {
        return '';
    }
}