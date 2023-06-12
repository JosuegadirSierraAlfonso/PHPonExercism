<?php

declare(strict_types=1);

function findFewestCoins(array $coins, int $input): array
{
    if ($input === 0) {
        return [];
    }
    if ($input < 0) {
        throw new InvalidArgumentException('Cannot make change for negative value');
    }
    if ($input < $coins[0]) {
        throw new InvalidArgumentException('No coins small enough to make change');
    }
    $change = [];
    foreach (range(0, $input) as $step) {
        if (in_array($step, $coins, true)) {
            $change[$step] = [$step];
            continue;
        }
        foreach ($coins as $coin) {
            if ($coin > $step) {
                continue;
            }
            if (isset($change[$step - $coin])) {
                $otherCoins = $change[$step - $coin];
                if (! isset($change[$step]) || count($change[$step]) > 1 + count($otherCoins)) {
                    $change[$step] = array_merge([$coin], $otherCoins);
                }
            }
        }
    }
    if (! isset($change[$input])) {
        throw new InvalidArgumentException('No combination can add up to target');
    }
    return $change[$input];
}

?>