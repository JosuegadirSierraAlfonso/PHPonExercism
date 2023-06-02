<?php

declare(strict_types=1);

function toRna(string $dna): string
{
    return strtr($dna,['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U']);
}


/* if($dna == "G"){
    $dna = str_replace("G", "C", $dna);
    return $dna;
}
else if($dna == "C"){
    $dna = str_replace("C", "G", $dna);
    return $dna;
}
else if($dna == "T"){
    $dna = str_replace("T", "A", $dna);
    return $dna;
}
else if($dna == "A"){
    $dna = str_replace("A", "U", $dna);
    return $dna;
} */
?>