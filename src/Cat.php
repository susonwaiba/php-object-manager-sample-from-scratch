<?php

namespace App;

class Cat
{
    public function __construct(
        protected Ball $ball,
        protected string $color = 'blue'
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
