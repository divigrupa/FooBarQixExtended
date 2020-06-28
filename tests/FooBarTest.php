<?php

use \Codeception\Test\Unit;
use \FooBar\FooBar;

// @codingStandardsIgnoreLine
class FooBarTest extends Unit
{
    private $fooBar = null;

    // @codingStandardsIgnoreLine
    protected function _before()
    {
        $this->fooBar = new FooBar;
    }

    public function testCheckFirstFifteenNumbersStatically()
    {
        $exceptResults = [
            '',
            '1',
            '2',
            'Foo',
            '4',
            'Bar',
            'Foo',
            'Qix',
            '8',
            'Foo',
            'Bar',
            '11',
            'Foo',
            '13',
            'Qix',
            'FooBar'
        ];

        for ($i = 1; $i <= 15; $i++) {
            $this->assertEquals($exceptResults[$i], $this->fooBar->run($i));
        }
    }

    public function testCheckNegativeInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->run(-1);
    }

    public function testCheckIfThreeReturnFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->run(3));
    }

    public function testCheckIfFiveReturnBar()
    {
        $this->assertEquals('Bar', $this->fooBar->run(5));
    }

    public function testCheckIfSevenReturnQix()
    {
        $this->assertEquals('Qix', $this->fooBar->run(7));
    }

    public function testCheckIfMultipleWithThreeAndFiveReturFoobar()
    {
        $this->assertEquals('FooBar', $this->fooBar->run(3 * 5));
    }

    public function testCheckIfMultipleWithFiveAndSevenReturBarqix()
    {
        $this->assertEquals('BarQix', $this->fooBar->run(5 * 7));
    }

    public function testCheckIfMultipleWithThreeFiveAndSevenReturnFoobarqix()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->run(3 * 5 * 7));
    }
    
    public function testCheckIfOneReturnString()
    {
        $this->assertEquals('string', gettype($this->fooBar->run(1)));
    }
}
