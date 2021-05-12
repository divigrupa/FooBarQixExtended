<?php

declare(strict_types=1);

namespace FooBar\Services;

use InvalidArgumentException;

class BaseNumberMapperService
{
    protected const RULE_MULTIPLES = 1;
    protected const RULE_OCCURRENCES = 2;

    protected string $delimiter = '';
    protected array $map = [];

    public function get(int $number): string
    {
        return $this->getWithRules($number, [self::RULE_MULTIPLES, self::RULE_OCCURRENCES]);
    }

    protected function getWithRules(int $number, array $rules): string
    {
        if ($number < 0) {
            throw new InvalidArgumentException("Expected positive integer");
        }

        $result = [];

        foreach ($rules as $rule) {
            foreach ($this->mapNumber($rule, $number) as $item) {
                $result[] = $item;
            }
        }

        if ($result === []) {
            return (string)$number;
        }

        return implode($this->delimiter, $result);
    }

    protected function mapNumber(int $rule, int $number): array
    {
        switch ($rule) {
            case self::RULE_MULTIPLES:
                return $this->getMultiples($number);
            case self::RULE_OCCURRENCES:
                return $this->getOccurrences($number);
            default:
                return [];
        }
    }

    private function getMultiples(int $number): array
    {
        $result = [];

        foreach ($this->map as $key => $value) {
            if ($number % $key === 0) {
                $result[] = $value;
            }
        }

        return $result;
    }

    private function getOccurrences(int $number): array
    {
        $result = [];

        foreach (str_split((string)$number) as $digit) {
            foreach ($this->map as $key => $value) {
                if ($digit === (string)$key) {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
}
