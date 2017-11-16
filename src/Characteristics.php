<?php

namespace Evaneos\Kata;

final class Characteristics
{
    const COLOR_DARK   = 'dark';
    const COLOR_LIGHT  = 'light';
    const SHAPE_ROUND  = 'round';
    const SHAPE_SQUARE = 'square';
    const SIZE_SHORT   = 'short';
    const SIZE_TALL    = 'tall';

    /** @var string[] */
    private $characteristics;

    /**
     * Characteristics constructor.
     *
     * @param string[] $characteristics
     */
    public function __construct(array $characteristics)
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @param Characteristics $other
     *
     * @return Characteristics
     */
    public function commonCharacteristics(Characteristics $other)
    {
        return new Characteristics(
            array_intersect($this->characteristics, $other->characteristics)
        );
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->characteristics);
    }

    /**
     * @return Characteristics
     */
    public static function full()
    {
        return new self([
            self::COLOR_LIGHT,
            self::COLOR_DARK,
            self::SHAPE_ROUND,
            self::SHAPE_SQUARE,
            self::SIZE_SHORT,
            self::SIZE_TALL
        ]);
    }
}
