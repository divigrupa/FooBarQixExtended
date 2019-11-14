<?php
require_once('Multiples.php');
require_once('Occurrences.php');

if ($input <= 0 || gettype($input) != 'integer') {
    echo "Please provide a valid input!";
} else {

    $test = new Multiples();
    $test->checkFoo()->checkBar()->checkQix();

    echo $test->foo;
    echo $test->bar;
    echo $test->qix;

    $test2 = new Occurrences();
    $test2->checkFooOcc()->checkBarOcc()->checkQixOcc();


    if (array_count_values($test_array) == null) {
        echo strval($input);
    };

}



?>;
