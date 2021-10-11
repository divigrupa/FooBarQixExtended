<?php

namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class OccurrencesTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals("Foo", (new FooBarQixService)->getOccurrences(234));
        $this->assertEquals("Foo", (new FooBarQixService)->getOccurrences(343));

        $this->assertEquals("Foo", (new InfQixFooService)->getOccurrences(2364));
        $this->assertEquals("Foo", (new InfQixFooService)->getOccurrences(223));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals("Bar", (new FooBarQixService)->getOccurrences(254));
        $this->assertEquals("Bar", (new FooBarQixService)->getOccurrences(529));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals("Qix", (new FooBarQixService)->getOccurrences(4997));
        $this->assertEquals("Qix", (new FooBarQixService)->getOccurrences(27766));

        $this->assertEquals('Qix', (new InfQixFooService)->getOccurrences(794));
        $this->assertEquals('Qix', (new InfQixFooService)->getOccurrences(2222277));
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals("Foo, Bar", (new FooBarQixService)->getOccurrences(3295));
        $this->assertEquals("Foo, Bar", (new FooBarQixService)->getOccurrences(10395));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals("Bar, Qix", (new FooBarQixService)->getOccurrences(157));
        $this->assertEquals("Bar, Qix", (new FooBarQixService)->getOccurrences(759));

    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals("Foo, Qix", (new FooBarQixService)->getOccurrences(723));
        $this->assertEquals("Foo, Qix", (new FooBarQixService)->getOccurrences(3666667));

    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals("Foo, Bar, Qix", (new FooBarQixService)->getOccurrences(753));
        $this->assertEquals("Foo, Bar, Qix", (new FooBarQixService)->getOccurrences(5299387));

    }

    public function testIfReturnsInf()
    {
        $this->assertEquals('Inf', (new InfQixFooService)->getOccurrences(8));
        $this->assertEquals('Inf', (new InfQixFooService)->getOccurrences(8229));

    }

    public function testIfReturnsInfQuix()
    {
        $this->assertEquals('Inf; Qix', (new InfQixFooService)->getOccurrences(798));
        $this->assertEquals('Inf; Qix', (new InfQixFooService)->getOccurrences(77258));
    }

    public function testIfReturnsInfFoo()
    {
        $this->assertEquals('Inf; Foo', (new InfQixFooService)->getOccurrences(3388));
        $this->assertEquals('Inf; Foo', (new InfQixFooService)->getOccurrences(89243));
    }

    public function testIfReturnQixFoo()
    {
        $this->assertEquals('Qix; Foo', (new InfQixFooService)->getOccurrences(7773));
        $this->assertEquals('Qix; Foo', (new InfQixFooService)->getOccurrences(32697));
    }

    public function testIfReturnInfQixFoo()
    {
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService)->getOccurrences(873));
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService)->getOccurrences(392758));
    }
}