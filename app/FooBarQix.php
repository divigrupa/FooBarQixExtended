<?php declare(strict_types=1);

namespace App;

class FooBarQix
{
    private array $rules = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    public function execute(int $number): string
    {
        $multipleResult = [];
        $occurrenceResult = [];
        foreach ($this->rules as $multiple => $message) {
            if ($this->isMultipleOf($number, $multiple)) {
                $multipleResult[] = $message;
            }
        }
        foreach (str_split((string)$number) as $digit) {
            if (isset($this->rules[(int)$digit])) {
                $occurrenceResult[] = $this->rules[(int)$digit];
            }
        }
        $result = array_merge($multipleResult, $occurrenceResult);

        return !empty($result) ? implode(', ', $result) : "$number";
    }

    private function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }
}
