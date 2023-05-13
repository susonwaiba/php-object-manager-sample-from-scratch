<?php

namespace App;

class Apple
{
    public function __construct(
        protected string $color = 'red'
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
