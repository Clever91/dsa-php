<?php

/**
 * 
 * Binary search is an efficient algorithm for finding the position of a target value within a **sorted array**. It works by repeatedly dividing the search range in half:
 * 
 * 1. **Start**: Compare the target value with the middle element of the array.  
 * 2. **If equal**: The target is found.  
 * 3. **If smaller**: Focus on the left half of the array.  
 * 4. **If larger**: Focus on the right half of the array.  
 * 5. Repeat the process until the target is found or the range is empty.
 * 
 * ### Time Complexity:
 *      - **O(log n)** in the best and average cases, as the search space is halved with each step.
 * 
 * It is much faster than linear search for large datasets but requires the input to be sorted.
 */

 function measureExecutionTime(callable $functionName, ...$args)
 {
    $startTime = microtime(true);
    $result = $functionName(...$args);
    $endTime = microtime(true);
    $diffTime = ($endTime - $startTime) * 1000;

    echo "{$functionName}'s execution time is {$diffTime} s.\n";
 }

function linearSrearch($numbers, $lookingNumber): int
{
    for ($i=0; $i < count($numbers); $i++) { 
        if ($lookingNumber == $numbers[$i]) {
            return $i;
        }
    }

    return -1;
}

function binarySearch($numbers, $lookingNumber): int
{
    $startIndex = 0;
    $endIndex = count($numbers) - 1;
    
    while($startIndex <= $endIndex) {
        $midIndex = intval(($startIndex + $endIndex) / 2);
        $midNumber = $numbers[$midIndex];

        if ($midNumber == $lookingNumber) {
            return $midIndex;
        } else if ($midNumber < $lookingNumber) {
            $startIndex = $midIndex + 1;
        } else if ($midNumber > $lookingNumber) {
            $endIndex = $midIndex - 1;
        }
    }

    return -1;
}

//  Test 001
// $numbers = [1, 2, 34, 43, 65, 76, 78, 99, 100, 102, 130];
// $lookingIndex = linearSrearch($numbers, 12);
// echo "Looking 12 number is found at {$lookingIndex} index \n";
// $lookingIndex = linearSrearch($numbers, 102);
// echo "Looking 102 number is found at {$lookingIndex} index \n";
// $lookingIndex = binarySearch($numbers, 12);
// echo "BS: Looking 12 number is found at {$lookingIndex} index \n";
// $lookingIndex = binarySearch($numbers, 102);
// echo "BS: Looking 102 number is found at {$lookingIndex} index \n";

//  Test 002
$numbers = [];
for ($i=0; $i < 100000; $i++) { 
    array_push($numbers, $i+10);
}
measureExecutionTime(   "linearSrearch", $numbers, 99999);
measureExecutionTime(   "binarySearch", $numbers, 99999);