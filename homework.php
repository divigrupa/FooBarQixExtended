<?php
class HomeWork
{
    function Task(int $value) : string
    {
        if ($value <= 0)
            throw new InvalidArgumentException('Input value must be positive integer');

        $res = [];

        $multiples = [
            [3, 'Foo'],
            [5, 'Bar'],
            [7, 'Qix'],
        ];

        foreach($multiples as [$multiple, $text])
            if ($value % $multiple === 0)
                $res[] = $text;

        if (count($res))
            return join(', ', $res);
        else
            return (string)$value;
    }
}
?>