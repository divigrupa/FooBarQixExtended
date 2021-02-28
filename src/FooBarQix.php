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

        $numStr = (string)$num;

        for ($i = 0; $i < strlen($numStr); $i++) {
            switch ($numStr[$i]) {
                case '3':
                    $result .= 'Foo';
                    break;
                case '5':
                    $result .= 'Bar';
                    break;
                case '7':
                    $result .= 'Qix';
                    break;
            }
        }

        if (!$result) $result = $numStr;

        return $result;
    }
}