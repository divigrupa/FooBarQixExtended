<?php
require_once 'Models/Application.php';
require_once 'Models/Condition.php';
require_once 'Models/Input.php';

use app\Models\Application;
use app\Models\Condition;
use app\Models\Input;

$input = new Input(readline("Enter positive integer: "));

$conditions = [
    new Condition(3, "Foo"),
    new Condition(5, "Bar"),
    new Condition(7, "Qix")
    ];

$application = new Application($input, $conditions);

if($input->checkIfPositiveInteger() === false) {
    echo "Invalid input" . PHP_EOL;
    exit;
}

$application->verificationForMultiple();
$application->verificationForContains();

echo $application->getResult() . PHP_EOL;