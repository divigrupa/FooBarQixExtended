<?php
include (dirname(__FILE__) . "/../fooBar.php");
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
     public function testFloatException()
    {
        $number = new FooBar;
        $this->expectException(Exception::class);
        $number->checkFooBar(3.2);
    }
    public function testNegativeException()
    {
        $number = new FooBar;
        $this->expectException(Exception::class);
        $number->checkFooBar(-7);
    }
    public function testInvalidCharException()
    {
        $number = new FooBar;
        $this->expectException(Exception::class);
        $number->checkFooBar("test");
    }
    public function testFooBar()
    {
        $number = new FooBar;
        $this->assertEquals($number->checkFooBar(15) , "FooBar");
    }
    public function testFoo()
    {
        $number = new FooBar;
        $this->assertEquals($number->checkFooBar(3) , "Foo");
    }
    public function testBar()
    {
        $number = new FooBar;
        $this->assertEquals($number->checkFooBar(5) , "Bar");
    }
     public function testIntToStr()
    {
        $number = new FooBar();
        $this->assertEquals("string", gettype($number->checkFooBar(7)));
    }

}

?>
