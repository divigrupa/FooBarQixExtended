<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarQixService;
use InvalidArgumentException;

class FooBarQixMultiplesTest extends Unit
{
    protected FooBarQixService $fooBarQixService;

    public function testFoo(): void
    {
        $expected = 'Foo';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(3));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(6));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(5));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(10));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(7));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(14));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(21));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(42));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(35));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(70));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(0));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(105));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(525));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        self::assertEquals($expected, $this->fooBarQixService->getMultiples(15));
        self::assertEquals($expected, $this->fooBarQixService->getMultiples(30));
    }

    public function testNoTransformation(): void
    {
        self::assertEquals('2', $this->fooBarQixService->getMultiples(2));
        self::assertEquals('8', $this->fooBarQixService->getMultiples(8));
        self::assertEquals('1246891', $this->fooBarQixService->getMultiples(1246891));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->fooBarQixService->getMultiples(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
