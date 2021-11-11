<?php

use App\FooBar;

require_once 'vendor/autoload.php';

$multipleOfThree = 'Foo';
$multipleOfFive = 'Bar';
$multipleOfSeven = 'Qix';

$fooBar = new FooBar($multipleOfThree, $multipleOfFive, $multipleOfSeven);

echo $fooBar->numberText((int)readline("Enter number: ")) . PHP_EOL;