<?php

declare(strict_types=1);

class School
{
    private $school = [];
    public function add(string $name, int $grade): void
    {
        $this->school[$grade][] = $name;
        sort($this->school[$grade]);
    }
    public function grade(int $grade): array
    {
        return $this->school[$grade] ?? [];
    }
    public function studentsBygradeAlphabetical(): array
    {
        ksort($this->school);
        return $this->school;
    }
}



?>