<?php


namespace Tests\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooCombinedTest extends TestCase
{
    public function test_is_result_foo_foo()
    {
        $result = 'Foo, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(3));
    }

    public function test_is_result_inf_inf()
    {
        $result = 'Inf, Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(8));
    }

    public function test_is_result_qix_qix()
    {
        $result = 'Qix, Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(7));
    }

    public function test_is_result_foo_qix()
    {
        $result = 'Foo, Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(203));
    }

    public function test_is_result_qix_foo()
    {
        $result = 'Qix, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(27));
    }

    public function test_is_result_inf_foo()
    {
        $result = 'Inf, Foo';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(18));
    }

    public function test_is_result_foo_inf()
    {
        $result = 'Foo, Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(32));
    }

    public function test_is_result_inf_qix()
    {
        $result = 'Inf, Qix';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(28));
    }

    public function test_is_result_qix_inf()
    {
        $result = 'Qix, Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(176));
    }
}