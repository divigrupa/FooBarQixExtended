<?php declare(strict_types=1);

namespace App\Service;

/**
 * Interface NumberProcessorInterface
 * @package App\Service
 */
interface NumberProcessorInterface
{
    /**
     * Processes a number and returns a string.
     *
     * @param int $number
     * @return string
     */
    public function processNumber(int $number): string;

    /**
     * Processes multiples of a number.
     *
     * @param int $number
     * @param int $multiple
     * @return bool
     */
    public function isMultipleOf(int $number, int $multiple): bool;
}
