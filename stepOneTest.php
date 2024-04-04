<?php

use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

require 'stepOneFunctions.php'; 

class FooBarTest extends TestCase
{
    public function testFoo()
    {
        $this->assertEquals('Foo', foobar(3));
        $this->assertEquals('Foo', foobar(6));
        $this->assertEquals('Foo', foobar(9));
    }

    public function testBar()
    {
        $this->assertEquals('Bar', foobar(5));
        $this->assertEquals('Bar', foobar(10));
        $this->assertEquals('Bar', foobar(20));
    }


    public function testUnchangedNumber()
    {
        $this->assertEquals('1', foobar(1));
        $this->assertEquals('2', foobar(2));
        $this->assertEquals('4', foobar(4));
        $this->assertEquals('7', foobar(7));
    }

    public function testNegativeNumber()
    {
        $this->assertEquals('Please provide a positive integer', foobar(-3));
    }

    public function testNonIntegerInput()
    {
        $this->assertEquals('Please provide a positive integer', foobar('abc'));
    }

    public function testFloatInput()
    {
        $this->assertEquals('Please provide a positive integer', foobar(3.14));
    }
}