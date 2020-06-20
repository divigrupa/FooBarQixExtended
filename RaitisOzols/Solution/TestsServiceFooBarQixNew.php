<?php

declare(strict_types=1);

require_once 'Logic.php';

class TestsServiceFooBarQixNew extends PHPUnit\Framework\TestCase
{
    public function testFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixNew(3),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixNew(331),
            'String \'Foo\' expected!'
        );
    }
    
    public function testBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixNew(5),
            'String \'Bar\' expected!'
        );
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixNew(1525),
            'String \'Bar\' expected!'
        );
    }
    
    public function testQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixNew(7),
            'String \'Qix\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixNew(177),
            'String \'Qix\' expected!'
        );
    }
    
    public function testFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixNew(53),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixNew(5353),
            'String \'FooBar\' expected!'
        );
    }
    
    public function testFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(713),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(73713),
            'String \'FooQix\' expected!'
        );
    }
    
    public function testBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixNew(75),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixNew(75756),
            'String \'BarQix\' expected!'
        );
    }
    
    public function testFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixNew(753),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixNew(753753),
            'String \'FooBarQix\' expected!'
        );
    }
    
    public function testIntToString()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            '8',
            $logicObj->serviceFooBarQixNew(8),
            'String \'8\' expected!'
        );
    }
    
    public function testExceptionType()
    {
        $logicObj =  new Logic();
        
        $this->expectException(TypeError::class);
        $logicObj->serviceFooBarQixNew('Exception of type mismatch expected!');
    }
    
    public function testExceptionNegative()
    {
        $logicObj =  new Logic();
        
        $this->expectException(InvalidArgumentException::class);
        $logicObj->serviceFooBarQixNew(-3);
    }
}