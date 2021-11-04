<?php


namespace App\Models;


class Multiplier
{

    private $text;

    private $multiple;

    public function __construct(string $text, int $multiple)
    {


        $this->text = $text;
        $this->multiple = $multiple;
    }

    public function isCompatible(int $number): ?string
    {
        return $number % $this->multiple === 0 ? $this->text : NULL;
    }

    public function getMultiple(): int
    {
        return $this->multiple;
    }

    public function getText(): string
    {
        return $this->text;
    }

}