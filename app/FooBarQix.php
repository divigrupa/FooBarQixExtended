<?php

namespace App;

class FooBarQix
{
    public static array $definitions = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix'
    ];

    public static string $separator = ', ';

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
}
