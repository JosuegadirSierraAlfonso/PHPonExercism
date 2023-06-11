<?php

declare(strict_types=1);

function acronym(string $text): string
{
    $words = mb_split('(?=[A-Z])|\W', $text);
    
    if (count($words) == 1) {
        return '';
    }
    $acronym = [];
    foreach ($words as $word) {
        $acronym[] = mb_strtoupper(mb_substr($word, 0, 1));
    }
    return implode('', $acronym);

}



?>