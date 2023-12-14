<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBar.php");

class FooBarQixMultiplesTests extends TestCase
{
    public function testMultiplesOf3ReturnsFoo(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Foo", $foobar->checkFooBarQixMultiples(3));
        $this->assertSame("Foo", $foobar->checkFooBarQixMultiples(6));
    }

    public function testMultiplesOf5ReturnsBar(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Bar", $foobar->checkFooBarQixMultiples(5));
        $this->assertSame("Bar", $foobar->checkFooBarQixMultiples(10));
    }

    public function testMultiplesOf3and5ReturnsFooBar(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBar", $foobar->checkFooBarQixMultiples(15));
        $this->assertSame("FooBar", $foobar->checkFooBarQixMultiples(30));
    }

    public function testMultiplesOf3and7ReturnsFooQix(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooQix", $foobar->checkFooBarQixMultiples(21));
        $this->assertSame("FooQix", $foobar->checkFooBarQixMultiples(42));
    }

    public function testMultiplesOf5and7ReturnsBarQix(): void
    {
        $foobar = new FooBar();
        $this->assertSame("BarQix", $foobar->checkFooBarQixMultiples(35));
        $this->assertSame("BarQix", $foobar->checkFooBarQixMultiples(70));
    }

    public function testMultiplesOf3and5and7ReturnsFooBarQix(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBarQix", $foobar->checkFooBarQixMultiples(105));
        $this->assertSame("FooBarQix", $foobar->checkFooBarQixMultiples(210));
    }
    
    public function testNonMultiplesReturnsNumberAsString(): void
    {
        $foobar = new FooBar();
        $this->assertSame("1", $foobar->checkFooBarQixMultiples(1));
        $this->assertSame("4", $foobar->checkFooBarQixMultiples(4));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiples("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiples(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobar = new FooBar();
        $foobar->checkFooBarQixMultiples(-1);
    }
}
