<?php

namespace App;

class InfQixFoo
{
    public static array $definitions = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo'
    ];

    public static string $separator = '; ';

    public static function convert(int $num): string
    {
        $res = '';

        foreach (self::$definitions as $i => $name) {
            if ($num % $i === 0) {
                $res .= $res ? self::$separator . self::$definitions[$i] : self::$definitions[$i];
            }
        }

        return $res ?: (string) $num;
    }

    public static function appendStringBasedOnNumbers($numberToConvert): string
    {
        $res = '';

        foreach (str_split($numberToConvert) as $number) {
            if (array_key_exists($number, self::$definitions)) {
                $res .= $res ? self::$separator . self::$definitions[$number] : self::$definitions[$number];
            }
        }
        return $res;
    }

    public static function convertAndAppend($numberToConvert): string
    {
        $res = self::convert($numberToConvert);

        foreach (str_split($numberToConvert) as $number) {
            if (array_key_exists($number, self::$definitions)) {
                $res .= self::$separator . self::$definitions[$number];
            }
        }
        return $res;
    }

    public static function sumMultipleOfEight($numberToConvert): string
    {
        $res = self::convertAndAppend($numberToConvert);
        $split = str_split(self::convertAndAppend($numberToConvert));
        if (array_sum($split) % 8 === 0) {
            $res .= 'Inf';
        }
        return $res;
    }
}
