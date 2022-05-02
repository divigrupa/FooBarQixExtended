<?php

namespace Tests;


use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    public function testMultipleOfThree()
    {
        $stepOne = new FooBarQix();

        $this->assertSame('Foo', $stepOne->multiple(3));
        $this->assertSame('Foo', $stepOne->multiple(9));
        $this->assertSame('Foo', $stepOne->multiple(12));
    }

    public function testMultipleOfFive()
    {
        $stepOne = new FooBarQix();

        $this->assertSame('Bar', $stepOne->multiple(5));
        $this->assertSame('Bar', $stepOne->multiple(10));
        $this->assertSame('Bar', $stepOne->multiple(25));
    }

    public function testMultipleOfThreeAndFive()
    {
        $stepOne = new FooBarQix();

        $this->assertSame('Foo,Bar', $stepOne->multiple(15));
        $this->assertSame('Foo,Bar', $stepOne->multiple(45));
        $this->assertSame('Foo,Bar', $stepOne->multiple(150));
    }

    public function testReturnStringIfNotMultiple()
    {
        $stepOne = new FooBarQix();

        $this->assertSame('2', $stepOne->multiple(2));
        $this->assertSame('4', $stepOne->multiple(4));
        $this->assertSame('16', $stepOne->multiple(16));
    }
}