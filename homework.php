<?php
class HomeWork
{
    function MultipleCheckTask(int $value, array $arr) : array
    {
        $res = [];

        foreach($arr as $multiple => $text)
            if ($value % $multiple === 0)
                $res[] = $text;

        return $res;
    }

    function ContainCheckTask(int $value, array $arr) : array
    {
        $res = [];

        while($value > 0)
        {
            [$value, $key] = [intdiv($value, 10), $value % 10];

            if (array_key_exists($key, $arr))
                $res[] = $arr[$key];
        }

        return array_reverse($res);
    }



    function Task(int $value) : string
    {
        $rules = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
        $delimiter = ', ';
        return $this->MainProcess($value, $rules, $delimiter);
    }

    function NewTask(int $value) : string
    {
        $rules = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
        $delimiter = '; ';
        return $this->MainProcess($value, $rules, $delimiter);
    }




    function MainProcess(int $value, array $rules, string $delimiter) : string
    {
        if ($value <= 0)
            throw new InvalidArgumentException('Input value must be positive integer');

        $res = [];

        $checkFunctions = ['MultipleCheckTask', 'ContainCheckTask'];

        foreach($checkFunctions as $func)
        {
            $ret = $this->$func($value, $rules);
            $res = [...$res, ...$ret];
        }

        if (count($res))
            return join($delimiter, $res);
        else
            return (string)$value;
    }
}

?>