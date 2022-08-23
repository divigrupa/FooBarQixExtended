<?php

namespace Tests\Unit\Occurrences;

use App\Services\OccurrencesServices\OccurrencesService;
use Tests\TestCase;

class OccurrencesTest extends TestCase
{

    protected $digits;   //Different multipliers and their expected outputs according to the requirements
    protected $occurrences_service; //The class instance that will produce the actual output
    protected $separator;

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->occurrences_service = new OccurrencesService();
        $this->digits = $this->occurrences_service->digits;
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
        ], $this->occurrences_service->occurrences($input));
    }


    /**
     * Pass each defined digit to the occurrences function for numbers where
     * the digits occur once and multiple times and compare the function output.
     *
     * @test
     * @return void
     */
    public function individual_digits_test(){

        //One output element
        //Iterate over each digit and compare if the output matches the defined key value pairs
        foreach ($this->digits as $digit){

            $expected_result = [$digit['output']];
            if($this->separator) $expected_result = $digit['output'];
            $this->assertSame(
                [
                    'success'=>true,
                    'input'=>$digit['digit'],
                    'result'=>$expected_result    //Expected one output element in array
                ],
                $this->occurrences_service->occurrences($digit['digit'])    //Actual
            );
        }

        //Multiple output elements
        //Multiply digit by 111 to get three output elements that are the same
        foreach ($this->digits as $digit){

            $input_number = $digit['digit'] * 111;

            $expected_result = [    //Expected three output elements in array
                $digit['output'],
                $digit['output'],
                $digit['output']
            ];
            if($this->separator) $expected_result = join($this->separator, $expected_result);
            $this->assertSame(
                [
                    'success'=>true,
                    'input'=>$input_number,
                    'result'=>$expected_result
                ],
                $this->occurrences_service->occurrences($input_number)    //Actual
            );
        }
    }


    /**
     * Create a number by concatenating defined digit-output pairs,
     * from first to last and in reveres. Compare the occurrences function
     * output to output expected for created numbers.
     *
     * @test
     * @return void
     */
    public function mixed_digits_test(){

        //Number and its expected output when combining digits from first to last
        $digits_mix = collect($this->digits)->pluck('digit')->toArray();
        $outputs_mix = array_values(collect($this->digits)->pluck('output')->toArray());
        if($this->separator) $outputs_mix = join($this->separator, $outputs_mix);

        $input_number = (int)collect($digits_mix)->join('');    //Convert array to integer
        $this->assertSame(
            [
                'success'=>true,
                'input'=>$input_number,
                'result'=>$outputs_mix
            ],
            $this->occurrences_service->occurrences($input_number)    //Actual when concatenating each digit into a single number
        );

        //Number and its expected output when combining digits from last to first
        $reverse_digits_mix = collect($digits_mix)->reverse();
        $reverse_outputs_mix = array_values(collect($this->digits)->pluck('output')->reverse()->toArray());

        if($this->separator) $reverse_outputs_mix = join($this->separator, $reverse_outputs_mix);

        $input_number = (int)collect($reverse_digits_mix)->join('');    //Convert array to integer

        $this->assertSame(
            [
                'success'=>true,
                'input'=>$input_number,
                'result'=>$reverse_outputs_mix
            ],
            $this->occurrences_service->occurrences($input_number)    //Actual when concatenating each digit into a single number
        );
    }


    /**
     * Create input numbers that are expected to have no transformations and test
     * if function returns an empty array
     *
     * @test
     * @return void
     */
    public function no_transformation_test(){

        //Create an array of numbers that have no digits for transformation
        $no_transformation_numbers = collect(range(0,100));
        foreach ($this->digits as $digit){

            //Reject the numbers that when converted to array contain the current digit
            $no_transformation_numbers = $no_transformation_numbers->reject(function ($number) use ($digit) {
                return collect(str_split((string)$number))  //Split number by digit
                    ->contains((string)$digit['digit']);    //Compare with current digit
            });
        }

        if($this->separator) $expected_result = '';
        else $expected_result = [];

        //Go through each number that has no digits for transformation and compare output
        foreach ($no_transformation_numbers as $no_transformation_number){
            $this->assertSame(
                [
                    'success'=>true,
                    'input'=>$no_transformation_number,
                    'result'=>$expected_result
                ], //No output if number has no defined digits for transformation
                $this->occurrences_service->occurrences($no_transformation_number)
            );
        }
    }


    /**
     * Create an input number that has both digits with defined transformations
     * and a digit without defined transformation. Compare if output skips the digit
     * without defined transformation.
     *
     * @test
     * @return void
     */
    public function mixed_digits_and_no_transformation_test(){

        //Create digits that have no transformation
        $no_transformation_digits = collect(range(0,9));
        //Reject numbers that are already digits that have defined transformations
        foreach ($this->digits as $digit){

            //Reject the numbers that when converted to array contain the current digit
            $no_transformation_digits = $no_transformation_digits->reject(function ($number) use ($digit) {
                return collect(str_split((string)$number))  //Split number by digit
                ->contains((string)$digit['digit']);    //Compare with current digit
            });
        }
        $no_transformation_digits = $no_transformation_digits->toArray();
        $no_transformation_digits = array_values($no_transformation_digits);    //Reassign array keys after removing elements

        $input_number = [];
        $expected_output = [];
        //Insert three random digits that have defined transformation and add them to expected output
        for ($i=0; $i<3; $i++){
            $random_digit = $this->digits[rand(0,count($this->digits) - 1)];
            array_push(
                $input_number,
                $random_digit['digit']
            );
            array_push(
                $expected_output,
                $random_digit['output']
            );
        }
        //Insert random no transformation digit
        $random_digit = $no_transformation_digits[rand(0,count($no_transformation_digits) - 1)];
        array_push(
            $input_number,
            $random_digit
        );
        //Insert another random digit that has defined transformation
        $random_digit = $this->digits[rand(0,count($this->digits) - 1)];
        array_push(
            $input_number,
            $random_digit['digit']
        );
        array_push(
            $expected_output,
            $random_digit['output']
        );

        //Convert input number to integer
        $input_number = (integer)collect($input_number)->join('');

        $expected_result = array_values($expected_output);
        if($this->separator) $expected_result = join($this->separator, $expected_result);

        $this->assertSame(
            [
                'success'=>true,
                'input'=>$input_number,
                'result'=>$expected_result
            ],
            $this->occurrences_service->occurrences($input_number)
        );
    }
}
