<?php

/**
 * La classe Shape regroupe les propriétés et méthodes communes à plusieurs autres classes
 * On va créer un lien d'héritage entre Shape et les classes Rectangle, Ellipse et Polygon
 */
abstract class Shape {

    protected Point $location;
    protected string $color;
    protected float $opacity;

    static private int $count = 0;

    /**
     * Déclaration d'une méthode abstraite draw() pour obliger les classes enfants à l'implémenter
     */
    abstract public function draw();

    /**
     * Constrcuteur
     */
    public function __construct()
    {
        $this->location = new Point();
        $this->color = 'grey';
        $this->opacity = 1;

        self::$count++;
    }

    /**
     * Autres méthodes
     */
    public function setLocation(int $x, int $y)
    {
        $this->location->setXY($x, $y);
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;
    }

    static public function getCount(): int
    {
        return self::$count;
    }
}