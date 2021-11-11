<?php

namespace App;

class FooBar
{
    private string $multipleOfThree;
    private string $multipleOfFive;
    private string $multipleOfSeven;

    public function __construct(string $multipleOfThree, string $multipleOfFive, string $multipleOfSeven)
    {
        $this->multipleOfThree = $multipleOfThree;
        $this->multipleOfFive = $multipleOfFive;
        $this->multipleOfSeven = $multipleOfSeven;
    }

    public function numberText(int $number): string
    {
        $result = [];

        $splitNumbers = str_split((string)$number);

        foreach ($splitNumbers as $digit) {
            if ($digit == 3) {
                $result[] = $this->multipleOfThree;
            }
            if ($digit == 5) {
                $result[] = $this->multipleOfFive;
            }
            if ($digit == 7) {
                $result[] = $this->multipleOfSeven;
            }
        }
        if ($number % 3 == 0) {
            $result[] = $this->multipleOfThree;
        }
        if ($number % 5 == 0) {
            $result[] = $this->multipleOfFive;
        }
        if ($number % 7 == 0) {
            $result[] = $this->multipleOfSeven;
        }

        return implode(", ", $result);
    }
}