<?php

namespace App;

class FooBar
{
    private string $multipleOfThree;
    private string $multipleOfFive;

    public function __construct(string $multipleOfThree, string $multipleOfFive)
    {
        $this->multipleOfThree = $multipleOfThree;
        $this->multipleOfFive = $multipleOfFive;
    }

    public function numberText(int $number): string
    {
        if ($number % 5 == 0 && $number % 3 == 0) {
            return "{$this->multipleOfThree}, {$this->multipleOfFive}";
        } else if ($number % 3 == 0) {
            return $this->multipleOfThree;
        } else {
            return $this->multipleOfFive;
        }
    }
}