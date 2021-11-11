<?php

namespace Tests\InfQixFooTests;

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class InfQixFooMultiplesTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(6));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(9));
    }

    public function test_is_result_inf()
    {
        $result = 'Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(16));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(40));
    }

    public function test_is_result_qix()
    {
        $result = 'Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(14));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(49));
    }

    public function test_is_result_inf_foo()
    {
        $result = 'Inf, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(24));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(96));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'Qix, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(21));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(42));
    }

    public function test_is_result_inf_qix()
    {
        $result = 'Inf, Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(56));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(112));
    }

    public function test_is_result_inf_qix_foo()
    {
        $result = 'Inf, Qix, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(504));
        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(2016));
    }
}
