<?php
	assert_options(ASSERT_WARNING, false);
	function makeAssert(int $number, string $actual, string $expected, string $case = '') {
		if (!assert($actual === $expected)) {
			$where = !empty($case) ?  ' at ' . $case : '';
			print_r('Problem' . $where . ':');
			d([
				'case' => $case,
				'input' => $number,
				'actual' => $actual,
				'expected' => $expected
			]);
		}
	}

	/**
	 * It will take a number (positive integer) and provide :
	 *    "Foo" if this number is multiple of 3
	 *    "Bar" if this number is multiple of 5
	 *    "Qix" if this number is multiple of 7
	 */
	$transformer = new Transformer(1);
	$testCases = [
		-15 => 'Foo, Bar',
		-3 => 'Foo',
		-1 => '-1',
		0 => '0',
		3 => 'Foo',
		4 => '4',
		7 => 'Qix',
		8 => '8',
		10 => 'Bar',
		15 => 'Foo, Bar',
        105 => 'Foo, Bar, Qix',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer->divTransform($number);
		makeAssert($number, $actual, $expected, 'divTransform, 1');
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
		0 => '0',
		153743 => 'Bar, Foo, Qix, Foo',
		231415 => 'Foo, Bar',
		3231 => 'Foo, Foo',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer->attachTransform($number);
		makeAssert($number, $actual, $expected, 'attachTransform, 1');
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
		0 => '0',
		153743 => 'Bar, Foo, Qix, Foo',
		231415 => 'Bar, Foo, Bar',
		3231 => 'Foo, Foo, Foo',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer->fullTransform($number);
		makeAssert($number, $actual, $expected, 'fullTransform, 1');
	}

	/**
	 * New Transformer check
	 */
	$transformer2 = new Transformer(2);

	$testCases = [
		-15 => 'Foo',
		-3 => 'Foo',
		-1 => '-1',
		0 => '0',
		3 => 'Foo',
		4 => '4',
		7 => 'Qix',
		8 => 'Inf',
		10 => '10',
		15 => 'Foo',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer2->divTransform($number);
		makeAssert($number, $actual, $expected, 'divTransform, 2');
	}

	$testCases = [
		-1142881 => 'Inf; Inf',
		-3314123 => 'Foo; Foo; Foo',
		-2314 => 'Foo',
		0 => '0',
		153743 => 'Foo; Qix; Foo',
		231415 => 'Foo',
		3231 => 'Foo; Foo',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer2->attachTransform($number);
		makeAssert($number, $actual, $expected, 'attachTransform, 2');
	}

	$testCases = [
		-1142881 => '',
		-8 => 'Inf',
		0 => '',
		1313 => 'Inf',
		3231 => '',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer2->sumTransform($number);
		makeAssert($number, $actual, $expected, 'sumTransform, 2');
	}

	$testCases = [
		-1142881 => 'Inf; Inf',
		-3314123 => 'Foo; Foo; Foo',
		-2314 => 'Foo',
		0 => '0',
		1313 => 'Foo; FooInf',
		153743 => 'Foo; Qix; Foo',
		231415 => 'Foo',
		3231 => 'Foo; Foo; Foo',
	];
	foreach ($testCases as $number => $expected) {
		$actual = $transformer2->fullTransform($number);
		makeAssert($number, $actual, $expected, 'fullTransform, 2');
	}
die('Done.');

