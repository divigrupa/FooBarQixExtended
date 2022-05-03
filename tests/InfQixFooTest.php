<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class InfQixFooTest extends TestCase
{
    public function testMultipleOfEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf', $stepFour->multiple(8));
        $this->assertSame('Inf', $stepFour->multiple(16));
    }

    public function testMultipleOfSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix', $stepFour->multiple(7));
        $this->assertSame('Qix', $stepFour->multiple(28));
    }

    public function testMultipleOfThree()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo', $stepFour->multiple(3));
        $this->assertSame('Foo', $stepFour->multiple(9));
    }

    public function testMultipleOfThreeAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Foo', $stepFour->multiple(24));
        $this->assertSame('Inf; Foo', $stepFour->multiple(72));
    }

    public function testMultipleOfThreeAndSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix; Foo', $stepFour->multiple(21));
        $this->assertSame('Qix; Foo', $stepFour->multiple(63));
    }

    public function testMultipleOfSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Qix', $stepFour->multiple(56));
        $this->assertSame('Inf; Qix', $stepFour->multiple(224));
    }

    public function testMultipleOfThreeAndSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Qix; Foo', $stepFour->multiple(168));
        $this->assertSame('Inf; Qix; Foo', $stepFour->multiple(672));
    }

    public function testCheckOccurrenceOfNumberThree()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo', $stepFour->occurrence(31));
        $this->assertSame('Foo; Foo', $stepFour->occurrence(313));
        $this->assertSame('Foo; Foo; Foo', $stepFour->occurrence(313213));
    }

    public function testCheckOccurrenceOfNumberSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix', $stepFour->occurrence(17));
        $this->assertSame('Qix; Qix', $stepFour->occurrence(177));
        $this->assertSame('Qix; Qix; Qix', $stepFour->occurrence(177127));
    }

    public function testCheckOccurrenceOfNumberEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf', $stepFour->occurrence(18));
        $this->assertSame('Inf; Inf', $stepFour->occurrence(818));
        $this->assertSame('Inf; Inf; Inf', $stepFour->occurrence(812848));
    }

    public function checkOccurrenceOfNumberThreeAndSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo; Qix', $stepFour->occurrence(1317));
        $this->assertSame('Foo; Qix; Qix; Foo', $stepFour->occurrence(371273));
        $this->assertSame('Foo; Foo; Qix; Foo', $stepFour->occurrence(1323713));
    }

    public function checkOccurrenceOfNumberThreeAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo; Inf', $stepFour->occurrence(138));
        $this->assertSame('Foo; Inf; Inf; Foo', $stepFour->occurrence(318823));
        $this->assertSame('Foo; Foo; Inf; Foo', $stepFour->occurrence(2303813));
    }

    public function checkOccurrenceOfNumberSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix; Inf', $stepFour->occurrence(1728));
        $this->assertSame('Qix; Inf; Inf; Qix', $stepFour->occurrence(7182807));
        $this->assertSame('Inf; Qix; Inf; Inf', $stepFour->occurrence(817288));
    }

    public function checkOccurrenceOfNumberThreeAndSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo; Qix; Inf', $stepFour->occurrence(31708));
        $this->assertSame('Inf; Qix; Foo; Qix; Inf', $stepFour->occurrence(80763718));
        $this->assertSame('Qix, Foo; Qix; Inf; Foo', $stepFour->occurrence(70317893));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberThree()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Foo', $stepFour->multipleOrAndOccurrence(103));
        $this->assertSame('Foo; Foo', $stepFour->multipleOrAndOccurrence(3));
        $this->assertSame('Foo; Foo; Foo; Foo', $stepFour->multipleOrAndOccurrence(333));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix', $stepFour->multipleOrAndOccurrence(107));
        $this->assertSame('Qix; Qix', $stepFour->multipleOrAndOccurrence(7));
        $this->assertSame('Qix; Qix; Qix', $stepFour->multipleOrAndOccurrence(77));
    }

    public function testChecksForMultipleAndOccurrenceOfNumberEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf', $stepFour->multipleOrAndOccurrence(16));
        $this->assertSame('Inf; Inf', $stepFour->multipleOrAndOccurrence(8));
        $this->assertSame('Inf; Inf; Inf', $stepFour->multipleOrAndOccurrence(88));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersThreeAndSeven()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Qix; Foo', $stepFour->multipleOrAndOccurrence(21));
        $this->assertSame('Foo; Qix', $stepFour->multipleOrAndOccurrence(37));
        $this->assertSame('Qix; Foo; Foo', $stepFour->multipleOrAndOccurrence(63));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersThreeAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Foo', $stepFour->multipleOrAndOccurrence(24));
        $this->assertSame('Inf; Foo; Inf', $stepFour->multipleOrAndOccurrence(48));
        $this->assertSame('Inf; Foo; Foo', $stepFour->multipleOrAndOccurrence(312));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Qix', $stepFour->multipleOrAndOccurrence(56));
        $this->assertSame('Inf; Qix; Inf', $stepFour->multipleOrAndOccurrence(448));
        $this->assertSame('Inf; Qix; Qix; Inf', $stepFour->multipleOrAndOccurrence(728));
    }

    public function testChecksForMultipleAndOccurrenceOfNumbersThreeAndSevenAndEight()
    {
        $stepFour = new InfQixFoo();

        $this->assertSame('Inf; Qix; Foo; Inf', $stepFour->multipleOrAndOccurrence(168));
        $this->assertSame('Inf; Qix; Foo; Inf; Inf', $stepFour->multipleOrAndOccurrence(1848));
        $this->assertSame('Inf; Qix; Foo; Foo; Inf', $stepFour->multipleOrAndOccurrence(3528));
    }
}