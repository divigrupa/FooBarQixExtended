<?php declare(strict_types=1);

namespace App\Service;

/**
 * Class FooBarService
 * @package App\Service
 */
final class FooBarService implements ServiceInterface
{
    /**
     * Dictionary of multiples and their corresponding words.
     *
     * @var array
     */
    public const DIGIT_DICTIONARY = [
        3 => 'Foo',
        5 => 'Bar',
        7 => 'Qix',
    ];

    /**
     * Separator between words.
     */
    public const SEPARATOR = ', ';

    /**
     * Number processor.
     *
     * @var ProcessorInterface $processor
     */
    protected ProcessorInterface $processor;

    /**
     * FooBarService constructor.
     *
     * @param ProcessorInterface $processor
     */
    public function __construct(ProcessorInterface $processor)
    {
        $this->processor = $processor;
    }

    /**
     * {@inheritdoc}
     */
    public static function getConfig(): array
    {
        return [
            'digitDictionary' => self::DIGIT_DICTIONARY,
            'separator'       => self::SEPARATOR,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function execute(int $number): string
    {
        return $this->processor->process($number);
    }
}
