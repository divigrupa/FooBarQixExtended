<?php


namespace App\Services\MultiplesServices;

class FooBarQixMultiplesService extends MultiplesService
{

    function __construct(){

        parent::__construct();
        $this->multipliers = array_values(collect([
            [
                'multiplier' => 5,
                'output' => 'Bar'
            ],
            [
                'multiplier' => 3,
                'output' => 'Foo'
            ],
            [
                'multiplier' => 7,
                'output' => 'Qix'
            ],
        ])->sortBy('multiplier')->toArray());
    }
}
