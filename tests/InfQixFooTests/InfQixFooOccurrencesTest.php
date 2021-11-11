<?php

namespace Tests\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooOccurrencesTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(13));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(23));
    }

    public function test_is_result_qix()
    {
        $result = 'Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(17));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(47));
    }

    public function test_is_result_inf()
    {
        $result = 'Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(58));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(68));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'FooQix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(37));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(137));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'QixFoo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(73));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(173));
    }

    public function test_is_result_inf_foo()
    {
        $result = 'InfFoo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(83));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(283));
    }

    public function test_is_result_foo_inf()
    {
        $result = 'FooInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(38));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(538));
    }

    public function test_is_result_inf_qix()
    {
        $result = 'InfQix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(187));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(487));
    }

    public function test_is_result_qix_inf()
    {
        $result = 'QixInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(178));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(278));
    }
}