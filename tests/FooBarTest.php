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
            $this->assertEquals($exceptResults[$i], $this->fooBar->showMultiples($i));
        }
    }

    public function testCheckNegativeInteger()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showMultiples(-1);
    }

    public function testCheckNegativeIntegerInOccurrences()
    {
        $this->expectException(Exception::class);
        $this->fooBar->showOccurrences(-1);
    }

    public function testCheckIfThreeReturnFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->showMultiples(3));
    }

    public function testCheckIfFiveReturnBar()
    {
        $this->assertEquals('Bar', $this->fooBar->showMultiples(5));
    }

    public function testCheckIfSevenReturnQix()
    {
        $this->assertEquals('Qix', $this->fooBar->showMultiples(7));
    }

    public function testCheckIfMultipleWithThreeAndFiveReturnFoobar()
    {
        $this->assertEquals('FooBar', $this->fooBar->showMultiples(3 * 5));
    }

    public function testCheckIfMultipleWithFiveAndSevenReturnBarqix()
    {
        $this->assertEquals('BarQix', $this->fooBar->showMultiples(5 * 7));
    }

    public function testCheckIfMultipleWithThreeFiveAndSevenReturnFoobarqix()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->showMultiples(3 * 5 * 7));
    }
    
    public function testCheckIfOneReturnString()
    {
        $this->assertEquals('string', gettype($this->fooBar->showMultiples(1)));
    }
    
    public function testOccurrencesWithExludedFromRules()
    {
        $numbers = [
            1, 2, 4, 6, 8, 9, 10, 11, 111, 999
        ];

        foreach ($numbers as $number) {
            $this->assertEquals($number, $this->fooBar->showOccurrences($number));
        }
    }

    public function testOccurrencesIfThreeReplacedWithFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->showOccurrences(3));
    }

    public function testOccurrencesIfFiveReplacedWithBar()
    {
        $this->assertEquals('Bar', $this->fooBar->showOccurrences(5));
    }

    public function testOccurrencesIfSevenReplacedWithQix()
    {
        $this->assertEquals('Qix', $this->fooBar->showOccurrences(7));
    }

    public function testOccurrencesIfPlainCombinationsReturnCorrectly()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->showOccurrences(357));
        $this->assertEquals('FooBar', $this->fooBar->showOccurrences(35));
        $this->assertEquals('FooQix', $this->fooBar->showOccurrences(37));
        $this->assertEquals('BarQix', $this->fooBar->showOccurrences(57));

        $this->assertEquals('QixBarFoo', $this->fooBar->showOccurrences(753));
        $this->assertEquals('QixBar', $this->fooBar->showOccurrences(75));
        $this->assertEquals('QixFoo', $this->fooBar->showOccurrences(73));
        $this->assertEquals('BarFoo', $this->fooBar->showOccurrences(53));

        $this->assertEquals('FooQixBar', $this->fooBar->showOccurrences(375));
    }

    public function testOccurrencesIfMixedCombinationsReturnCorrectly()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->showOccurrences(1357));
        $this->assertEquals('FooBarQix', $this->fooBar->showOccurrences(132547999));
        $this->assertEquals('FooBar', $this->fooBar->showOccurrences(235));
        $this->assertEquals('FooQix', $this->fooBar->showOccurrences(437));
        $this->assertEquals('BarQix', $this->fooBar->showOccurrences(657));
    }

    public function testOccurrencesIfSameNumberRowsReturnCorrectly()
    {
        $this->assertEquals('FooFooFoo', $this->fooBar->showOccurrences(333));
        $this->assertEquals('BarBarBar', $this->fooBar->showOccurrences(555));
        $this->assertEquals('QixQixQix', $this->fooBar->showOccurrences(777));
    }
}
