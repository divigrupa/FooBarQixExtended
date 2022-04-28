<?php declare(strict_types=1);

namespace Tests;

require 'vendor/autoload.php';

use App\FooBarQix;
use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class FooBarQixTest extends TestCase
{
    // Tests check if is multiple

    public function test3Foo(): void
    {
        $step1 = new FooBarQix;

        $this->assertSame('Foo', $step1->isMultiple(3));
    }

    public function test5Bar(): void
    {
        $step1 = new FooBarQix;

        $this->assertSame('Bar', $step1->isMultiple(5));
    }

    public function test7Qix(): void
    {
        $step2 = new FooBarQix;

        $this->assertSame('Qix', $step2->isMultiple(7));
    }

    public function test357FooBarQix(): void
    {
        $step2 = new FooBarQix;

        $this->assertSame('Foo, Bar, Qix', $step2->isMultiple(105));
    }


    //Tests check if contains multiple

    public function testContains3Foo(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Foo', $step3->ifContainsMultiple(3));
    }

    public function testContains5Bar(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Bar', $step3->ifContainsMultiple(5));
    }

    public function testContains7Qix(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Qix', $step3->ifContainsMultiple(7));
    }

    public function testContains35FooBar(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('FooBar', $step3->ifContainsMultiple(35));
    }

    public function testContains57BarQix(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('BarQix', $step3->ifContainsMultiple(57));
    }

    public function testContains73QixFoo(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('QixFoo', $step3->ifContainsMultiple(73));
    }


    // Tests to check if both functionalities work together

    public function testBoth3(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Foo Foo', $step3->isMultipleAndContainsMultiple(3));
    }

    public function testBoth5(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Bar Bar', $step3->isMultipleAndContainsMultiple(5));
    }

    public function testBoth7(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Qix Qix', $step3->isMultipleAndContainsMultiple(7));
    }

    public function testBoth30(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Foo, Bar Foo', $step3->isMultipleAndContainsMultiple(30));
    }

    public function testBoth35(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Bar, Qix FooBar', $step3->isMultipleAndContainsMultiple(35));
    }

    public function testBoth21(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Foo, Qix', $step3->isMultipleAndContainsMultiple(21));
    }

    public function testBoth735(): void
    {
        $step3 = new FooBarQix;

        $this->assertSame('Foo, Bar, Qix QixFooBar', $step3->isMultipleAndContainsMultiple(735));
    }


    // Tests to check multiple for InfQixFoo

    public function test3FooSecond(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Foo', $step4->isMultiple(3));
    }

    public function test7QixSecond(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Qix', $step4->isMultiple(7));
    }

    public function test8Inf(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Inf', $step4->isMultiple(8));
    }

    public function test56Inf(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Inf; Qix', $step4->isMultiple(56));
    }

    public function test24Inf(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Inf; Foo', $step4->isMultiple(24));
    }


    // Tests check if contains multiple InfQixFoo

    public function testContains8Inf(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Inf', $step4->ifContainsMultiple(8));
    }

    public function testContains7QixSecond(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Qix', $step4->ifContainsMultiple(7));
    }

    public function testContains3FooSecond(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Foo', $step4->ifContainsMultiple(3));
    }

    public function testContains287(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('InfQix', $step4->ifContainsMultiple(287));
    }

    public function testContains238(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('FooInf', $step4->ifContainsMultiple(238));
    }


    // Tests for both functionalities InfQixFoo

    public function testBoth378(): void
    {
        $step4 = new InfQixFoo;

        $this->assertSame('Qix; Foo FooQixInf', $step4->isMultipleAndContainsMultiple(378));
    }


    // Tests to check all functionality

    public function testIs8(): void
    {
        $step5 = new InfQixFoo;

        $this->assertSame('Qix FooInf', $step5->sumAll8(35));
    }

    public function testIsNot8(): void
    {
        $step5 = new InfQixFoo;

        $this->assertSame('Qix Qix', $step5->sumAll8(70));
    }

}


