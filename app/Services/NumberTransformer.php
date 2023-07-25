<?php

namespace App\Services;
interface NumberTransformer
{
    public function transformNumber(int $number): string;
}