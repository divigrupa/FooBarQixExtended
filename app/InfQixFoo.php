<?php

namespace App;

class InfQixFoo implements Combinations
{
    private string $highestNumber;
    private string $midNumber;
    private string $lowestNumber;

    public function __construct(string $highestNumber, string $midNumber, string $lowestNumber)
    {
        $this->highestNumber = $highestNumber;
        $this->midNumber = $midNumber;
        $this->lowestNumber = $lowestNumber;
    }

    public function numberText(int $number): string
    {
        $result = [];

        $splitNumbers = str_split((string)$number);

        foreach ($splitNumbers as $digit) {
            if ($digit == 3) {
                $result[] = $this->lowestNumber;
            }
            if ($digit == 7) {
                $result[] = $this->midNumber;
            }
            if ($digit == 8) {
                $result[] = $this->highestNumber;
            }
        }
        if ($number % 8 == 0) {
            $result[] = $this->highestNumber;
        }
        if ($number % 7 == 0) {
            $result[] = $this->midNumber;
        }
        if ($number % 3 == 0) {
            $result[] = $this->lowestNumber;
        }

        return implode(", ", $result);
    }
}