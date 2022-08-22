<?php


namespace App\Services\OccurrencesServices;

class FooBarQixOccurrencesService extends OccurrencesService
{

    function __construct(){

        parent::__construct();
        $this->digits = collect([
            [
                'digit' => 5,
                'output' => 'Bar'
            ],
            [
                'digit' => 3,
                'output' => 'Foo'
            ],
            [
                'digit' => 7,
                'output' => 'Qix'
            ],
        ]);
    }
}
