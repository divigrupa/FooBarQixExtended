<?php

declare(strict_types=1);

require_once 'Logic.php';

class TestsServiceFooBarQixMain extends PHPUnit\Framework\TestCase
{
    public function testFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixMain(6),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixMain(13),
            'String \'Foo\' expected!'
        );
    }
    
    public function testFooFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooFoo',
            $logicObj->serviceFooBarQixMain(3),
            'String \'FooFoo\' expected!'
        );
    }
    
    public function testFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixMain(51),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixMain(60),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixMain(53),
            'String \'FooBar\' expected!'
        );
    }
    
    public function testFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixMain(27),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixMain(21),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixMain(37),
            'String \'FooQix\' expected!'
        );
    }
    
    public function testFooFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooFooBar',
            $logicObj->serviceFooBarQixMain(153),
            'String \'FooFooBar\' expected!'
        );
    }
    
    public function testFooFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooFooQix',
            $logicObj->serviceFooBarQixMain(237),
            'String \'FooFooQix\' expected!'
        );
    }
    
    public function testFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(57),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(270),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(210),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(1357),
            'String \'FooBarQix\' expected!'
        );
    }
    
    public function testFooFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooFooBarQix',
            $logicObj->serviceFooBarQixMain(537),
            'String \'FooFooBarQix\' expected!'
        );
    }
    
    public function testFooBarFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarFoo',
            $logicObj->serviceFooBarQixMain(30),
            'String \'FooBarFoo\' expected!'
        );
    }
    
    public function testFooBarBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarBar',
            $logicObj->serviceFooBarQixMain(15),
            'String \'FooBarBar\' expected!'
        );
    }
    
    public function testFooBarFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarFooBar',
            $logicObj->serviceFooBarQixMain(135),
            'String \'FooBarFooBar\' expected!'
        );
    }
    
    public function testFooBarFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarFooQix',
            $logicObj->serviceFooBarQixMain(2370),
            'String \'FooBarFooQix\' expected!'
        );
    }
    
    public function testFooBarBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarBarQix',
            $logicObj->serviceFooBarQixMain(75),
            'String \'FooBarBarQix\' expected!'
        );
    }
    
    public function testFooBarFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarFooBarQix',
            $logicObj->serviceFooBarQixMain(375),
            'String \'FooBarFooBarQix\' expected!'
        );
    }
    
    public function testFooQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixFoo',
            $logicObj->serviceFooBarQixMain(63),
            'String \'FooQixFoo\' expected!'
        );
    }
    
    public function testFooQixBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixBar',
            $logicObj->serviceFooBarQixMain(252),
            'String \'FooQixBar\' expected!'
        );
    }
    
    public function testFooQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixQix',
            $logicObj->serviceFooBarQixMain(147),
            'String \'FooQixQix\' expected!'
        );
    }
    
    public function testFooQixFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixFooBar',
            $logicObj->serviceFooBarQixMain(1533),
            'String \'FooQixFooBar\' expected!'
        );
    }
    
    public function testFooQixFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixFooQix',
            $logicObj->serviceFooBarQixMain(273),
            'String \'FooQixFooQix\' expected!'
        );
    }
    
    public function testFooQixBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixBarQix',
            $logicObj->serviceFooBarQixMain(567),
            'String \'FooQixBarQix\' expected!'
        );
    }
    
    public function testFooQixFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooQixFooBarQix',
            $logicObj->serviceFooBarQixMain(357),
            'String \'FooQixFooBarQix\' expected!'
        );
    }
    
    public function testBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixMain(10),
            'String \'Bar\' expected!'
        );
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixMain(52),
            'String \'Bar\' expected!'
        );
    }
    
    public function testBarFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarFoo',
            $logicObj->serviceFooBarQixMain(130),
            'String \'BarFoo\' expected!'
        );
    }
    
    public function testBarBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarBar',
            $logicObj->serviceFooBarQixMain(5),
            'String \'BarBar\' expected!'
        );
    }
    
    public function testBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixMain(170),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixMain(140),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixMain(157),
            'String \'BarQix\' expected!'
        );
    }
    
    public function testBarFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarFooBar',
            $logicObj->serviceFooBarQixMain(235),
            'String \'BarFooBar\' expected!'
        );
    }
    
    public function testBarFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarFooQix',
            $logicObj->serviceFooBarQixMain(370),
            'String \'BarFooQix\' expected!'
        );
    }
    
    public function testBarBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarBarQix',
            $logicObj->serviceFooBarQixMain(275),
            'String \'BarBarQix\' expected!'
        );
    }
    
    public function testBarFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarFooBarQix',
            $logicObj->serviceFooBarQixMain(1375),
            'String \'BarFooBarQix\' expected!'
        );
    }
    
    public function testBarQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixFoo',
            $logicObj->serviceFooBarQixMain(1330),
            'String \'BarQixFoo\' expected!'
        );
    }
    
    public function testBarQixBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixBar',
            $logicObj->serviceFooBarQixMain(245),
            'String \'BarQixBar\' expected!'
        );
    }
    
    public function testBarQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixQix',
            $logicObj->serviceFooBarQixMain(70),
            'String \'BarQixQix\' expected!'
        );
    }
    
    public function testBarQixFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixFooBar',
            $logicObj->serviceFooBarQixMain(35),
            'String \'BarQixFooBar\' expected!'
        );
    }
    
    public function testBarQixFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixFooQix',
            $logicObj->serviceFooBarQixMain(3710),
            'String \'BarQixFooQix\' expected!'
        );
    }
    
    public function testBarQixBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixBarQix',
            $logicObj->serviceFooBarQixMain(175),
            'String \'BarQixBarQix\' expected!'
        );
    }
    
    public function testBarQixFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'BarQixFooBarQix',
            $logicObj->serviceFooBarQixMain(3745),
            'String \'BarQixFooBarQix\' expected!'
        );
    }
    
    public function testQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixMain(14),
            'String \'Qix\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixMain(17),
            'String \'Qix\' expected!'
        );
    }
    
    public function testQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixFoo',
            $logicObj->serviceFooBarQixMain(133),
            'String \'QixFoo\' expected!'
        );
    }
    
    public function testQixBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixBar',
            $logicObj->serviceFooBarQixMain(56),
            'String \'QixBar\' expected!'
        );
    }
    
    public function testQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixQix',
            $logicObj->serviceFooBarQixMain(7),
            'String \'QixQix\' expected!'
        );
    }
    
    public function testQixFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixFooBar',
            $logicObj->serviceFooBarQixMain(532),
            'String \'QixFooBar\' expected!'
        );
    }
    
    public function testQixFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixFooQix',
            $logicObj->serviceFooBarQixMain(371),
            'String \'QixFooQix\' expected!'
        );
    }
    
    public function testQixBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixBarQix',
            $logicObj->serviceFooBarQixMain(574),
            'String \'QixBarQix\' expected!'
        );
    }
    
    public function testQixFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'QixFooBarQix',
            $logicObj->serviceFooBarQixMain(3157),
            'String \'QixFooBarQix\' expected!'
        );
    }
    
    public function testFooBarQixFoo()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixFoo',
            $logicObj->serviceFooBarQixMain(630),
            'String \'FooBarQixFoo\' expected!'
        );
    }
    
    public function testFooBarQixBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixBar',
            $logicObj->serviceFooBarQixMain(105),
            'String \'FooBarQixBar\' expected!'
        );
    }
    
    public function testFooBarQixQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixQix',
            $logicObj->serviceFooBarQixMain(1470),
            'String \'FooBarQixQix\' expected!'
        );
    }
    
    public function testFooBarQixFooBar()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixFooBar',
            $logicObj->serviceFooBarQixMain(315),
            'String \'FooBarQixFooBar\' expected!'
        );
    }
    
    public function testFooBarQixFooQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixFooQix',
            $logicObj->serviceFooBarQixMain(2730),
            'String \'FooBarQixFooQix\' expected!'
        );
    }
    
    public function testFooBarQixBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixBarQix',
            $logicObj->serviceFooBarQixMain(1575),
            'String \'FooBarQixBarQix\' expected!'
        );
    }
    
    public function testFooBarQixFooBarQix()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBarQixFooBarQix',
            $logicObj->serviceFooBarQixMain(735),
            'String \'FooBarQixFooBarQix\' expected!'
        );
    }
    
    public function testOrder()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixMain(30052),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'BarFoo',
            $logicObj->serviceFooBarQixMain(50032),
            'String \'BarFoo\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixMain(30007),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'QixFoo',
            $logicObj->serviceFooBarQixMain(70003),
            'String \'QixFoo\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixMain(50017),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'QixBar',
            $logicObj->serviceFooBarQixMain(70051),
            'String \'QixBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(30517),
            'String \'FooBarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooQixBar',
            $logicObj->serviceFooBarQixMain(30752),
            'String \'FooQixBar\' expected!'
        );
        
        $this->assertEquals(
            'BarFooQix',
            $logicObj->serviceFooBarQixMain(50317),
            'String \'BarFooQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQixFoo',
            $logicObj->serviceFooBarQixMain(50713),
            'String \'BarQixFoo\' expected!'
        );
        
        $this->assertEquals(
            'QixFooBar',
            $logicObj->serviceFooBarQixMain(70351),
            'String \'QixFooBar\' expected!'
        );
        
        $this->assertEquals(
            'QixBarFoo',
            $logicObj->serviceFooBarQixMain(70531),
            'String \'QixBarFoo\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQixFooBar',
            $logicObj->serviceFooBarQixMain(70305),
            'String \'FooBarQixFooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBarFooQixBar',
            $logicObj->serviceFooBarQixMain(30705),
            'String \'FooBarFooQixBar\' expected!'
        );
        
        $this->assertEquals(
            'FooBarFooQix',
            $logicObj->serviceFooBarQixMain(50307),
            'String \'FooBarFooQix\' expected!'
        );
    }
    
    public function testDuplicateReduction()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            'Foo',
            $logicObj->serviceFooBarQixMain(33),
            'String \'Foo\' expected!'
        );
        
        $this->assertEquals(
            'Bar',
            $logicObj->serviceFooBarQixMain(55),
            'String \'Bar\' expected!'
        );
        
        $this->assertEquals(
            'Qix',
            $logicObj->serviceFooBarQixMain(77),
            'String \'Qix\' expected!'
        );
        
        $this->assertEquals(
            'FooBar',
            $logicObj->serviceFooBarQixMain(5353),
            'String \'FooBar\' expected!'
        );
        
        $this->assertEquals(
            'FooQix',
            $logicObj->serviceFooBarQixMain(7373),
            'String \'FooQix\' expected!'
        );
        
        $this->assertEquals(
            'BarQix',
            $logicObj->serviceFooBarQixMain(7575),
            'String \'BarQix\' expected!'
        );
        
        $this->assertEquals(
            'FooBarQix',
            $logicObj->serviceFooBarQixMain(753753),
            'String \'FooBarQix\' expected!'
        );
    }
    
    public function testIntToString()
    {
        $logicObj =  new Logic();
        
        $this->assertEquals(
            '8',
            $logicObj->serviceFooBarQixMain(8),
            'String \'8\' expected!'
        );
    }
    
    public function testExceptionType()
    {
        $logicObj =  new Logic();
        
        $this->expectException(TypeError::class);
        $logicObj->serviceFooBarQixMain('Exception of type mismatch expected!');
    }
    
    public function testExceptionNegative()
    {
        $logicObj =  new Logic();
        
        $this->expectException(InvalidArgumentException::class);
        $logicObj->serviceFooBarQixMain(-3);
    }
}