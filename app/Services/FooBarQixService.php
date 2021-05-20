<?php

namespace App\Services;

use App\Models\FooBarQixCollection;

class FooBarQixService
{
    private MultipleService $multipleService;
    private OccurrenceService $occurrenceService;

    public function __construct(FooBarQixCollection $fooBarQixCollection)
    {
        $this->multipleService = new MultipleService($fooBarQixCollection);
        $this->occurrenceService = new OccurrenceService($fooBarQixCollection);
    }

    public function execute(int $positiveInteger): string
    {
        $multiples = $this->multipleService->execute($positiveInteger);
        $occurrences = $this->occurrenceService->execute($positiveInteger);

        if ($multiples === '') {
            return $occurrences;
        } else if ($occurrences === '') {
            return $multiples;
        }
        return $multiples . ',' . $occurrences;
    }
}