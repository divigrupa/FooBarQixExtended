<?php

namespace App\Services;

class FooBarQixTransformer implements NumberTransformer
{
    protected const SEPARATOR = ',';
    protected const TRANSFORMATIONS = [3 => 'Foo', 5 => 'Bar',7 => 'Qix'];

    public function transformNumber(int $number): string
    {
        $result = '';
        foreach (self::TRANSFORMATIONS as $divisor => $text) {
            if ($number % $divisor === 0) {
                $result .= $text . self::SEPARATOR;
            }
        }
        return !empty($result) ? $result : $number . self::SEPARATOR;
    }
}