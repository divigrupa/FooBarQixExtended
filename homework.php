<?php
class HomeWork
{
    const MULTIPLES = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    function MultipleCheckTask(int $value) : string
    {
        $res = [];

        foreach(self::MULTIPLES as $multiple => $text)
            if ($value % $multiple === 0)
                $res[] = $text;

        return join(', ', $res);
    }

    function ContainCheckTask(int $value) : string
    {
        $res = [];

        while($value > 0)
        {
            [$value, $key] = [intdiv($value, 10), $value % 10];

            if (array_key_exists($key, self::MULTIPLES))
                $res[] = self::MULTIPLES[$key];
        }

        return join(', ', array_reverse($res));
    }

    function Task(int $value) : string
    {
        if ($value <= 0)
            throw new InvalidArgumentException('Input value must be positive integer');

        $res = [];

        $checkFunctions = ['MultipleCheckTask', 'ContainCheckTask'];

        foreach($checkFunctions as $func)
        {
            $ret = $this->$func($value);
            if($ret !== '')
                $res[] = $ret;
        }

        if (count($res))
            return join(', ', $res);
        else
            return (string)$value;
    }


}

// $hw = new HomeWork();
// // echo($hw->ContainCheckTask(3).PHP_EOL);
// // echo($hw->MultipleCheckTask(3).PHP_EOL);
// echo($hw->Task(3).PHP_EOL);
?>