<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals('Foo', (new FooBarServices)->calculate(3));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals('Bar', (new FooBarServices)->calculate(5));
    }
}