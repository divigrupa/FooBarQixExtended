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
    
    public function testFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBar(15),
            'String \'FooBar\' expected!'
        );
    }
    
    public function testIntToString()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            '7',
            $logicObj->serviceFooBar(7),
            'String \'7\' expected!'
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