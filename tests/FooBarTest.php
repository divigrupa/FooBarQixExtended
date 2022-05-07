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
}
