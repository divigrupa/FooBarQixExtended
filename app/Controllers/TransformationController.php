<?php

namespace App\Controllers;

use App\Exceptions\PositiveNumberException;
use App\Models\Output;
use App\Services\FooBarQixTransformer;
use App\Services\NumberTransformationService;
use App\Validators\InputValidator;

class TransformationController
{
    /**
     * @throws PositiveNumberException
     */
    public function fooBarTransformer(string $number): Output
    {
        $validator = new InputValidator();
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $validatedInput = $validator->validate($number);

        $transformationService->getTransformedNumber($validatedInput->getInput());
        $transformationService->getTransformedDigits($validatedInput->getInput());

        return $transformationService->getFullTransformation($number);
    }
}