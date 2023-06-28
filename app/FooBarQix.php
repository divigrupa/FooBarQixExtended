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
        $result = [];
        foreach ($this->rules as $multiple => $message) {
            if ($this->isMultipleOf($number, $multiple)) {
                $result[] = $message;
            }
        }

        return !empty($result) ? implode(', ', $result) : "$number" ;
    }

    private function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }
}
