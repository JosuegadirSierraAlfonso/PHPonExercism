<?php

declare(strict_types=1);

class Robot
{
    public const DIRECTION_NORTH = 0;
    public const DIRECTION_EAST = 1;
    public const DIRECTION_SOUTH = 2;
    public const DIRECTION_WEST = 3;
    public function __construct(public array $position, public int $direction)
    {
    }
    public function turnRight(): self
    {
        $this->direction = ($this->direction + 1) % 4;
        return $this;
    }
    public function turnLeft(): self
    {
        $this->direction = ($this->direction + 3) % 4;
        return $this;
    }
    public function advance(): self
    {
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->position[1]++,
            self::DIRECTION_EAST => $this->position[0]++,
            self::DIRECTION_SOUTH => $this->position[1]--,
            self::DIRECTION_WEST => $this->position[0]--
        };
        return $this;
    }
    public function instructions(string $instructions): void
    {
        if (!preg_match('/^[LRA]+$/', $instructions)) {
            throw new InvalidArgumentException();
        }
        foreach (str_split($instructions) as $instruction) {
            match ($instruction) {
                'L' => $this->turnLeft(),
                'R' => $this->turnRight(),
                'A' => $this->advance()
            };
        }
    }
}



?>