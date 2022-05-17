<?php

/**
 * La classe Shape regroupe les propriétés et méthodes communes à plusieurs autres classes
 * On va créer un lien d'héritage entre Shape et les classes Rectangle, Ellipse et Polygon
 */
class Shape {

    protected int $x;
    protected int $y;
    protected string $color;
    protected float $opacity;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->color = 'grey';
        $this->opacity = 1;
    }

    public function setLocation(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;
    }
}