<?php

namespace App\Services;

use App\Models\Collections\MultipliersCollection;
use App\Models\Multiplier;

class FooBarQixService{


    private MultipliersCollection $multipliers;

    public function __construct()
    {
        $multipliers = new MultipliersCollection([

            new Multiplier('foo', 3),
            new Multiplier('bar', 5),
            new Multiplier('qix', 7),

        ]);

        $this->multipliers = $multipliers;

    }

    public function execute(): void{


        $number = (int)readline('Input number: ');

        echo $this->multipliers->getCompatibles($number) . PHP_EOL; // shows multiples
        echo $this->multipliers->getCompatiblesIfAppends($number) . PHP_EOL; //shows occurrences

    }



}