<?php

use App\Models\FooBarQix;
use App\Models\Qix;
use PHPUnit\Framework\TestCase;

class QixTest extends TestCase
{
    public function testImplementation(): void
    {
        $qix = new Qix();
        $this->assertInstanceOf(FooBarQix::class, $qix);
    }

    public function testMultipleOf(): void
    {
        $qix = new Qix();
        $this->assertTrue(7 === $qix->multipleOf());
    }

    public function testName(): void
    {
        $qix = new Qix();
        $this->assertTrue('Qix' === $qix->name());
    }
}