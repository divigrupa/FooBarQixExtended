<?php
require_once '../vendor/autoload.php';

use App\Controllers\TransformationController;

$controller = new TransformationController();
$userInputNumber = readline('Input number For Transformation:');
$result = $controller->fooBarTransformer($userInputNumber);
echo $result->getOutput();
echo PHP_EOL;