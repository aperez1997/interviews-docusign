Given string s, find the longest palindromic substring in s
<?php
// abcdedcba

printf("Test: %s\n", substr("abcba", 0, 5));

$tests =  ['aabb','', 'abbbc','abcbd', 'Abbd'];//['abc', 'aa', 'abd', 'ab', 'abba', '12345abcba7777'];
foreach ($tests as $test){
    $rv = findLongestPalin2($test);
    printf("%s => %s\n", $test, $rv);
}


function findLongestPalin2($string)
{
    if (empty($string)){ return ''; }

    $largestIdx = [];
    $largestLength = 0;
    for ($i =0; $i < strlen($string); $i++){
        for ($j = 1; $j <= strlen($string) - $i; $j++ ){
            // i is start char, j is end char
            // $candidate = substr($string, $i, $j);
            if (!isPalindrome2($string, $i, $j)){
                continue;
            }
            if ($j > $largestLength){
                $largestIdx = [$i, $j];
                $largestLength = $j;
            }
        }
    }
    return substr($string, $largestIdx[0], $largestIdx[1]);
}

/*
foreach ($tests as $test){
  $rv = isPalindrome2($test, 0, 3);
  printf("%s => %b\n", $test, $rv);
}*/


function isPalindrome2(&$string, $start, $offset)
{
    for ($i = $start; $i < ($start + ($offset / 2)); $i++){
        $endIndex = $offset - $i - 1;
        if ($i >= $endIndex){
            break;
        }
        $charStart = $string[$i];
        $charEnd = $string[$endIndex];
        if ($charStart != $charEnd){
            return false;
        }
    }
    return true;
}



function isPalindrome($string)
{
    $length = strlen($string);

    for ($i = 0; $i < ($length / 2); $i++){
        $endIndex = $length - $i - 1;
        if ($i == $endIndex){
            break;
        }
        $charStart = $string[$i];
        $charEnd = $string[$endIndex];
        if ($charStart != $charEnd){
            return false;
        }
    }
    return true;
}




// Old code

function findLongestPalin($string)
{
    $largest = '';
    $largestLength = 0;
    for ($i =0; $i < strlen($string); $i++){
        for ($j = 1; $j <= strlen($string) - $i; $j++ ){
            // i is start char, j is end char
            $candidate = substr($string, $i, $j);
            if (!isPalindrome($candidate)){
                continue;
            }
            if (strlen($candidate) > strlen($largest)){
                $largest = $candidate;
                $largestLength = strlen($candidate);
            }
        }
    }
    return $largest;
}



//Design scalable, Ecommerce billing system for B2B product company.

// customer - who
// subscription - contract, what features customers have
// product catalog - what features are available, what they cost
// wallet service - credit info, PCI stack
// payment gateway - payment providers
// invoice service - invoices and transactions
// executor - automated monthly invoicing, charging
// roster - direct based customer to different service set