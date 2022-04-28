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
            'returns_Foo_Bar_for_multiples_of_3_and_5_where_num_15' => ['Foo, Bar', 15],
            'returns_Foo_Bar_for_multiples_of_3_and_5_where_num_60' => ['Foo, Bar', 60],
            'returns_Foo_Bar_for_multiples_of_3_and_5_where_num_120' => ['Foo, Bar', 120],
            'returns_string_if_not_a_multiple_of_any_where_num_4' => ['4', 4],
            'returns_string_if_not_a_multiple_of_any_where_num_19' => ['19', 19],
            'returns_string_if_not_a_multiple_of_any_where_num_107' => ['107', 107],
            'returns_Qix_for_multiples_of_7_where_num_14' => ['Qix', 14],
            'returns_Qix_for_multiples_of_7_where_num_49' => ['Qix', 49],
            'returns_Qix_for_multiples_of_7_where_num_119' => ['Qix', 119],
            'returns_Foo_and_Qix_for_multiples_of_3_and_7_where_num_21' => ['Foo, Qix', 21],
            'returns_Foo_and_Qix_for_multiples_of_3_and_7_where_num_147' => ['Foo, Qix', 147],
            'returns_Foo_and_Qix_for_multiples_of_3_and_7_where_num_189' => ['Foo, Qix', 189],
            'returns_Bar_and_Qix_for_multiples_of_5_and_7_where_num_175' => ['Bar, Qix', 175],
            'returns_Bar_and_Qix_for_multiples_of_5_and_7_where_num_245' => ['Bar, Qix', 245],
            'returns_Bar_and_Qix_for_multiples_of_5_and_7_where_num_350' => ['Bar, Qix', 350],
            'returns_Foo_Bar_Qix_for_multiples_of_3_5_7_where_num_105' => ['Foo, Bar, Qix', 105],
            'returns_Foo_Bar_Qix_for_multiples_of_3_5_7_where_num_525' => ['Foo, Bar, Qix', 525],
            'returns_Foo_Bar_Qix_for_multiples_of_3_5_7_where_num_1575' => ['Foo, Bar, Qix', 1575],
        ];
    }
}

