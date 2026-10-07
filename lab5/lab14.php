<?php
//  takes a string and return number of vowels
function vowelCount(string $str): int
{
    $count = 0;
    $vowel  = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowel)) {
            $count++;
        }
    }
    return $count;
}

$str = "Enter string: ";
echo "The number of vowels in the string '" . $str . "' is " . vowelCount($str);
