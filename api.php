<?php

declare(strict_types=1);

function encode(string $text): string
{
    $alphabet = implode('', range('a', 'z'));

    $ciphers = strrev($alphabet);

    $text = preg_replace('/\W/', '', strtolower($text));

    $translation = strtr($text, $alphabet, $ciphers);
    
    return wordwrap($translation, 5, ' ', true);
}



?>