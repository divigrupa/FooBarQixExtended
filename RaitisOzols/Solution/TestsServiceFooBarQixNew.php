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
            $logicObj->serviceFooBarQixNew(35),
            'String \'FooBar\' expected!'
        );
    }
    
    public function testFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(317),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(3713),
            'String \'FooQix\' expected!'
        );
    }
    
    public function testBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixNew(57),
            'String \'BarQix\' expected!'
        );
    }
    
    public function testFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixNew(357),
            'String \'FooBarQix\' expected!'
        );
    }
    
    public function testOrder()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixNew(30052),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'BarFoo',
            $logicObj->serviceFooBarQixNew(50032),
            'String \'BarFoo\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(30007),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'QixFoo',
            $logicObj->serviceFooBarQixNew(70003),
            'String \'QixFoo\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixNew(50017),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'QixBar',
            $logicObj->serviceFooBarQixNew(70051),
            'String \'QixBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixNew(30517),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQixBar',
            $logicObj->serviceFooBarQixNew(30752),
            'String \'FooQixBar\' expected!'
        );
        
        $this->assertEquals(
            'BarFooQix',
            $logicObj->serviceFooBarQixNew(50317),
            'String \'BarFooQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQixFoo',
            $logicObj->serviceFooBarQixNew(50713),
            'String \'BarQixFoo\' expected!'
        );
        
        $this->assertEquals(
            'QixFooBar',
            $logicObj->serviceFooBarQixNew(70351),
            'String \'QixFooBar\' expected!'
        );
        
        $this->assertEquals(
            'QixBarFoo',
            $logicObj->serviceFooBarQixNew(70531),
            'String \'QixBarFoo\' expected!'
        );
    }
    
    public function testDuplicateReduction()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixNew(33),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixNew(55),
            'String \'Bar\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixNew(77),
            'String \'Qix\' expected!'
        );
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixNew(353),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixNew(373),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixNew(575),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixNew(1030503050703),
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