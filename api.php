<?php

declare(strict_types=1);
$strandA = 'GAGCCTACTAACGGGAT';
$strandB = 'CATCGTAATGACGGCCT';
function distance(string $strandA, string $strandB): int
{
    $distance = 0;
    if (strlen($strandA) !== strlen($strandB)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    // return count(
    //     array_diff_assoc(
    //        str_split($strandA), 
    //         str_split($strandB)
    //     )
    // ); 

    for ($i=0; $i < strlen($strandA) ; $i++) { 
        if ($strandA[$i] !== $strandB[$i]) {
            $distance++;
        }
    };
    return $distance;
}; 

echo distance($strandA, $strandB);

?>