<?php declare(strict_types=1);

namespace App\Service;

/**
 * Class InfQixFooService
 * @package App\Service
 */
final class InfQixFooService extends AbstractService
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    private const DIGIT_DICTIONARY = [
        8 => 'Inf',
        7 => 'Qix',
        3 => 'Foo',
    ];

    /**
     * InfQixFooService constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->separator = '; ';
        $this->digitDictionary = self::DIGIT_DICTIONARY;
    }
}
