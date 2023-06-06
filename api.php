<?php

declare(strict_types=1);

function isIsogram(string $word): bool
{
$data = mb_str_split(preg_replace('/[\s-]/', '', mb_strtolower($word)));
return array_unique($data) === $data;
}


/* function isIsogram(string $word): bool
{
$word = str_replace(' ','',str_replace('-','',strtolower($word)));
$len = array();
foreach(str_split($word) as $letter){
if(in_array($letter, $len)){
return false;
}
$len[] = $letter;
}
return true;
} */

?>