<?php

namespace Evaneos\Kata;

class PawnBuilder
{
    /** @var string */
    private $color;

    /**
     * @return Pawn
     */
    public function build()
    {
        return new Pawn($this->color);
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
}
