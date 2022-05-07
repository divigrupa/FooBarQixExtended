<?php

require_once 'Models/Application.php';
require_once 'Models/Condition.php';
require_once 'Models/Input.php';

use app\Models\Application;
use app\Models\Condition;
use app\Models\Input;

$input = new Input(readline("Enter positive integer: "));

$conditionsForMultiples = [
    new Condition(8, "Inf"),
    new Condition(7, "Qix"),
    new Condition(3, "Foo")
];

$conditionsForContains = [
    new Condition(3, "Foo"),
    new Condition(8, "Inf"),
    new Condition(7, "Qix"),
];

$application = new Application($input, ";", $conditionsForMultiples);

if ($input->checkIfPositiveInteger() === false) {
    echo "Invalid input" . PHP_EOL;
    exit;
}

$application->verificationForMultiple();
$application->verificationForContains($conditionsForContains);

echo $application->getResult() . PHP_EOL;
