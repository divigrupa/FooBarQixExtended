<?php

namespace App\Services;


use App\Models\Bar;
use App\Models\Foo;

use App\Models\MultipleCollection;
use App\Models\Qix;

class FooBarQixService
{
    private MultipleCollection $multipleCollection;

    public function __construct()
    {
        $this->multipleCollection = new MultipleCollection();
        $this->multipleCollection->addMultiples(new Foo());
        $this->multipleCollection->addMultiples(new Bar());
        $this->multipleCollection->addMultiples(new Qix());
    }


    public function execute(int $positiveInteger): string
    {
        $message = [];
        foreach ($this->multipleCollection->multiples() as $multiple) {
            if ($positiveInteger % $multiple->multipleOf() === 0) {
                $message[] = $multiple->name();
            }
        }
        if (count($message) < 1) {
            return (string)$positiveInteger;
        }
        return implode(',', $message);
    }
}