<?php
require_once('Multiples.php');
require_once('Occurrences.php');

function myTests() {
    if ($GLOBALS['input'] <= 0 || gettype($GLOBALS['input']) != 'integer') {
     echo "Please provide a valid input!";
    } else {

    $test = new Multiples();
    $test->checkInf()->checkQix()->checkFoo();

    echo $test->inf;
    echo $test->qix;
    echo $test->foo;

    $test2 = new Occurrences();
    $test2->checkOcc_s2();

    if (array_count_values($GLOBALS['test_array']) == null) {
        echo $GLOBALS['input'];
    } else {
        if (array_sum($GLOBALS['input_split']) % $GLOBALS['infDivider'] == 0) {
        echo $GLOBALS['inf'];
        }
    }
}

    $GLOBALS['fooStatus'] = false;
    $GLOBALS['barStatus'] = false;
    $GLOBALS['qixStatus'] = false;
    $GLOBALS['infStatus'] = false;
};

// should return info message
$input = 'text';
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return info message
$input = -1;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return info message
$input = 0;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return 1
$input = 1;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return FooFoo
$input = 3;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return InfInf
$input = 8;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return QixQix
$input = 7;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Foo (only multiple)
$input = 12;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Inf (only multiple)
$input = 16;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Qix (only multiple)
$input = 14;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Inf; Foo
$input = 24;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Inf; Qix
$input = 56;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Qix; Foo
$input = 21;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Foo(multiple)QixFooFooQixInf(occurences)
$input = 733758;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return FooFooQix(occurences only)
$input = 337;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Inf; Qix; Foo(multiples)Qix(occurence)Inf(sum is a multiple of 8)
$input = 9744;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;






?>;
