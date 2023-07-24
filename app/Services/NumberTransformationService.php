<?php

namespace App\Services;

use App\Models\Output;

class NumberTransformationService
{
    private NumberTransformer $transformer;

    public function __construct(NumberTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function transformNumber(string $number): Output
    {
        $result = $this->transformer->transform($number);
        $result = substr($result, 0, strlen($result) - 1);

        return new Output($result);
    }
}