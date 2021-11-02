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
        $compatibles = [];

        foreach ($this->multipliers as $multiplier) {
            if ($multiplier->isCompatible($number) !== NULL) {

                $compatibles[] = $multiplier->isCompatible($number);

            }
        }

        return $compatibles ? implode(', ', $compatibles) : (string)$number;
    }


}
