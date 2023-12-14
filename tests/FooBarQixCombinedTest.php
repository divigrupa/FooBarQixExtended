<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBar.php");

class FooBarQixCombinedTest extends TestCase
{
    public function testReturnsNumberAsStringIfNoTransformation(): void
    {
        $foobar = new FooBar();
        $this->assertSame("1", $foobar->checkFooBarQixMultiplesAndOccurrences(1));
    }

    public function testReturnsMultiplesAndOccurrencesOf3(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Foo", $foobar->checkFooBarQixMultiplesAndOccurrences(9));
        $this->assertSame("Foo", $foobar->checkFooBarQixMultiplesAndOccurrences(13));
        $this->assertSame("FooFoo", $foobar->checkFooBarQixMultiplesAndOccurrences(3));
        $this->assertSame("FooFooFoo", $foobar->checkFooBarQixMultiplesAndOccurrences(33));
    }

    public function testReturnsMultiplesAndOccurrencesOf5(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Bar", $foobar->checkFooBarQixMultiplesAndOccurrences(10));
        $this->assertSame("Bar", $foobar->checkFooBarQixMultiplesAndOccurrences(52));
        $this->assertSame("BarBar", $foobar->checkFooBarQixMultiplesAndOccurrences(5));
        $this->assertSame("BarBarBar", $foobar->checkFooBarQixMultiplesAndOccurrences(55));
    }

    public function testReturnsMultiplesAndOccurrencesOf7(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Qix", $foobar->checkFooBarQixMultiplesAndOccurrences(49));
        $this->assertSame("Qix", $foobar->checkFooBarQixMultiplesAndOccurrences(71));
        $this->assertSame("QixQix", $foobar->checkFooBarQixMultiplesAndOccurrences(7));
        $this->assertSame("QixQixQix", $foobar->checkFooBarQixMultiplesAndOccurrences(77));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBarBar", $foobar->checkFooBarQixMultiplesAndOccurrences(15));
        $this->assertSame("FooBarFoo", $foobar->checkFooBarQixMultiplesAndOccurrences(30));
        $this->assertSame("FooBarFooBar", $foobar->checkFooBarQixMultiplesAndOccurrences(345));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And7(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooQix", $foobar->checkFooBarQixMultiplesAndOccurrences(21));
        $this->assertSame("FooQixFoo", $foobar->checkFooBarQixMultiplesAndOccurrences(63));
        $this->assertSame("FooQixQix", $foobar->checkFooBarQixMultiplesAndOccurrences(147));
        $this->assertSame("FooQixQixFoo", $foobar->checkFooBarQixMultiplesAndOccurrences(273));
    }

    public function testReturnsMultiplesAndOccurrencesOf5And7(): void
    {
        $foobar = new FooBar();
        $this->assertSame("BarQix", $foobar->checkFooBarQixMultiplesAndOccurrences(140));
        $this->assertSame("BarQixQixBar", $foobar->checkFooBarQixMultiplesAndOccurrences(175));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5And7(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBarQix", $foobar->checkFooBarQixMultiplesAndOccurrences(210));
        $this->assertSame("FooBarQixBar", $foobar->checkFooBarQixMultiplesAndOccurrences(105));
        $this->assertSame("FooBarQixQixFooBar", $foobar->checkFooBarQixMultiplesAndOccurrences(735));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiplesAndOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiplesAndOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiplesAndOccurrences(-1);
    }
}
