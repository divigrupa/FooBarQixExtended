<?php

namespace App\Services;
interface NumberTransformer
{
    public function transform(int $number): string;
}