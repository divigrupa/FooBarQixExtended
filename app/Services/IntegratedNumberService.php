<?php


namespace App\Services;



class IntegratedNumberService extends NumberService
{
    public $multipliers;
    public $digits;
    public $multiples_service;
    public $occurrences_service;

    function __construct(){
        $this->multiples_service = new MultiplesService();
        $this->occurrences_service = new OccurrencesService();
    }

    public function multiples_and_occurrences($input_number){
        return null;
    }
}
