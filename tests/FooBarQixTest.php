<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';


class FooBarQixTest extends TestCase
{
	public function testFooBarQix(): void
	{	
		$this->assertTrue( self::fooBarQix(12) == 'Foo' );
		$this->assertTrue( self::fooBarQix(10) == 'Bar' );
		$this->assertTrue( self::fooBarQix(15) == 'Foo, Bar' );
		$this->assertTrue( self::fooBarQix(2) == '' );	
		
		$this->assertTrue( self::fooBarQix(7) == 'Qix');
		$this->assertTrue( self::fooBarQix(21) == 'Foo, Qix');
		$this->assertTrue( self::fooBarQix(35) == 'Bar, Qix');
		$this->assertTrue( self::fooBarQix(15*7) == 'Foo, Bar, Qix');			
		
		$ev = null;
		try { apiPostCallFunction('fooBarQix', ['a']); } catch (ExceptionWithValue $e) { $ev = $e; }		
		$this->assertTrue( $ev != null && $ev->type == 'wrongJson' );
		
		$ev = null;
		try { self::fooBarQix(-2); } catch (ExceptionWithValue $e) { $ev = $e; }		
		$this->assertTrue( $ev != null && is_array($ev->value['error']) && $ev->value['error']['value'] == 'n < 0' );
		
		// v2
		$this->assertTrue( self::fooBarQix(3) == 'Foo' );
		$this->assertTrue( self::fooBarQix(3, 2) == 'Foo, Foo' );
		$this->assertTrue( self::fooBarQix(35, 2) == 'Bar, Qix, Foo, Bar');
		$this->assertTrue( self::fooBarQix(357105) == 'Foo, Bar, Qix');
		$this->assertTrue( self::fooBarQix(357105, 2) == 'Foo, Bar, Qix, Foo, Bar, Qix, Bar');
		
		$this->assertTrue( self::fooBarQix(357105357105) == 'Foo, Bar, Qix');
		$this->assertTrue( self::fooBarQix(357105357105, 2) == 'Foo, Bar, Qix, Foo, Bar, Qix, Bar, Foo, Bar, Qix, Bar');
		
	}
	
	
	public function testInfQixFoo(): void
	{	
		$this->assertTrue( self::infQixFoo(16) == 'Inf' );
		$this->assertTrue( self::infQixFoo(14) == 'Qix' );
		$this->assertTrue( self::infQixFoo(6) == 'Foo' );
				
		$this->assertTrue( self::infQixFoo(8) == 'Inf; Inf' );
		$this->assertTrue( self::infQixFoo(8*7) == 'Inf; Qix' );
		$this->assertTrue( self::infQixFoo(7*3) == 'Qix; Foo' );
		$this->assertTrue( self::infQixFoo(8*7*3) == 'Inf; Qix; Foo; Inf' );
		$this->assertTrue( self::infQixFoo(8*7*3*3) == 'Inf; Qix; Foo' );
		$this->assertTrue( self::infQixFoo(2) == '' );	
	
		// has all digits and multiples:
		
		$this->assertTrue( self::infQixFoo(873096) == 'Inf; Qix; Foo; Inf; Qix; Foo' );
		$this->assertTrue( self::infQixFoo(873432) == 'Inf; Qix; Foo; Inf; Qix; Foo; Foo' );
		$this->assertTrue( self::infQixFoo(873768) == 'Inf; Qix; Foo; Inf; Qix; Foo; Qix; Inf' );
		$this->assertTrue( self::infQixFoo(873936) == 'Inf; Qix; Foo; Inf; Qix; Foo; Foo' );	
	
	
		// has all digits and no multiples:
		
		$this->assertTrue( self::infQixFoo(1378) == 'Foo; Qix; Inf' );			
		$this->assertTrue( self::infQixFoo(1873) == 'Inf; Qix; Foo' );			
	}
	
	static function fooBarQix(int $n, int $version=1) { 
		return apiPostCallFunction('fooBarQix', [$n], $version); 
	}

	static function infQixFoo(int $n) { 
		return apiPostCallFunction('infQixFoo', [$n]); 
	}
	
}
