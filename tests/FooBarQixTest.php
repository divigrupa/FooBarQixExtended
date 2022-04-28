<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\FooBarQix;

class FooBarQixTest extends TestCase
{
    /** @test */
    public function it_checks_whether_returns_Foo_for_multiples_of_3()
    {
        $this->assertSame('Foo', FooBarQix::convert(3));
    }

    /** @test */
    public function it_checks_whether_returns_Bar_for_multiples_of_5()
    {
        $this->assertSame('Bar', FooBarQix::convert(5));
    }

    /** @test */
    public function it_checks_whether_returns_FooBar_for_multiples_of_3_and_5()
    {
        $this->assertSame('Foo, Bar', FooBarQix::convert(15));
    }

    /** @test */
    public function it_checks_whether_returns_number_as_string_if_not_a_multiple_of_any()
    {
        $this->assertSame('4', FooBarQix::convert(4));
    }
}
