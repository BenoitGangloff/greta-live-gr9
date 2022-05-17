<?php

class Rectangle {

    /**
     * Déclaration des propriétés
     */
    private int $x;
    private int $y;
    private int $width;
    private int $height;
    private string $color;
    private float $opacity;

    /**
     * Déclaration du constructeur
     * Le constrcuteur est une méthode magique appelée automatiquement par PHP lors de la création d'un objet (avec le mot-clé "new")
     * Il permet la plupart du temps d'initialiser les propriétés de l'objet
     * C'est une fonction : on pourrait lui donner des paramètres
     * Remarque : il existe d'autres méthodes magiques, elles commencent toutes par un double underscore "__"
     */
    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->width = 10;
        $this->height = 5;
        $this->color = 'grey';
        $this->opacity = 1;
    }

    /**
     * Déclaration des autres méthodes
     */
    public function setLocation(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;
    }

    function draw():string
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}