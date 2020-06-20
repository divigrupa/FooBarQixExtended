<?php

declare(strict_types=1);

require_once 'Logic.php';

class TestsServiceInfQixFoo extends PHPUnit\Framework\TestCase
{
    public function testInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf',
            $logicObj->serviceInfQixFoo(16),
            'String \'Inf\' expected!'
        );
        
        $this->assertEquals(
            'Inf',
            $logicObj->serviceInfQixFoo(58),
            'String \'Inf\' expected!'
        );
    }
    
    public function testInfInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfInf',
            $logicObj->serviceInfQixFoo(8),
            'String \'InfInf\' expected!'
        );
    }
    
    public function testInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfQix',
            $logicObj->serviceInfQixFoo(176),
            'String \'InfQix\' expected!'
        );
        
        $this->assertEquals(
            'InfQix',
            $logicObj->serviceInfQixFoo(187),
            'String \'InfQix\' expected!'
        );
    }
    
    public function testInfSepQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix',
            $logicObj->serviceInfQixFoo(56),
            'String \'Inf; Qix\' expected!'
        );
    }
    
    public function testInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfFoo',
            $logicObj->serviceInfQixFoo(32),
            'String \'InfFoo\' expected!'
        );
        
        $this->assertEquals(
            'InfFoo',
            $logicObj->serviceInfQixFoo(83),
            'String \'InfFoo\' expected!'
        );
    }
    
    public function testInfSepFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Foo',
            $logicObj->serviceInfQixFoo(24),
            'String \'Inf; Foo\' expected!'
        );
    }
    
    public function testInfInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfInfQix',
            $logicObj->serviceInfQixFoo(872),
            'String \'InfInfQix\' expected!'
        );
    }
    
    public function testInfInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfInfFoo',
            $logicObj->serviceInfQixFoo(832),
            'String \'InfInfFoo\' expected!'
        );
    }
    
    public function testInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfQixFoo',
            $logicObj->serviceInfQixFoo(736),
            'String \'InfQixFoo\' expected!'
        );
        
        $this->assertEquals(
            'InfQixFoo',
            $logicObj->serviceInfQixFoo(1873),
            'String \'InfQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixFoo',
            $logicObj->serviceInfQixFoo(392),
            'String \'Inf; QixFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; Foo',
            $logicObj->serviceInfQixFoo(504),
            'String \'Inf; Qix; Foo\' expected!'
        );
    }
    
    public function testInfInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'InfInfQixFoo',
            $logicObj->serviceInfQixFoo(18736),
            'String \'InfInfQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixInf',
            $logicObj->serviceInfQixFoo(280),
            'String \'Inf; QixInf\' expected!'
        );
    }
    
    public function testInfSepQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixQix',
            $logicObj->serviceInfQixFoo(1792),
            'String \'Inf; QixQix\' expected!'
        );
    }
    
    public function testInfSepQixInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixInfQix',
            $logicObj->serviceInfQixFoo(8176),
            'String \'Inf; QixInfQix\' expected!'
        );
    }
    
    public function testInfSepQixInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixInfFoo',
            $logicObj->serviceInfQixFoo(6832),
            'String \'Inf; QixInfFoo\' expected!'
        );
    }
    
    public function testInfSepQixQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixQixFoo',
            $logicObj->serviceInfQixFoo(1736),
            'String \'Inf; QixQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; QixInfQixFoo',
            $logicObj->serviceInfQixFoo(85736),
            'String \'Inf; QixInfQixFoo\' expected!'
        );
    }
    
    public function testQixInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixInfQixFoo',
            $logicObj->serviceInfQixFoo(5873),
            'String \'QixInfQixFoo\' expected!'
        );
    }
    
    public function testInfSepFooInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooInf',
            $logicObj->serviceInfQixFoo(48),
            'String \'Inf; FooInf\' expected!'
        );
    }
    
    public function testInfSepFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooQix',
            $logicObj->serviceInfQixFoo(72),
            'String \'Inf; FooQix\' expected!'
        );
    }
    
    public function testInfSepFooFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooFoo',
            $logicObj->serviceInfQixFoo(312),
            'String \'Inf; FooFoo\' expected!'
        );
    }
    
    public function testInfSepFooIndQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooIndQix',
            $logicObj->serviceInfQixFoo(1872),
            'String \'Inf; FooIndQix\' expected!'
        );
    }
    
    public function testInfSepFooInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooInfFoo',
            $logicObj->serviceInfQixFoo(2832),
            'String \'Inf; FooInfFoo\' expected!'
        );
    }
    
    public function testInfSepFooQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooQixFoo',
            $logicObj->serviceInfQixFoo(2736),
            'String \'Inf; FooQixFoo\' expected!'
        );
    }
    
    public function testInfSepFooInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; FooInfQixFoo',
            $logicObj->serviceInfQixFoo(68736),
            'String \'Inf; FooInfQixFoo\' expected!'
        );
    }
    
    public function testQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceInfQixFoo(14),
            'String \'Qix\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceInfQixFoo(17),
            'String \'Qix\' expected!'
        );
    }
    
    public function testQixInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixInf',
            $logicObj->serviceInfQixFoo(28),
            'String \'QixInf\' expected!'
        );
    }
    
    public function testQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixQix',
            $logicObj->serviceInfQixFoo(7),
            'String \'QixQix\' expected!'
        );
    }
    
    public function testQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixFoo',
            $logicObj->serviceInfQixFoo(35),
            'String \'QixFoo\' expected!'
        );
        
        $this->assertEquals(
            'QixFoo',
            $logicObj->serviceInfQixFoo(73),
            'String \'QixFoo\' expected!'
        );
    }
    
    public function testQixSepFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; Foo',
            $logicObj->serviceInfQixFoo(21),
            'String \'Qix; Foo\' expected!'
        );
    }
    
    public function testQixInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixInfQix',
            $logicObj->serviceInfQixFoo(287),
            'String \'QixInfQix\' expected!'
        );
    }
    
    public function testQixIngFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixIngFoo',
            $logicObj->serviceInfQixFoo(833),
            'String \'QixIngFoo\' expected!'
        );
    }
    
    public function testQixQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixQixFoo',
            $logicObj->serviceInfQixFoo(763),
            'String \'QixQixFoo\' expected!'
        );
    }
    
    public function testQixSepFooInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooInf',
            $logicObj->serviceInfQixFoo(84),
            'String \'Qix; FooInf\' expected!'
        );
    }
    
    public function testQixSepFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooQix',
            $logicObj->serviceInfQixFoo(147),
            'String \'Qix; FooQix\' expected!'
        );
    }
    
    public function testQixSepFooFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooFoo',
            $logicObj->serviceInfQixFoo(63),
            'String \'Qix; FooFoo\' expected!'
        );
    }
    
    public function testQixSepFooInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooInfQix',
            $logicObj->serviceInfQixFoo(987),
            'String \'Qix; FooInfQix\' expected!'
        );
    }
    
    public function testQixSepFooInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooInfFoo',
            $logicObj->serviceInfQixFoo(483),
            'String \'Qix; FooInfFoo\' expected!'
        );
    }
    
    public function testQixSepFooQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooQixFoo',
            $logicObj->serviceInfQixFoo(273),
            'String \'Qix; FooQixFoo\' expected!'
        );
    }
    
    public function testQixSepFooInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix; FooInfQixFoo',
            $logicObj->serviceInfQixFoo(6873),
            'String \'Qix; FooInfQixFoo\' expected!'
        );
    }
    
    public function testFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceInfQixFoo(6),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceInfQixFoo(13),
            'String \'Foo\' expected!'
        );
    }
    
    public function testFooInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooInf',
            $logicObj->serviceInfQixFoo(18),
            'String \'FooInf\' expected!'
        );
    }
    
    public function testFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceInfQixFoo(27),
            'String \'FooQix\' expected!'
        );
    }
    
    public function testFooFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooFoo',
            $logicObj->serviceInfQixFoo(3),
            'String \'FooFoo\' expected!'
        );
    }
    
    public function testFooInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooInfQix',
            $logicObj->serviceInfQixFoo(87),
            'String \'FooInfQix\' expected!'
        );
    }
    
    public function testFooInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooInfFoo',
            $logicObj->serviceInfQixFoo(183),
            'String \'FooInfFoo\' expected!'
        );
    }
    
    public function testFooQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixFoo',
            $logicObj->serviceInfQixFoo(573),
            'String \'FooQixFoo\' expected!'
        );
    }
    
    public function testFooInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooInfQixFoo',
            $logicObj->serviceInfQixFoo(873),
            'String \'FooInfQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooInf',
            $logicObj->serviceInfQixFoo(168),
            'String \'Inf; Qix; FooInf\' expected!'
        );
    }
    
    public function testInfSepQixSepFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooQix',
            $logicObj->serviceInfQixFoo(672),
            'String \'Inf; Qix; FooQix\' expected!'
        );
    }
    
    public function testInfSepQixSepFooFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooFoo',
            $logicObj->serviceInfQixFoo(336),
            'String \'Inf; Qix; FooFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooInfQix',
            $logicObj->serviceInfQixFoo(4872),
            'String \'Inf; Qix; FooInfQix\' expected!'
        );
    }
    
    public function testInfSepQixSepFooInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooInfFoo',
            $logicObj->serviceInfQixFoo(8232),
            'String \'Inf; Qix; FooInfFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooQixFoo',
            $logicObj->serviceInfQixFoo(7392),
            'String \'Inf; Qix; FooQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooInfQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooInfQixFoo',
            $logicObj->serviceInfQixFoo(8736),
            'String \'Inf; Qix; FooInfQixFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooInfFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooInfFooQix',
            $logicObj->serviceInfQixFoo(68376),
            'String \'Inf; Qix; FooInfFooQix\' expected!'
        );
    }
    
    public function testInfSepQixSepFooQixFooInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooQixFooInf',
            $logicObj->serviceInfQixFoo(27384),
            'String \'Inf; Qix; FooQixFooInf\' expected!'
        );
    }
    
    public function testInfSepQixSepFooQixInfFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooQixInfFoo',
            $logicObj->serviceInfQixFoo(167832),
            'String \'Inf; Qix; FooQixInfFoo\' expected!'
        );
    }
    
    public function testInfSepQixSepFooFooQixInf()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooFooQixInf',
            $logicObj->serviceInfQixFoo(33768),
            'String \'Inf; Qix; FooFooQixInf\' expected!'
        );
    }
    
    public function testInfSepQixSepFooFooInfQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf; Qix; FooFooInfQix',
            $logicObj->serviceInfQixFoo(38472),
            'String \'Inf; Qix; FooFooInfQix\' expected!'
        );
    }
    
    public function testDuplicateReduction()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Inf',
            $logicObj->serviceInfQixFoo(5888),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceInfQixFoo(1777),
            'String \'Bar\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceInfQixFoo(1333),
            'String \'Qix\' expected!'
        );
        
    }
    
    public function testIntToString()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            '5',
            $logicObj->serviceInfQixFoo(5),
            'String \'5\' expected!'
        );
    }
    
    public function testExceptionType()
    {
        $logicObj =  new Logic();
        
        $this->expectException(TypeError::class);
        $logicObj->serviceInfQixFoo('Exception of type mismatch expected!');
    }
    
    public function testExceptionNegative()
    {
        $logicObj =  new Logic();
        
        $this->expectException(InvalidArgumentException::class);
        $logicObj->serviceInfQixFoo(-3);
    }
}