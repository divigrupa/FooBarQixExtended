<?php

use App\Models\FooBarQix;
use App\Models\Inf;
use PHPUnit\Framework\TestCase;

class InfTest extends TestCase
{
    public function testImplementation(): void
    {
        $inf = new Inf();
        $this->assertInstanceOf(FooBarQix::class, $inf);
    }

    public function testMultipleOf(): void
    {
        $inf = new Inf();
        $this->assertTrue(8 === $inf->multipleOf());
    }

    public function testName(): void
    {
        $inf = new Inf();
        $this->assertTrue('Inf' === $inf->name());
    }
}