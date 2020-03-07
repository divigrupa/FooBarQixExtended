<?php

/**
 * It will take a number (positive integer) and provide :
 *    "Foo" if this number is multiple of 3
 *    "Bar" if this number is multiple of 5
 *    "Qix" if this number is multiple of 7
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

/**
 * The new rules are : If the given number contains specific digit,
 * we will apppend a word to the transformation in the order they appear in the number.
 * So if a number contains :
 *    3, then we append "Foo"
 *    5, then we append "Bar"
 *    7, then we append "Qix"
 */
$testCases = [
    -1142881 => '-1142881',
    -3314123 => 'Foo, Foo, Foo',
    -2314 => 'Foo',
    -1321 => 'Foo',
    0 => '0',
    153743 => 'Bar, Foo, Qix, Foo',
    231415 => 'Foo, Bar',
    3231 => 'Foo, Foo',
];
foreach ($testCases as $number => $expected) {
    $actual = Transformer::attachTransform($number);
    assert($actual === $expected);
    if ($actual === $expected) {
        d("Success {$number} => {$expected}<br>");
    } else {
        d(['number' => $number, 'expected' => $expected, 'actual' => $actual]);
    }
}

/**
 * Here, you have to add test for the new functionnality
 * and add some to test numbers that triggers both functionnality
 * in order to know if they work well together.
 */
$testCases = [
    -1142881 => '-1142881',
    -3314123 => 'Foo, Foo, Foo',
    -2314 => 'Foo',
    -1321 => 'Foo',
    0 => '0',
    153743 => 'Bar, Foo, Qix, Foo',
    231415 => 'Bar, Foo, Bar',
    3231 => 'Foo, Foo, Foo',
];
foreach ($testCases as $number => $expected) {
    $actual = Transformer::fullTransform($number);
    assert($actual === $expected);
    if ($actual === $expected) {
        d("Success {$number} => {$expected}<br>");
    } else {
        d(['number' => $number, 'expected' => $expected, 'actual' => $actual]);
    }
}

