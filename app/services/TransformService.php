<?php

declare(strict_types=1);

namespace App\services;

final class TransformService
{
    private const SEPARATOR = ',';

    public function __construct(public readonly array $triggers)
    {
    }

    public function transformNumber($sourceNumber)
    {
        $multiples = $this->setBlankIfNumeric($this->transformMultiples($sourceNumber));
        $occurrences = $this->setBlankIfNumeric($this->transformOccurrences($sourceNumber));

        if (empty($multiples) && empty($occurrences)) {
            return (string)$sourceNumber;
        }

        return $this->concatAndTrim([
            $multiples,
            $occurrences,
        ]);
    }

    public function transformMultiples(int $sourceNumber): string
    {
        $result = '';

        foreach ($this->triggers as $trigger) {
            if ($sourceNumber % $trigger->getValue() === 0) {
                $result .= self::SEPARATOR . $trigger->getWord();
            }
        }

        return empty($result) ? (string)$sourceNumber : trim($result, self::SEPARATOR);
    }

    public function transformOccurrences(int $sourceNumber): string
    {
        $sourceNumber = (string)$sourceNumber;
        $result       = '';

        foreach (str_split($sourceNumber) as $digit) {
            foreach ($this->triggers as $trigger) {
                if ($trigger->getValue() == $digit) {
                    $result .= self::SEPARATOR . $trigger->getWord();
                }
            }
        }

        return empty($result) ? $sourceNumber : trim($result, self::SEPARATOR);
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
        return implode(self::SEPARATOR, array_filter($words, 'strlen'));
    }
}
