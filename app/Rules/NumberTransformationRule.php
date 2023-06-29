<?php declare(strict_types=1);

namespace App\Rules;

abstract class NumberTransformationRule
{
    private array $rules;
    private string $separator;

    public function __construct(array $rules, string $separator)
    {
        $this->rules = $rules;
        $this->separator = $separator;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }
}
