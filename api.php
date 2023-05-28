<?php

function helloWorld()
{
    return "---Hello, World!";
}
echo strrev(helloWorld());


//other metod


$string = 'Hello, World!';
$n =strlen("$string");
For($i=1;$i<=$n;$i++)
{
    $val= $string[-$i];
   echo $val;
}

?>