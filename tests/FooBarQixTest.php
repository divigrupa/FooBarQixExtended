<?php

declare(strict_types=1);

namespace Test;

use Codeception\Test\Unit;
use FooBar\Services\FooBarQixService;
use InvalidArgumentException;

class FooBarQixTest extends Unit
{
    protected FooBarQixService $fooBarQixService;

    public function testFoo(): void
    {
        $expected = 'Foo';

        $this->assertEquals($expected, $this->fooBarQixService->get(13));
        $this->assertEquals($expected, $this->fooBarQixService->get(18));
    }

    public function testBar(): void
    {
        $expected = 'Bar';

        $this->assertEquals($expected, $this->fooBarQixService->get(151));
        $this->assertEquals($expected, $this->fooBarQixService->get(542));
    }

    public function testQix(): void
    {
        $expected = 'Qix';

        $this->assertEquals($expected, $this->fooBarQixService->get(17));
        $this->assertEquals($expected, $this->fooBarQixService->get(28));
    }

    public function testFooQix(): void
    {
        $expected = 'FooQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(37));
        $this->assertEquals($expected, $this->fooBarQixService->get(13274));
        $this->assertEquals($expected, $this->fooBarQixService->get(84));
    }

    public function testBarQix(): void
    {
        $expected = 'BarQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(517));
        $this->assertEquals($expected, $this->fooBarQixService->get(140));
    }

    public function testFooBarQix(): void
    {
        $expected = 'FooBarQix';

        $this->assertEquals($expected, $this->fooBarQixService->get(0));
        $this->assertEquals($expected, $this->fooBarQixService->get(1325476));
    }

    public function testFooQixBar(): void
    {
        $expected = 'FooQixBar';

        $this->assertEquals($expected, $this->fooBarQixService->get(504));
    }

    public function testFooBar(): void
    {
        $expected = 'FooBar';

        $this->assertEquals($expected, $this->fooBarQixService->get(60));
        $this->assertEquals($expected, $this->fooBarQixService->get(90));
    }

    public function testRepeats(): void
    {
        $expected = 'FooFoo';

        self::assertEquals($expected, $this->fooBarQixService->get(36));
        self::assertEquals($expected, $this->fooBarQixService->get(331));
        self::assertEquals($expected, $this->fooBarQixService->get(3032));

        $expected = 'BarBar';

        self::assertEquals($expected, $this->fooBarQixService->get(25));
        self::assertEquals($expected, $this->fooBarQixService->get(551));
        self::assertEquals($expected, $this->fooBarQixService->get(2551));

        $expected = 'QixQix';

        self::assertEquals($expected, $this->fooBarQixService->get(217));
        self::assertEquals($expected, $this->fooBarQixService->get(772));
        self::assertEquals($expected, $this->fooBarQixService->get(4778));
    }

    public function testNumber(): void
    {
        $this->assertEquals('2', $this->fooBarQixService->get(2));
        $this->assertEquals('8', $this->fooBarQixService->get(8));
        $this->assertEquals('1246891', $this->fooBarQixService->get(1246891));
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
