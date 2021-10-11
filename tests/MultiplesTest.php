<?php

namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals("Foo", (new FooBarQixService)->getMultiples(3));
        $this->assertEquals("Foo", (new InfQixFooService)->getMultiples(6));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals("Bar", (new FooBarQixService)->getMultiples(5));
        $this->assertEquals("Bar", (new FooBarQixService)->getMultiples(10));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals("Qix", (new FooBarQixService)->getMultiples(7));
        $this->assertEquals('Qix', (new InfQixFooService)->getMultiples(14));
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
        $this->assertEquals('Inf', (new InfQixFooService)->getMultiples(8));
        $this->assertEquals('Inf', (new InfQixFooService)->getMultiples(10480));

    }

    public function testIfReturnsInfQuix()
    {
        $this->assertEquals('Inf; Qix', (new InfQixFooService)->getMultiples(56));
        $this->assertEquals('Inf; Qix', (new InfQixFooService)->getMultiples(10864));
    }

    public function testIfReturnsInfFoo()
    {
        $this->assertEquals('Inf; Foo', (new InfQixFooService)->getMultiples(48));
        $this->assertEquals('Inf; Foo', (new InfQixFooService)->getMultiples(10968));
    }

    public function testIfReturnQixFoo()
    {
        $this->assertEquals('Qix; Foo', (new InfQixFooService)->getMultiples(42));
        $this->assertEquals('Qix; Foo', (new InfQixFooService)->getMultiples(10983));
    }

    public function testIfReturnInfQixFoo()
    {
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService)->getMultiples(168));
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService)->getMultiples(10920));
    }
}