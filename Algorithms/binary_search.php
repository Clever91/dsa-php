<?php

require_once __DIR__ . "./utils.php";

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

function linearSearch($numbers, $lookingNumber): int
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
    if (empty($numbers)) {
        throw new Exception("Array is empty");
    }

    $startIndex = 0;
    $endIndex = count($numbers) - 1;
    
    while($startIndex <= $endIndex) {
        $midIndex = intval(($startIndex + $endIndex) / 2);
        $midNumber = $numbers[$midIndex];

        if ($midNumber == $lookingNumber) {
            return $midIndex;
        } else if ($midNumber < $lookingNumber) {
            $startIndex = $midIndex + 1;
        } else {
            $endIndex = $midIndex - 1;
        }
    }

    return -1;
}

function binarySearchRecursive($numbers, $lookingNumber, $startIndex, $endIndex): int
{
    if (empty($numbers)) {
        throw new Exception("Array is empty");
    }
    
    if ($startIndex > $endIndex) {
        return -1;
    }

    $midIndex = intval(($startIndex + $endIndex) / 2);
    $midNumber = $numbers[$midIndex];
    
    if ($midNumber == $lookingNumber) {
        return $midIndex;
    }

    if ($midNumber > $lookingNumber) {
        return binarySearchRecursive($numbers, $lookingNumber, $startIndex, $midIndex - 1);
    } else {
        return binarySearchRecursive($numbers, $lookingNumber, $midIndex + 1, $endIndex);
    }
}

//  Test 001
// $numbers = [1, 2, 34, 43, 65, 76, 78, 99, 100, 102, 130];
// $lookingIndex = linearSearch($numbers, 12);
// echo "Looking 12 number is found at {$lookingIndex} index \n";
// $lookingIndex = linearSearch($numbers, 102);
// echo "Looking 102 number is found at {$lookingIndex} index \n";
// $lookingIndex = binarySearch($numbers, 12);
// echo "BS: Looking 12 number is found at {$lookingIndex} index \n";
// $lookingIndex = binarySearch($numbers, 102);
// echo "BS: Looking 102 number is found at {$lookingIndex} index \n";

//  Test 002
// $numbers = [];
// for ($i=0; $i < 100000; $i++) { 
//     array_push($numbers, $i+10);
// }
// measureExecutionTime(   "linearSearch", $numbers, 99999, 0, count($numbers) - 1);
// measureExecutionTime(   "binarySearchRecursive", $numbers, 99999, 0, count($numbers) - 1);
// measureExecutionTime(   "binarySearch", $numbers, 99999);