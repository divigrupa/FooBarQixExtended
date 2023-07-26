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

    public function getTransformedNumber(string $number): Output
    {
        $transformedNumber = $this->transformer->transformNumber($number);
        $transformedNumber = substr($transformedNumber, 0, strlen($transformedNumber) - 1);
        if (empty($transformedNumber)) {
            return new Output($number);
        }
        return new Output($transformedNumber);
    }

    public function getTransformedDigits(string $number): Output
    {
        $transformedDigits = $this->transformer->transformDigits($number);
        return new Output($transformedDigits);
    }

    public function getFullTransformation(string $number): Output
    {
        $transformedNumber = $this->transformer->transformNumber($number);
        $transformedDigits = $this->transformer->transformDigits($number);

        if (empty($transformedDigits) and !empty($transformedNumber)) {
            $transformedNumber = substr($transformedNumber, 0, strlen($transformedNumber) - 1);
            return new Output($transformedNumber);
        }

        $fullTransformation = $transformedNumber . $transformedDigits;

        if (empty($transformedNumber) and empty($transformedDigits)) {
            return new Output($number);
        } else
            return new Output($fullTransformation);
    }
}