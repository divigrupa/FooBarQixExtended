<?php


namespace App\Services\IntegratedNumberServices;

use App\Services\MultiplesServices\InfQixFooMultiplesService;
use App\Services\OccurrencesServices\InfQixFooOccurrencesService;

class InfQixFooIntegratedNumberService extends IntegratedNumberService
{
    public $multiples_service;
    public $occurrences_service;
    public $digit_sum_multipliers;

    function __construct(){

        parent::__construct();
        $this->multiples_service = new InfQixFooMultiplesService();
        $this->occurrences_service = new InfQixFooOccurrencesService();

        $this->separator = "; ";

        $this->digit_sum_multipliers = array_values(collect([
            [
                'multiplier' => 8,
                'suffix' => 'Inf'
            ],
        ])->sortBy('multiplier')->toArray());
    }

    /*
     * Override parent function which combines the results of multiples and occurrences,
     * but if the sum of digits is multiple of any of the multipliers,
     * append the associated suffix
     */
    public function multiples_occurrences_and_digit_sum($input_number){

        $parent_result = parent::multiples_and_occurrences($input_number);

        if(!$parent_result['success']) return $parent_result;   //If there was an error, return that

        //Convert parent result back to array
        $parent_result = explode($this->separator,$parent_result['result']);

        //Get sum of digits from input number
        $sum_of_digits = 0;
        $digit_array = str_split((string)$input_number);
        foreach ($digit_array as $digit){
            $sum_of_digits += (integer)$digit;
        }

        //Append each multiplier suffix to the last element in parent result
        foreach ($this->digit_sum_multipliers as $multiplier){
            if(!($sum_of_digits % $multiplier['multiplier'])){
                $parent_result[count($parent_result) - 1] = $parent_result[count($parent_result) - 1].$multiplier['suffix'];
            }
        }

        return [
            'success'=>true,
            'input' =>$input_number,
            'result'=>join($this->separator,$parent_result)
        ];
    }
}
