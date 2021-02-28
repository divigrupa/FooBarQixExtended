<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class InfQixFooTest extends TestCase
{
    public function testIsNumber(): void
    {
        $object = new InfQixFoo();

        $this->expectException(InvalidArgumentException::class);
        $object->run('5');
    }

    public function testIsInteger(): void
    {
        $object = new InfQixFoo();

        $this->expectException(InvalidArgumentException::class);
        $object->run(1.1);
    }

    public function testIsPositive(): void
    {
        $object = new InfQixFoo();

        $this->expectException(InvalidArgumentException::class);
        $object->run(-3);
    }

    public function testOneOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("Foo", $object->run(9));
        $this->assertEquals("10", $object->run(10));
        $this->assertEquals("Qix", $object->run(14));
        $this->assertEquals("Inf", $object->run(160));
    }


    public function testTwoOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("Inf", $object->run(160));
        $this->assertEquals("Qix; Foo", $object->run(21));
        $this->assertEquals("Inf; Qix", $object->run(56));
    }

    public function testThreeOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("Inf; Qix; Foo", $object->run(504));
    }


    public function testOtherOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertIsString($object->run(1));
        $this->assertEquals("1", $object->run(1));
    }



    public function testOccuranceOneOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("Foo", $object->run(131));
        $this->assertEquals("Inf", $object->run(181));
        $this->assertEquals("Qix", $object->run(1471));
    }

    public function testOccuranceTwoOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("FooInf", $object->run(6382));
        $this->assertEquals("InfFoo", $object->run(6632));
        $this->assertEquals("FooQix", $object->run(2327));
    }

    public function testOccuranceThreeOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("FooInfQix", $object->run(328172));
        $this->assertEquals("InfFooQix", $object->run(823174));
    }


    public function testMultiplesAndOccurancesOutput(): void
    {
        $object = new InfQixFoo();

        $this->assertEquals("InfFoo", $object->run(8630));
        $this->assertEquals("Foo", $object->run(131));
        $this->assertEquals("Inf; FooInf", $object->run(480));
        $this->assertEquals("Qix; FooQix", $object->run(147));
        $this->assertEquals("InfInfInf", $object->run(88));
        $this->assertEquals("QixFooQix", $object->run(2317));
        $this->assertEquals("FooFooQix", $object->run(325170));
    }

}