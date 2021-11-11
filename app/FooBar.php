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
        if ($number % 3 == 0 && $number % 5 == 0 && $number % 7 == 0) {
            return "{$this->multipleOfThree}, {$this->multipleOfFive}, {$this->multipleOfSeven}";
        } else if ($number % 3 == 0 && $number % 5 == 0) {
            return "{$this->multipleOfThree}, {$this->multipleOfFive}";
        } else if ($number % 3 == 0 && $number % 7 == 0) {
            return "{$this->multipleOfThree}, {$this->multipleOfSeven}";
        } else if ($number % 5 == 0 && $number % 7 == 0) {
            return "{$this->multipleOfFive}, {$this->multipleOfSeven}";
        } else if ($number % 3 == 0) {
            return $this->multipleOfThree;
        } else if ($number % 5 == 0) {
            return $this->multipleOfFive;
        } else {
            return $this->multipleOfSeven;
        }
    }
}