<?php

declare(strict_types=1);

namespace App\services;

use App\models\Trigger;

final class TransformService
{
    public function __construct(
        public readonly array  $triggers,
        public readonly string $separator = ','
    )
    {
    }

    public function transformNumber($sourceNumber): string
    {
        $multiples   = $this->setBlankIfNumeric($this->transformMultiples($sourceNumber));
        $occurrences = $this->setBlankIfNumeric($this->transformOccurrences($sourceNumber));

        if (empty($multiples) && empty($occurrences)) {
            return (string)$sourceNumber;
        }

        return $this->concatAndTrim([
                $multiples,
                $occurrences,
            ]) . $this->appendIfSumOfDigitsDivisibleWithTriggers($sourceNumber);
    }

    public function transformMultiples(int $sourceNumber): string
    {
        $result = '';

        foreach ($this->triggers as $trigger) {
            if ($sourceNumber % $trigger->getValue() === 0) {
                $result .= $this->separator . $trigger->getWord();
            }
        }

        return empty($result) ? (string)$sourceNumber : trim($result, $this->separator);
    }

    public function transformOccurrences(int $sourceNumber): string
    {
        $sourceNumber = (string)$sourceNumber;
        $result       = '';

        foreach (str_split($sourceNumber) as $digit) {
            foreach ($this->triggers as $trigger) {
                if ($trigger->getValue() == $digit) {
                    $result .= $this->separator . $trigger->getWord();
                }
            }
        }

        return empty($result) ? $sourceNumber : trim($result, $this->separator);
    }

    private function setBlankIfNumeric(string $word): string
    {
        return is_numeric($word) ? '' : $word;
    }

    /**
     * @param array<string> $words
     * @return string
     */
    private function concatAndTrim(array $words): string
    {
        return implode($this->separator, array_filter($words, 'strlen'));
    }

    private function appendIfSumOfDigitsDivisibleWithTriggers(int $number): ?string
    {
        $result      = '';
        $splitNumber = str_split((string)$number);
        $sum         = array_sum($splitNumber);

        /** @var Trigger $trigger */
        foreach ($this->triggers as $trigger) {
            if ($trigger->isTriggeredIfSumOfDigitsDivisible() && $sum % $trigger->getValue() === 0) {
                $result .= $trigger->getWord();
            }
        }

        return $result;
    }
}
