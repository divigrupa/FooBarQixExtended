<?php
require_once '../vendor/autoload.php';

use App\Controllers\TransformationController;

$controller = new TransformationController();

$userInputNumber = readline('Input number For Transformation:');

$fooBarQixResult = $controller->fooBarQixTransformer($userInputNumber);
$infQixFooResult = $controller->infQixFooTransformer($userInputNumber);

echo 'FooBarQix Transformation:' . $fooBarQixResult->getOutput() . PHP_EOL;
echo 'InfQixFoo Transformation:' . $infQixFooResult->getOutput() . PHP_EOL;
