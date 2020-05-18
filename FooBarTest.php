<?php
use PHPUnit\Framework\TestCase;

require DIR . "/../src/Classes/FooBar.php";

class FooBarTest extends TestCase
{

    public function testFoo()
    {
        $functionTest = new FooBar();
        $this->assertEquals("Foo", $functionTest->fooBarQix(3));
        $this->assertEquals("Foo", $functionTest->fooBarQix(6));
        $this->assertEquals("Foo", $functionTest->fooBarQix(9));
        $this->assertEquals("Foo", $functionTest->fooBarQix(12));
    }

    public function testBar()
    {
        $functionTest = new FooBar();
        $this->assertEquals("Bar", $functionTest->fooBarQix(5));
        $this->assertEquals("Bar", $functionTest->fooBarQix(10));
        $this->assertEquals("Bar", $functionTest->fooBarQix(20));
        $this->assertEquals("Bar", $functionTest->fooBarQix(40));
    }

    public function testQix()
    {
        $functionTest = new FooBar();
        $this->assertEquals("Qix", $functionTest->fooBarQix(7));
        $this->assertEquals("Qix", $functionTest->fooBarQix(14));
        $this->assertEquals("Qix", $functionTest->fooBarQix(28));
        $this->assertEquals("Qix", $functionTest->fooBarQix(49));
    }

    public function testFooBar()
    {
        $functionTest = new FooBar();
        $this->assertEquals("FooBar", $functionTest->fooBarQix(15));
        $this->assertEquals("FooBar", $functionTest->fooBarQix(30));
        $this->assertEquals("FooBar", $functionTest->fooBarQix(45));
        $this->assertEquals("FooBar", $functionTest->fooBarQix(60));
    }

    public function testFooQix()
    {
        $functionTest = new FooBar();
        $this->assertEquals("FooQix", $functionTest->fooBarQix(21));
        $this->assertEquals("FooQix", $functionTest->fooBarQix(42));
        $this->assertEquals("FooQix", $functionTest->fooBarQix(63));
        $this->assertEquals("FooQix", $functionTest->fooBarQix(84));
    }

    public function testBarQix()
    {
        $functionTest = new FooBar();
        $this->assertEquals("BarQix", $functionTest->fooBarQix(35));
        $this->assertEquals("BarQix", $functionTest->fooBarQix(70));
        $this->assertEquals("BarQix", $functionTest->fooBarQix(140));
        $this->assertEquals("BarQix", $functionTest->fooBarQix(175));

    }

    public function testFooBarQix()
    {
        $functionTest = new FooBar();
        $this->assertEquals("FooBarQix", $functionTest->fooBarQix(105));
        $this->assertEquals("FooBarQix", $functionTest->fooBarQix(210));
        $this->assertEquals("FooBarQix", $functionTest->fooBarQix(315));
        $this->assertEquals("FooBarQix", $functionTest->fooBarQix(420));
    }

    public function testSpecificDigit()
    {
        $functionTest = new FooBar();
        $this->assertEquals("Foo", $functionTest->specificDigit(3));
        $this->assertEquals("Bar", $functionTest->specificDigit(5));
        $this->assertEquals("Qix", $functionTest->specificDigit(7));
        $this->assertEquals("FooFooFoo", $functionTest->specificDigit(333));
        $this->assertEquals("BarBarBar", $functionTest->specificDigit(555));
        $this->assertEquals("QixQixQix", $functionTest->specificDigit(777));
        $this->assertEquals("FooBarQix", $functionTest->specificDigit(357));
        $this->assertEquals("QixBarFoo", $functionTest->specificDigit(753));
        $this->assertEquals("BarFooBar", $functionTest->specificDigit(535));
        $this->assertEquals("FooQixBarQixFoo", $functionTest->specificDigit(37573));
    }

    public function testBothFunctions()
    {
        $functionTest = new FooBar();
        $this->assertEquals("Foo", $functionTest->specificDigit(3));
        $this->assertEquals("Foo", $functionTest->fooBarQix(3));

        $this->assertEquals("Bar", $functionTest->specificDigit(15));
        $this->assertEquals("FooBar", $functionTest->fooBarQix(15));

        $this->assertEquals("FooBar", $functionTest->specificDigit(315));
        $this->assertEquals("FooBarQix", $functionTest->fooBarQix(315));

    }

}
