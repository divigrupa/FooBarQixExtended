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
        if (empty($this->output)) {
            return $number;
        }
        return implode($this->separator, $this->output);
    }

    public function validate($number)
    {
        if (!is_int($number) || !($number > 0)) {
            throw new InvalidArgumentException();
        }
    }
}
