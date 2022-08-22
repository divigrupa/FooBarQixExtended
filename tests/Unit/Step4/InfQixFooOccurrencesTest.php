<?php

namespace Tests\Unit\Step3;

use App\Services\OccurrencesServices\InfQixFooOccurrencesService;
use Tests\Unit\Occurrences\OccurrencesTest;

class InfQixFooOccurrencesTest extends OccurrencesTest
{

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->occurrences_service = new InfQixFooOccurrencesService();
        $this->digits = $this->occurrences_service->digits;
    }
}
