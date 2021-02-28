<?php declare(strict_types=1);

class InfQixFoo
{
    public function run($num): string
    {
        if (!is_int($num)) throw new InvalidArgumentException(sprintf('"%s" is not integer', $num));
        if ($num <= 0) throw new InvalidArgumentException(sprintf('"%s" is not positive integer', $num));

        $result = '';

        if ($num % 8 == 0) $result .= ($result ? '; ' : '') . 'Inf';
        if ($num % 7 == 0) $result .= ($result ? '; ' : '') . 'Qix';
        if ($num % 3 == 0) $result .= ($result ? '; ' : '') . 'Foo';

        $numStr = (string)$num;

        for ($i = 0; $i < strlen($numStr); $i++) {
            switch ($numStr[$i]) {
                case '3':
                    $result .= 'Foo';
                    break;
                case '8':
                    $result .= 'Inf';
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