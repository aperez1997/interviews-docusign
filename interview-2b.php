<?php

/*
Given two arrays representing large integers such that each element in the array is a single digit number, calculate the sum of the two integers.
	e.g.:  [5,3,4,7,9]  -> 53479
		[4,2,3,1,1] -> 42311
		Result: [9,5,7,9,0] -> 95790
*/

$result = sum([5], [7]);
print_r($result);

function sum($num1, $num2)
{
    $len1 = count($num1); // 5
    $len2 = count($num2); // 3
    // largest of the two
    $max = max($len1, $len2);

    $carryOver = 0;
    $output = [];
    // i = length from end
    for ($i = 0; $i < $max; $i++) {
        // find last unsummed digit of both number
        $digit1 = 0;
        $digit2 = 0;

        // if one array is out of digits, just use 0
        $index1 = $len1 - $i - 1;
        if ($index1 >= 0) {
            $digit1 = $num1[$index1];
        }
        $index2 = $len2 - $i - 1;
        if ($index2 >= 0) {
            $digit2 = $num2[$index2];
        }

        // sum = add 2 digits
        $sum = $digit1 + $digit2;
        if ($carryOver > 0) {
            $sum += $carryOver;
            $carryOver = 0;
        }

        // if greater than 10 - set carryOver to 1, set sum = sum - 10
        if ($sum >= 10) {
            $carryOver = 1;
            $sum = $sum % 10;
        }

        // record sum in end of output, starting from the end
        $endIndex = $max - $i - 1;
        $output[$endIndex] = $sum;
    }
    if ($carryOver > 0) {
        array_unshift($output, $carryOver);
    }

    return $output;
}