<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixMultiplesAndOccurrencesTest extends TestCase
{
    public function testReturnsNumberAsStringIfNoTransformation(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("1", $foobarqix->checkMultiplesAndOccurrences(1));
    }

    public function testReturnsMultiplesAndOccurrencesOf3(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkMultiplesAndOccurrences(9));
        $this->assertSame("Foo", $foobarqix->checkMultiplesAndOccurrences(13));
        $this->assertSame("FooFoo", $foobarqix->checkMultiplesAndOccurrences(3));
        $this->assertSame("FooFooFoo", $foobarqix->checkMultiplesAndOccurrences(33));
    }

    public function testReturnsMultiplesAndOccurrencesOf5(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkMultiplesAndOccurrences(10));
        $this->assertSame("Bar", $foobarqix->checkMultiplesAndOccurrences(52));
        $this->assertSame("BarBar", $foobarqix->checkMultiplesAndOccurrences(5));
        $this->assertSame("BarBarBar", $foobarqix->checkMultiplesAndOccurrences(55));
    }

    public function testReturnsMultiplesAndOccurrencesOf7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Qix", $foobarqix->checkMultiplesAndOccurrences(49));
        $this->assertSame("Qix", $foobarqix->checkMultiplesAndOccurrences(71));
        $this->assertSame("QixQix", $foobarqix->checkMultiplesAndOccurrences(7));
        $this->assertSame("QixQixQix", $foobarqix->checkMultiplesAndOccurrences(77));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarBar", $foobarqix->checkMultiplesAndOccurrences(15));
        $this->assertSame("FooBarFoo", $foobarqix->checkMultiplesAndOccurrences(30));
        $this->assertSame("FooBarFooBar", $foobarqix->checkMultiplesAndOccurrences(345));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooQix", $foobarqix->checkMultiplesAndOccurrences(21));
        $this->assertSame("FooQixFoo", $foobarqix->checkMultiplesAndOccurrences(63));
        $this->assertSame("FooQixQix", $foobarqix->checkMultiplesAndOccurrences(147));
        $this->assertSame("FooQixQixFoo", $foobarqix->checkMultiplesAndOccurrences(273));
    }

    public function testReturnsMultiplesAndOccurrencesOf5And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("BarQix", $foobarqix->checkMultiplesAndOccurrences(140));
        $this->assertSame("BarQixQixBar", $foobarqix->checkMultiplesAndOccurrences(175));
    }

    public function testReturnsMultiplesAndOccurrencesOf3And5And7(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkMultiplesAndOccurrences(210));
        $this->assertSame("FooBarQixBar", $foobarqix->checkMultiplesAndOccurrences(105));
        $this->assertSame("FooBarQixQixFooBar", $foobarqix->checkMultiplesAndOccurrences(735));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiplesAndOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiplesAndOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiplesAndOccurrences(-1);
    }
}
