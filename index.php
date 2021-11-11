<?php

use App\FooBarQix;
use App\InfQixFoo;

require_once 'vendor/autoload.php';

$multipleOfThree = 'Foo';
$multipleOfFive = 'Bar';
$multipleOfSeven = 'Qix';
$multipleOfEight = 'Inf';

$fooBarQix = new FooBarQix($multipleOfSeven, $multipleOfFive, $multipleOfThree);
$infQixFoo = new InfQixFoo($multipleOfEight, $multipleOfSeven, $multipleOfThree);

echo $fooBarQix->numberText((int)readline("Enter number for service FooBarQix: ")) . PHP_EOL;
echo $infQixFoo->numberText((int)readline("Enter number for service InfQixFoo: ")) . PHP_EOL;