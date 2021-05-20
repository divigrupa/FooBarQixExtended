<?php

namespace App\Services;

use App\Models\FooBarQixCollection;

class OccurrenceService
{
    private FooBarQixCollection $fooBarQixCollection;

    public function __construct(FooBarQixCollection $fooBarQixCollection)
    {
        $this->fooBarQixCollection = $fooBarQixCollection;
    }

    public function execute(int $positiveNumber): string
    {
        $numberToArray = str_split($positiveNumber);
        $message = [];
        for ($i = 0; $i <= count($numberToArray) - 1; $i++) {
            foreach ($this->fooBarQixCollection->multiples() as $multiple) {
                if ($numberToArray[$i] == $multiple->multipleOf()) {
                    $message[] = $multiple->name();
                }
            }
        }
        if (count($message) < 1) {
            return '';
        }
        return implode(',', $message);
    }


}