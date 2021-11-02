<?php

namespace App\Services;

use App\Models\Collections\MultipliersCollection;
use App\Models\Multiplier;

class InfQixFooService{


    private MultipliersCollection $multipliers;

    public function __construct()
    {
        $multipliers = new MultipliersCollection([

            new Multiplier('inf', 8),
            new Multiplier('qix', 7),
            new Multiplier('foo', 3),

        ], ';');

        $this->multipliers = $multipliers;

    }

    public function execute(): void{


        $number = (int)readline('Input number: ');

        echo $this->multipliers->getCompatibles($number) . PHP_EOL; // shows multiples
        echo $this->multipliers->getCompatiblesIfAppends($number) . PHP_EOL; //shows occurrences

    }



}