<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarQixService;
use InvalidArgumentException;

class FooBarQixTest extends Unit
{
    protected FooBarQixService $fooBarQixService;

    public function testMultiples(): void
    {
        self::assertEquals('Foo', $this->fooBarQixService->get(6));
        self::assertEquals('Bar', $this->fooBarQixService->get(10));
        self::assertEquals('Qix', $this->fooBarQixService->get(14));
        self::assertEquals('FooBar', $this->fooBarQixService->get(1110));
        self::assertEquals('FooQix', $this->fooBarQixService->get(42));
        self::assertEquals('BarQix', $this->fooBarQixService->get(980));
        self::assertEquals('FooBarQix', $this->fooBarQixService->get(0));
    }

    public function testOccurrences(): void
    {
        self::assertEquals('Foo', $this->fooBarQixService->get(13));
        self::assertEquals('Bar', $this->fooBarQixService->get(542));
        self::assertEquals('Qix', $this->fooBarQixService->get(17));
        self::assertEquals('BarFoo', $this->fooBarQixService->get(503));
        self::assertEquals('QixFoo', $this->fooBarQixService->get(12734));
        self::assertEquals('BarQix', $this->fooBarQixService->get(2578));
        self::assertEquals('FooBarQix', $this->fooBarQixService->get(31517));
        self::assertEquals('FooBarQixQixFooBar', $this->fooBarQixService->get(735));
    }

    public function testMultiplesAndOccurrences(): void
    {
        self::assertEquals('FooBar', $this->fooBarQixService->get(51));
        self::assertEquals('FooQix', $this->fooBarQixService->get(27));
        self::assertEquals('BarQix', $this->fooBarQixService->get(710));
        self::assertEquals('FooBarQix', $this->fooBarQixService->get(1257));
        self::assertEquals('FooBarQix', $this->fooBarQixService->get(1170));
        self::assertEquals('FooQixBar', $this->fooBarQixService->get(504));
    }

    public function testRepeats(): void
    {
        self::assertEquals('FooFoo', $this->fooBarQixService->get(36));
        self::assertEquals('BarBar', $this->fooBarQixService->get(25));
        self::assertEquals('QixQix', $this->fooBarQixService->get(217));
    }

    public function testNoTransformation(): void
    {
        self::assertEquals('2', $this->fooBarQixService->get(2));
        self::assertEquals('8', $this->fooBarQixService->get(8));
        self::assertEquals('1246891', $this->fooBarQixService->get(1246891));
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->fooBarQixService->get(-1);
    }

    protected function _inject(FooBarQixService $fooBarQixService): void
    {
        $this->fooBarQixService = $fooBarQixService;
    }
}
