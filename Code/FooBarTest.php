<?php
require __DIR__ . '\FooBar.php';

use FooBar;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testBar()
    {
        $Object =  new FooBar();
        $this->assertEquals("Bar", $Object->Checker(5));
    }

    public function testFoo()
    {
        $Object =  new FooBar();
        $this->assertEquals("Foo", $Object->Checker(3));
    }

    public function testFooBar()
    {
        $Object =  new FooBar();
        $this->assertEquals("Foo, Bar", $Object->Checker(15));
    }

    public function testIntegerToString()
    {
        $Object =  new FooBar();
        $this->assertEquals(13, $Object->Checker(13));
    }

    public function testNegativeException()
    {
        $Object =  new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $Object->Checker(-5);
    }

    public function testNotIntegerException()
    {
        $Object =  new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $Object->Checker(4.321);
    }

    public function testNotNumberException()
    {
        $Object =  new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $Object->Checker("abc");
    }

    /**
     * @dataProvider provider
     */

    public function testMultipleOccurences($expectedResult, $input)
    {
        $Object =  new FooBar();
        $this->assertEquals($expectedResult, $Object->Checker($input));
    }

    public function provider()
    {
        return array(
            array("Foo", 6),
            array("Foo", 9),
            array("Foo", 12),
            array("Foo", 18),
            array("Foo", 33),
            array("Foo", 99),
            array("Foo", 1503),
            array("Bar", 10),
            array("Bar", 20),
            array("Bar", 25),
            array("Bar", 35),
            array("Bar", 50),
            array("Bar", 560),
            array("Bar", 9115),
            array("Foo, Bar", 30),
            array("Foo, Bar", 45),
            array("Foo, Bar", 60),
            array("Foo, Bar", 75),
            array("Foo, Bar", 90),
            array("Foo, Bar", 1515),
            array("Foo, Bar", 2220),
        );
    }
}
