<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./InfQixFoo.php");

class InfQixFooSumTest extends TestCase
{
    public function testDigitsAddUpTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("Inf", $infqixfoo->checkDigitSum(17));
    }

    public function testDigitsDoesntAddUpTo8(): void
    {
        $infqixfoo = new InfQixFoo();
        $this->assertSame("", $infqixfoo->checkDigitSum(14));
    }
}
