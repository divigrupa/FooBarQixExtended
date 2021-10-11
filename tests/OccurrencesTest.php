<?php

namespace Tests;

use App\Services\FooBarQixService;
use PHPUnit\Framework\TestCase;

class OccurrencesTest extends TestCase
{
    public function testIfReturnsFoo()
    {
        $this->assertEquals('Foo', (new FooBarQixService)->getOccurrences(293));
    }

    public function testIfReturnsBar()
    {
        $this->assertEquals('Bar', (new FooBarQixService)->getOccurrences(5598));
    }

    public function testIfReturnsFooBar()
    {
        $this->assertEquals('Foo, Bar', (new FooBarQixService)->getOccurrences(395));
    }

    public function testIfReturnsQix()
    {
        $this->assertEquals('Qix', (new FooBarQixService)->getOccurrences(7779));
    }

    public function testIfReturnsFooQix()
    {
        $this->assertEquals('Foo, Qix', (new FooBarQixService)->getOccurrences(9973));
    }

    public function testIfReturnsBarQix()
    {
        $this->assertEquals('Bar, Qix', (new FooBarQixService)->getOccurrences(97245));
    }

    public function testIfReturnsFooBarQix()
    {
        $this->assertEquals('Foo, Bar, Qix', (new FooBarQixService)->getOccurrences(75322));
    }

    public function testIfReturnsNumberAsString()
    {
        $this->assertIsString((new FooBarQixService)->getOccurrences(2));
    }
}