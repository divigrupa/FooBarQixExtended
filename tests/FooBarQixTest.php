<?php

namespace Tests;

use App\FooBarQix;
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

        $this->assertSame('Foo, Bar', $stepOne->multiple(15));
        $this->assertSame('Foo, Bar', $stepOne->multiple(45));
        $this->assertSame('Foo, Bar', $stepOne->multiple(150));
    }

    public function testReturnStringIfNotMultiple()
    {
        $stepOne = new FooBarQix();

        $this->assertSame('2', $stepOne->multiple(2));
        $this->assertSame('4', $stepOne->multiple(4));
        $this->assertSame('16', $stepOne->multiple(16));
    }

    public function testMultipleOfSeven()
    {
        $stepTwo = new FooBarQix();

        $this->assertSame('Qix', $stepTwo->multiple(7));
        $this->assertSame('Qix', $stepTwo->multiple(28));
        $this->assertSame('Qix', $stepTwo->multiple(42));
    }

    public function testMultipleOfThreeAndSeven()
    {
        $stepTwo = new FooBarQix();

        $this->assertSame('Foo, Qix', $stepTwo->multiple(21));
        $this->assertSame('Foo, Qix', $stepTwo->multiple(63));
        $this->assertSame('Foo, Qix', $stepTwo->multiple(126));
    }

    public function testMultipleOfFiveAndSeven()
    {
        $stepTwo = new FooBarQix();

        $this->assertSame('Bar, Qix', $stepTwo->multiple(35));
        $this->assertSame('Bar, Qix', $stepTwo->multiple(70));
        $this->assertSame('Bar, Qix', $stepTwo->multiple(140));
    }

    public function testMultipleOfThreeAndFiveAndSeven()
    {
        $stepTwo = new FooBarQix();

        $this->assertSame('Foo, Bar, Qix', $stepTwo->multiple(105));
        $this->assertSame('Foo, Bar, Qix', $stepTwo->multiple(420));
        $this->assertSame('Foo, Bar, Qix', $stepTwo->multiple(630));
    }
}