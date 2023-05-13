<?php

namespace App;

class Ball
{
    public function __construct(
        protected string $color = 'green'
    ) {
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}
