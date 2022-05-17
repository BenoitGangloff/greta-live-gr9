<?php

class Ellipse extends Shape {

    /**
     * Déclaration des propriétés
     */
    private int $xRadius;
    private int $yRadius;

    /**
     * Déclaration du constructeur
     * Le constrcuteur est une méthode magique appelée automatiquement par PHP lors de la création d'un objet (avec le mot-clé "new")
     * Il permet la plupart du temps d'initialiser les propriétés de l'objet
     * C'est une fonction : on pourrait lui donner des paramètres
     * Remarque : il existe d'autres méthodes magiques, elles commencent toutes par un double underscore "__"
     */
    public function __construct()
    {
        $this->xRadius = 10;
        $this->yRadius = 5;
    }

    /**
     * Déclaration des autres méthodes
     */
    public function setRadius(int $xRadius, int $yRadius)
    {
        $this->xRadius = $xRadius;
        $this->yRadius = $yRadius;
    }

    function draw():string
    {
        return '<ellipse cx="'.$this->x.'" cy="'.$this->y.'" rx="'.$this->xRadius.'" ry="'.$this->yRadius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}