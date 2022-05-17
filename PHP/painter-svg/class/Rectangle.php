<?php

/**
 * La classe Rectangle "hérite" ou "étends" de la classe Shape
 * Un rectangle est une sous-catégorie de la classe "forme" : un rectangle EST une forme géométrique
 * La classe Rectangle va hériter des propriétés et des méthodes de la classe Shape (son parent)
 * /!\ qui ont la visibilité "public" ou "protected"
 */
class Rectangle extends Shape {

    /**
     * Déclaration des propriétés
     */
    private int $width;
    private int $height;

    /**
     * Déclaration du constructeur
     * Le constrcuteur est une méthode magique appelée automatiquement par PHP lors de la création d'un objet (avec le mot-clé "new")
     * Il permet la plupart du temps d'initialiser les propriétés de l'objet
     * C'est une fonction : on pourrait lui donner des paramètres
     * Remarque : il existe d'autres méthodes magiques, elles commencent toutes par un double underscore "__"
     */
    public function __construct()
    {
        /**
         * Appel explicite du constructeur du parent (Shape) qui était écrasé (surchargé) par celui de l'enfant (Rectangle)
         */
        parent::__construct();

        $this->width = 10;
        $this->height = 5;
    }

    /**
     * Déclaration des autres méthodes
     */
    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    function draw():string
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}