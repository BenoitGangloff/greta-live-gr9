<?php

function genRectangle(int $x, int $y, int $width, int $height, string $color, float $opacity)
{
    /**
     * Version avec concaténation
     */
    return '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$color.'" opacity="'.$opacity.'" />';

    /**
     * Version avec interpolation de variable
     */
    return "<rect x=\"$x\" y=\"$y\" width=\"$width\" height=\"$height\" fill=\"$color\" opacity=\"$opacity\" />";
}