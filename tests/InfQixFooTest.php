<?php

declare(strict_types=1);

namespace Divi\Test;

use \InvalidArgumentException;
use PHPUnit\Framework\TestCase;


class InfQixFooTest extends TestCase
{
    public function testIsNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new InfQixFoo('5');
        $object->run();
    }

    public function testIsInteger(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new InfQixFoo(1.1);
        $object->run();
    }

    public function testIsPositive(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $object = new InfQixFoo(-3);
        $object->run();
    }

    public function testOneOutput(): void
    {
        $object = new InfQixFoo(9);
        $this->assertEquals("Foo", $object->run());

        $object = new InfQixFoo(10);
        $this->assertEquals("10", $object->run());

        $object = new InfQixFoo(14);
        $this->assertEquals("Qix", $object->run());

        $object = new InfQixFoo(160);
        $this->assertEquals("Inf", $object->run());
    }


    public function testTwoOutput(): void
    {
        $object = new InfQixFoo(160);
        $this->assertEquals("Inf", $object->run());

        $object = new InfQixFoo(21);
        $this->assertEquals("Qix; Foo", $object->run());

        $object = new InfQixFoo(56);
        $this->assertEquals("Inf; Qix", $object->run());
    }

    public function testThreeOutput(): void
    {
        $object = new InfQixFoo(504);
        $this->assertEquals("Inf; Qix; Foo", $object->run());
    }


    public function testOtherOutput(): void
    {
        $object = new InfQixFoo(1);
        $this->assertIsString($object->run());
        $this->assertEquals("1", $object->run());
    }


    public function testOccuranceOneOutput(): void
    {
        $object = new InfQixFoo(131);
        $this->assertEquals("Foo", $object->run());

        $object = new InfQixFoo(181);
        $this->assertEquals("Inf", $object->run());

        $object = new InfQixFoo(1471);
        $this->assertEquals("Qix", $object->run());
    }

    public function testOccuranceTwoOutput(): void
    {
        $object = new InfQixFoo(6382);
        $this->assertEquals("FooInf", $object->run());

        $object = new InfQixFoo(6632);
        $this->assertEquals("InfFoo", $object->run());

        $object = new InfQixFoo(2327);
        $this->assertEquals("FooQix", $object->run());
    }

    public function testOccuranceThreeOutput(): void
    {
        $object = new InfQixFoo(328172);
        $this->assertEquals("FooInfQix", $object->run());

        $object = new InfQixFoo(823174);
        $this->assertEquals("InfFooQix", $object->run());
    }


    public function testMultiplesAndOccurancesOutput(): void
    {
        $object = new InfQixFoo(8630);
        $this->assertEquals("InfFoo", $object->run());

        $object = new InfQixFoo(131);
        $this->assertEquals("Foo", $object->run());

        $object = new InfQixFoo(480);
        $this->assertEquals("Inf; FooInf", $object->run());

        $object = new InfQixFoo(147);
        $this->assertEquals("Qix; FooQix", $object->run());

        $object = new InfQixFoo(77);
        $this->assertEquals("QixQixQix", $object->run());

        $object = new InfQixFoo(2317);
        $this->assertEquals("QixFooQix", $object->run());

        $object = new InfQixFoo(325170);
        $this->assertEquals("FooFooQix", $object->run());
    }

    public function testDigitSumOutput(): void
    {
        $object = new InfQixFoo(422);
        $this->assertEquals("Inf", $object->run());

        $object = new InfQixFoo(71);
        $this->assertEquals("QixInf", $object->run());

        $object = new InfQixFoo(88);
        $this->assertEquals("InfInfInfInf", $object->run());
    }

}