<?php

namespace Tests\Feature\MultiplesAndOccurrences;

use App\Services\IntegratedNumberServices\InfQixFooIntegratedNumberService;

class InfQixFooIntegratedNumberServiceTest extends IntegratedNumberServiceTest
{

    private $digit_sum_multipliers;

    public function setUp(): void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->integrated_number_service = new InfQixFooIntegratedNumberService();
        $this->multipliers = collect($this->integrated_number_service->multiples_service->multipliers)
            ->sortBy('multiplier');
        $this->digits = $this->integrated_number_service->occurrences_service->digits;

        $this->separator = "; ";

        $this->digit_sum_multipliers = $this->integrated_number_service->digit_sum_multipliers;
    }


    /**
     * Pass input number that is equal to each digit sum multiplier
     * and test if service output contains associated suffix.
     *
     * @test
     * @return void
     */
    public function individual_digit_sum_test(){

        foreach ($this->digit_sum_multipliers as $digit_sum_multiplier){

            //Expected result = multiples[result]; digit[output](prefix).digit_sum_multiplier['suffix'](suffix)
            //Find the digit (if there even is one) that will have the suffix appended
            $prefix = '';
            foreach ($this->digits as $digit){
                if($digit['digit'] == $digit_sum_multiplier['multiplier']) {
                    $prefix = $digit['output'];
                    break;
                }
            }

            $input = $digit_sum_multiplier['multiplier'];

            $expected_result = $prefix.$digit_sum_multiplier['suffix'];

            //Assert that service returns expected result when input number is multiplier.
            //Take into account that multiples service may return a result
            //in which case add that to the beginning of expected result.
            $multiples_result = $this->integrated_number_service->multiples_service->multiples($input)['result'];
            if($multiples_result == ''){

                $this->assertSame([
                    'success'=>true,
                    'input'=>$input,
                    'result'=>$expected_result
                ], $this->integrated_number_service->multiples_occurrences_and_digit_sum($input));
            }
            else{

                $expected_result = $multiples_result.$this->separator.$expected_result;

                $this->assertSame([
                    'success'=>true,
                    'input'=>$input,
                    'result'=>$expected_result
                ], $this->integrated_number_service->multiples_occurrences_and_digit_sum($input));
            }

        }
    }

    /**
     * Pass input number that is digit sum multiplier repeated multiple times
     * and test if service output contains associated suffix only at the end.
     *
     * @test
     * @return void
     */
    public function reoccurring_multiplier_digit_sum_test(){

        foreach ($this->digit_sum_multipliers as $digit_sum_multiplier){

            //Find the digit (if there even is one) that will have the suffix appended
            $prefix = '';
            foreach ($this->digits as $digit){
                if($digit['digit'] == $digit_sum_multiplier['multiplier']) {
                    $prefix = $digit['output'];
                    break;
                }
            }

            //Input = "multiplier"."multiplier"."multiplier";
            $multiplier_string = (string)$digit_sum_multiplier['multiplier'];
            $input = (integer)($multiplier_string.$multiplier_string.$multiplier_string);

            //Expected result =
            // digit[output];
            // digit[output];
            // digit[output](prefix).digit_sum_multiplier['suffix'](suffix)
            if($prefix){
                $expected_result =
                    $prefix.$this->integrated_number_service->separator.
                    $prefix.$this->integrated_number_service->separator.
                    $prefix.$digit_sum_multiplier['suffix'];
            }
            else{
                $expected_result = $digit_sum_multiplier['suffix'];
            }


            //Assert that service returns expected result when input number is multiplier repeated 3 times.
            //Take into account that multiples service may return a result
            //in which case add that to the beginning of expected result.
            $multiples_result = $this->integrated_number_service->multiples_service->multiples($input)['result'];
            if($multiples_result == ''){

                $this->assertSame([
                    'success'=>true,
                    'input'=>$input,
                    'result'=>$expected_result
                ], $this->integrated_number_service->multiples_occurrences_and_digit_sum($input));
            }
            else{

                $expected_result = $multiples_result.$this->separator.$expected_result;

                $this->assertSame([
                    'success'=>true,
                    'input'=>$input,
                    'result'=>$expected_result
                ], $this->integrated_number_service->multiples_occurrences_and_digit_sum($input));
            }

        }
    }
}
