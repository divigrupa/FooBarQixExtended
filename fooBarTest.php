<?php
include (dirname(__FILE__) . "/../fooBar.php");
use PHPUnit\Framework\TestCase;

class fooBarTest extends TestCase
{
    public function testFloat()
    {
        $number = new fooBar;
        $this->assertIsNotInt($number->checkFooBar(3.2));
    }
    public function testNegative()
    {
        $number = new fooBar;
        $this->assertIsNotInt($number->checkFooBar(-7));
    }
    public function testInvalidChar()
    {
        $number = new fooBar;
        $this->assertIsNotInt($number->checkFooBar("test"));
    }
    public function testFooBar()
    {
        $number = new fooBar;
        $this->assertEquals($number->checkFooBar(15) , "Foo Bar");
    }
    public function testFoo()
    {
        $number = new fooBar;
        $this->assertEquals($number->checkFooBar(3) , "Foo ");
    }
    public function testBar()
    {
        $number = new fooBar;
        $this->assertEquals($number->checkFooBar(5) , "Bar");
    }
     public function testIntToStr()
    {
        $number = new FooBar();
        $this->assertEquals("string", gettype($number->checkFooBar(7)));
    }

}

?>
