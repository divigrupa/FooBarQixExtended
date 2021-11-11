<?php

use App\FooBarQix;

require_once 'vendor/autoload.php';

$multipleOfThree = 'Foo';
$multipleOfFive = 'Bar';
$multipleOfSeven = 'Qix';

$fooBarQix = new FooBarQix($multipleOfThree, $multipleOfFive, $multipleOfSeven);

echo $fooBarQix->numberText((int)readline("Enter number: ")) . PHP_EOL;