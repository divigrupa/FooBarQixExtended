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
}