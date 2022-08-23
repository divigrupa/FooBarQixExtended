<?php

namespace Tests\Feature\MultiplesAndOccurrences;

use App\Services\IntegratedNumberServices\IntegratedNumberService;
use Tests\TestCase;

class IntegratedNumberServiceTest extends TestCase
{
    protected $integrated_number_service; //The class instance that will produce the actual output
    protected $multipliers;
    protected $digits;
    protected $separator;

    public function setUp(): void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->integrated_number_service = new IntegratedNumberService();
        $this->multipliers = collect($this->integrated_number_service->multiples_service->multipliers)
            ->sortBy('multiplier');
        $this->digits = $this->integrated_number_service->occurrences_service->digits;
    }

    /**
     * Provide an invalid integer and expect an error message
     *
     * @test
     * @return void
     */
    public function invalid_integer_test()
    {
        $invalid_inputs = [
            -1,     //Negative integer,
            0.5,    //Positive floating point number,
            "Abc",  //String
        ];
        foreach ($invalid_inputs as $invalid_input) {
            $this->assert_invalid_input($invalid_input);
        }

    }

    private function assert_invalid_input($input)
    {
        $this->assertSame([
            'success' => false,
            'input' => $input,
            'error' => 'Input must be a positive integer'
        ], $this->integrated_number_service->multiples_and_occurrences($input));
    }

    /**
     * Create an integer that has is a multiple of all the multipliers and contains all
     * the necessary digits. Pass it to new service and compare output with expected result.
     *
     * @test
     * @return void
     */
    public function multiples_and_occurrences_test()
    {
        //Find a starting value that will always be multiple for all multipliers
        $multiplier_product = $this->multipliers[0]['multiplier'];
        for ($i = 1; $i<count($this->multipliers); $i++){
            $multiplier_product *= $this->multipliers[$i]['multiplier'];
        }

        //Keep incrementing the number by multiplier product until all transform digits are present
        $new_number = $multiplier_product;
        while (!$this->contains_all_transform_digits($new_number)) {
            $new_number += $multiplier_product;
        }

        //Expected multiples part contains all the multiples outputs
        $multiples_output = collect($this->multipliers)->pluck('output')->toArray();

        //Create expected digit occurrence output using new number
        $digits_in_number = str_split((string)$new_number);

        $occurrences_output = [];
        foreach ($digits_in_number as $digit_in_number){
            foreach ($this->digits as $transform_digit){
                if($digit_in_number == (string)$transform_digit['digit'])
                    array_push($occurrences_output,$transform_digit['output']);
            }
        }

        if($this->separator){
            $combined_result =
                join($this->integrated_number_service->multiples_service->separator, $multiples_output)
                . $this->separator.
                join($this->integrated_number_service->occurrences_service->separator, $occurrences_output);
        }
        else{
            $combined_result = array_merge($multiples_output,$occurrences_output);
        }

        //Assert that when passing the generated number as input to integrated number service
        //the result is the same as combined output of multiples and occurrences
        $this->assertSame(
            [
                'success'=>true,
                'input'=>$new_number,
                'result'=>$combined_result
            ],
            $this->integrated_number_service->multiples_and_occurrences($new_number)
        );
    }

    protected function contains_all_transform_digits($number){

        $digits_in_number = str_split((string)$number);

        //Go through each digit in number
        //If the number doesn't have one of the transform digits, then return false
        foreach ($this->digits as $transform_digit){
            if(
                !collect($digits_in_number)
                    ->contains((string)$transform_digit['digit'])
            ) return false;
        }
        return true;
    }
}
