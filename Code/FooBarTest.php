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
        $this -> assertEquals ("FooBar" ,$Object->Checker(30));
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
        $this -> assertEquals ("FooBar" ,$Object->Checker($i));
    } 
}

//Step 2 tests
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
        $this -> assertEquals ("FooBarQix" ,$Object->Checker($i));
    } 
}
public function testMultipleFooQix()
    {
        $Object =  new FooBar();
        for ($i =21; $i <=210; $i=$i+21){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("FooQix" ,$Object->Checker($i));
    } 
}

public function testMultipleBarQix()
    {
        $Object =  new FooBar();
        for ($i =35; $i <=350; $i=$i+35){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("BarQix" ,$Object->Checker($i));
    } 
}

//Step 3 tests
public function testNewFoo()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo" ,$Object->FooBarAppend((398)));
    } 

public function testNewBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Bar" ,$Object->FooBarAppend((586)));
    } 

public function testNewQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Qix" ,$Object->FooBarAppend((787)));
    } 

public function testFooFoo()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooFoo" ,$Object->FooBarAppend((33)));
    } 

public function testBarBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("BarBar" ,$Object->FooBarAppend((25)));
    } 

public function testQixQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("QixQix" ,$Object->FooBarAppend((77)));
    }  

public function testFooQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooQix" ,$Object->FooBarAppend((27)));
    }    

public function testFooBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooBarQix" ,$Object->FooBarAppend((720)));
    } 

public function testFooBarFoo()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooBarFoo" ,$Object->FooBarAppend((30)));
    }  
 
public function testFooBarBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooBarBar" ,$Object->FooBarAppend((45)));
    }    

public function testBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("BarQix" ,$Object->FooBarAppend((170)));
    }    
    
public function testFooBarQixFooBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("FooBarQixFooBarQix" ,$Object->FooBarAppend((735)));
    } 

public function testOthers()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("BarQixFoo" ,$Object->FooBarAppend((1330)));
        $this -> assertEquals ("BarQixFooQix" ,$Object->FooBarAppend((9730)));
        $this -> assertEquals ("QixFooBar" ,$Object->FooBarAppend((532)));
        $this -> assertEquals ("FooFooBarQix" ,$Object->FooBarAppend((3537)));
        $this -> assertEquals ("BarBarQix" ,$Object->FooBarAppend((755)));
        $this -> assertEquals ("FooBarBarQix" ,$Object->FooBarAppend((4575)));
        $this -> assertEquals ("QixFooBarQix" ,$Object->FooBarAppend((3577)));
    }     
}

