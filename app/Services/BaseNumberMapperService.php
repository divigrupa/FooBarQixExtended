<?php

declare(strict_types=1);

namespace FooBar\Services;

use InvalidArgumentException;

class BaseNumberMapperService
{
    protected const RULE_MULTIPLES = 1;
    protected const RULE_OCCURRENCES = 2;
    protected const RULE_DIGIT_SUM_MULTIPLES = 3;

    protected const HOOK_MAIN = 0;
    protected const HOOK_POST = 1;

    protected string $delimiter = '';
    protected array $map = [];

    protected string $postDelimiter = '';
    protected array $postMap = [];

    public function get(int $number): string
    {
        return $this->getWithRules($number, [self::RULE_MULTIPLES, self::RULE_OCCURRENCES]);
    }

    protected function getWithRules(int $number, array $rules, int $hook = self::HOOK_MAIN): string
    {
        if ($number < 0) {
            throw new InvalidArgumentException("Expected positive integer");
        }

        if ($hook === self::HOOK_POST) {
            $delimiter = $this->postDelimiter;
            $map = $this->postMap;
        } else {
            $delimiter = $this->delimiter;
            $map = $this->map;
        }

        $result = [];

        foreach ($rules as $rule) {
            foreach ($this->mapNumber($rule, $number, $map) as $item) {
                $result[] = $item;
            }
        }

        if ($result === []) {
            return (string)$number;
        }

        return implode($delimiter, $result);
    }

    protected function mapNumber(int $rule, int $number, array $map): array
    {
        switch ($rule) {
            case self::RULE_MULTIPLES:
                return $this->getMultiples($number, $map);
            case self::RULE_OCCURRENCES:
                return $this->getOccurrences($number, $map);
            case self::RULE_DIGIT_SUM_MULTIPLES:
                return $this->getDigitSumMultiples($number, $map);
            default:
                return [];
        }
    }

    private function getMultiples(int $number, array $map): array
    {
        $result = [];

        foreach ($map as $key => $value) {
            if ($number % $key === 0) {
                $result[] = $value;
            }
        }

        return $result;
    }

    private function getOccurrences(int $number, array $map): array
    {
        $result = [];

        foreach (str_split((string)$number) as $digit) {
            foreach ($map as $key => $value) {
                if ($digit === (string)$key) {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    private function getDigitSumMultiples(int $number, array $map): array
    {
        $result = [];

        $sum = array_sum(array_map('intval', str_split((string)$number)));

        foreach ($map as $key => $value) {
            if ($sum % $key === 0) {
                $result[] = $value;
            }
        }

        return $result;
    }
}
