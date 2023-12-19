<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class FooBarQixTest extends TestCase
{
    /**
     * @dataProvider provideMultiplesData
     */
    public function testTransformByMultiples($expected, $actual)
    {
        assertEquals($expected, $actual);
    }

    public static function provideMultiplesData(): array
    {
        return [
            ['foo', 6],
            ['foo', 9],
            ['foo,bar', 15],
            ['bar', 10],
            ['8', 8],
        ];
    }
}
