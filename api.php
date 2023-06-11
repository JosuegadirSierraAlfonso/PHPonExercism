<?php

declare(strict_types=1);
function accumulate(array $input, callable $accumulator): array
{
    foreach ($input as &$value) {
        $value = $accumulator($value);
    }
    return $input;
}



?>