<?php

namespace App\Models\Collections;

use App\Models\Multiplier;

class MultipliersCollection
{
    private array $multipliers = [];
    private string $delimeter;
    public function __construct(array $multipliers, string $delimeter = ', ')
    {
        foreach ($multipliers as $multiplier) {

            if ($multiplier instanceof Multiplier) {
                $this->multipliers[] = $multiplier;
            }

        }
        $this->delimeter = $delimeter;
    }

    public function getCompatibles(int $number): string
    {
        $compatibles = [];

        foreach ($this->multipliers as $multiplier) {
            if ($multiplier->isCompatible($number) !== NULL) {

                $compatibles[] = $multiplier->isCompatible($number);

            }
        }

        return $compatibles ? implode($this->delimeter, $compatibles) : (string)$number;
    }

    public function getCompatiblesIfAppends(int $number): string{


        $numberSplt = str_split($number.'');
        $result = [];
        foreach ($numberSplt as $item){

            foreach ($this->multipliers as $multiplier){

                if($item == $multiplier->getMultiple()){
                    $result[] = $multiplier->getText();
                }

            }
        }

        return $result ? implode($this->delimeter, $result) : $number;

    }


}
