<?php

namespace Tests\Unit\Step1;

use App\Services\MultiplesService;
use Facade\Ignition\Support\Packagist\Package;
use Tests\TestCase;

class Step1Test extends TestCase
{

    const MAX_INT = 9223372036854775807;    //Upper limit of integer data type
    private $number_range;  //Inputs that get filtered and rejected before passing them through the service
    private $multipliers;   //Different multipliers and their expected outputs according to the requirements
    private $multiples_service; //The class instance that will produce the actual output

    public function setUp() : void
    {
        parent::setUp();

        //Set up ranges of numbers to work with
        $this->number_range = array_merge(
            range(0,30),                                        //Low range
            range(4611686018427387888,4611686018427387933),     //Mid range
            range(self::MAX_INT - 30,self::MAX_INT)             //High range
        );

        $this->multipliers = [
            [
                'multiplier' => 5,
                'output' => 'Bar'
            ],
            [
                'multiplier' => 3,
                'output' => 'Foo'
            ],
        ];

        //Create the service to use its functions
        $this->multiples_service = new MultiplesService();
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
        foreach ($invalid_inputs as $invalid_input){
            $this->assert_invalid_input($invalid_input);
        }

    }

    private function assert_invalid_input($input){
        $this->assertSame([
            'success'=>false,
            'input'=>$input,
            'error'=>'Input must be a positive integer'
        ], $this->multiples_service->multiples($input));
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
                    'result'=>[$multiplier['output']]
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


        //First two multipliers

        //Lowest_common multiple is multiple of both multipliers (5 x 3 = 15, 5 x 3 = 15)
        $lowest_common_multiple = $this->multipliers[0]['multiplier'] * $this->multipliers[1]['multiplier'];

        $result = $this->multiples_service->multiples($lowest_common_multiple);
        $sorted_outputs = collect($this->multipliers)
            ->sortBy('multiplier')
            ->pluck('output')
            ->toArray();
        //Assert that result starts with the first two outputs
        $this->assertSame(true, $result['success']);
        $this->assertSame($lowest_common_multiple, $result['input']);
        $this->assertSame($sorted_outputs[0], $result['result'][0]);
        $this->assertSame($sorted_outputs[1], $result['result'][1]);


        //All multipliers
        //Arrange. Sort expected outputs by their multiplier
        $sorted_outputs = collect($this->multipliers)
            ->sortBy('multiplier')
            ->pluck('output')
            ->toArray();  //Take only the expected outputs from the array


        $this->assertSame([
            'success'=>true,
            'input'=>0,
            'result'=> $sorted_outputs
        ], $this->multiples_service->multiples(0)); //Zero is multiple of every multiplier (0 x 3 = 0, 0 x 5 = 0)
    }



    /**
     * By giving a number that isn't a multiple of any of the multipliers,
     * expected output is the same number but converted to a string
     *
     * @test
     * @return void
     */
    public function no_transformation_test()
    {

        //Arrange. Filter out the numbers that are multiples of described multipliers

        $no_transformation_multiples = collect($this->number_range);
        foreach ($this->multipliers as $multiplier){
            $no_transformation_multiples = $no_transformation_multiples->filter(function ($value) use ($multiplier){
                return $value % $multiplier['multiplier'];
            });
        }
        //  [0,1,2,3,4,5] => [1,2,4,7]

        //Act
        foreach ($no_transformation_multiples as $no_transformation_multiple){
            $this->assertSame([
                'success'=>true,
                'input'=>$no_transformation_multiple,
                'result'=> (string)$no_transformation_multiple
            ], $this->multiples_service->multiples($no_transformation_multiple));
        }
    }
}
