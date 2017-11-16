<?php

namespace Evaneos\Kata;

final class Pawn
{
    const COLOR_DARK  = 'dark';
    const COLOR_LIGHT = 'light';

    /** @var string */
    private $color;

    private $size;
    private $shape;
    private $hollow;

    /**
     * Pawn constructor.
     *
     * @param $color
     */
    public function __construct(
        $color
    ) {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}
