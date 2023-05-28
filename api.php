<?php

declare(strict_types=1);

function from(DateTimeImmutable $date): DateTimeImmutable
{
    $gigasecond = new DateInterval('PT1000000000S'); // Crea un intervalo de un gigasegundo
    $newDate = $date->add($gigasecond); // Agrega el intervalo a la fecha proporcionada

    return $newDate;
}
$birthdate = new DateTimeImmutable('2002-04-13 22:00:00');
$newDateTime = from($birthdate);

echo 'Fecha y hora de nacimiento: ' . $birthdate->format('Y-m-d H:i:s') . PHP_EOL;
echo 'Fecha y hora después de un gigasegundo: ' . $newDateTime->format('Y-m-d H:i:s');

?>