<?php

namespace Tests\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooMultipleOfEightTest extends TestCase
{
    public function test_is_result_Inf_Inf_Inf()
    {
        $result = 'InfInfInf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(8));
    }

    public function test_is_result_Inf()
    {
        $result = 'Inf';

        $this->assertEquals($result, (new InfQixFoo('Inf', 'Qix', 'Foo'))->numberText(44));
    }
}