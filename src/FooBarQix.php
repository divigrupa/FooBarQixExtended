<?php declare(strict_types=1);

class FooBarQix
{
    public function run($num): string
    {
        if (!is_int($num)) throw new InvalidArgumentException(sprintf('"%s" is not integer', $num));
        if ($num <= 0) throw new InvalidArgumentException(sprintf('"%s" is not positive integer', $num));

        $result = '';

        if ($num % 3 == 0) $result .= ($result ? ', ' : '') . 'Foo';
        if ($num % 5 == 0) $result .= ($result ? ', ' : '') . 'Bar';
        if ($num % 7 == 0) $result .= ($result ? ', ' : '') . 'Qix';

        if (!$result) $result = (string)$num;

        return $result;
    }
}