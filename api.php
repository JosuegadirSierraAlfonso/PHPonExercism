<?php

declare(strict_types=1);

function steps(int $number): int
{
    if ($number <= 0) {
        throw new InvalidArgumentException('Only positive numbers are allowed');
    }
    for ($step = 0; $number !== 1; $step++) {
        $number = $number % 2 === 0 ? $number / 2 : 3 * $number + 1;
    }
    return $step;
}

?>