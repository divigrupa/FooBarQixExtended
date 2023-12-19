<?php

declare(strict_types=1);

namespace Tests;

use App\models\Trigger;
use App\services\TransformService;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    /**
     * @dataProvider provideMultiplesData
     */
    public function testTransformByMultiples($expected, $actual)
    {
        $service = new TransformService([
            new Trigger('Foo', 3),
            new Trigger('Bar', 5),
        ]);

        $this->assertEquals($expected, $service->transformMultiples($actual));
    }

    public static function provideMultiplesData(): array
    {
        return [
            ['Foo', 6],
            ['Foo', 9],
            ['Foo,Bar', 15],
            ['Bar', 10],
            ['8', 8],
        ];
    }
}
