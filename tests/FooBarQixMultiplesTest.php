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

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(3));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(6));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(5));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(10));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(7));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(14));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(21));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(42));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(35));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(70));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(0));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(105));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(525));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(15));
        $this->assertEquals($expected, $this->fooBarQixService->getMultiples(30));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->fooBarQixService->getMultiples(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
