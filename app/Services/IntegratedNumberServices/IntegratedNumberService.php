<?php


namespace App\Services\IntegratedNumberServices;

use App\Services\NumberService;
use App\Services\MultiplesServices\MultiplesService;
use App\Services\OccurrencesServices\OccurrencesService;

class IntegratedNumberService extends NumberService
{
    public $multiples_service;
    public $occurrences_service;

    function __construct(){
        $this->multiples_service = new MultiplesService();
        $this->occurrences_service = new OccurrencesService();
    }

    /*
     * Validates the input number and combines the output of
     * multiples and occurrences service.
     */
    public function multiples_and_occurrences($input_number){

        //Validate input number so that other services dont have to
        $validator_response = $this->validate($input_number);
        if($validator_response) return $validator_response;

        //Get responses
        $multiples_response = $this->multiples_service->multiples($input_number,false);
        $occurrences_response = $this->occurrences_service->occurrences($input_number,false);

        //Check if calculations were successful and return the combined result
        if($multiples_response['success'] && $occurrences_response['success']){
            $combined_result = array_merge($multiples_response['result'],$occurrences_response['result']);
            return [
                'success'=>true,
                'input' =>$input_number,
                'result'=>$combined_result
            ];
        }

        //Return error message if calculations were not successful
        return [
            'success'=>false,
            'input' =>$input_number,
            'error'=>'Multiples and occurrences integration error.'
        ];
    }
}
