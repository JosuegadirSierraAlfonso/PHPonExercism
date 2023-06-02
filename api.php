<?php

declare(strict_types=1);

function isValid(string $number): bool
{
    $number = str_replace(' ', '', $number);
    if (strlen($number) < 2 or !ctype_digit($number)){
        return false;
    }
    if(doubling($number)) {
        return false;
    }
    return true;
}
function doubling(string $number)
{
    $length = strlen($number);
    $even = $length % 2;
    $sum = 0;
    for ($i = $length - 1; $i >= 0; --$i) {
        $char = $number[$i];
        if ($i % 2 === $even) {
            $char *= 2;
            if ($char > 9) {
                $char -= 9;
            }
        }
        $sum += $char;
    }
    return ($sum * 9) % 10;
}

?>