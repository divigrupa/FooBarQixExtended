<?php
require __DIR__ . '\FooBar.php';
use FooBar;
use PHPUnit\Framework\TestCase;



class FooBarTest extends TestCase
{
    public function testFoo()
    {
        $Object =  new FooBar();
        $this->assertEquals ("Bar ", $Object->Checker(5));

}

public function testBar()
{
        $Object =  new FooBar();
        $this->assertEquals ("Foo " , $Object->Checker(3));

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
        $this -> assertEquals ("Foo, Bar " ,$Object->Checker(30));
    } 
    
public function testMultipleFoo()
    {
        $Object =  new FooBar();
        for ($i =3; $i <=300; $i=$i+3){
                if ($i%15==0 || $i%21==0 )
                continue;
        $this -> assertEquals ("Foo " ,$Object->Checker($i));
    } 
}

public function testMultipleBar()
    {
        $Object =  new FooBar();
        for ($i =5; $i <=500; $i=$i+5){
                if ($i%15==0 || $i%35==0)
                continue;
        $this -> assertEquals ("Bar " ,$Object->Checker($i));
    } 
}

public function testMultipleFooBar()
    {
        $Object =  new FooBar();
        for ($i =15; $i <=1500; $i=$i+15){
            if ($i%105==0)
            continue;
        $this -> assertEquals ("Foo, Bar " ,$Object->Checker($i));
    } 
}

//Step 2 tests
public function testMultipleQix()
    {
        $Object =  new FooBar();
        for ($i =7; $i <=70; $i=$i+7){
                if ($i%21==0 || $i%5==0)
                continue;
        $this -> assertEquals ("Qix " ,$Object->Checker($i));
    } 
}

public function testMultipleFooBarQix()
    {
        $Object =  new FooBar();
        for ($i =105; $i <=1050; $i=$i+105){
        $this -> assertEquals ("Foo, Bar, Qix " ,$Object->Checker($i));
    } 
}
public function testMultipleFooQix()
    {
        $Object =  new FooBar();
        for ($i =21; $i <=210; $i=$i+21){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("Foo, Qix " ,$Object->Checker($i));
    } 
}

public function testMultipleBarQix()
    {
        $Object =  new FooBar();
        for ($i =35; $i <=350; $i=$i+35){
                if ($i%105==0)
                continue;
        $this -> assertEquals ("Bar, Qix " ,$Object->Checker($i));
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
        $this -> assertEquals ("Foo Foo" ,$Object->FooBarAppend((33)));
    } 

public function testBarBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Bar Bar" ,$Object->FooBarAppend((25)));
    } 

public function testQixQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Qix Qix" ,$Object->FooBarAppend((77)));
    }  

public function testFooQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo Qix" ,$Object->FooBarAppend((27)));
    }    

public function testFooBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo, Bar Qix" ,$Object->FooBarAppend((720)));
    } 

public function testFooBarFoo()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo, Bar Foo" ,$Object->FooBarAppend((30)));
    }  
 
public function testFooBarBar()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo, Bar Bar" ,$Object->FooBarAppend((45)));
    }    

public function testBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Bar Qix" ,$Object->FooBarAppend((170)));
    }    
    
public function testFooBarQixFooBarQix()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Foo, Bar, Qix QixFooBar" ,$Object->FooBarAppend((735)));
    } 

public function testOthers()
    {
        $Object =  new FooBar();
        $this -> assertEquals ("Bar, Qix Foo" ,$Object->FooBarAppend((1330)));
        $this -> assertEquals ("Bar, Qix QixFoo" ,$Object->FooBarAppend((9730)));
        $this -> assertEquals ("Qix BarFoo" ,$Object->FooBarAppend((532)));
        $this -> assertEquals ("Foo FooBarQix" ,$Object->FooBarAppend((3537)));
        $this -> assertEquals ("Bar QixBar" ,$Object->FooBarAppend((755)));
        $this -> assertEquals ("Foo, Bar BarQix" ,$Object->FooBarAppend((4575)));
        $this -> assertEquals ("Qix FooBarQix" ,$Object->FooBarAppend((3577)));
    }
    
//Step 4 tests
public function testInf()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; " , $Object->InfQix(8));

}  

public function testInfQix()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Qix; " , $Object->InfQix(56));

}    
public function testInfQixFoo()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Qix; Foo; " , $Object->InfQix(168));

}      

public function testInfFoo()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Foo; " , $Object->InfQix(24));

}

public function testInfQixFooInfQixFoo()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Qix; Foo; InfQixFooInf" , $Object->InfQixAppend(8736));

}

public function testFooInf()
{
        $Object =  new FooBar();
        $this->assertEquals ("Foo; Inf" , $Object->InfQixAppend(18));

}

public function testInfFooInf()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Foo; Inf" , $Object->InfQixAppend(408));

}

public function testQixFooInfFoo()
{
        $Object =  new FooBar();
        $this->assertEquals ("Qix; Foo; FooInf" , $Object->InfQixAppend(3318));

}

public function testInfQixInfQix()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Qix; QixInf" , $Object->InfQixAppend(784));

}

public function testDuplicates()
{
        $Object =  new FooBar();
        $this->assertEquals ("InfFooQix" , $Object->InfQixAppend(83783738));

}

public function testInfFooQixFooInf()
{
        $Object =  new FooBar();
        $this->assertEquals ("Inf; Foo; QixFooInf" , $Object->InfQixAppend(777333888));

}

public function testNewFooQix()
{
        $Object =  new FooBar();
        $this->assertEquals ("Foo; Qix" , $Object->InfQixAppend(75));

}

public function testSameNumberRepeats()
{
        $Object =  new FooBar();
        $this->assertEquals ("Foo; Foo" , $Object->InfQixAppend(3333));
        $this->assertEquals ("Qix; Qix" , $Object->InfQixAppend(7777));
        $this->assertEquals ("Inf; InfInf" , $Object->InfQixAppend(8888));

}

// Step 5
public function testNewRules()
{
        $Object =  new FooBar();
        $this->assertEquals ("InfFooInf" , $Object->InfQixAppend(853));
        $this->assertEquals ("Qix; Foo; InfQixInf" , $Object->InfQixAppend(987));
        $this->assertEquals ("Inf; Inf" , $Object->InfQixAppend(152));
        $this->assertEquals ("FooQixInf" , $Object->InfQixAppend(3751));

}

public function testAllConditions()
{
    $Object =  new FooBar();
    $this->assertEquals ("Inf; Qix; Foo; QixFooInfInf" , $Object->InfQixAppend(27384));
}
}

