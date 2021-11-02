<?php

use App\Models\Collections\MultipliersCollection;
use App\Models\Multiplier;

require_once 'vendor/autoload.php';

$multipliers = new MultipliersCollection([

    new Multiplier('foo', 3),
    new Multiplier('bar', 5),
    new Multiplier('qix', 7)
]);

$number = (int)readline('Input number: ');

echo $multipliers->getCompatibles($number) . PHP_EOL; // shows multiples
echo $multipliers->getCompatiblesIfAppends($number) . PHP_EOL; //shows occurrences
