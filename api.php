<?php

declare(strict_types=1);

function diamond(string $input): array
{
    $range = range('A', strtoupper($input));
    $padding = (ord(end($range)) - ord(reset($range))) * 2 + 1;
    $space = 1;
    foreach ($range as $letter) {
        if ($letter === 'A') {
            $result[] = str_pad($letter, $padding, ' ', STR_PAD_BOTH);

        } else {
            $result[] = str_pad($letter . str_repeat(' ', $space) . $letter, $padding, ' ', STR_PAD_BOTH);
        	$space += 2;
        }
    }
    return array_merge(
        $result,
        array_slice(array_reverse($result), 1)
    );
}
?>