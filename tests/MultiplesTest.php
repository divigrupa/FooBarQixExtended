<?php

namespace Tests;

use App\Services\FooBarQixService;
use App\Services\InfQixFooService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals("Foo", (new FooBarQixService)->getMultiples(3));
        $this->assertEquals("Foo", (new InfQixFooService(6))->getMultiples());
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals("Bar", (new FooBarQixService)->getMultiples(5));
        $this->assertEquals("Bar", (new FooBarQixService)->getMultiples(10));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals("Qix", (new FooBarQixService)->getMultiples(7));
        $this->assertEquals('Qix', (new InfQixFooService(14))->getMultiples());
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals("Foo, Bar", (new FooBarQixService)->getMultiples(15));
        $this->assertEquals("Foo, Bar", (new FooBarQixService)->getMultiples(10995));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals("Bar, Qix", (new FooBarQixService)->getMultiples(35));
        $this->assertEquals("Bar, Qix", (new FooBarQixService)->getMultiples(10990));

    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals("Foo, Qix", (new FooBarQixService)->getMultiples(21));
        $this->assertEquals("Foo, Qix", (new FooBarQixService)->getMultiples(10962));

    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals("Foo, Bar, Qix", (new FooBarQixService)->getMultiples(105));
        $this->assertEquals("Foo, Bar, Qix", (new FooBarQixService)->getMultiples(10920));

    }

    public function testIfReturnsNumber()
    {
        $this->assertEquals('2', (new FooBarQixService)->getMultiples(2));
        $this->assertEquals('1013', (new FooBarQixService)->getMultiples(1013));

    }

    public function testIfReturnsGivenNumberAsString()
    {
        $this->assertIsString((new FooBarQixService)->getMultiples(2));
        $this->assertIsString((new FooBarQixService)->getMultiples(586));

    }

    public function testIfReturnsInf()
    {
        $this->assertEquals('Inf', (new InfQixFooService(8))->getMultiples(8));
        $this->assertEquals('Inf', (new InfQixFooService(10480))->getMultiples(10480));

    }

    public function testIfReturnsInfQuix()
    {
        $this->assertEquals('Inf; Qix', (new InfQixFooService(56))->getMultiples());
        $this->assertEquals('Inf; Qix', (new InfQixFooService(10864))->getMultiples());
    }

    public function testIfReturnsInfFoo()
    {
        $this->assertEquals('Inf; Foo', (new InfQixFooService(48))->getMultiples());
        $this->assertEquals('Inf; Foo', (new InfQixFooService(541344))->getMultiples());
    }

    public function testIfReturnQixFoo()
    {
        $this->assertEquals('Qix; Foo', (new InfQixFooService(42))->getMultiples());
        $this->assertEquals('Qix; Foo', (new InfQixFooService(10983))->getMultiples());
    }

    public function testIfReturnInfQixFoo()
    {
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService(168))->getMultiples());
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService(10920))->getMultiples());
    }

	public function testIfAllDigitsSumIsMultipleOfEight()
    {
        $this->assertEquals('Inf; Qix; FooInf', (new InfQixFooService(18786936))->getMultiples());
        $this->assertEquals('Inf; FooInf', (new InfQixFooService(860424))->getMultiples());
    }
}