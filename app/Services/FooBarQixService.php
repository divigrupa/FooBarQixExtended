<?php

declare(strict_types=1);

namespace FooBar\Services;

class FooBarQixService extends BaseNumberMapperService
{
    protected array $map = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    public function getMultiples(int $number): string
    {
        return $this->getWithRules($number, [self::RULE_MULTIPLES]);
    }

    public function getOccurrences(int $number): string
    {
        return $this->getWithRules($number, [self::RULE_OCCURRENCES]);
    }
}
