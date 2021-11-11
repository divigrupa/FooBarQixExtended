<?php

namespace App;

class FooBarQix implements Combinations
{
    private string $lowestNumber;
    private string $midNumber;
    private string $highestNumber;

    public function __construct(string $highestNumber, string $midNumber, string $lowestNumber)
    {
        $this->lowestNumber = $lowestNumber;
        $this->midNumber = $midNumber;
        $this->highestNumber = $highestNumber;
    }

    public function numberText(int $number): string
    {
        $result = [];

        $splitNumbers = str_split((string)$number);

        foreach ($splitNumbers as $digit) {
            if ($digit == 3) {
                $result[] = $this->lowestNumber;
            }
            if ($digit == 5) {
                $result[] = $this->midNumber;
            }
            if ($digit == 7) {
                $result[] = $this->highestNumber;
            }
        }
        if ($number % 3 == 0) {
            $result[] = $this->lowestNumber;
        }
        if ($number % 5 == 0) {
            $result[] = $this->midNumber;
        }
        if ($number % 7 == 0) {
            $result[] = $this->highestNumber;
        }

        return implode(", ", $result);
    }
}