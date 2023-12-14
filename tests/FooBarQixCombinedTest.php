<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixCombinedTest extends TestCase
{
    public function testReturnsNumberAsStringIfNoTransformation(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("1", $foobarqix->checkFooBarQixMultiplesAndOccurrences(1));
    }

    public function testReturnsMultiplesAndOccurrencesOf3(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(9));
        $this->assertSame("Foo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(13));
        $this->assertSame("FooFoo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(3));
        $this->assertSame("FooFooFoo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(33));
    }

    public function testReturnsMultiplesAndOccurrencesOf5(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(10));
        $this->assertSame("Bar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(52));
        $this->assertSame("BarBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(5));
        $this->assertSame("BarBarBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(55));
    }

    public function testReturnsMultiplesAndOccurrencesOf7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Qix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(49));
        $this->assertSame("Qix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(71));
        $this->assertSame("QixQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(7));
        $this->assertSame("QixQixQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(77));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(15));
        $this->assertSame("FooBarFoo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(30));
        $this->assertSame("FooBarFooBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(345));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(21));
        $this->assertSame("FooQixFoo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(63));
        $this->assertSame("FooQixQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(147));
        $this->assertSame("FooQixQixFoo", $foobarqix->checkFooBarQixMultiplesAndOccurrences(273));
    }

    public function testReturnsMultiplesAndOccurrencesOf5And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("BarQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(140));
        $this->assertSame("BarQixQixBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(175));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkFooBarQixMultiplesAndOccurrences(210));
        $this->assertSame("FooBarQixBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(105));
        $this->assertSame("FooBarQixQixFooBar", $foobarqix->checkFooBarQixMultiplesAndOccurrences(735));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiplesAndOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiplesAndOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiplesAndOccurrences(-1);
    }
}
