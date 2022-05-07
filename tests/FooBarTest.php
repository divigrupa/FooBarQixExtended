<?php

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testReturnFoo()
    {
        $foobar = new FooBarQix();
        $result1 = $foobar->answer(3);

        $this->assertEquals("Foo", $result1);

        $result2 = $foobar->answer(6);

        $this->assertEquals("Foo", $result2);
    }

    public function testReturnBar()
    {
        $foobar = new FooBarQix();
        $result1 = $foobar->answer(5);

        $this->assertEquals("Bar", $result1);

        $result2 = $foobar->answer(10);

        $this->assertEquals("Bar", $result2);
    }

    public function testReturnFooBar()
    {
        $foobar = new FooBarQix();
        $result1 = $foobar->answer(15);

        $this->assertEquals("Foo, Bar", $result1);

        $result2 = $foobar->answer(30);

        $this->assertEquals("Foo, Bar", $result2);
    }

    public function testReturnQix()
    {
        $foobar = new FooBarQix();
        $result1 = $foobar->answer(7);

        $this->assertEquals("Qix", $result1);

        $result2 = $foobar->answer(14);

        $this->assertEquals("Qix", $result2);
    }

    public function testReturnFooBarQix()
    {
        $foobar = new FooBarQix();
        $result1 = $foobar->answer(105);

        $this->assertEquals("Foo, Bar, Qix", $result1);

        $result2 = $foobar->answer(210);

        $this->assertEquals("Foo, Bar, Qix", $result2);
    }

    public function testReturnOccurrences()
    {
        $foobar = new FooBarQix();

        $result1 = $foobar->occurrences(34567);

        $this->assertEquals("3, Foo, 4, 5, Bar, 6, 7, Qix", $result1);

        $result2 = $foobar->occurrences(3391277);

        $this->assertEquals("3, Foo, 3, Foo, 9, 1, 2, 7, Qix, 7, Qix", $result2);

    }

    public function testReturnAnswerOrOccurrences()
    {
        $foobar = new FooBarQix();

        $result1 = $foobar->answerOrOccurrences(34567);

        $this->assertEquals("3, Foo, 4, 5, Bar, 6, 7, Qix", $result1);

        $result2 = $foobar->answerOrOccurrences(3);

        $this->assertEquals("Foo", $result2);
    }
}
