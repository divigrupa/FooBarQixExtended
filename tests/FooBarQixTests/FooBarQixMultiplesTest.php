<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixMultiplesTest extends TestCase
{
    public function testMultiplesOf3ReturnsFoo(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkMultiples(3));
        $this->assertSame("Foo", $foobarqix->checkMultiples(6));
    }

    public function testMultiplesOf5ReturnsBar(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkMultiples(5));
        $this->assertSame("Bar", $foobarqix->checkMultiples(10));
    }

    public function testMultiplesOf7ReturnsQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Qix", $foobarqix->checkMultiples(7));
        $this->assertSame("Qix", $foobarqix->checkMultiples(14));
    }

    public function testMultiplesOf3and5ReturnsFooBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBar", $foobarqix->checkMultiples(15));
        $this->assertSame("FooBar", $foobarqix->checkMultiples(30));
    }

    public function testMultiplesOf3and7ReturnsFooQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooQix", $foobarqix->checkMultiples(21));
        $this->assertSame("FooQix", $foobarqix->checkMultiples(42));
    }

    public function testMultiplesOf5and7ReturnsBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("BarQix", $foobarqix->checkMultiples(35));
        $this->assertSame("BarQix", $foobarqix->checkMultiples(70));
    }

    public function testMultiplesOf3and5and7ReturnsFooBarQix(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkMultiples(105));
        $this->assertSame("FooBarQix", $foobarqix->checkMultiples(210));
    }
    
    public function testNonMultiplesReturnsNumberAsString(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("1", $foobarqix->checkMultiples(1));
        $this->assertSame("4", $foobarqix->checkMultiples(4));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiples("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiples(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkMultiples(-1);
    }
}
