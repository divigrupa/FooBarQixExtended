<?php

namespace App\Services;

use App\Models\FooBarQixCollection;

class MultipleService
{
    private FooBarQixCollection $fooBarQixCollection;

    public function __construct(FooBarQixCollection $fooBarQixCollection)
    {
        $this->fooBarQixCollection = $fooBarQixCollection;
    }


    public function execute(int $positiveInteger): string
    {
        $message = [];
        foreach ($this->fooBarQixCollection->multiples() as $multiple) {
            if ($positiveInteger % $multiple->multipleOf() === 0) {
                $message[] = $multiple->name();
            }
        }
        if (count($message) < 1) {
            return '';
        }
        return implode(',', $message);
    }

}