<?php

function genRectangle(int $x, int $y, int $width, int $height, string $color, float $opacity):string
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

function genSquare(int $x, int $y, int $size, string $color, float $opacity):string
{
    return '<rect x="'.$x.'" y="'.$y.'" width="'.$size.'" height="'.$size.'" fill="'.$color.'" opacity="'.$opacity.'" />';
}

function genEllipse(int $cx, int $cy, int $xRadius, int $yRadius, string $color, float $opacity):string
{
    return '<ellipse cx="'.$cx.'" cy="'.$cy.'" rx="'.$xRadius.'" ry="'.$yRadius.'" fill="'.$color.'" opacity="'.$opacity.'" />';
}

function genCircle(int $cx, int $cy, int $radius, string $color, float $opacity):string
{
    return '<circle cx="'.$cx.'" cy="'.$cy.'" r="'.$radius.'" fill="'.$color.'" opacity="'.$opacity.'" />';
}

function genTriangle(int $x1, int $y1, int $x2, int $y2, int $x3, int $y3, string $color, float $opacity):string
{
    return '<polygon points="'.$x1.' '.$y1.' '.$x2.' '.$y2.' '.$x3.' '.$y3.'" fill="'.$color.'" opacity="'.$opacity.'" />';
}