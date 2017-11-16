<?php

namespace Evaneos\Kata;

final class PawnBuilder
{
    /** @var string */
    private $color;

    /** @var string */
    private $shape;

    /**
     * @return Pawn
     */
    public function build()
    {
        return new Pawn($this->color, $this->shape);
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function withColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param string $shape
     *
     * @return $this
     */
    public function withShape($shape)
    {
        $this->shape = $shape;

        return $this;
    }
}
