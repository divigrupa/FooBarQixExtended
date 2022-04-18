<?php

namespace App;


use InvalidArgumentException;

class InfQixFoo
{
    private array $conditions;
    private array $output = [];
    private string $separator = '; ';

    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }

    public function getResult($number): string
    {
        $this->validate($number);
        $this->multiple($number);
        $this->numberOccurrence($number);
        return $this->resultHandler($number);
    }

    private function multiple(int $number): void
    {
        foreach ($this->conditions as $key => $value) {
            if ($number % $key === 0) {
                $this->output[] = $value;
            }
        }
    }

    private function numberOccurrence(int $number): void
    {
        $splitNumber = str_split($number);

        foreach ($splitNumber as $digit) {
            foreach ($this->conditions as $key => $value) {
                if ((int)$digit === (int)$key) {
                    $this->output[] = $value;
                }
            }
        }
    }

    private function resultHandler(int $number): string
    {
        if (empty($this->output)) {
            return $number;
        }
        return implode($this->separator, $this->output);
    }

    private function validate($number): void
    {
        if (!is_int($number) || !($number > 0)) {
            throw new InvalidArgumentException();
        }
    }
}
