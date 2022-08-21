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
	
	
	static function fooBarQix(int $n, int $version=1) { 
		return apiPostCallFunction('fooBarQix', [$n], $version); 
	}
	
}
