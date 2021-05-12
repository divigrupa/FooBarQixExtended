<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\InfQixFooService;
use InvalidArgumentException;

class InfQixFooTest extends Unit
{
    protected InfQixFooService $infQixFooService;

    public function testInf(): void
    {
        $expected = 'Inf';

        self::assertEquals($expected, $this->infQixFooService->get(16));
        self::assertEquals($expected, $this->infQixFooService->get(58));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        self::assertEquals($expected, $this->infQixFooService->get(14));
        self::assertEquals($expected, $this->infQixFooService->get(17));
    }

    public function testFoo(): void
    {
        $expected = 'Foo';

        self::assertEquals($expected, $this->infQixFooService->get(9));
        self::assertEquals($expected, $this->infQixFooService->get(13));
    }

    public function testInfQix(): void
    {
        $expected = 'Inf; Qix';

        self::assertEquals($expected, $this->infQixFooService->get(56));
        self::assertEquals($expected, $this->infQixFooService->get(176));
    }

    public function testInfFoo(): void
    {
        $expected = 'Inf; Foo';

        self::assertEquals($expected, $this->infQixFooService->get(24));
        self::assertEquals($expected, $this->infQixFooService->get(32));
    }

    public function testInfQixFoo(): void
    {
        $expected = 'Inf; Qix; Foo';

        self::assertEquals($expected, $this->infQixFooService->get(504));
        self::assertEquals($expected, $this->infQixFooService->get(392));
        self::assertEquals($expected, $this->infQixFooService->get(736));
    }

    public function testInfFooQix(): void
    {
        $expected = 'Inf; Foo; Qix';

        self::assertEquals($expected, $this->infQixFooService->get(72));
    }

    public function testQixFooInf(): void
    {
        $expected = 'Qix; Foo; Inf';

        self::assertEquals($expected, $this->infQixFooService->get(84));
    }

    public function testFooInfQixFoo(): void
    {
        $expected = 'Foo; Inf; Qix; Foo';

        self::assertEquals($expected, $this->infQixFooService->get(873));
    }

    public function testDigitSumIsMultipleOfEight(): void
    {
        self::assertEquals('Inf; QixInf', $this->infQixFooService->get(12544));
        self::assertEquals('Inf; Qix; FooInf', $this->infQixFooService->get(736));
        self::assertEquals('1254426521Inf', $this->infQixFooService->get(1254426521));
    }

    public function testNumber(): void
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
