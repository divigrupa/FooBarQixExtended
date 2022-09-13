<?php
class HomeWork
{
    function Task(int $value) : string
    {
        $res = [];

        if ($value % 3 === 0)
            $res[] = 'Foo';
        if ($value % 5 === 0)
            $res[] = 'Bar';

        if (count($res))
            return join(', ', $res);
        else
            return (string)$value;
    }
}
?>