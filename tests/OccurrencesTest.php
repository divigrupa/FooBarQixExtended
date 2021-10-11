<?php

namespace Tests;

use App\Services\FooBarQixService;
use App\Services\InfQixFooService;
use PHPUnit\Framework\TestCase;

class OccurrencesTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals("Foo", (new FooBarQixService)->getOccurrences(234));
        $this->assertEquals("Foo", (new FooBarQixService)->getOccurrences(343));

        $this->assertEquals("Foo", (new InfQixFooService(2364))->getOccurrences());
        $this->assertEquals("Foo", (new InfQixFooService(223))->getOccurrences());
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

        $this->assertEquals('Qix', (new InfQixFooService(794))->getOccurrences());
        $this->assertEquals('Qix', (new InfQixFooService(222277))->getOccurrences());
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
        $this->assertEquals('Inf', (new InfQixFooService(8))->getOccurrences());
        $this->assertEquals('Inf', (new InfQixFooService(8229))->getOccurrences());

    }

    public function testIfReturnsInfQuix()
    {
        $this->assertEquals('Inf; Qix', (new InfQixFooService(7998))->getOccurrences());
        $this->assertEquals('Inf; Qix', (new InfQixFooService(77258))->getOccurrences());
    }

    public function testIfReturnsInfFoo()
    {
        $this->assertEquals('Inf; Foo', (new InfQixFooService(3388))->getOccurrences());
        $this->assertEquals('Inf; Foo', (new InfQixFooService(89243))->getOccurrences());
    }

    public function testIfReturnQixFoo()
    {
        $this->assertEquals('Qix; Foo', (new InfQixFooService(773))->getOccurrences());
        $this->assertEquals('Qix; Foo', (new InfQixFooService(32697))->getOccurrences());
    }

    public function testIfReturnInfQixFoo()
    {
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService(873))->getOccurrences());
        $this->assertEquals('Inf; Qix; Foo', (new InfQixFooService(392758))->getOccurrences());
    }

    public function testIfAllDigitsSumIsMultipleOfEight()
    {
        $this->assertEquals('Inf; Qix; FooInf', (new InfQixFooService(18786936))->getOccurrences());
        $this->assertEquals('InfInf', (new InfQixFooService(860424))->getOccurrences());
    }
}