<?php

namespace Evaneos\Kata;

final class Pawn
{
    const COLOR_DARK   = 'dark';
    const COLOR_LIGHT  = 'light';
    const SHAPE_ROUND  = 'round';
    const SHAPE_SQUARE = 'square';
    const SIZE_SHORT   = 'short';
    const SIZE_TALL    = 'tall';

    /** @var string */
    private $color;

    /** @var string */
    private $shape;

    /** @var string */
    private $size;

    private $hollow;

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
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }
}
