<?php
namespace TestJob\Services;

use TestJob\Services\FooBarQix;

class InfQixFoo
{
    public static function occurrences( int $number ): string
    {
        return FooBarQix::occurrences( $number, [
            3 => "Foo",
            8 => "Inf",
            7 => "Qix",
        ] );
    }

    public static function multiples( int $number ): string
    {
        return FooBarQix::multiples( $number, [
            8 => "Inf",
            7 => "Qix",
            3 => "Foo",
        ], "; " );
    }

    public static function resetSum(): void
    {

    }

    public static function sum(): string
    {
        return "";
    }
}