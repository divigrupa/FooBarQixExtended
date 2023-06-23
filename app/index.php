<?php declare(strict_types=1);

use App\Service\FooBarService;
use App\Service\InfQixFooService;

require_once __DIR__ . '/vendor/autoload.php';

$fooService = new FooBarService();
$infService = new InfQixFooService();

echo $fooService->processNumber(77535) . '</br>';
echo $infService->processNumber(4488);
