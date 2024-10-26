<?php

/**
 * @task
 * 
 * nyc_weather.csv contains new york city weather for first few days in the month of January. Write a program that can answer following,
 *      1. What was the temperature on Jan 9?
 *      2. What was the temperature on Jan 4?
 */

 include_once __DIR__ . "/../ArrayHashMap.php";

function readCsvFile(): ArrayHashMap 
{
    // open file for reading
    $handle = fopen("../nyc_weather.csv", "r");
    if ($handle === false) {
        die("file is not found");
    }

    // collect row
    $hashmap = new ArrayHashMap();
    while(($row = fgetcsv($handle)) !== false) {

        // skip head
        if ($row[0] == "date") {
            continue;
        }
        // put to hashmap
        $hashmap->put($row[0], $row[1]);
    }

    // return data
    fclose($handle);
    return $hashmap;
}

$hashmap = readCsvFile();

echo "The temperature of Jan 9: {$hashmap->get("Jan 9")}\n";
echo "The temperature of Jan 4: {$hashmap->get("Jan 4")}\n";
