<?php


namespace App\Services\IntegratedNumberServices;

use App\Services\MultiplesServices\FooBarQixMultiplesService;
use App\Services\OccurrencesServices\FooBarQixOccurrencesService;

class FooBarQixIntegratedNumberService extends IntegratedNumberService
{
    public $multiples_service;
    public $occurrences_service;

    function __construct(){

        parent::__construct();
        $this->multiples_service = new FooBarQixMultiplesService();
        $this->occurrences_service = new FooBarQixOccurrencesService();
    }
}
