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
        $occurrences = [];
        $multiples = [];

        $splitNumbers = str_split((string)$number);

        foreach ($splitNumbers as $digit) {
            if ($digit == 3) {
                $occurrences[] = $this->lowestNumber;
            }
            if ($digit == 5) {
                $occurrences[] = $this->midNumber;
            }
            if ($digit == 7) {
                $occurrences[] = $this->highestNumber;
            }
        }
        if ($number % 3 == 0) {
            $multiples[] = $this->lowestNumber;
        }
        if ($number % 5 == 0) {
            $multiples[] = $this->midNumber;
        }
        if ($number % 7 == 0) {
            $multiples[] = $this->highestNumber;
        }

        return implode("", $occurrences) . implode(", ", $multiples);
    }
}