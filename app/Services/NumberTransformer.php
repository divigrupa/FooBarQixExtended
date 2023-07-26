<?php

namespace App\Services;
interface NumberTransformer
{
    public function transformNumber(string $number): string;
    public function transformDigits(string $number): string;
}