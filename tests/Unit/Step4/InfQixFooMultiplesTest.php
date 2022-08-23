<?php

namespace Tests\Unit\Step1;

use App\Services\MultiplesServices\InfQixFooMultiplesService;
use Tests\Unit\Multiples\MultiplesTest;

class InfQixFooMultiplesTest extends MultiplesTest
{

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->multiples_service = new InfQixFooMultiplesService();
        $this->multipliers = $this->multiples_service->multipliers;
    }

    /**
     * Go through each of the multipliers, select input values and
     * test if service returns the appropriate return value when providing a number
     * that is a multiple of a single multiplier
     *
     * @test
     * @return void
     */
    public function single_multiple_test(){

        //Iterate over each multiplier
        foreach ($this->multipliers as $multiplier){


            //Arrange
            //      [0, 1, 2, 3, ...]
            $input_values = collect($this->number_range);

            //Reject the values that are not multiples of the current multiplier
            //      if multiplier is 3, then leave only multiples of 3
            //      [0, 1, 2, 3, 4, ...] => [0, 3, 6, 9, 12, 15, 18, ...]
            $input_values = $input_values->reject(function ($value) use ($multiplier) {
                return $value % $multiplier['multiplier'];
            });

            //Filter out values that are at the same time multiples of another multiplier
            //      if multiplier is 3, then remove multiples of 5
            //      [0, 3, 6, 9, 12, 15, 18, ...] => [0, 3, 6, 9, 12, 18, ...]
            foreach ($this->multipliers as $other_multiplier){

                if($other_multiplier == $multiplier) continue;  // Skip current multiplier

                $input_values = $input_values->filter(function ($value) use ($other_multiplier) {
                    return $value % $other_multiplier['multiplier'];
                });
            }


            //Act. Assert that output matches for each input value
            foreach ($input_values as $input_value){
                $this->assertSame([
                    'success'=>true,
                    'input'=>$input_value,
                    'result'=>join("; ",[$multiplier['output']])
                ], $this->multiples_service->multiples($input_value));
            }
        }
    }


    /**
     * Test if the output contains multiple expected strings, when providing an input number
     * that has multiple of different multipliers
     *
     * @test
     * @return void
     */
    public function combined_multiple_test()
    {


        if(count($this->multipliers) >= 2){
            //First two multipliers

            //Lowest_common multiple is multiple of both multipliers (5 x 3 = 15, 5 x 3 = 15)
            $lowest_common_multiple = $this->multipliers[0]['multiplier'] * $this->multipliers[1]['multiplier'];

            $result = $this->multiples_service->multiples($lowest_common_multiple);
            $sorted_outputs = collect($this->multipliers)
                ->sortBy('multiplier')
                ->pluck('output');
            //Assert that result starts with the first two outputs
            $this->assertSame(true, $result['success']);
            $this->assertSame($lowest_common_multiple, $result['input']);
            $result_array = explode("; ",$result['result']);
            $this->assertSame($sorted_outputs[0], $result_array[0]);
            $this->assertSame($sorted_outputs[1], $result_array[1]);
        }

        //All multipliers
        //Arrange. Sort expected outputs by their multiplier
        $sorted_outputs = collect($this->multipliers)
            ->sortBy('multiplier')
            ->pluck('output')
            ->join("; ");  //Take only the expected outputs from the array


        $this->assertSame([
            'success'=>true,
            'input'=>0,
            'result'=> $sorted_outputs
        ], $this->multiples_service->multiples(0)); //Zero is multiple of every multiplier (0 x 3 = 0, 0 x 5 = 0)
    }
}
