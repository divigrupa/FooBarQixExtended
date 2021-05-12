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

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(3));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(13));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(132));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(5));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(15));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(542));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(7));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(17));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(37));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(13274));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(57));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(2576));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(357));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(1325476));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(35));
        self::assertEquals($expected, $this->fooBarQixService->getOccurrences(305));
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

    public function testNoTransformation(): void
    {
        self::assertEquals('2', $this->fooBarQixService->getOccurrences(2));
        self::assertEquals('8', $this->fooBarQixService->getOccurrences(8));
        self::assertEquals('1246891', $this->fooBarQixService->getOccurrences(1246891));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->fooBarQixService->getOccurrences(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
