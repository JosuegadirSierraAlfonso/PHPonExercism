<?php

declare(strict_types=1);


function encode(string $input): string
{
    preg_match_all('/(.)\1*/', $input, $matches);
    return implode(
        array_map(
            fn($count, $value) => ($count === 1 ? "" : strval($count)) . $value,
            array_map(fn($match) => strlen($match), $matches[0]),
            $matches[1]
        )
    );
}
function decode(string $input): string
{
    preg_match_all('/(\d*)(\D)/', $input, $matches);
    return implode(
        array_map(
            fn($count, $value) => str_repeat($value, $count),
            array_map(fn($match) => empty($match) ? 1 : intval($match), $matches[1]),
            $matches[2]
        )
    );
}



?>