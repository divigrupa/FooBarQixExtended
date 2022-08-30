<?php
namespace TestJob\Services;

use TestJob\Services\FooBarQix;

class InfQixFoo
{
    protected static int $totalNumber = 0;

    public static function occurrences( int $number ): string
    {
        static::$totalNumber += $number;

        return FooBarQix::occurrences( $number, [
            3 => "Foo",
            8 => "Inf",
            7 => "Qix",
        ] );
    }

    public static function multiples( int $number ): string
    {
        static::$totalNumber += $number;

        return FooBarQix::multiples( $number, [
            8 => "Inf",
            7 => "Qix",
            3 => "Foo",
        ], "; " );
    }

    public static function resetSum(): void
    {
        static::$totalNumber = 0;
    }

    public static function sum(): string
    {
        return static::$totalNumber > 0 && static::$totalNumber % 8 === 0 ? "Inf" : "";
    }
}