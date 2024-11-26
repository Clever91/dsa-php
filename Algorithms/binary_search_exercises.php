<?php

include_once __DIR__ . "./binary_search.php";

/**
 * Find index of all the occurances of a number from sorted list
 *      numbers = [1,4,6,9,11,15,15,15,17,21,34,34,56]
 *      number_to_find = 15  
 * This should return 5,6,7 as indices containing number 15 in the array
 */

function findOccuranceIndexes($numbers, $lookingNumber): array
{
    $indexes = [];

    return $indexes;
}


// test_001
$numbers = [1, 2, 3, 4, 5, 6, 7, 7, 7, 7, 7];
$indexes = findOccuranceIndexes($numbers, 7);
var_dump($indexes);

// test_002
// $numbers = [1,4,6,9,11,15,15,15,17,21,34,34,56];
// $indexes = findOccuranceIndexes($numbers, 15);
// var_dump($indexes);