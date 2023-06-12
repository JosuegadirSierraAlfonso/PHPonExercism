<?php

declare(strict_types=1);


function detectAnagrams(string $word, array $anagrams): array
{
    $result = [];
    $lowerWord = strtolower($word);
    foreach ($anagrams as $anagram){
        $lowerAnagram = strtolower($anagram);
        if (strlen($anagram) !== strlen($word)){
            continue;
        }
        if($lowerAnagram === $lowerWord){
            continue;
        }
        if (count_chars($lowerAnagram) == count_chars ($lowerWord)){
            array_push($result, $anagram);
        }
    }
    return $result;
}



?>