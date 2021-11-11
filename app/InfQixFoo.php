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
        $occurrences = [];
        $multiples = [];

        $splitNumbers = str_split((string)$number);

        foreach ($splitNumbers as $digit) {
            if ($digit == 3) {
                $occurrences[] = $this->lowestNumber;
            }
            if ($digit == 7) {
                $occurrences[] = $this->midNumber;
            }
            if ($digit == 8) {
                $occurrences[] = $this->highestNumber;
            }
        }
        if ($number % 8 == 0) {
            $multiples[] = $this->highestNumber;
        }
        if ($number % 7 == 0) {
            $multiples[] = $this->midNumber;
        }
        if ($number % 3 == 0) {
            $multiples[] = $this->lowestNumber;
        }

        return implode("", $occurrences) . implode("; ", $multiples);
    }
}