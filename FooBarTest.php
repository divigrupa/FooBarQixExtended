<?php
use PHPUnit\Framework\TestCase;

require DIR . "/../src/Classes/FooBar.php";

class FooBarTest extends TestCase
{

    public function testFoo()
    {
        $function_test = new FooBar();
        $this->assertEquals("Foo", $function_test->fooBarQix(3));
        $this->assertEquals("Foo", $function_test->fooBarQix(6));
        $this->assertEquals("Foo", $function_test->fooBarQix(9));
        $this->assertEquals("Foo", $function_test->fooBarQix(12));
    }

    public function testBar()
    {
        $function_test = new FooBar();
        $this->assertEquals("Bar", $function_test->fooBarQix(5));
        $this->assertEquals("Bar", $function_test->fooBarQix(10));
        $this->assertEquals("Bar", $function_test->fooBarQix(20));
        $this->assertEquals("Bar", $function_test->fooBarQix(40));
    }

    public function testQix()
    {
        $function_test = new FooBar();
        $this->assertEquals("Qix", $function_test->fooBarQix(7));
        $this->assertEquals("Qix", $function_test->fooBarQix(14));
        $this->assertEquals("Qix", $function_test->fooBarQix(28));
        $this->assertEquals("Qix", $function_test->fooBarQix(49));
    }

    public function testFooBar()
    {
        $function_test = new FooBar();
        $this->assertEquals("FooBar", $function_test->fooBarQix(15));
        $this->assertEquals("FooBar", $function_test->fooBarQix(30));
        $this->assertEquals("FooBar", $function_test->fooBarQix(45));
        $this->assertEquals("FooBar", $function_test->fooBarQix(60));
    }

    public function testFooQix()
    {
        $function_test = new FooBar();
        $this->assertEquals("FooQix", $function_test->fooBarQix(21));
        $this->assertEquals("FooQix", $function_test->fooBarQix(42));
        $this->assertEquals("FooQix", $function_test->fooBarQix(63));
        $this->assertEquals("FooQix", $function_test->fooBarQix(84));
    }

    public function testBarQix()
    {
        $function_test = new FooBar();
        $this->assertEquals("BarQix", $function_test->fooBarQix(35));
        $this->assertEquals("BarQix", $function_test->fooBarQix(70));
        $this->assertEquals("BarQix", $function_test->fooBarQix(140));
        $this->assertEquals("BarQix", $function_test->fooBarQix(175));

    }

    public function testFooBarQix()
    {
        $function_test = new FooBar();
        $this->assertEquals("FooBarQix", $function_test->fooBarQix(105));
        $this->assertEquals("FooBarQix", $function_test->fooBarQix(210));
        $this->assertEquals("FooBarQix", $function_test->fooBarQix(315));
        $this->assertEquals("FooBarQix", $function_test->fooBarQix(420));
    }

}
