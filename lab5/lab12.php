<?php
// takes a number and check it is odd or even and return result

function numCheck(int $num): string
{
    if ($num % 2 == 0)
        return "Even";
    else
        return "Odd";
}

$num = 13;
echo "The number " . $num . " is " . numCheck($num);
