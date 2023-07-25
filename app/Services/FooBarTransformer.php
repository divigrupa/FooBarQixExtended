<?php

namespace App\Services;

class FooBarTransformer implements NumberTransformer
{
    protected const SEPARATOR = ',';
    protected const TRANSFORMATIONS = [3 => 'Foo', 5 => 'Bar'];

    public function transform(int $number): string
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