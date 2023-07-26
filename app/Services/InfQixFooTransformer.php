<?php

namespace App\Services;

class InfQixFooTransformer implements NumberTransformer
{
    protected const SEPARATOR = ';';
    protected const TRANSFORMATIONS = [8 => 'Inf', 7 => 'Qix',3 => 'Foo'];

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
}