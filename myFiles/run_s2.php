<?php
require_once('Multiples.php');
require_once('Occurrences.php');

if ($input <= 0 || gettype($input) != 'integer') {
    echo "Please provide a valid input!";
} else {

    $service2_mult = new Multiples();
    $service2_mult->checkInf()->checkQix()->checkFoo();

    echo $service2_mult->inf;
    echo $service2_mult->qix;
    echo $service2_mult->foo;

    $service2_occ = new Occurrences();
    $service2_occ->checkOcc_s2();


    if (array_count_values($test_array) == null) {
        echo strval($input);
    } else {
        if (array_sum($input_split) % $infDivider == 0) {
        echo $inf;
        }
    };

}



?>;
