<?php
require_once('Multiples.php');
require_once('Occurrences.php');

$service_2 = true;

if ($input <= 0 || gettype($input) != 'integer') {
    echo "Please provide a valid input!";
} else {

    $test = new Multiples();
    $test->checkInf()->checkQix()->checkFoo();

    echo $test->inf;
    echo $test->qix;
    echo $test->foo;

    // $test2 = new Occurrences();
    // $test2->checkFooOcc()->checkInfOcc()->checkQixOcc();


    if (array_count_values($test_array) == null) {
        echo strval($input);
    };

}



?>;
