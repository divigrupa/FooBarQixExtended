<?php declare(strict_types=1);

namespace App;

use App\Rules\NumberTransformationRule;

class NumberTransformationCalculator
{
    private NumberTransformationRule $rule;
    public function __construct(NumberTransformationRule $rule)
    {
        $this->rule = $rule;
    }

    public function execute(int $number): string
    {
        $multipleResult = [];
        $occurrenceResult = [];
        foreach ($this->rule->getRules() as $multiple => $message) {
            if ($this->isMultipleOf($number, $multiple)) {
                $multipleResult[] = $message;
            }
        }
        foreach (str_split((string)$number) as $digit) {
            if (isset($this->rule->getRules()[(int)$digit])) {
                $occurrenceResult[] = $this->rule->getRules()[(int)$digit];
            }
        }
        $result = array_merge($multipleResult, $occurrenceResult);

        return !empty($result) ? implode($this->rule->getSeparator(), $result) : "$number";
    }

    private function isMultipleOf(int $number, int $multiple): bool
    {
        return $number % $multiple === 0;
    }
}
