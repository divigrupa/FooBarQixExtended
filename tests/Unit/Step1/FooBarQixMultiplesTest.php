<?php

namespace Tests\Unit\Step1;

use App\Services\MultiplesServices\FooBarQixMultiplesService;
use Tests\Unit\Multiples\MultiplesTest;

class FooBarQixMultiplesTest extends MultiplesTest
{

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->multiples_service = new FooBarQixMultiplesService();
        $this->multipliers = $this->multiples_service->multipliers;
    }
}
