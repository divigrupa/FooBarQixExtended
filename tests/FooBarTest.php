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

    public function testCheckNegativeIntegerInNewrules()
    {
        $this->expectException(Exception::class);
        $this->fooBar->newRules(-1);
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

    public function testCheckIfMultipleWithThreeAndFiveReturnFoobar()
    {
        $this->assertEquals('FooBar', $this->fooBar->run(3 * 5));
    }

    public function testCheckIfMultipleWithFiveAndSevenReturnBarqix()
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
    
    public function testNewRulesWithExludedFromRules()
    {
        $numbers = [
            1, 2, 4, 6, 8, 9, 10, 11, 111, 999
        ];

        foreach ($numbers as $number) {
            $this->assertEquals($number, $this->fooBar->newRules($number));
        }
    }

    public function testNewRulesIfThreeReplacedWithFoo()
    {
        $this->assertEquals('Foo', $this->fooBar->newRules(3));
    }

    public function testNewRulesIfFiveReplacedWithBar()
    {
        $this->assertEquals('Bar', $this->fooBar->newRules(5));
    }

    public function testNewRulesIfSevenReplacedWithQix()
    {
        $this->assertEquals('Qix', $this->fooBar->newRules(7));
    }

    public function testNewRulesIfPlainCombinationsReturnCorrectly()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->newRules(357));
        $this->assertEquals('FooBar', $this->fooBar->newRules(35));
        $this->assertEquals('FooQix', $this->fooBar->newRules(37));
        $this->assertEquals('BarQix', $this->fooBar->newRules(57));

        $this->assertEquals('QixBarFoo', $this->fooBar->newRules(753));
        $this->assertEquals('QixBar', $this->fooBar->newRules(75));
        $this->assertEquals('QixFoo', $this->fooBar->newRules(73));
        $this->assertEquals('BarFoo', $this->fooBar->newRules(53));

        $this->assertEquals('FooQixBar', $this->fooBar->newRules(375));
    }

    public function testNewRulesIfMixedCombinationsReturnCorrectly()
    {
        $this->assertEquals('FooBarQix', $this->fooBar->newRules(1357));
        $this->assertEquals('FooBarQix', $this->fooBar->newRules(132547999));
        $this->assertEquals('FooBar', $this->fooBar->newRules(235));
        $this->assertEquals('FooQix', $this->fooBar->newRules(437));
        $this->assertEquals('BarQix', $this->fooBar->newRules(657));
    }

    public function testNewRulesIfSameNumberRowsReturnCorrectly()
    {
        $this->assertEquals('FooFooFoo', $this->fooBar->newRules(333));
        $this->assertEquals('BarBarBar', $this->fooBar->newRules(555));
        $this->assertEquals('QixQixQix', $this->fooBar->newRules(777));
    }
}
