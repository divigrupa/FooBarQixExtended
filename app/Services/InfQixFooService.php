<?php

declare(strict_types=1);

namespace FooBar\Services;

class InfQixFooService extends BaseNumberMapperService
{
    protected string $delimiter = '; ';
    protected array $map = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    protected string $postDelimiter = '';
    protected array $postMap = [
        8 => 'Inf',
    ];

    public function getFull(int $number): string
    {
        $result = $this->get($number);
        $suffix = $this->getWithRules($number, [self::RULE_DIGIT_SUM_MULTIPLES], self::HOOK_POST);

        return $result . $this->postDelimiter . $suffix;
    }
}
