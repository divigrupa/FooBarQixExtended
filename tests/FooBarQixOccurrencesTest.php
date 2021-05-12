<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarQixService;
use InvalidArgumentException;

class FooBarQixOccurrencesTest extends Unit
{
    protected FooBarQixService $fooBarQixService;

    public function testFoo(): void
    {
        $expected = 'Foo';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(3));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(13));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(132));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(5));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(15));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(542));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(7));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(17));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(37));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(13274));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(57));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(2576));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(357));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(1325476));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(35));
        $this->assertEquals($expected, $this->fooBarQixService->getOccurrences(305));
    }

    public function testRepeats(): void
    {
        $expected = 'FooFoo';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(33));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(3031));

        $expected = 'BarBar';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(55));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(2525));

        $expected = 'QixQix';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(77));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(4774));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->fooBarQixService->getOccurrences(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
