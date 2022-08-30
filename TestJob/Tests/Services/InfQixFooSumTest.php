<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\InfQixFoo;

final class InfQixFooSumTest extends TestCase
{
    public function testOnlyMultiples(): void
    {
        foreach( range( 0, 15 ) as $number )
        {
            if ( $number && $number % 8 == 0 ) continue;

            InfQixFoo::resetSum();
            InfQixFoo::multiples( $number );

            $this->assertEquals( InfQixFoo::sum(), "" );
        }
    }

    public function testOnlyOccurances(): void
    {
        foreach( range( -15, 15 ) as $number )
        {
            if ( $number && $number % 8 == 0 ) continue;

            InfQixFoo::resetSum();
            InfQixFoo::occurrences( $number );

            $this->assertEquals( InfQixFoo::sum(), "" );
        }
    }

    public function testFail(): void
    {
        InfQixFoo::resetSum();

        InfQixFoo::multiples( 0 );
        InfQixFoo::occurrences( 0 );

        $this->assertEquals( InfQixFoo::sum(), "" );

        InfQixFoo::resetSum();

        InfQixFoo::multiples( 3 );
        InfQixFoo::occurrences( 0 );

        $this->assertEquals( InfQixFoo::sum(), "" );

        InfQixFoo::resetSum();

        InfQixFoo::multiples( 0 );
        InfQixFoo::occurrences( 5 );

        $this->assertEquals( InfQixFoo::sum(), "" );
    }

    public function testDone(): void
    {
        InfQixFoo::resetSum();

        InfQixFoo::multiples( 8 );
        InfQixFoo::occurrences( 0 );

        $this->assertEquals( InfQixFoo::sum(), "Inf" );

        InfQixFoo::resetSum();

        InfQixFoo::multiples( 0 );
        InfQixFoo::occurrences( 8 );

        $this->assertEquals( InfQixFoo::sum(), "Inf" );

        InfQixFoo::resetSum();

        InfQixFoo::multiples( 3 );
        InfQixFoo::occurrences( 5 );

        $this->assertEquals( InfQixFoo::sum(), "Inf" );

        InfQixFoo::resetSum();

        InfQixFoo::multiples( 22 );
        InfQixFoo::occurrences( -14 );

        $this->assertEquals( InfQixFoo::sum(), "Inf" );
    }
}