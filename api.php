<?php

declare(strict_types=1);

class Robot
{
    private $name;
    private static $usedNames = [];

    public function __construct()
    {
        $this->reset();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function reset(): void
    {
        $this->uniqueName();
    }

    private function uniqueName(): void
    {
        do {
            $name = $this->randomName();
        } while (in_array($name, self::$usedNames));

        $this->name = $name;
        self::$usedNames[] = $name;
    }

    private function randomName(): string
    {
        $letters = range('A', 'Z');
        $digits = range(0, 9);

        shuffle($letters);
        shuffle($digits);

        $randomLetters = implode(array_slice($letters, 0, 2));
        $randomDigits = implode(array_slice($digits, 0, 3));

        return $randomLetters . $randomDigits;
    }
}


?>