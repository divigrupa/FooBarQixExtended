<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\FooBarQix;

class FooBarQixTest extends TestCase
{
    /**
     * @test
     * @dataProvider conversions
     */
    public function it_checks_if_values_are_converted_correctly($expectedResult, $numberToConvert)
    {
        $this->assertSame($expectedResult, FooBarQix::convert($numberToConvert));
    }

    public function conversions()
    {
        return [
            'returns_Foo_for_multiples_of_3_where_num_3' => ['Foo', 3],
            'returns_Foo_for_multiples_of_3_where_num_33' => ['Foo', 33],
            'returns_Foo_for_multiples_of_3_where_num_66' => ['Foo', 66],
            'returns_Bar_for_multiples_of_5_where_num_5' => ['Bar', 5],
            'returns_Bar_for_multiples_of_5_where_num_25' => ['Bar', 25],
            'returns_Bar_for_multiples_of_5_where_num_55' => ['Bar', 55],
            'returns_Foo_and_Bar_for_multiples_of_3_and_5_where_num_15' => ['Foo, Bar', 15],
            'returns_Foo_and_Bar_for_multiples_of_3_and_5_where_num_60' => ['Foo, Bar', 60],
            'returns_Foo_and_Bar_for_multiples_of_3_and_5_where_num_120' => ['Foo, Bar', 120],
            'returns_string_if_not_a_multiple_of_any_where_num_4' => ['4', 4],
            'returns_string_if_not_a_multiple_of_any_where_num_19' => ['19', 19],
            'returns_string_if_not_a_multiple_of_any_where_num_107' => ['107', 107],
        ];
    }
}

