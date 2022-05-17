<?php

class Triangle extends Polygon {

    public function setCoordinates(int $x1, int $y1, int $x2, int $y2, int $x3, int $y3)
    {
        $this->setPoints($x1, $y1, $x2, $y2, $x3, $y3);
    }

}