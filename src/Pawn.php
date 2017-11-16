<?php

namespace Evaneos\Kata;

final class Pawn
{
    const COLOR_DARK  = 'dark';
    const COLOR_LIGHT = 'light';
    const SHAPE_ROUND = 'round';
    const SHAPE_SQUARE = 'square';

    /** @var string */
    private $color;

    /** @var string */
    private $shape;

    private $size;
    private $hollow;

    /**
     * Pawn constructor.
     *
     * @param $color
     * @param $shape
     */
    public function __construct(
        $color,
        $shape
    ) {
        $this->color = $color;
        $this->shape = $shape;
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
}
