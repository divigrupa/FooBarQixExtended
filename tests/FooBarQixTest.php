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

        $this->assertSame('2', $stepOne->multipleOrAndOccurrence(2));
        $this->assertSame('4', $stepOne->multipleOrAndOccurrence(4));
        $this->assertSame('16', $stepOne->multipleOrAndOccurrence(16));
    }

    public function testMultipleOfSeven()
    {
        $stepTwo = new FooBarQix();

        $this->assertSame('Qix', $stepTwo->multiple(7));
        $this->assertSame('Qix', $stepTwo->multiple(28));
        $this->assertSame('Qix', $stepTwo->multiple(56));
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

    public function testCheckOccurrenceOfNumberThree()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo', $stepThree->occurrence(31));
        $this->assertSame('Foo, Foo', $stepThree->occurrence(313));
        $this->assertSame('Foo, Foo, Foo', $stepThree->occurrence(313213));
    }

    public function testCheckOccurrenceOfNumberFive()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Bar', $stepThree->occurrence(51));
        $this->assertSame('Bar, Bar', $stepThree->occurrence(515));
        $this->assertSame('Bar, Bar, Bar', $stepThree->occurrence(5152115));
    }

    public function testCheckOccurrenceOfNumberSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Qix', $stepThree->occurrence(17));
        $this->assertSame('Qix, Qix', $stepThree->occurrence(177));
        $this->assertSame('Qix, Qix, Qix', $stepThree->occurrence(177127));
    }

    public function testCheckOccurrenceOfNumbersThreeAndFive()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo, Bar', $stepThree->occurrence(135));
        $this->assertSame('Foo, Bar, Bar', $stepThree->occurrence(31525));
        $this->assertSame('Bar, Foo, Bar', $stepThree->occurrence(1523125));
    }

    public function testCheckOccurrenceOfNumbersThreeAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo, Qix', $stepThree->occurrence(1317));
        $this->assertSame('Foo, Qix, Qix, Foo', $stepThree->occurrence(371273));
        $this->assertSame('Foo, Foo, Qix, Foo', $stepThree->occurrence(1323713));
    }

    public function testCheckOccurrenceOfNumbersFiveAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Bar, Qix', $stepThree->occurrence(517));
        $this->assertSame('Bar, Qix, Qix', $stepThree->occurrence(52717));
        $this->assertSame('Bar, Bar, Qix, Qix, Bar', $stepThree->occurrence(51571725));
    }

    public function testCheckOccurrenceOfNumbersThreeAndFiveAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo, Bar, Qix', $stepThree->occurrence(31527));
        $this->assertSame('Qix, Foo, Bar, Qix, Foo', $stepThree->occurrence(71352763));
        $this->assertSame('Bar, Qix, Foo, Bar, Qix, Bar', $stepThree->occurrence(157235175));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberThree()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo', $stepThree->multipleOrAndOccurrence(103));
        $this->assertSame('Foo, Foo', $stepThree->multipleOrAndOccurrence(3));
        $this->assertSame('Foo, Foo, Foo, Foo', $stepThree->multipleOrAndOccurrence(333));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberFive()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Bar, Bar', $stepThree->multipleOrAndOccurrence(5));
        $this->assertSame('Bar, Bar', $stepThree->multipleOrAndOccurrence(95));
        $this->assertSame('Bar, Bar, Bar', $stepThree->multipleOrAndOccurrence(55));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Qix', $stepThree->multipleOrAndOccurrence(107));
        $this->assertSame('Qix, Qix', $stepThree->multipleOrAndOccurrence(7));
        $this->assertSame('Qix, Qix, Qix', $stepThree->multipleOrAndOccurrence(77));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersThreeAndFive()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo, Bar, Bar', $stepThree->multipleOrAndOccurrence(15));
        $this->assertSame('Foo, Bar', $stepThree->multipleOrAndOccurrence(60));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersThreeAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Foo, Qix', $stepThree->multipleOrAndOccurrence(21));
        $this->assertSame('Foo, Qix', $stepThree->multipleOrAndOccurrence(37));
        $this->assertSame('Foo, Qix, Foo', $stepThree->multipleOrAndOccurrence(63));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersFiveAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Bar, Qix, Qix', $stepThree->multipleOrAndOccurrence(70));
        $this->assertSame('Bar, Qix, Qix, Bar', $stepThree->multipleOrAndOccurrence(175));
        $this->assertSame('Bar, Qix, Bar', $stepThree->multipleOrAndOccurrence(245));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersTheeAndFiveAndSeven()
    {
        $stepThree = new FooBarQix();

        $this->assertSame('Bar, Qix, Foo, Bar', $stepThree->multipleOrAndOccurrence(35));
        $this->assertSame('Foo, Bar, Qix, Bar', $stepThree->multipleOrAndOccurrence(105));
        $this->assertSame('Foo, Bar, Qix, Qix, Foo, Bar', $stepThree->multipleOrAndOccurrence(735));
    }
}