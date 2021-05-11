<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarService;
use InvalidArgumentException;

class FooBarTest extends Unit
{
    protected FooBarService $fooBarService;

    public function testFoo(): void
    {
        $expected = 'Foo';

        $this->assertEquals($expected, $this->fooBarService->get(3));
        $this->assertEquals($expected, $this->fooBarService->get(6));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        $this->assertEquals($expected, $this->fooBarService->get(5));
        $this->assertEquals($expected, $this->fooBarService->get(10));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        $this->assertEquals($expected, $this->fooBarService->get(0));
        $this->assertEquals($expected, $this->fooBarService->get(15));
        $this->assertEquals($expected, $this->fooBarService->get(30));
    }

    public function testNumber(): void
    {
        $this->assertEquals('2', $this->fooBarService->get(2));
        $this->assertEquals('7', $this->fooBarService->get(7));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->fooBarService->get(-1);
    }

    protected function _inject(FooBarService $fooBarService): void
    {
        $this->fooBarService = $fooBarService;
    }
}
