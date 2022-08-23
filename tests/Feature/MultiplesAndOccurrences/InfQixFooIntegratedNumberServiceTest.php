<?php

namespace Tests\Feature\MultiplesAndOccurrences;

use App\Services\IntegratedNumberServices\InfQixFooIntegratedNumberService;

class InfQixFooIntegratedNumberServiceTest extends IntegratedNumberServiceTest
{

    public function setUp(): void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->integrated_number_service = new InfQixFooIntegratedNumberService();
        $this->multipliers = collect($this->integrated_number_service->multiples_service->multipliers)
            ->sortBy('multiplier');
        $this->digits = $this->integrated_number_service->occurrences_service->digits;

        $this->separator = "; ";
    }
}
