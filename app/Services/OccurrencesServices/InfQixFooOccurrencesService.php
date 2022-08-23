<?php


namespace App\Services\OccurrencesServices;


class InfQixFooOccurrencesService extends OccurrencesService
{

    function __construct(){

        parent::__construct();
        $this->digits = collect([
            [
                'digit' => 3,
                'output' => 'Foo'
            ],
            [
                'digit' => 8,
                'output' => 'Inf'
            ],
            [
                'digit' => 7,
                'output' => 'Qix'
            ],
        ]);
    }

    /*
     * Transforms input number digits into associated strings and
     * returns an array of all the transformations if any were present.
     * Also validates that input number is a positive integer.
     */
    public function occurrences($input_number, $validate = true){

        //If validate marker is left true, then do input number validation
        if($validate){
            $validator_response = $this->validate($input_number);
            if($validator_response) return $validator_response;
        }

        //Split input number into digits
        $input_digits = str_split((string)$input_number);

        $result = [];
        // Go through each digit in input number
        foreach($input_digits as $input_digit){

            //Find matching transformation digit for current input digit
            $transformation_digit = null;
            foreach($this->digits as $defined_digit){

                if((integer)$input_digit == $defined_digit['digit']) {
                    //Transformation digit matches, append output to array
                    array_push($result,$defined_digit['output']);
                    break;
                }
            }
        }

        return [
            'success'=>true,
            'input'=>$input_number,
            'result'=>join("; ",$result)
        ];
    }
}
