<?php

declare(strict_types=1);

require __DIR__ . '\FooBar.php';

class FooBarTest extends PHPUnit\Framework\TestCase
{
    public function testBar()
    {
        $object = new FooBar();
        $this->assertEquals("Bar", $object->checker(5));
    }

    public function testFoo()
    {
        $object = new FooBar();
        $this->assertEquals("Foo", $object->checker(3));
    }

    public function testFooBar()
    {
        $object = new FooBar();
        $this->assertEquals("Foo, Bar", $object->checker(15));
    }

    public function testIntegerToString()
    {
        $object = new FooBar();
        $this->assertEquals("string", gettype($object->checker(13)));
    }

    public function testNegativeException()
    {
        $object = new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $object->checker(-5);
    }

    public function testNotIntegerException()
    {
        $object = new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $object->checker(4.321);
    }

    public function testNotNumberException()
    {
        $object = new FooBar();
        $this->expectException(InvalidArgumentException::class);
        $object->checker("abc");
    }
    /**
     * @dataProvider provider
     */
    public function testMultipleOccurrences($expectedResult, $input)
    {
        $object = new FooBar();
        $this->assertEquals($expectedResult, $object->checker($input));
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
            array("Bar", 40),
            array("Bar", 50),
            array("Bar", 565),
            array("Bar", 9115),
            array("Foo, Bar", 30),
            array("Foo, Bar", 45),
            array("Foo, Bar", 60),
            array("Foo, Bar", 75),
            array("Foo, Bar", 90),
            array("Foo, Bar", 1515),
            array("Foo, Bar", 2220),
            array("Foo, Bar, Qix", 840),
            array("Foo, Bar, Qix", 1365),
            array("Foo, Bar, Qix", 3570),
        );
    }

    public function testQix()
    {
        $object = new FooBar();
        $this->assertEquals("Qix", $object->checker(7));
    }

    public function testFooQix()
    {
        $object = new FooBar();
        $this->assertEquals("Foo, Qix", $object->checker(21));
    }

    public function testBarQix()
    {
        $object = new FooBar();
        $this->assertEquals("Bar, Qix", $object->checker(35));
    }

    public function testFooBarQix()
    {
        $object = new FooBar();
        $this->assertEquals("Foo, Bar, Qix", $object->checker(105));
    }
}
