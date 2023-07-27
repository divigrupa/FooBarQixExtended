<?php

namespace App\Models;

class ValidatedInput
{
    protected string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function getInput(): string
    {
        return $this->input;
    }
}