<?php

use App\FooBar;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(3));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(6));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(12));
    }

    public function test_is_result_bar()
    {
        $result = 'Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(5));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(10));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(25));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'Foo, Bar';

        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(15));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(30));
        $this->assertEquals($result, (new FooBar('Foo', 'Bar'))->numberText(90));
    }
}