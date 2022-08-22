<?php


namespace App\Services\OccurrencesServices;


class InfQixFooOccurrencesService extends OccurrencesService
{

    function __construct(){

        parent::__construct();
        $this->digits = collect([
            [
                'digit' => 3,
                'output' => 'Foo'
            ],
            [
                'digit' => 8,
                'output' => 'Inf'
            ],
            [
                'digit' => 7,
                'output' => 'Qix'
            ],
        ]);
    }
}
