<?php


namespace App\Services\IntegratedNumberServices;

use App\Services\MultiplesServices\InfQixFooMultiplesService;
use App\Services\OccurrencesServices\InfQixFooOccurrencesService;

class InfQixFooIntegratedNumberService extends IntegratedNumberService
{
    public $multiples_service;
    public $occurrences_service;

    function __construct(){

        parent::__construct();
        $this->multiples_service = new InfQixFooMultiplesService();
        $this->occurrences_service = new InfQixFooOccurrencesService();
    }
}
