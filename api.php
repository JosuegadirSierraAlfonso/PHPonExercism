<?php

declare(strict_types=1);
class Series
{
    public function __construct(private string $digits) {}
    public function largestProduct(int $span): int
    {
        
        if (($this->digits && (!is_numeric($this->digits) || $span < 0)) || strlen($this->digits) < $span) {
            throw new \InvalidArgumentException;
        }
        if (!strlen($this->digits) || !$span) {
            return 1;
        }
        
        $max = 0;
        for ($i = 0; $i < strlen($this->digits) - $span + 1; $i++) {
            $max = max($max, array_product(str_split(substr($this->digits, $i, $span))));
        }
        return $max;
    }
}



?>