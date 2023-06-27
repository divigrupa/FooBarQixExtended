<?php declare(strict_types=1);

namespace App\Service;

/**
 * Interface ServiceInterface
 * @package App\Service
 */
interface ServiceInterface
{
    /**
     * Returns the configuration for the service.
     *
     * @return array
     */
    public static function getConfig(): array;

    /**
     * Executes the service.
     *
     * @param int $number
     * @return string
     */
    public function execute(int $number): string;
}
