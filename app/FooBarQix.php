<?php

namespace App;

class FooBarQix
{
    private string $divider = ', ';

    private array $fooBar = [
        'Foo' => 3,
        'Bar' => 5
    ];

    // Takes a number and returns "Foo" if multiple of 3,
    // "Bar" if multiple of 5,
    // and "Foo, Bar" if multiple of 3 and 5.
    // return the number if is not multiple of 3 and 5.
    public function isMultiple(int $number): string
    {
        $output = '';

        foreach ($this->fooBar as $item => $value) {
            if ($number % $value == 0) {
                $output .= $item . $this->divider;
            }
        }

        if (empty($output)) {
            return  $number;
        } else {
            return chop($output, $this->divider);
        }
    }
}