<?php

use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

require 'stepThreeFunctions.php';

class QixTest extends TestCase
{
    public function testMultiplesOnly()
    {
        $this->assertEquals('FooBar', foobarqix(15)); 
        $this->assertEquals('FooQix', foobarqix(21)); 
        $this->assertEquals('BarQix', foobarqix(35)); 
    }

    public function testOccurrencesOnly()
    {
        $this->assertEquals('Foo', foobarqix(3)); 
        $this->assertEquals('Bar', foobarqix(5)); 
        $this->assertEquals('Qix', foobarqix(7)); 
        $this->assertEquals('FooBar', foobarqix(53)); 
        $this->assertEquals('FooQix', foobarqix(735)); 
    }

    public function testMultiplesAndOccurrences()
    {
        $this->assertEquals('FooBarQix', foobarqix(105)); 
        $this->assertEquals('FooBarFoo', foobarqix(303)); 
        $this->assertEquals('QixFooBar', foobarqix(357)); 
    }
}