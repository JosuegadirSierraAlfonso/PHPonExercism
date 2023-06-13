<?php

declare(strict_types=1);

function crypto_square(string $plaintext): string
{
    $text = preg_replace('#\W#', '', mb_strtolower($plaintext));
    if ($text === '') {
        return '';
    }
    $letters = mb_str_split($text);
    $col = (int) ceil(sqrt(count($letters)));
    $row = (int) ceil(count($letters) / $col);
    $out = [];
    for ($c = 0; $c < $col; $c++, $tmp = []) {
        for ($r = 0; $r < $row; $r++) { 
            $tmp[] = $letters[$col * $r + $c] ?? ' ';
        }
        $out[] = implode('', $tmp); 
    }
    return implode(' ', $out);
}
?>