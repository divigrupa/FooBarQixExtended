<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\InfQixFoo;

class InfQixFooTest extends TestCase
{
    /**
     * @test
     * @dataProvider conversions
     */
    public function it_checks_if_the_values_are_converted_correctly($expectedResult, $numberToConvert)
    {
        $this->assertSame($expectedResult, InfQixFoo::convert($numberToConvert));
    }

    public function conversions()
    {
        return [
            'returns_Inf_if_it_is_multiple_of_8_where_num_16' => ['Inf', 16],
            'returns_Inf_if_it_is_multiple_of_8_where_num_32' => ['Inf', 32],
            'returns_Qix_if_it_is_multiple_of_7_where_num_14' => ['Qix', 14],
            'returns_Qix_if_it_is_multiple_of_7_where_num_35' => ['Qix', 35],
            'returns_Foo_if_it_is_multiple_of_3_where_num_6' => ['Foo', 6],
            'returns_Foo_if_it_is_multiple_of_3_where_num_9' => ['Foo', 9],
            'returns_Inf_Qix_if_multiple_of_8_7_where_num_56' => ['Inf; Qix', 56],
            'returns_Inf_Qix_if_multiple_of_8_7_where_num_112' => ['Inf; Qix', 112],
            'returns_Inf_Foo_if_multiple_of_8_3_where_num_24' => ['Inf; Foo', 24],
            'returns_Inf_Foo_if_multiple_of_8_3_where_num_48' => ['Inf; Foo', 48],
            'returns_Qix_Foo_if_multiple_of_7_3_where_num_21' => ['Qix; Foo', 21],
            'returns_Qix_Foo_if_multiple_of_7_3_where_num_105' => ['Qix; Foo', 105],
            'returns_Inf_Qix_Foo_if_multiple_of_8_7_3_where_num_168' => ['Inf; Qix; Foo', 168],
            'returns_Inf_Qix_Foo_if_multiple_of_8_7_3_where_num_1512' => ['Inf; Qix; Foo', 1512],
        ];
    }

    /**
     * @test
     * @dataProvider appendedLetters
     */
    public function it_appends_string_depending_on_numbers($expectedResult, $numberToConvert)
    {
        $this->assertSame($expectedResult, InfQixFoo::appendStringBasedOnNumbers($numberToConvert));
    }

    public function appendedLetters()
    {
        return [
            'returns_Inf_Foo_if_number_is_83' => ['Inf; Foo', 83],
            'returns_Foo_Qix_if_number_is_37' => ['Foo; Qix', 37],
            'returns_Qix_Inf_if_number_is_780' => ['Qix; Inf', 780],
            'returns_Qix_Foo_Foo_if_number_is_72393' => ['Qix; Foo; Foo', 72393],
            'returns_Inf_Qix_Qix_if_number_is_28977' => ['Inf; Qix; Qix', 28977],
            'returns_Qix_Inf_Foo_Foo_if_number_is_97833' => ['Qix; Inf; Foo; Foo', 97833],
            'returns_Foo_Qix_Foo_Inf_if_number_is_3197328' => ['Foo; Qix; Foo; Inf', 3197328],
            'returns_Qix_Inf_Qix_Bar_Foo_if_number_is_728783' => ['Qix; Inf; Qix; Inf; Foo', 728783],
            'returns_Qix_Foo_Foo_Inf_Foo_Qix_if_number_is_72336837' => ['Qix; Foo; Foo; Inf; Foo; Qix', 72336837],
            'returns_Inf_Foo_Inf_Inf_Qix_Foo_if_number_is_72336837' => ['Inf; Foo; Inf; Inf; Qix; Foo', 8230889723]
        ];
    }

    /**
     * @test
     * @dataProvider conversionsAndAppends
     */
    public function it_converts_and_appends_string($expectedResult, $numberToConvert)
    {
        $this->assertSame($expectedResult, InfQixFoo::convertAndAppend($numberToConvert));
    }

    public function conversionsAndAppends()
    {
        return [
            'returns_Foo_Foo_if_number_is_37' => ['Foo; Foo', 37],
            'returns_Inf_Inf_if_number_is_80' => ['Inf; Inf', 80],
            'returns_Qix_Foo_Foo_if_number_is_133' => ['Qix; Foo; Foo', 133],
            'returns_Foo_Foo_Foo_if_number_is_33' => ['Foo; Foo; Foo', 33],
            'returns_Inf_if_number_is_160' => ['Inf', 160],
            'returns_Foo_Foo_Qix_Inf_if_number_is_3708' => ['Foo; Foo; Qix; Inf', 3708],
            'returns_Foo_Inf_Foo_Qix_if_number_is_9837' => ['Foo; Inf; Foo; Qix', 9837],
            'returns_Qix_Qix_Inf_Foo_if_number_is_75803' => ['Qix; Qix; Inf; Foo', 75803],
            'returns_Inf_Qix_Inf_Foo_Inf_Inf_Inf_if_number_is_83888' => ['Inf; Qix; Inf; Foo; Inf; Inf; Inf', 83888],
            'not_multiple_of_any_if_number_137' => ['137, Foo, Qix', 137],
            'not_multiple_of_any_if_number_263' => ['263, Foo', 263],
        ];
    }
}
