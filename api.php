<?php

declare(strict_types=1);

class Game
{
    private array $rolls = [];
    public function score(): int
    {
        $this->isApplicable();
        $score = 0;
        $fistInFrame = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($this->rolls[$fistInFrame] === 10) {
                if ($this->rolls[$fistInFrame + 1] !== 10) {
                    if (($this->rolls[$fistInFrame + 1] + $this->rolls[$fistInFrame + 2]) > 10) {
                        throw new Exception();
                    }
                }
                $score += (10 + $this->rolls[$fistInFrame + 1] + $this->rolls[$fistInFrame + 2]);
                $fistInFrame++;
                continue;
            }
            if (($this->rolls[$fistInFrame] + $this->rolls[$fistInFrame + 1]) === 10) {
                $score += (10 + $this->rolls[$fistInFrame + 2]);
                $fistInFrame += 2;
                continue;
            }
            if (!is_null($this->rolls[$fistInFrame]) + !is_null($this->rolls[$fistInFrame + 1])) {
                if (($this->rolls[$fistInFrame] + $this->rolls[$fistInFrame + 1]) > 10) {
                    throw new Exception();
                }
                $score += ($this->rolls[$fistInFrame] + $this->rolls[$fistInFrame + 1]);
                $fistInFrame += 2;
            }
        }
        return $score;
    }
    public function roll(int $pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new Exception();
        }
        $this->rolls[] = $pins;
    }
    private function isApplicable()
    {
        $rollCount = count($this->rolls);
        if (empty($this->rolls) || $rollCount < 12) {
            throw new Exception();
        }
        if ($rollCount > 20 && ($this->rolls[18] + $this->rolls[19]) < 10) {
            throw new Exception();
        }
        if ($rollCount > 12 && $rollCount < 21 && (end($this->rolls) === 10
            || ($this->rolls[$rollCount - 2] + end($this->rolls)) === 10)) {
            throw new Exception();
        }
    }
}

?>