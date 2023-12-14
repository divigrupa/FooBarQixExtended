<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixMultiplesTest extends TestCase
{
    public function testMultiplesOf3ReturnsFoo(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkFooBarQixMultiples(3));
        $this->assertSame("Foo", $foobarqix->checkFooBarQixMultiples(6));
    }

    public function testMultiplesOf5ReturnsBar(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkFooBarQixMultiples(5));
        $this->assertSame("Bar", $foobarqix->checkFooBarQixMultiples(10));
    }

    public function testMultiplesOf3and5ReturnsFooBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBar", $foobarqix->checkFooBarQixMultiples(15));
        $this->assertSame("FooBar", $foobarqix->checkFooBarQixMultiples(30));
    }

    public function testMultiplesOf3and7ReturnsFooQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooQix", $foobarqix->checkFooBarQixMultiples(21));
        $this->assertSame("FooQix", $foobarqix->checkFooBarQixMultiples(42));
    }

    public function testMultiplesOf5and7ReturnsBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("BarQix", $foobarqix->checkFooBarQixMultiples(35));
        $this->assertSame("BarQix", $foobarqix->checkFooBarQixMultiples(70));
    }

    public function testMultiplesOf3and5and7ReturnsFooBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkFooBarQixMultiples(105));
        $this->assertSame("FooBarQix", $foobarqix->checkFooBarQixMultiples(210));
    }
    
    public function testNonMultiplesReturnsNumberAsString(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("1", $foobarqix->checkFooBarQixMultiples(1));
        $this->assertSame("4", $foobarqix->checkFooBarQixMultiples(4));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiples("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiples(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixMultiples(-1);
    }
}
