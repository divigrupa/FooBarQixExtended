<?php

use App\FooBar;

require_once 'vendor/autoload.php';

$multipleOfThree = 'Foo';
$multipleOfFive = 'Bar';

$fooBar = new FooBar($multipleOfThree, $multipleOfFive);

echo $fooBar->numberText((int)readline("Enter number: ")) . PHP_EOL;