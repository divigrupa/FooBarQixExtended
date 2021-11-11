<?php


namespace Tests\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooCombinedTest extends TestCase
{
    public function test_is_result_foo_foo()
    {
        $result = 'FooFoo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(3));
    }

    public function test_is_result_inf_inf()
    {
        $result = 'InfInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(8));
    }

    public function test_is_result_qix_qix()
    {
        $result = 'QixQix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(7));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'FooQix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(203));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'QixFoo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(27));
    }

    public function test_is_result_inf_foo()
    {
        $result = 'InfFoo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(18));
    }

    public function test_is_result_foo_inf()
    {
        $result = 'FooInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(32));
    }

    public function test_is_result_inf_qix()
    {
        $result = 'InfQix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(28));
    }

    public function test_is_result_qix_inf()
    {
        $result = 'QixInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(176));
    }
}