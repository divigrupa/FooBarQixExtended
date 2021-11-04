<?php

use App\Models\Collections\MultipliersCollection;
use App\Models\Multiplier;
use App\Services\FooBarQixService;
use App\Services\InfQixFooService;

require_once 'vendor/autoload.php';



//$fooBarQixService = new FooBarQixService();
//
//$fooBarQixService->execute();
//

$infQixFooService = new InfQixFooService();

$infQixFooService->execute();



