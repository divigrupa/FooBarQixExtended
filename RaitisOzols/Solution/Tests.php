<?php

declare(strict_types=1);

require_once 'Logic.php';

class Tests extends PHPUnit\Framework\TestCase
{
    public function testFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBar(3),
            'String \'Foo\' expected!'
        );
    }
    
    public function testBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBar(5),
            'String \'Bar\' expected!'
        );
    }
    
    public function testQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBar(7),
            'String \'Qix\' expected!'
        );
    }
    
    public function testFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBar(15),
            'String \'FooBar\' expected!'
        );
    }
    
    public function testFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBar(21),
            'String \'FooQix\' expected!'
        );
    }
    
    public function testBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBar(35),
            'String \'BarQix\' expected!'
        );
    }
    
    public function testFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBar(105),
            'String \'FooBarQix\' expected!'
        );
    }
    
    public function testIntToString()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            '8',
            $logicObj->serviceFooBar(8),
            'String \'8\' expected!'
        );
    }
    
    public function testExceptionType()
    {
        $logicObj =  new Logic();
        
        $this->expectException(TypeError::class);
        $logicObj->serviceFooBar('Exception of type mismatch expected!');
    }
    
    public function testExceptionNegative()
    {
        $logicObj =  new Logic();
        
        $this->expectException(InvalidArgumentException::class);
        $logicObj->serviceFooBar(-3);
    }
}