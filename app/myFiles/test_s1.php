<?php
require_once('Multiples.php');
require_once('Occurrences.php');

function myTests() {
    if ($GLOBALS['input'] <= 0 || gettype($GLOBALS['input']) != 'integer') {
     echo "Please provide a valid input!";
    } else {

    $test = new Multiples();
    $test->checkFoo()->checkBar()->checkQix();

    echo $test->foo;
    echo $test->bar;
    echo $test->qix;

    $test2 = new Occurrences();
    $test2->checkOcc_s1();

    if (array_count_values($GLOBALS['test_array']) == null) {
        echo $GLOBALS['input'];
    };

    }
    $GLOBALS['fooStatus'] = false;
    $GLOBALS['barStatus'] = false;
    $GLOBALS['qixStatus'] = false;
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

// should return BarBar
$input = 5;
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

// should return Foo, BarBar
$input = 15;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Foo, Qix (only multiples)
$input = 21;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Bar, QixFooBar
$input = 35;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Foo, Bar, QixBar
$input = 105;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return BarBarFooFoo (only occurrences)
$input = 5533;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return 998
$input = 998;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;

// should return Foo, QixQixQixQix
$input = 777;
$input_split = str_split($input, 1);
$test_array = [];
myTests();
echo PHP_EOL;




?>;
