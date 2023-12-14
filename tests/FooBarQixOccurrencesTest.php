<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./FooBar.php");

class FooBarQixOccurrencesTest extends TestCase
{
    public function testReturnsFooAsManyTimesAs3OccursInTheNumber(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Foo", $foobar->checkFooBarQixOccurrences(3));
        $this->assertSame("FooFoo", $foobar->checkFooBarQixOccurrences(33));
        $this->assertSame("FooFooFoo", $foobar->checkFooBarQixOccurrences(30303));
    }

    public function testReturnsBarAsManyTimesAs5OccursInTheNumber(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Bar", $foobar->checkFooBarQixOccurrences(5));
        $this->assertSame("BarBar", $foobar->checkFooBarQixOccurrences(55));
        $this->assertSame("BarBarBar", $foobar->checkFooBarQixOccurrences(50505));
    }

    public function testReturnsQixAsManyTimesAs7OccursInTheNumber(): void
    {
        $foobar = new FooBar();
        $this->assertSame("Qix", $foobar->checkFooBarQixOccurrences(7));
        $this->assertSame("QixQix", $foobar->checkFooBarQixOccurrences(77));
        $this->assertSame("QixQixQix", $foobar->checkFooBarQixOccurrences(70707));
    }

    public function testReturnsFooBarAsManyTimesAs3And5OccursInTheNumber(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBar", $foobar->checkFooBarQixOccurrences(35));
        $this->assertSame("FooBarBar", $foobar->checkFooBarQixOccurrences(3505));
    }

    public function testReturnsFooBarQixAsManyTimesAs3And5And7OccursInTheNumber(): void
    {
        $foobar = new FooBar();
        $this->assertSame("FooBarQix", $foobar->checkFooBarQixOccurrences(357));
        $this->assertSame("FooBarQixQix", $foobar->checkFooBarQixOccurrences(3577));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $foobar = new FooBar();
        $foobar->checkFooBarQixOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $foobar = new FooBar();
        $foobar->checkFooBarQixOccurrences(-1);
    }
}
