<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixOccurrencesTest extends TestCase
{
    public function testReturnsFooAsManyTimesAs3OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkOccurrences(3));
        $this->assertSame("FooFoo", $foobarqix->checkOccurrences(33));
        $this->assertSame("FooFooFoo", $foobarqix->checkOccurrences(30303));
    }

    public function testReturnsBarAsManyTimesAs5OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkOccurrences(5));
        $this->assertSame("BarBar", $foobarqix->checkOccurrences(55));
        $this->assertSame("BarBarBar", $foobarqix->checkOccurrences(50505));
    }

    public function testReturnsQixAsManyTimesAs7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Qix", $foobarqix->checkOccurrences(7));
        $this->assertSame("QixQix", $foobarqix->checkOccurrences(77));
        $this->assertSame("QixQixQix", $foobarqix->checkOccurrences(70707));
    }

    public function testReturnsFooBarAsManyTimesAs3And5OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBar", $foobarqix->checkOccurrences(35));
        $this->assertSame("FooBarBar", $foobarqix->checkOccurrences(3505));
    }

    public function testReturnsFooBarAsManyTimesAs3And7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooQix", $foobarqix->checkOccurrences(37));
        $this->assertSame("FooQixQix", $foobarqix->checkOccurrences(3707));
    }

    public function testReturnsFooBarAsManyTimesAs5And7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("BarQix", $foobarqix->checkOccurrences(57));
        $this->assertSame("BarQixQix", $foobarqix->checkOccurrences(5707));
    }

    public function testReturnsFooBarQixAsManyTimesAs3And5And7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkOccurrences(357));
        $this->assertSame("FooBarQixQix", $foobarqix->checkOccurrences(3577));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkOccurrences(-1);
    }
}
