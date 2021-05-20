<?php

namespace App\Services;

use App\Models\FooBarQix;
use App\Models\FooBarQixCollection;

class InfQixFooService
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
        $multiples = $this->handleSemicolon($this->multipleService->execute($positiveInteger));
        $occurrences = $this->handleSemicolon($this->occurrenceService->execute($positiveInteger));

        if ($multiples === '' && $occurrences === '') {
            return (string)$positiveInteger;
        } else if ($multiples === '') {
            return $occurrences;
        } else if ($occurrences === '') {
            return $multiples;
        }
        return $multiples . ';' . $occurrences;
    }

    public function addEnd(int $positiveInteger, FooBarQix $condition): string
    {
        $end = '';
        $output = $this->execute($positiveInteger);
        if (array_sum(str_split($positiveInteger)) % $condition->multipleOf() === 0) {
            $end = $condition->name();
        }
        return $output . $end;
    }


    private function handleSemicolon(string $output): string
    {
        if ($output != '') {
            $output = str_replace(',', ';', $output);
        }
        return $output;
    }
}