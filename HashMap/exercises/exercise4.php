<?php

/**
 * @task
 * poem.txt Contains famous poem "Road not taken" by poet Robert Frost. 
 * You have to read this file in python and print every word and its count as show below. 
 * Think about the best data structure that you can use to solve this problem 
 * and figure out why you selected that specific data structure.
 * @example
 *  'diverged': 2,
 *  'in': 3,
 *  'I': 8
 */

 include_once __DIR__ . "/../LinkedHashMap.php";

function readCsvFile(): LinkedHashMap 
{
    // open file for reading
    $handle = fopen(__DIR__ . "/poem.txt", "r");
    if ($handle === false) {
        die("file is not found");
    }

    // collect row
    $hashmap = new LinkedHashMap();
    while(($row = fgets($handle)) !== false) {
        foreach(str_word_count($row, 2) as $word) {
            if (($counter = $hashmap->get($word))) {
                $hashmap->put($word, $counter + 1);
            } else {
                $hashmap->put($word, 1);
            }
        }
    }

    // return data
    fclose($handle);
    return $hashmap;
}

$hashmap = readCsvFile();
foreach($hashmap->getItems() as $node) {
    while($node) {
        echo "'{$node->key}': {$node->value}\n";
        $node = $node->next;
    }
}