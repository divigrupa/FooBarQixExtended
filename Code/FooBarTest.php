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
        for ($i =3; $i <=300; $i=$i+3){
                if ($i%15==0 || $i%21==0 )
                continue;
        $this -> assertEquals ("Foo" ,$Object->Checker($i));
    } 
}

public function testMultipleBar()
    {
        $Object =  new FooBar();
        for ($i =5; $i <=500; $i=$i+5){
                if ($i%15==0 || $i%35==0)
                continue;
        $this -> assertEquals ("Bar" ,$Object->Checker($i));
    } 
}

public function testMultipleFooBar()
    {
        $Object =  new FooBar();
        for ($i =15; $i <=1500; $i=$i+15){
            if ($i%105==0)
            continue;
        $this -> assertEquals ("Foo, Bar" ,$Object->Checker($i));
    } 
}

public function testMultipleQix()
    {
        $Object =  new FooBar();
        for ($i =7; $i <=70; $i=$i+7){
                if ($i%21==0 || $i%5==0)
                continue;
        $this -> assertEquals ("Qix" ,$Object->Checker($i));
    } 
}

public function testMultipleFooBarQix()
    {
        $Object =  new FooBar();
        for ($i =105; $i <=1050; $i=$i+105){
        $this -> assertEquals ("Foo, Bar, Qix" ,$Object->Checker($i));
    } 
}
public function testMultipleFooQix()
    {
        $Object =  new FooBar();
        for ($i =21; $i <=210; $i=$i+21){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("Foo, Qix" ,$Object->Checker($i));
    } 
}

public function testMultipleBarQix()
    {
        $Object =  new FooBar();
        for ($i =35; $i <=350; $i=$i+35){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("Bar, Qix" ,$Object->Checker($i));
    } 
}


}