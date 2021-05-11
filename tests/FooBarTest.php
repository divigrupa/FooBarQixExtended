<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarQixService;
use InvalidArgumentException;

class FooBarTest extends Unit
{
    protected FooBarQixService $fooBarQixService;

    public function testFoo(): void
    {
        $expected = 'Foo';

        $this->assertEquals($expected, $this->fooBarQixService->get(3));
        $this->assertEquals($expected, $this->fooBarQixService->get(6));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        $this->assertEquals($expected, $this->fooBarQixService->get(5));
        $this->assertEquals($expected, $this->fooBarQixService->get(10));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        $this->assertEquals($expected, $this->fooBarQixService->get(7));
        $this->assertEquals($expected, $this->fooBarQixService->get(14));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(21));
        $this->assertEquals($expected, $this->fooBarQixService->get(42));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(35));
        $this->assertEquals($expected, $this->fooBarQixService->get(70));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(0));
        $this->assertEquals($expected, $this->fooBarQixService->get(105));
        $this->assertEquals($expected, $this->fooBarQixService->get(525));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        $this->assertEquals($expected, $this->fooBarQixService->get(15));
        $this->assertEquals($expected, $this->fooBarQixService->get(30));
    }

    public function testNumber(): void
    {
        $this->assertEquals('2', $this->fooBarQixService->get(2));
        $this->assertEquals('8', $this->fooBarQixService->get(8));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->fooBarQixService->get(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
