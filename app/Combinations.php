<?php

namespace App;

interface Combinations
{
    public function __construct(string $highestNumber, string $midNumber, string $lowestNumber);

    public function numberText(int $number): string;
}