<?php

/**
 * It will take a number (positive integer) and provide :
 *    "Foo" if this number is multiple of 3
 *    "Bar" if this number is multiple of 5
 */
$testCases = [
	-15 => 'Foo, Bar',
	-3 => 'Foo',
	-2 => '-2',
	0 => '0',
	2 => '2',
	3 => 'Foo',
	4 => '4',
	5 => 'Bar',
	6 => 'Foo',
	7 => 'Qix',
	8 => '8',
	15 => 'Foo, Bar',
    105 => 'Foo, Bar, Qix',
];

foreach ($testCases as $number => $expected) {
    $actual = Transformer::divTransform($number);
    assert($actual === $expected);

	if ($actual === $expected) {
        d("Success {$number} => {$expected}<br>");
    } else {
        d(['number' => $number, 'expected' => $expected, 'actual' => $actual]);
    }
}


