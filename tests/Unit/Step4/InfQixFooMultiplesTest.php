<?php

namespace Tests\Unit\Step1;

use App\Services\MultiplesServices\InfQixFooMultiplesService;
use Tests\Unit\Multiples\MultiplesTest;

class InfQixFooMultiplesTest extends MultiplesTest
{

    public function setUp() : void
    {
        parent::setUp();

        //Create the service to use its functions
        $this->multiples_service = new InfQixFooMultiplesService();
        $this->multipliers = $this->multiples_service->multipliers;
    }
}
