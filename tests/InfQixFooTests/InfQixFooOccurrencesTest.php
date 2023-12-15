<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./InfQixFoo.php");

class InfQixFooOccurrencesTest extends TestCase
{
    public function testReturnsInfAsManyTimesAs8OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf", $infqixfoo->checkOccurrences(8));
        $this->assertSame("InfInf", $infqixfoo->checkOccurrences(88));
        $this->assertSame("InfInfInf", $infqixfoo->checkOccurrences(80808));
    }
    
    public function testReturnsQixAsManyTimesAs7OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Qix", $infqixfoo->checkOccurrences(7));
        $this->assertSame("QixQix", $infqixfoo->checkOccurrences(77));
        $this->assertSame("QixQixQix", $infqixfoo->checkOccurrences(70707));
    }
    
    public function testReturnsFooAsManyTimesAs3OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Foo", $infqixfoo->checkOccurrences(3));
        $this->assertSame("FooFoo", $infqixfoo->checkOccurrences(33));
        $this->assertSame("FooFooFoo", $infqixfoo->checkOccurrences(30303));
    }

    public function testReturnsInfQixAsManyTimesAs8And7OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("InfQix", $infqixfoo->checkOccurrences(87));
        $this->assertSame("InfInfQix", $infqixfoo->checkOccurrences(80807));
    }

    public function testReturnsInfFooAsManyTimesAs8And3OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("InfFoo", $infqixfoo->checkOccurrences(83));
        $this->assertSame("InfInfFoo", $infqixfoo->checkOccurrences(80803));
    }

    public function testReturnsQixFooAsManyTimesAs7And3OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("QixFoo", $infqixfoo->checkOccurrences(73));
        $this->assertSame("QixQixFoo", $infqixfoo->checkOccurrences(70703));
    }

    public function testReturnsInfQixFooAsManyTimesAs8And7And3OccursInTheNumber(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("InfQixFoo", $infqixfoo->checkOccurrences(873));
        $this->assertSame("FooQixInf", $infqixfoo->checkOccurrences(378));
        $this->assertSame("InfQixFooQix", $infqixfoo->checkOccurrences(8737));
    }

    public function testStringInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkOccurrences("string");
    }

    public function testFloatInputThrowsTypeError(): void
    {
        $this->expectException(TypeError::class);
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkOccurrences(1.5);
    }

    public function testNegativeInputThrowsValueError(): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage("Provided value must be a positive integer");
        $infqixfoo = new InfQixFoo();
        $infqixfoo->checkOccurrences(-1);
    }
}
