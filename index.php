<?php

use App\Models\Bar;
use App\Models\Foo;
use App\Models\FooBarQixCollection;
use App\Models\Inf;
use App\Models\Qix;
use App\Services\FooBarQixService;
use App\Services\InfQixFooService;
use App\Validations\InputNumberValidator;

require_once 'vendor/autoload.php';

$fooBarQixCollection = new FooBarQixCollection();
$fooBarQixCollection->addMultiples(new Foo());
$fooBarQixCollection->addMultiples(new Bar());
$fooBarQixCollection->addMultiples(new Qix());

$fooBarQixService = new FooBarQixService($fooBarQixCollection);

$infQixFooCollection = new FooBarQixCollection();
$infQixFooCollection->addMultiples(new Inf());
$infQixFooCollection->addMultiples(new Qix());
$infQixFooCollection->addMultiples(new Foo());

$infQixFooService = new InfQixFooService($infQixFooCollection);


$validateInput = new InputNumberValidator();
$userInput = readline(" Enter positive integer : ");

if (!$validateInput->validate($userInput)) {
    echo "Invalid input";
    exit();
}

echo $fooBarQixService->execute($userInput);
echo PHP_EOL;
echo $infQixFooService->execute($userInput);
