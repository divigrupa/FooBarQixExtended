<?php
require_once('Multiples.php');
require_once('Occurrences.php');

if ($input <= 0 || gettype($input) != 'integer') {
    echo "Please provide a valid input!";
} else {

    $service1_mult = new Multiples();
    $service1_mult->checkFoo()->checkBar()->checkQix();

    echo $service1_mult->foo;
    echo $service1_mult->bar;
    echo $service1_mult->qix;

    $service1_occ = new Occurrences();
    $service1_occ->checkOcc_s1();


    if (array_count_values($test_array) == null) {
        echo strval($input);
    };

}



?>;
