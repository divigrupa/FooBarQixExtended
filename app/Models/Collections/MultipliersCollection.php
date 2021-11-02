<?php

namespace App\Models\Collections;

use App\Models\Multiplier;

class MultipliersCollection
{
    private array $multipliers = [];

    public function __construct(array $multipliers)
    {
        foreach ($multipliers as $multiplier) {

            if ($multiplier instanceof Multiplier) {
                $this->multipliers[] = $multiplier;
            }

        }
    }

    public function getCompatibles(int $number): string
    {
    }


}
