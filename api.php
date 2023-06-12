<?php

declare(strict_types=1);

class BeerSong
{
    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
    public function verse(int $number): string
    {
        switch ($number) {
            case 1:
                return
                    '1 bottle of beer on the wall, 1 bottle of beer.' . PHP_EOL .
                    'Take it down and pass it around, no more bottles of beer on the wall.' . PHP_EOL;
            case 0:
                return
                    'No more bottles of beer on the wall, no more bottles of beer.' . PHP_EOL .
                    'Go to the store and buy some more, 99 bottles of beer on the wall.';
            default:
                $next = $number - 1;
                $noun = ($next === 1) ? 'bottle' : 'bottles';
                return
                    "{$number} bottles of beer on the wall, {$number} bottles of beer." . PHP_EOL .
                    "Take one down and pass it around, {$next} {$noun} of beer on the wall." . PHP_EOL;
        }
    }
    public function verses(int $from, int $to): string
    {
        return implode(PHP_EOL, array_map(
            fn($number) => $this->verse($number),
            range($from, $to)
        ));
    }
}

?>