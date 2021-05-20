<?php

use App\Services\FooBarQixService;
use App\Validations\InputNumberValidator;

require_once 'vendor/autoload.php';


$fooBarQix = new FooBarQixService();
$validateInput = new InputNumberValidator();

$userInput = readline(" Enter positive integer : ");

if (!$validateInput->validate($userInput)) {
    echo "Invalid input";
    exit();
}

echo $fooBarQix->execute($userInput);