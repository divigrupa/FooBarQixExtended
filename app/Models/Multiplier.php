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