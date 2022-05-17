<?php 

class Polygon extends Shape {
  
    private array $points;

    public function __construct()
    {
        parent::__construct();

        $this->points = [];
    }

    // public function setPoints(array $points)
    // {
    //     $this->points = $points;
    // }

    public function setPoints(int ...$points)
    {
        $this->points = $points;
    }

    public function draw(): string
    {
        return '<polygon points="'.implode(' ', $this->points).'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}