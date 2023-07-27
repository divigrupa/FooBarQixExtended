<?php

namespace App\Controllers;

use App\Exceptions\PositiveNumberException;
use App\Models\Output;
use App\Services\FooBarQixTransformer;
use App\Services\InfQixFooTransformer;
use App\Services\NumberTransformationService;
use App\Validators\InputValidator;

class TransformationController
{
    /**
     * @throws PositiveNumberException
     */
    public function fooBarQixTransformer(string $number): Output
    {
        $validator = new InputValidator();
        $transformer = new FooBarQixTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $validatedInput = $validator->validate($number);

        return $transformationService->getFullTransformation($validatedInput->getInput());
    }
    public function infQixFooTransformer(string $number): Output
    {
        $validator = new InputValidator();
        $transformer = new InfQixFooTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $validatedInput = $validator->validate($number);

        return $transformationService->getFullTransformation($validatedInput->getInput());
    }
}