<?php

use App\Models\Bar;
use App\Models\Foo;
use App\Models\FooBarQixCollection;
use App\Models\Qix;
use App\Services\FooBarQixService;
use App\Validations\InputNumberValidator;

require_once 'vendor/autoload.php';

$fooBarQixCollection = new FooBarQixCollection();
$fooBarQixCollection->addMultiples(new Foo());
$fooBarQixCollection->addMultiples(new Bar());
$fooBarQixCollection->addMultiples(new Qix());

$fooBarQixService = new FooBarQixService($fooBarQixCollection);

$validateInput = new InputNumberValidator();
$userInput = readline(" Enter positive integer : ");

if (!$validateInput->validate($userInput)) {
    echo "Invalid input";
    exit();
}

echo $fooBarQixService->execute($userInput);