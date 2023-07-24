<?php

namespace App\Models;

class Output
{
    protected string $output;

    public function __construct(string $output)
    {
        $this->output = $output;
    }

    public function getOutput(): string
    {
        return $this->output;
    }
}