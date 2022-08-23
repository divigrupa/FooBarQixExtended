<?php


namespace App\Services\MultiplesServices;

class InfQixFooMultiplesService extends MultiplesService
{

    public $multipliers;   //Key value pairs with multiplier values and their associated output

    function __construct(){

        parent::__construct();
        $this->multipliers = array_values(collect([
            [
                'multiplier' => 8,
                'output' => 'Inf'
            ],
            [
                'multiplier' => 7,
                'output' => 'Qix'
            ],
            [
                'multiplier' => 3,
                'output' => 'Foo'
            ],
        ])->sortBy('multiplier')->toArray());
    }

    /*
     * Returns a string or strings if input number is a multiple of
     * values associated with the strings. If input number is not a multiple,
     * then return the input number as a string
     */
    public function multiples($input_number, $validate = true){

        //If validate marker is left true, then do input number validation
        if($validate){
            $validator_response = $this->validate($input_number);
            if($validator_response) return $validator_response;
        }

        //Sort multipliers
        $sorted_multipliers = collect($this->multipliers);

        //If input number is 0 then return all outputs without calculation
        if($input_number == 0) return [
            'success'=> true,
            'input'=>$input_number,
            'result'=>$sorted_multipliers->pluck('output')->join("; ")
        ];


        //Sort multipliers by their value and append to output if the input number is a multiple
        $output = [];   //Array for storing the outputs when searching for multipliers

        foreach ($sorted_multipliers as $multiplier){
            if(!($input_number % $multiplier['multiplier'])) array_push($output,$multiplier['output']);
        }

        //If there were any multipliers that were suitable, return the array containing outputs
        if(!empty($output)) return [
            'success'=>true,
            'input'=>$input_number,
            'result'=>join("; ",$output)
        ];

        //If none of the multipliers were suitable for input, then return input number as string
        return [
            'success' => true,
            'input'=>$input_number,
            'result' => (string)$input_number,
        ];

    }
}
