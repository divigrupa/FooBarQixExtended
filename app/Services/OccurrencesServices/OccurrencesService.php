<?php


namespace App\Services\OccurrencesServices;

use App\Services\NumberService;

class OccurrencesService extends NumberService
{

    public $digits;   //Key value pairs with digit values and their associated output
    public $separator;   //String of characters to use as glue if the array needs to be converted to string

    function __construct(){
        $this->digits = collect([
            [
                'digit' => 1,
                'output' => 'A'
            ]
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

        if($this->separator) $result = join($this->separator, $result);
        return [
            'success'=>true,
            'input'=>$input_number,
            'result'=>$result
        ];
    }
}
