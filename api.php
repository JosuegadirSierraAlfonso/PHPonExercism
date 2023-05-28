<?php

declare(strict_types=1);
$color = 'violet';
const COLORS = [
    "black",
    "brown",
    "red",
    "orange",
    "yellow",
    "green",
    "blue",
    "violet",
    "grey",
    "white"
]; 

function colorCode(string $color): int
{
    $index = array_search($color, COLORS);
    return $index;
}
echo colorCode($color);

?>