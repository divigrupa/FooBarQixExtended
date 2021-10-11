<?php

namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals('Foo', (new FooBarQixService)->getMultiples(3321));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals('Bar', (new FooBarQixService)->getMultiples(5));
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals('Foo, Bar', (new FooBarQixService)->getMultiples(15));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals('Qix', (new FooBarQixService)->getMultiples(7));
    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals('Foo, Qix', (new FooBarQixService)->getMultiples(21));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals('Bar, Qix', (new FooBarQixService)->getMultiples(35));
    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals('Foo, Bar, Qix', (new FooBarQixService)->getMultiples(105));
    }
}