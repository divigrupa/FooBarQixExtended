<?php

namespace Tests;

use App\Services\FooBarService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals('Foo', (new FooBarService)->calculate(3));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals('Bar', (new FooBarService)->calculate(5));
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals('Foo, Bar', (new FooBarService)->calculate(15));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals('Qix', (new FooBarService)->calculate(7));
    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals('Foo, Qix', (new FooBarService)->calculate(21));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals('Bar, Qix', (new FooBarService)->calculate(35));
    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals('Foo, Bar, Qix', (new FooBarService)->calculate(105));
    }
}