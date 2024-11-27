<?php

include_once __DIR__ . "./binary_search.php";

/**
 * Find index of all the occurances of a number from sorted list
 *      numbers = [1,4,6,9,11,15,15,15,17,21,34,34,56]
 *      number_to_find = 15  
 * This should return 5,6,7 as indices containing number 15 in the array
 */

function findOccuranceIndexes($numbers, $lookingNumber): string
{
    $indexes = [];
    $endIndex = count($numbers) - 1;

    $index = binarySearch($numbers, $lookingNumber);

    if ($index === -1) {
        return "";
    }

    // checking right side
    $rightIndex = $index;
    while($rightIndex <= $endIndex && $lookingNumber == $numbers[$rightIndex]) {
        array_push($indexes, $rightIndex);
        $rightIndex++;
    }

    // checking left side
    $leftIndex = $index - 1;
    while($leftIndex >= 0 && $lookingNumber == $numbers[$leftIndex]) {
        array_push($indexes, $leftIndex);
        $leftIndex--;
    }

    // make sort
    sort($indexes);
    return implode(", ", $indexes);
}

function binarySearchOccuranceIndexes($numbers, $lookingNumber)
{
    // I have to write code find occurance indexed using binary search  
}


// test_001
// $numbers = [1, 1, 2, 2, 3, 4, 5, 6, 7, 7, 7, 7, 7];
// $indexes = findOccuranceIndexes($numbers, 2);
// echo $indexes;

// test_002
// $numbers = [1,4,6,9,11,15,15,15,17,21,34,34,56];
// $indexes = findOccuranceIndexes($numbers, 56);
// echo $indexes;