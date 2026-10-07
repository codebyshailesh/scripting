<?php
// functiono that takes two 2 number and return larger
function large($a, $b)
{
    if ($a > $b)
        return $a;
    else return $b;
}
$num1 = 2;
$num2 = 5;
echo large($num1, $num2) . " is the largest among " . $num1 . " and " . $num2;
