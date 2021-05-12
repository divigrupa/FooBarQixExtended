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
}
