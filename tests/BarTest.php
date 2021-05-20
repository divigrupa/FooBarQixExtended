<?php

use App\Models\Bar;
use App\Models\FooBarQix;
use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    public function testImplementation(): void
    {
        $bar = new Bar();
        $this->assertInstanceOf(FooBarQix::class, $bar);
    }

    public function testMultipleOf(): void
    {
        $bar = new Bar();
        $this->assertTrue(5 === $bar->multipleOf());
    }

    public function testName(): void
    {
        $bar = new Bar();
        $this->assertTrue('Bar' === $bar->name());
    }
}