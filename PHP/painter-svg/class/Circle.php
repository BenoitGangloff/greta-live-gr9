<?php 

class Circle extends Shape {

    private int $radius;

    public function __construct()
    {
        $this->radius = 10;
    }

    public function setRadius(int $radius)
    {
        $this->radius = $radius;
    }

    function draw():string
    {
        return '<circle cx="'.$this->x.'" cy="'.$this->y.'" r="'.$this->radius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}