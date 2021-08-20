<?php
/*
Given an array of integers, rearrange the array so that all zeroes are at the beginning of the array.
  e.g.: [5,1,0,2,0,4,0,3] -> [0,0,0,5,1,2,4,3]
*/

$tests = [
  [5,1,0,2,0,4,0,3],
  [0,0,5,1,0,2,0,4,0,3],
];
foreach ($tests as $test){
  $result = zeroes($test);
  print_r(json_encode($result));  
}


function zeroes($array)
{
  $firstNonZeroIdx = null;
  for ($i = 0; $i < count($array); $i++){  
    // its a zero - possibly flip it
    if ($array[$i] == 0){
              // if we haven't found a non-zero, just move on 
      if (is_null($firstNonZeroIdx)){
        continue;
      } else {
                    $temp = $array[$firstNonZeroIdx];
        $array[$firstNonZeroIdx] = $array[$i];
        $array[$i] = $temp;
        // TODO
        $firstNonZeroIdx++;
      }      
    } else {
              // it's not a zero - possible track it, but move forward  
      if (is_null($firstNonZeroIdx)){
        $firstNonZeroIdx = $i;
      }
    }
  }
  return $array;
}

//[0,0,0,2,1,4,5,3];
// $nonZero = 3
// $i = 7
// $temp = 5
