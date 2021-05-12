<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\InfQixFooService;
use InvalidArgumentException;

class InfQixFooTest extends Unit
{
    protected InfQixFooService $infQixFooService;

    public function testMultiples(): void
    {
        self::assertEquals('Inf', $this->infQixFooService->get(16));
        self::assertEquals('Qix', $this->infQixFooService->get(14));
        self::assertEquals('Foo', $this->infQixFooService->get(9));
        self::assertEquals('Inf; Qix', $this->infQixFooService->get(56));
        self::assertEquals('Inf; Foo', $this->infQixFooService->get(24));
        self::assertEquals('Inf; Qix; Foo', $this->infQixFooService->get(504));
        self::assertEquals('Inf; Qix; Foo', $this->infQixFooService->get(0));
    }

    public function testOccurrences(): void
    {
        self::assertEquals('Inf', $this->infQixFooService->get(58));
        self::assertEquals('Qix', $this->infQixFooService->get(17));
        self::assertEquals('Foo', $this->infQixFooService->get(13));
        self::assertEquals('Inf; Qix', $this->infQixFooService->get(817));
        self::assertEquals('Inf; Foo', $this->infQixFooService->get(83));
        self::assertEquals('Inf; Qix; Foo', $this->infQixFooService->get(8713));
    }

    public function testMultiplesAndOccurrences(): void
    {
        self::assertEquals('Inf; Inf', $this->infQixFooService->get(128));
        self::assertEquals('Inf; Qix', $this->infQixFooService->get(176));
        self::assertEquals('Inf; Foo', $this->infQixFooService->get(32));
        self::assertEquals('Foo; Inf', $this->infQixFooService->get(498));
        self::assertEquals('Inf; Qix; Foo', $this->infQixFooService->get(392));
        self::assertEquals('Foo; Inf; Qix; Foo', $this->infQixFooService->get(873));
        self::assertEquals('Inf; Qix; Foo; Inf; Qix', $this->infQixFooService->get(4872));
    }

    public function testDigitSumIsMultipleOfEight(): void
    {
        self::assertEquals('Inf; QixInf', $this->infQixFooService->getFull(12544));
        self::assertEquals('Inf; Qix; FooInf', $this->infQixFooService->getFull(736));
        self::assertEquals('1254426521Inf', $this->infQixFooService->getFull(1254426521));
    }

    public function testNoTransformation(): void
    {
        self::assertEquals('2', $this->infQixFooService->get(2));
        self::assertEquals('11', $this->infQixFooService->get(11));
        self::assertEquals('124694', $this->infQixFooService->get(124694));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->infQixFooService->get(-1);
    }

    protected function _inject(InfQixFooService $infQixFooService): void
    {
        $this->infQixFooService = $infQixFooService;
    }
}
