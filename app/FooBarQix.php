<?php

namespace App;


use InvalidArgumentException;

class FooBarQix
{
    private array $conditions;
    private array $output = [];
    private string $separator = ', ';

    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }

    public function multiple(int $number): string
    {
        $this->validate($number);
        foreach ($this->conditions as $key => $value) {
            if ($number % $key === 0) {
                $this->output[] = $value;
            }
        }
        return $this->resultHandler($number);
    }

    public function numberOccurrence(int $number): string
    {
        $this->validate($number);
        $splitNumber = str_split($number);

        foreach ($splitNumber as $digit) {
            foreach ($this->conditions as $key => $value) {
                if ((int)$digit === (int)$key) {
                    $this->output[] = $value;
                }
            }
        }
        return $this->resultHandler($number);
    }

    public function multipleNumberOccurrence(int $number): string
    {
        $this->multiple($number);
        $this->numberOccurrence($number);
        return $this->resultHandler($number);
    }

    private function resultHandler(int $number): string
    {
        if (empty($this->output)) {
            return $number;
        }
        return implode($this->separator, $this->output);
    }

    public function validate($number):void
    {
        if (!is_int($number) || !($number > 0)) {
            throw new InvalidArgumentException();
        }
    }
}
