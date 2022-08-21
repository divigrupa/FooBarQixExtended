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
		
		$ev = null;
		try { apiPostCallFunction('fooBarQix', ['a']); } catch (ExceptionWithValue $e) { $ev = $e; }		
		$this->assertTrue( $ev != null && $ev->type == 'wrongJson' );
		
		$ev = null;
		try { self::fooBarQix(-2); } catch (ExceptionWithValue $e) { $ev = $e; }		
		$this->assertTrue( $ev != null && is_array($ev->value['error']) && $ev->value['error']['value'] == 'n < 0' );
	}
	
	static function fooBarQix(int $n) { 
		return apiPostCallFunction('fooBarQix', [$n]); 
	}
	
}
