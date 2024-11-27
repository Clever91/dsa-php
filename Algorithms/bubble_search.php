<?php

require_once __DIR__ . "./utils.php";

/**
 * Bubble Sort is a simple sorting algorithm that repeatedly steps through a list, compares adjacent elements, 
 * and swaps them if they are in the wrong order. The process is repeated until no more swaps are needed, indicating that the list is sorted.
 * 
 * Steps:
 * 1. Compare the first two elements.
 * 2. Swap them if the first is larger than the second.
 * 3. Move to the next pair and repeat.
 * 4. Continue until the largest element "bubbles up" to the end.
 * 5. Repeat for the remaining unsorted portion of the list.
 * 
 * Time Complexity:
 *  Worst-case/average-case: O(n²) (many comparisons and swaps).
 *  Best-case: O(n) (when the list is already sorted).
 * Bubble Sort is simple to implement but inefficient for large datasets.
 */

 function bubbleSort(&$list)
 {
    $size = count($list) - 1;

    for ($i=0; $i < $size; $i++) {
        $swapped = false; 
        for ($j=0; $j < $size - $i; $j++) { 
            if ($list[$j] > $list[$j+1]) {
                $tmp = $list[$j];
                $list[$j] = $list[$j+1];
                $list[$j+1] = $tmp;
                $swapped = true;
            }
        }
        // if list is sorted, stop loop
        if (!$swapped) {
            break;
        }
    }
 }

//  test_001
//  $numbers = [12, 3, 23, 34, 22, 21, 22];
//  echo "old: " . implode(", ", $numbers) . "\n";
//  bubbleSort($numbers);
//  echo "new: " . implode(", ", $numbers) . "\n";


//  test_002
// $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 8, 7, 10, 1];
// echo "old: " . implode(", ", $numbers) . "\n";
// bubbleSort($numbers);
// echo "new: " . implode(", ", $numbers) . "\n";

//  test_003
// $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
// echo "old: " . implode(", ", $numbers) . "\n";
// bubbleSort($numbers);
// echo "new: " . implode(", ", $numbers) . "\n";

// measureExecutionTime("bubbleSort", $numbers);