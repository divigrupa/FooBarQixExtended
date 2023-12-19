<?php

declare(strict_types=1);

namespace App\services;

final class TransformService
{
    public function __construct(public readonly array $triggers)
    {
    }

    public function transformMultiples(int $sourceNumber): string
    {
        $result = '';

        foreach ($this->triggers as $trigger) {
            if ($sourceNumber % $trigger->getValue() === 0) {
                $result .= ',' . $trigger->getWord();
            }
        }

        return empty($result) ? (string)$sourceNumber : trim($result, ',');
    }
}
