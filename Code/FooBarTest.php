<?php
require __DIR__ . '\FooBar.php';
use FooBar;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function testFoo()
    {
        $Object =  new FooBar();
        $this->assertEquals ("Bar", $Object->Checker(5));
}

public function testBar()
{
        $Object =  new FooBar();
        $this->assertEquals ("Foo" , $Object->Checker(3));
}

public function testNegative()
{
        $Object =  new FooBar();
        $this -> assertEquals ("" , $Object->Checker(-1));
}

public function testNotInteger()
{
        $Object =  new FooBar();
        $this -> assertIsNotInt ($Object->Checker(4.321));
}

public function testNotNumbber()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("" ,$Object->Checker("asd"));
    }

public function testFooBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo, Bar" ,$Object->Checker(30));
    } 

public function testMultipleFoo()
    {
        $Object =  new FooBar();
        for ($i =3; $i <=30; $i=$i+3){
                if ($i%15==0)
                continue;
        $this -> assertEquals ("Foo" ,$Object->Checker($i));
    } 
}

public function testMultipleBar()
    {
        $Object =  new FooBar();
        for ($i =5; $i <=50; $i=$i+5){
                if ($i%15==0)
                continue;
        $this -> assertEquals ("Bar" ,$Object->Checker($i));
    } 
}

public function testMultipleFooBar()
    {
        $Object =  new FooBar();
        for ($i =15; $i <=150; $i=$i+15){
        $this -> assertEquals ("Foo, Bar" ,$Object->Checker($i));
    } 
}
} 