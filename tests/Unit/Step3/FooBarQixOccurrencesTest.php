<?php

namespace Tests\Unit\Step3;

use App\Services\OccurrencesServices\FooBarQixOccurrencesService;
use Tests\Unit\Occurrences\OccurrencesTest;

class FooBarQixOccurrencesTest extends OccurrencesTest
{

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->occurrences_service = new FooBarQixOccurrencesService();
        $this->digits = $this->occurrences_service->digits;
    }
}
