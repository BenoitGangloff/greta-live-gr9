<?php 

class Circle extends Shape {

    private int $radius;

    public function __construct()
    {
        parent::__construct();
        $this->radius = 10;
    }

    public function setRadius(int $radius)
    {
        $this->radius = $radius;
    }

    function draw():string
    {
        return '<circle cx="'.$this->location->getX().'" cy="'.$this->location->getY().'" r="'.$this->radius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}