<?php

namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals('Foo', (new FooBarQixService)->calculate(3));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals('Bar', (new FooBarQixService)->calculate(5));
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals('Foo, Bar', (new FooBarQixService)->calculate(15));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals('Qix', (new FooBarQixService)->calculate(7));
    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals('Foo, Qix', (new FooBarQixService)->calculate(21));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals('Bar, Qix', (new FooBarQixService)->calculate(35));
    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals('Foo, Bar, Qix', (new FooBarQixService)->calculate(105));
    }
}