<?php

class Square extends Shape {

    private int $size;

    public function __construct()
    {
        $this->size = 10;
    }

    public function setSize(int $size)
    {
        $this->size = $size;
    }

    function draw():string
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->size.'" height="'.$this->size.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}