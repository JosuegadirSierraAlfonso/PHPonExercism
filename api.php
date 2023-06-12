<?php

declare(strict_types=1);

function parse_binary(string $binary): int
{
    $decimal = 0;
    $binaryArray = str_split($binary);
    $binaryArray = array_reverse($binaryArray);
    foreach ($binaryArray as $key => $char) {
        if ($char != '0' && $char != '1') {
            throw new \InvalidArgumentException('');
        }
        $decimal += (intval($char)) * pow(2, $key);
    }
    return $decimal;
}

?>