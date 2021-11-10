<?php

use App\FooBar;
use PHPUnit\Framework\TestCase;

class FooBarTest extends TestCase
{
    protected FooBar $fooBar;

    public function test_is_result_foo()
    {
        $result = 'Foo';

        $this->assertEquals($result, $this->fooBar->numberText(3));
        $this->assertEquals($result, $this->fooBar->numberText(6));
        $this->assertEquals($result, $this->fooBar->numberText(12));
    }

    public function test_is_result_bar()
    {
        $result = 'Bar';

        $this->assertEquals($result, $this->fooBar->numberText(5));
        $this->assertEquals($result, $this->fooBar->numberText(10));
        $this->assertEquals($result, $this->fooBar->numberText(25));
    }

    public function test_is_result_foo_bar()
    {
        $result = 'Foo, Bar';

        $this->assertEquals($result, $this->fooBar->numberText(15));
        $this->assertEquals($result, $this->fooBar->numberText(30));
        $this->assertEquals($result, $this->fooBar->numberText(90));
    }
}