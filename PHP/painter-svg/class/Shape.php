<?php

/**
 * La classe Shape regroupe les propriétés et méthodes communes à plusieurs autres classes
 * On va créer un lien d'héritage entre Shape et les classes Rectangle, Ellipse et Polygon
 */
abstract class Shape {

    protected int $x;
    protected int $y;
    protected string $color;
    protected float $opacity;

    /**
     * Déclaration d'une méthode abstraite draw() pour obliger les classes enfants à l'implémenter
     */
    abstract public function draw();

    /**
     * Constrcuteur
     */
    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->color = 'grey';
        $this->opacity = 1;
    }

    /**
     * Autres méthodes
     */
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