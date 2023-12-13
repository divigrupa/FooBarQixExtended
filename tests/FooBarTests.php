<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBar.php");

class FooBarTests extends TestCase
{
    public function testMultiplesOf3ReturnsFoo(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Foo", $foobar->checkFooBar(3));
        $this->assertSame("Foo", $foobar->checkFooBar(6));
    }

    public function testMultiplesOf5ReturnsBar(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Bar", $foobar->checkFooBar(5));
        $this->assertSame("Bar", $foobar->checkFooBar(10));
    }

    public function testMultiplesOf3and5ReturnsFooBar(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBar", $foobar->checkFooBar(15));
        $this->assertSame("FooBar", $foobar->checkFooBar(30));
    }
    
    public function testNonMultiplesReturnsNumberAsString(): void
    {
        $foobar = new FooBar();
        $this->assertSame("1", $foobar->checkFooBar(1));
        $this->assertSame("4", $foobar->checkFooBar(4));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBar("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBar(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobar = new FooBar();
        $foobar->checkFooBar(-1);
    }
}
