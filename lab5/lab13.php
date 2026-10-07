<?php
// a funtion that takes array and return average
function avg(array $arr): float
{
    $tot = 0;
    foreach ($arr as $num) {
        $tot += $num;
    }
    $average = $tot / count($arr);
    return $average;
}
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
foreach ($arr as $n) {
    echo $n . " ";
}
echo "<br>" . "Averge of the array is: " . avg($arr);
