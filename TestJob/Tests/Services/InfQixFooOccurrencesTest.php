<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\InfQixFoo;

final class InfQixFooOccurrencesTest extends TestCase
{
    public function testOnlyFoo(): void
    {
        $this->assertEquals( InfQixFoo::occurrences( 3 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( 333 ), "FooFooFoo" );
        $this->assertEquals( InfQixFoo::occurrences( 11113 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( 31111 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( 11311311 ), "FooFoo" );
        $this->assertEquals( InfQixFoo::occurrences( 13131 ), "FooFoo" );

        $this->assertEquals( InfQixFoo::occurrences( -3 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( -333 ), "FooFooFoo" );
        $this->assertEquals( InfQixFoo::occurrences( -11113 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( -31111 ), "Foo" );
        $this->assertEquals( InfQixFoo::occurrences( -11311311 ), "FooFoo" );
        $this->assertEquals( InfQixFoo::occurrences( -13131 ), "FooFoo" );
    }

    public function testOnlyQix(): void
    {
        $this->assertEquals( InfQixFoo::occurrences( 7 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( 777 ), "QixQixQix" );
        $this->assertEquals( InfQixFoo::occurrences( 11117 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( 71111 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( 11711711 ), "QixQix" );
        $this->assertEquals( InfQixFoo::occurrences( 17171 ), "QixQix" );

        $this->assertEquals( InfQixFoo::occurrences( -7 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( -777 ), "QixQixQix" );
        $this->assertEquals( InfQixFoo::occurrences( -11117 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( -71111 ), "Qix" );
        $this->assertEquals( InfQixFoo::occurrences( -11711711 ), "QixQix" );
        $this->assertEquals( InfQixFoo::occurrences( -17171 ), "QixQix" );
    }

    public function testOnlyInf(): void
    {
        $this->assertEquals( InfQixFoo::occurrences( 8 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( 888 ), "InfInfInf" );
        $this->assertEquals( InfQixFoo::occurrences( 11118 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( 81111 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( 11811811 ), "InfInf" );
        $this->assertEquals( InfQixFoo::occurrences( 18181 ), "InfInf" );

        $this->assertEquals( InfQixFoo::occurrences( -8 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( -888 ), "InfInfInf" );
        $this->assertEquals( InfQixFoo::occurrences( -11118 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( -81111 ), "Inf" );
        $this->assertEquals( InfQixFoo::occurrences( -11811811 ), "InfInf" );
        $this->assertEquals( InfQixFoo::occurrences( -18181 ), "InfInf" );
    }

    public function testMultiple(): void
    {
        # 3 - Foo, 8 - Inf, 7 - Qix
        $this->assertEquals( InfQixFoo::occurrences( 387 ), "FooInfQix" );
        $this->assertEquals( InfQixFoo::occurrences( 1318171 ), "FooInfQix" );
        $this->assertEquals( InfQixFoo::occurrences( 1234486667 ), "FooInfQix" );
        $this->assertEquals( InfQixFoo::occurrences( 338877 ), "FooFooInfInfQixQix" );
        $this->assertEquals( InfQixFoo::occurrences( 3318181717 ), "FooFooInfInfQixQix" );
    }

    public function testMustFail(): void
    {
        # 3 - Foo, 8 - Inf, 7 - Qix

        $this->assertEquals( InfQixFoo::occurrences( 1 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( 2 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( 4 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( 5 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( 6 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( 9 ), "" );

        $this->assertEquals( InfQixFoo::occurrences( 0 ), "" );

        $this->assertEquals( InfQixFoo::occurrences( -1 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( -2 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( -4 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( -5 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( -6 ), "" );
        $this->assertEquals( InfQixFoo::occurrences( -9 ), "" );
    }
}