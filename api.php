<?php


declare(strict_types=1);
class Bob
{
    public function respondTo(string $str): string
    {
    $str=trim($str);
    if(empty($str)){
        return "Fine. Be that way!";
    }
    if (preg_match('/[A-Z]+/', $str) && !preg_match('/[a-z]+/', $str)) { 

            if (str_ends_with($str, '?')) {
                return 'Calm down, I know what I\'m doing!';
            }
            return 'Whoa, chill out!';
        }
    if (str_ends_with($str, '?')) {
            return 'Sure.';
        }
        return 'Whatever.';
    }
}
?>