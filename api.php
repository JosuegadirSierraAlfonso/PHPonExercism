<?php

declare(strict_types=1);

function rebase(int $number, array $sequence, int $base)
{
     if ($base < 2 || $number <= 1 || count($sequence) === 0) {
        return null;
    }
    $powers = count($sequence) - 1;
    $total  = 0;
    foreach ($sequence as $num) {
        if ($num < 0 || $num >= $number) {
            return null;
        }
        $total += $num * $number ** $powers--;
        if ($total === 0) {
            return null;
        }
    }
    $digits = [];
    while ($total > 0) {
        $digit = $total % $base;
        array_unshift($digits, $digit);
        $total = intdiv($total, $base);
    }
    return $digits;
}



?>