<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBarQix.php");

class FooBarQixOccurrencesTest extends TestCase
{
    public function testReturnsFooAsManyTimesAs3OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Foo", $foobarqix->checkFooBarQixOccurrences(3));
        $this->assertSame("FooFoo", $foobarqix->checkFooBarQixOccurrences(33));
        $this->assertSame("FooFooFoo", $foobarqix->checkFooBarQixOccurrences(30303));
    }

    public function testReturnsBarAsManyTimesAs5OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Bar", $foobarqix->checkFooBarQixOccurrences(5));
        $this->assertSame("BarBar", $foobarqix->checkFooBarQixOccurrences(55));
        $this->assertSame("BarBarBar", $foobarqix->checkFooBarQixOccurrences(50505));
    }

    public function testReturnsQixAsManyTimesAs7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("Qix", $foobarqix->checkFooBarQixOccurrences(7));
        $this->assertSame("QixQix", $foobarqix->checkFooBarQixOccurrences(77));
        $this->assertSame("QixQixQix", $foobarqix->checkFooBarQixOccurrences(70707));
    }

    public function testReturnsFooBarAsManyTimesAs3And5OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBar", $foobarqix->checkFooBarQixOccurrences(35));
        $this->assertSame("FooBarBar", $foobarqix->checkFooBarQixOccurrences(3505));
    }

    public function testReturnsFooBarQixAsManyTimesAs3And5And7OccursInTheNumber(): void
    {
        $foobarqix = new FooBarQix();
        $this->assertSame("FooBarQix", $foobarqix->checkFooBarQixOccurrences(357));
        $this->assertSame("FooBarQixQix", $foobarqix->checkFooBarQixOccurrences(3577));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobarqix = new FooBarQix();
        $foobarqix->checkFooBarQixOccurrences(-1);
    }
}
