<?php

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooTest extends TestCase
{
    public function testReturnFoo()
    {
        $foobar = new InfQixFoo();
        $result1 = $foobar->answerInf(3);

        $this->assertEquals("Foo", $result1);

        $result2 = $foobar->answerInf(6);

        $this->assertEquals("Foo", $result2);
    }

    public function testReturnQix()
    {
        $foobar = new InfQixFoo();
        $result1 = $foobar->answerInf(7);

        $this->assertEquals("Qix", $result1);

        $result2 = $foobar->answerInf(14);

        $this->assertEquals("Qix", $result2);
    }

    public function testReturnInf()
    {
        $foobar = new InfQixFoo();
        $result1 = $foobar->answerInf(8);

        $this->assertEquals("Inf", $result1);

        $result2 = $foobar->answerInf(16);

        $this->assertEquals("Inf", $result2);
    }

    public function testReturnInfQixFoo()
    {
        $foobar = new InfQixFoo();
        $result1 = $foobar->answerInf(168);

        $this->assertEquals("Inf; Qix; Foo", $result1);

        $result2 = $foobar->answerInf(336);

        $this->assertEquals("Inf; Qix; Foo", $result2);
    }

    public function testReturnOccurrences()
    {
        $foobar = new InfQixFoo();

        $result1 = $foobar->occurrences(34867);

        $this->assertEquals("3; Foo; 4; 8; Inf; 6; 7; Qix", $result1);

        $result2 = $foobar->occurrences(3891287);

        $this->assertEquals("3; Foo; 8; Inf; 9; 1; 2; 8; Inf; 7; Qix", $result2);

    }
}
