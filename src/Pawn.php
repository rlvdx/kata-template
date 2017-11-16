<?php

namespace Evaneos\Kata;

final class Pawn
{
    /** @var string */
    private $color;

    /** @var string */
    private $shape;

    /** @var string */
    private $size;

    /**
     * Pawn constructor.
     *
     * @param string $color
     * @param string $shape
     * @param string $size
     */
    public function __construct(
        $color,
        $shape,
        $size
    ) {
        $this->color = $color;
        $this->shape = $shape;
        $this->size  = $size;
    }

    /**
     * @return Characteristics
     */
    public function getCharacteristics()
    {
        return new Characteristics([
            $this->color,
            $this->shape,
            $this->size,
        ]);
    }
}
