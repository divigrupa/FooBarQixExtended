<?php declare(strict_types=1);

namespace App\Service;

/**
 * Class FooBarService
 * @package App\Service
 */
final class FooBarService extends AbstractService
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    private const DIGIT_DICTIONARY = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    /**
     * FooBarService constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->separator = ', ';
        $this->digitDictionary = self::DIGIT_DICTIONARY;
    }
}
