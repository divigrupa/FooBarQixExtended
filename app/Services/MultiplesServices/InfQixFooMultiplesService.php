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

        $this->separator = "; ";
    }
}
