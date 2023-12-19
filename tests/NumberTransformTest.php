<?php

declare(strict_types=1);

namespace Tests;

use App\models\Trigger;
use App\services\TransformService;
use PHPUnit\Framework\TestCase;

class NumberTransformTest extends TestCase
{
    /**
     * @dataProvider provideMultiplesData
     */
    public function testTransformByMultiples($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Foo', 3),
            new Trigger('Bar', 5),
            new Trigger('Qix', 7),
        ]);

        $this->assertEquals($expected, $service->transformMultiples($actual));
    }

    /**
     * @dataProvider provideOccurrencesData
     */
    public function testTransformByOccurrences($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Foo', 3),
            new Trigger('Bar', 5),
            new Trigger('Qix', 7),
        ]);

        $this->assertEquals($expected, $service->transformOccurrences($actual));
    }

    /**
     * @dataProvider provideCombinedData
     */
    public function testTransformCombined($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Foo', 3),
            new Trigger('Bar', 5),
            new Trigger('Qix', 7),
        ]);

        $this->assertEquals($expected, $service->transformNumber($actual));
    }

    /**
     * @dataProvider provideCombinedData2
     */
    public function testTransformCombined2($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Inf', 8),
            new Trigger('Foo', 3),
            new Trigger('Qix', 7),
        ], ';');

        $this->assertEquals($expected, $service->transformNumber($actual));
    }

    /**
     * @dataProvider provideAppendedData
     */
    public function testTransformAndAppendIfSumOfDigitsDivisible($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Inf', 8, true),
            new Trigger('Foo', 3),
            new Trigger('Qix', 7),
        ], ';');

        $this->assertEquals($expected, $service->transformNumber($actual));
    }

    public static function provideMultiplesData(): array
    {
        return [
            ['Foo', 6],
            ['Foo', 9],
            ['Foo,Bar', 15],
            ['Bar', 10],
            ['8', 8],
            ['Qix', 14],
            ['Qix', 49],
            ['Foo,Qix', 21],
            ['Bar,Qix', 35],
            ['Foo,Bar,Qix', 105],
        ];
    }

    public static function provideOccurrencesData(): array
    {
        return [
            ['Foo,Qix,Bar', 375],
            ['Foo,Qix,Bar', 3705],
            ['Foo,Foo,Qix', 1337],
            ['10', 10],
        ];
    }

    public static function provideCombinedData(): array
    {
        return [
            ['Foo,Bar,Foo,Qix,Bar', 375],
            ['Foo,Bar,Foo,Qix,Bar', 3705],
            ['Qix,Foo,Foo,Qix', 1337],
            ['Bar', 10],
            ['11', 11],
        ];
    }

    public static function provideCombinedData2(): array
    {
        return [
            ['Foo;Inf;Foo;Qix', 837],
            ['Qix;Qix;Inf', 778],
            ['Foo;Qix;Qix;Qix;Qix', 777],
        ];
    }

    public static function provideAppendedData(): array
    {
        return [
            ['Inf;Foo;Inf;Inf;InfInf', 888],
            ['Qix;QixInf', 772],
            ['Inf;QixInf', 817],
            ['Inf;InfInf', 8],
        ];
    }
}
