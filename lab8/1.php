<?php
class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }
    public function subtract($a, $b)
    {
        return $a - $b;
    }
}

$cal = new Calculator();
echo "sum = " . $cal->add(2, 4);

echo "subtract =" . $cal->subtract(5, 6);
