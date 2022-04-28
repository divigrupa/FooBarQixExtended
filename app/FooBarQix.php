<?php

namespace App;

class FooBarQix
{
    public static array $definitions = [
        3 => 'Foo',
        5 => 'Bar'
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
}
