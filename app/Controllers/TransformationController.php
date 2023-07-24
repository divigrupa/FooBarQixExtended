<?php

namespace App\Controllers;

use App\Exceptions\PositiveNumberException;
use App\Models\Output;
use App\Services\FooBarTransformer;
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
        $transformer = new FooBarTransformer();
        $transformationService = new NumberTransformationService($transformer);

        $validatedInput = $validator->validate($number);
        return $transformationService->transformNumber($validatedInput->getInput());
    }
}